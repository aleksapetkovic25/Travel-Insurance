<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function createBlog(Request $request){
        $blog = new Blog();
        return $blog->createBlog($request);
    }

    public function fetchPosts(Request $request){
        $blog = new Blog();
        return $blog->fetchPosts($request);
    }

    public function fetchPost($id){
        $blog = new Blog();
        $post = $blog->fetchPost($id); 
        return view('postDetails', ['post' => $post]);
    }

    public function editPost($id){
        $blog = new Blog();
        $post = $blog->fetchPost($id);
        return view('editPost', ['post' => $post]);
    }

    public function deletePost(Request $request){
        $blog = new Blog();
        return $blog->deletePost($request);
    }

    public function archivePost($id){
        $blog = new Blog();
        return $blog->archivePost($id);
    }

    public function publishPost($id){
        $blog = new Blog();
        return $blog->publishPost($id);
    }
}
