<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $user_profile = User::findBySlugOrFail($slug);
        return view('profile.show', compact('user_profile'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $user = User::findBySlugOrFail($slug);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'mimes:png,jpg',
            'password' => 'nullable|min:8'
        ]);

        if (trim($request->password) == '') {
            $inputs = $request->except('password');
        } else {
            $inputs = $request->all();
            $inputs['password'] = bcrypt($request->password);
        }


        if($photo_file = $request->file('photo')) {
            $name = time() . $photo_file->getClientOriginalName();
            // Delete old photo if exists
            if($user->photo) {
                $old_photo = $user->photo->name;
                unlink(public_path() . $old_photo);
                Photo::findOrFail($user->photo_id)->delete();
            }

            // Move photo to public/image folder
            $photo_file->move('images' , $name);
            $photo = Photo::create(['name'=>$name]);
            $inputs['photo_id'] = $photo->id;
        }

        $user->update($inputs);
        session()->flash('profile_update_msg', 'Your profile updated successfully!');
        
        $user_profile = User::findOrFail($id);
        return redirect('/profile/'.$user_profile->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
