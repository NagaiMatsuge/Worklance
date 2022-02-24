<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\UserSkill;
use App\Skill;

use Illuminate\Http\Request;
use App\Traits\ImageUpload;

class HomeController extends Controller
{
    use ImageUpload;


    public function __construct()
    {
        $this->middleware('auth');
    }


    //home page
    public function index()
    {
        // $posts = \DB::table('posts')->orderBy('created_at', 'desc')->get();
        $posts = Post::find(1)->orderBy('created_at', 'desc')->paginate(10);
        
        return view('home', ['posts' => $posts]);
    }

    //Settings page of the user
    public function dashboard()
    {
        $userPosts = Auth()->user()->posts;
        $userSkills = Auth()->user()->skills;
        $skills = Skill::all();

        
        return view('dashboard', [
            'userPosts' => $userPosts,
            'userSkills' => $userSkills,
            'skills' => $skills
        ]);
    }

    //Change about of the user
    public function changeAbout(Request $request)
    {
        $skills = $request->skills;

        $validated = $request->validate([
            'about' => 'min:15'
        ]);

        $user = \App\User::find(auth()->user()->id);

        foreach($skills as $skill) {
            UserSkill::create([
                'name' => $skill,
                'user_id' => $user->id
            ]);
        }

        \App\User::find(auth()->user()->id)->update($validated);

        return redirect()
                    ->back()
                    ->with('msg', 'About info of user has been updated successfully');
    }


    //change personal info and image
    public function personalInfo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'role' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact' => ''
        ]);

        if(isset($request->avatar))
        {

            $request->avatar;
            $filePath = $this->UserImageUpload($request->avatar); //Passing $data->image as parameter to our created method

            if(\File::exists(Auth()->user()->avatar)) {
                \File::delete(Auth()->user()->avatar);
            }

            User::find(auth()->user()->id)->update([
                'name' => $validated['name'],
                'role'=> $validated['role'],
                'avatar' => $filePath,
                'contact'=> ''
            ]);
            return redirect()
                    ->back()
                    ->with('msg', 'Personal info of user has been updated successfully');

        }

        \App\User::find(auth()->user()->id)
                            ->update($validated);
        return redirect()
                    ->back()
                    ->with('msg', 'Personal info of user has been updated successfully');

    }


    //See all users
    public function users()
    {
        $users = User::where('profileType', 'freelancer')->paginate(10);

        return view('/users', ['users' => $users]);
    }


    //Search users
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'min:1'
        ]);
        $search = $request->search;
        $users = User::find(1)
                        ->where('name', 'like', '%'. $search .'%')
                        ->orderBy('created_at')
                        ->paginate(10);

        return view('/users', ['users' => $users]);

    }

    public function user($id)
    {
        $user = User::findOrFail($id);
        return view('user/show', ['user' => $user]);
    }

}
