<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserChangePasswordRequest;
use App\Http\Requests\User\UserProfileUpdateRequest;
use App\Models\User;
use App\Models\User\UserProfile;
use App\Models\User\UserSocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('backend.profile.index', compact('user'));
    }

    public function edit()
    {
        $profile = Auth::user();
        return view('backend.profile.edit', compact('profile'));
    }

    public function update(UserProfileUpdateRequest $request, User $user){
        
       
        if($user->image){
            $pathImage = $user->image;
        }else{
            $pathImage = null;
        }
        
        if($request->image)
          {
            $removeImg = $user->image;
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
        ]);

       
        // Update Profile User
        UserProfile::where('user_id', $user->id)->update([
            'birth'   => $request->birth,
            'phone'   => $request->phone,
            'gender'  => $request->gender,
            'website' => $request->website,
            'address' => $request->address
        ]);
        

        return back()->with('success', 'Update profile has been complete');
    }


    public function updateSocialMedia(Request $request, User $user)
    {
        // Update Social Media
        UserSocialMedia::where('user_id', $user->id)->update([
            'facebook'  => $request->facebook,
            'instagram' => $request->instagram,
            'twitter'   => $request->twitter,
            'youtube'   => $request->youtube,
            'other'     => $request->other
        ]);

        return back()->with('success', 'Update social media has been complete');
    }
    

    public function changePassword(UserChangePasswordRequest $request, User $user)
    {

        // Check current password == true
        if(Hash::check($request->current_password, $user->password)){

            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
    
            return back()->with('success', 'Change password has been complete');
        }

        return back()->with('failed', 'Current password does not match');
    }


}
