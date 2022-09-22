<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class Blog extends Model
{
    use HasFactory;

    public function createBlog($request){
        

        if(!Session::has('loginUser')){
            return ['message' => 'Only admins can create post'];
        }

        $user = session('loginUser');

        $formFields = $request->validate([
            'img' => 'mimes:jpg,png,jpeg,webp|required',
            'title' => 'required',
            'shortDesc' => 'required',
            'description' => 'required',
            'type' => 'required|boolean',
        ]);

        $file = $request->img;
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);

        $date = Carbon::now();

        $post = DB::table('blogs')
        ->insertGetId([
            'type' => $request->type,
            'title' => $request->title,
            'short_description' => $request->shortDesc,
            'description' => $request->description,
            'image' => $file_name,
            'date_archived' => null,
            'date_published' => $date,
            'user_id' => $user['id']
        ]);
        

        return $post;
    }


    public function fetchPosts(){
        if(Session::has('loginUser')){
            $posts = DB::table('blogs')->get();
        }
        else{
            $posts = DB::table('blogs')->whereNull('date_archived')->get();
        }
        
        return $posts;
    }

    public function fetchPost($id){
        $post = DB::table('blogs')->where('id', $id)->first();
        return $post;
    }

    public function deletePost($request){
        if(!Session::has('loginUser')){
            return ['message' => 'Only admins can create post'];
        }
        DB::table('blogs')->where('id', $request->id)
        ->delete();
    }

    public function archivePost($id){
        if(!Session::has('loginUser')){
            return ['message' => 'Only admins can create post'];
        }

        $date = Carbon::now();

        $updatePost = DB::table('blogs')->where('id', $id)
        ->update([
            'date_archived' => $date,
            'date_published' => null
        ]);
    }

    public function publishPost($id){
        if(!Session::has('loginUser')){
            return ['message' => 'Only admins can create post'];
        }

        $date = Carbon::now();

        $updatePost = DB::table('blogs')->where('id', $id)
        ->update([
            'date_archived' => null,
            'date_published' => $date
        ]);
    }
}
