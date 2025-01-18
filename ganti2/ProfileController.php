<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function view(){
        $user = Auth::user();

        return view('ecowise.profile', compact('user'));
    }

    public function update(Request $request){

        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:500'], 
            'phone' => ['required', 'string', 'regex:/^08[0-9]{9,12}$/'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ],
        [
            'email.unique' => 'The email has already been taken by another user',
        ]
        );

        $user->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('profile.page')->with('success', __('ecowise.profile_msg'));
    }
    public function upload_image(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagename = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imagename);

        $user = Auth::user();
        $user->image = $imagename;
        $user->save();

        return redirect()->back();
    }

}
