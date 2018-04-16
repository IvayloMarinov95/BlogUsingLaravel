<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Iluminate\Support\Facades\View;
class PostController extends Controller{
    public function index(){
        $posts = Post::withCount('comments')->orderBy("comments_count", "desc")->take(3)->get();
        return view('index', ['posts' => $posts]);
    }
    public function createPost(Request $request)
    {
        Post::create([
            'author' => $request['author'],
            'title' => $request['title'],
            'text' => $request['text'],
        ]);
        return redirect()->route('posts.index'); 

    }

    public function createComment(Request $request){
        Comment::create([
            'post_id' => $request['post_id'],
            'author' => $request['author'],
            'text' => $request['text']
        ]);
        return redirect()->route('posts.info', ['id' => $request['post_id']]);
    }
    public function add() 
    {
        return view('add-post');
    }

    public function info($id){
        $post = Post::find($id);
       return view('single', ['post' => $post]);
    }
    
    public function edit($id){
        $post = Post::find($id);
        return view('edit-post', ['post' => $post]);
    }

    public function update($id, Request $request){
        $post = Post::find($id)
                            ->update(['text' => $request['text']]);
        return redirect()->route('posts.index');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index'); 
    }
    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('posts.info',['id'=> $comment->post_id]); 
    }
}