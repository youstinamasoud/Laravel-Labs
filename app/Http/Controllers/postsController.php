<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;

class postsController extends Controller
{
    public function index()
    {
        
        $posts=Post::paginate(3); // pagiate
        $page=$posts->currentPage()-1;
        return view('posts.index',[
            'posts'=>$posts,
            'page'=>$page
        ]);
        
        //dd(Post::all()[0]->title);
        //return Post::all();
        // return "youstina";
    }

    public function show($id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]); // obj post
      // return view('posts.show');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $user=User::all();
        return View('posts.edit',[
            'post'=>$post,
            'users'=>$user,
        ]);
    }

    public function update(StoreBlogPost $request,$id)
    {
        // $this->validate($request, [
        //     'title' => 'required|unique:posts',
        //     'description' => 'required  ',
        //     'user_id'=>'exists:users,id',
        // ]);
        
        Post::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id
        ]);
        return redirect(route('post'));
    }

    public function delete()
    {
        return view('posts.delete');
    }

    public function create()
    {
        $users=User::all();
        return view('posts.create',['users'=>$users]);
    }

    public function store(StoreBlogPost $request)
    {
        // $this->validate($request, [
        //     'title' => 'required|unique:posts|min:3',
        //     'description' => 'required |min:10 ',
        //     'user_id'=>'exists:users,id',
        // ]);
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
       return redirect(route('post')); 
    }



    public function destroy(Post $post)
    {
       $post->delete();
        //$post = $posts->first();
        return redirect(route('post'));
    }
}

