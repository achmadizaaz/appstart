<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Models\User\UserProfile;
use App\Models\User\UserSocialMedia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        
        return view('backend.user.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {

        $pathImage = null;
        if($request->image)
          {
            // Get Nama File besertan ekstensi file
           $filenameWithExt = $request->file('image')->getClientOriginalName();
           
            // Get Nama File tanpa ekstensi file
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
   
            // Get Ekstensi File
           $extension = $request->file('image')->getClientOriginalExtension();
   
           // Rename File with combine time
           $fileNameToStore = $filename. '-'. time().'.'.$extension;
           
           // Get Path Store Image to Storage public/users/img
           $pathImage = $request->file('image')->storeAs('users/image', $fileNameToStore, 'public');

        }  
        // dd($pathImage);

        // // Insert to User Table    
        $user = User::create([
        'image' => $pathImage,
        'name'  => $request->name,
        'email' => $request->email,
        'status'=> $request->status,
        'password' => Hash::make($request->password),
        'password_default' => $request->password_default
        ]);

        // Assign Role for User
        $user->assignRole($request->role_name);

        // Insert Profile User
        UserProfile::create([
        'user_id' => $user->id,
        'birth'   => $request->birth,
        'phone'   => $request->phone,
        'gender'  => $request->gender,
        'address' => $request->address
        ]);
        
        // Insert Social Media User 
        UserSocialMedia::create([
        'user_id'   => $user->id,
        'facebook'  => $request->facebook,
        'instagram' => $request->instagram,
        'twitter'   => $request->twitter,
        'youtube'   => $request->youtube,
        'other'     => $request->other
        ]);
         

        return redirect()->route('user.index')->with('success', 'Data has been added!');
        
    }

    public function show(User $user)
    {
        return view('backend.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        // dd($request);
        
        // Check Image User
        if($user->image){
            $pathImage = $user->image;
        }else{
            $pathImage = null;
        }

        $user->slug = null;
        $removeImg = $user->image;

        // dd($data);
        if($request->image)
          {
            Storage::disk('public')->delete($removeImg);
                        // Get Nama File besertan ekstensi file
            $filenameWithExt = $request->file('image')->getClientOriginalName();
           
            // Get Nama File tanpa ekstensi file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
            // Get Ekstensi File
            $extension = $request->file('image')->getClientOriginalExtension();
    
            // Rename File with combine time
            $fileNameToStore = $filename. '-'. time().'.'.$extension;
            
            // Get Path Store Image to Storage public/users/img
            $pathImage = $request->file('image')->storeAs('users/image', $fileNameToStore, 'public');

        }  
        // dd($pathImage);

        // // Insert to User Table    
        $user->update([
            'image' => $pathImage,
            'name'  => $request->name,
            'status'=> $request->status,
            'password' => Hash::make($request->password),
            'password_default' => $request->password_default
        ]);

        // Assign Role for User
        $user->assignRole($request->role_name);

        // Insert Profile User
        UserProfile::where('user_id', $user->id)->update([
            'birth'   => $request->birth,
            'phone'   => $request->phone,
            'gender'  => $request->gender,
            'address' => $request->address
        ]);
        
        // Insert Social Media User 
        UserSocialMedia::where('user_id', $user->id)->update([
            'facebook'  => $request->facebook,
            'instagram' => $request->instagram,
            'twitter'   => $request->twitter,
            'youtube'   => $request->youtube,
            'other'     => $request->other
        ]);

        // dd($user);

        return redirect()->route('user.show', $user->slug)->with('success', 'Data has been updated');

    }

    public function resetPassword(User $user)
    {
        // Check Password Default
        if($user->password_default){
            $user->password = Hash::make($user->password_default);
            $user->update();

            return back()->with('success', 'Reset password has been complete');
        }else{
            return back()->with('failed', 'Cant reset password, because password default not found');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data has been deleted');
    }


}
