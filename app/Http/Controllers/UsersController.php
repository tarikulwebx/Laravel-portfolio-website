<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required|min:8',
        ]);

        $inputs = $request->all();
        $inputs['password'] = bcrypt($request->password);

        if ($photo_file = $request->file('photo_id')) {
            $name = time() . $photo_file->getClientOriginalName();

            $photo_file->move('images', $name);

            $photo = Photo::create(['name'=>$name]);
            $inputs['photo_id'] = $photo->id;
        }



        $user = User::create($inputs);

        session()->flash('user_create_message', 'User "'.$inputs['name'].' ('.$user->role->name.')" Created Successfully');

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
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
            'role_id' => 'required',
            'photo_id' => 'mimes:png,jpg',
            'is_active' => 'required',
        ]);

        
        if (trim($request->password) == '') {
            $inputs = $request->except('password');
        } else {
            $inputs = $request->all(); 
            $inputs['password'] = bcrypt($request->password);
        }
        

        if($photo_file = $request->file('photo_id')) {
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
        session()->flash('user_update_msg', 'User Updated Successfully');
        return back();
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
        $user = User::findOrFail($id);
        

        if($user->photo) {
            $photo = $user->photo->name;
            unlink(public_path() . $photo);

            $photo_id = $user->photo_id;
            Photo::findOrFail($photo_id)->delete();
        }

        $user->delete();

        session()->flash('delete_user_msg', 'User "'.$user->name.'" deleted Successfully');
        return redirect('admin/users');

    }
}
