<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
            'img' => 'mimes:jpg,png,jpeg,webp,avif|required',
            'title' => 'required',
            'shortDesc' => 'required',
            'description' => 'required',
            'type' => 'required|boolean',
        ]);

        $file = $request->img;
        $file_name = time().$file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);

        // $a = Storage::disk('local')->put($file_name, 'Contents');
        // echo asset('storage/'.$a);
        // dd($a);


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

        return ['success' => true, 'id' => $post];
    }

    public function editPost($request, $id){
        if(!Session::has('loginUser')){
            return ['message' => 'Only admins can create post'];
        }

        $formFields = $request->validate([
            'title' => 'required',
            'shortDescription' => 'required',
            'description' => 'required',
            'type' => 'required|boolean'
        ]);

        // WITHOUT IMAGE

        if($request->img == 'null' || $request->img == null){
            DB::table('blogs')->where('id', $id)
            ->update([
                'title' => $request->title,
                'short_description' => $request->shortDescription,
                'description' => $request->description,
                'type' => $request->type
            ]);

            return ['success' => true];
        }

        // WITH IMAGE

        else{
            $formFields = $request->validate([
                'img' => 'mimes:jpg,png,jpeg,webp,avif'
            ]);

            $file = $request->img;
            $file_name = time().$file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);

            DB::table('blogs')->where('id', $id)
            ->update([
                'title' => $request->title,
                'short_description' => $request->shortDescription,
                'description' => $request->description,
                'type' => $request->type,
                'image' => $file_name,
            ]);

            return ['success' => true];
        }
    }

    public function fetchPosts(){
        if(Session::has('loginUser')){
            $posts = DB::table('users')
            ->join('blogs', 'users.id', '=', 'blogs.user_id')
            ->get();
        }
        else{
            $posts = DB::table('users')->whereNull('date_archived')
            ->join('blogs', 'users.id', '=', 'blogs.user_id')
            ->get();
        }
        
        return $posts;
    }

    public function fetchHomePosts(){
        $posts = DB::table('users')->whereNull('date_archived')
            ->join('blogs', 'users.id', '=', 'blogs.user_id')
            ->orderBy('date_created', 'desc')
            ->limit(4)->get();
        return $posts;
    }

    public function fetchPost($id){
        $post = DB::table('users')->where('blogs.id', $id)
        ->join('blogs', 'users.id', '=', 'blogs.user_id')
        ->first();
        return $post;
    }

    public function deletePost($request){
        if(!Session::has('loginUser')){
            return ['message' => 'Only admins can create post'];
        }

        $image = DB::table('blogs')->select('image')
        ->where('id', $request->id)->first();

        
        $image_name = $image->image;
        unlink('images/'.$image_name);

        DB::table('blogs')->where('id', $request->id)
        ->delete();


        return ['success' => true];
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

        return ['success' => true];
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

        return ['success' => true];
    }
}
