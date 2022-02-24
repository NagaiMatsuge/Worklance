<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class AdminPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    //In every page navName is required!

    public function index()
    {
        $users = \DB::table('users')->paginate(10);

        return view('admin.index', [
            'navName' => 'Home',
            'users' => $users
        ]);
    }

    public function publications()
    {
        $posts = \DB::table('posts')->paginate(10);
        return view('admin.post.index', [
            'navName' => 'All publications',
            'posts' => $posts
        ]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('msg', 'User has been deleted successfuly');    
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('msg', 'Post has been deleted successfuly');
    }

    public function makeAdmin($id) 
    {
        $user = User::FindOrFail($id);
        if(isset($user->userRole)) {
            return redirect()->back()->with('msg', 'User is already admin');
        }

        Role::create([
            'user_id' => $id,
            'name' => 'admin'
        ]);

        return redirect()->back()->with('msg', 'User was promoted to admin');
    }


}
