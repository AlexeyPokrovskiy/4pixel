<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('section.index',[
            'sections'=>Section::with('users')->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('section.create',[
            'users'=>User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'logo' => 'max:10000|mimes:png,jpeg,jpg',
            'description' => "min:3|max:1000",
        ]);
        $data=$request->all();

        //Image Upload
        if(!empty($request->logo)){
            $path=$request->file('logo')->store("","logo");
            $data['logo']="/storage/logo/".$path;
        }

        $section=Section::create($data);

        if($request->input('section_user')):
            $section->users()->attach($request->input('section_user'));
        endif;
        return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('section.edit',[
            'section'=>$section,
            'users'=>User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'logo' => 'max:10000|mimes:png,jpeg,jpg',
            'description' => "min:3|max:1000",
        ]);

        //Upload and Save Image
        if(!empty($request->logo)){
            $path=$request->file('logo')->store("","logo");
            if($section->logo) @unlink(public_path($section->logo));
            $section->update(['logo'=>"/storage/logo/".$path]);
        }


        $section->update($request->except('logo'));

        //Category
        $section->users()->detach();
        if($request->input('section_user')):
            $section->users()->attach($request->input('section_user'));
        endif;
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->users()->detach();
        $section->delete();

        return redirect()->route('section.index');
    }
}
