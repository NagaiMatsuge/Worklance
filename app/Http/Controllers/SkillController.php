<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', [
            'navName' => 'Skill',
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        Skill::create($validated);

        return redirect()
                ->back()
                ->with('msg', 'Skill has been added successfuly');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $skill = Skill::findOrFail($id);
        return view('admin.skill.editSkill', [
            'navName' => 'Edit skill',
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $skill = Skill::findOrFail($id);
        $skill->update($validated);

        return redirect()
                ->route('homeSkillpage')
                ->with('msg', 'Skill has been updated successfuly');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()
                ->back()
                ->with('msg', 'Skill has been deleted successfuly');    
    }
}
