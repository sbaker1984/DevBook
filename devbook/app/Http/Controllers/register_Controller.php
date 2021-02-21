<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class register_Controller extends Controller
{
    public function create(Request $request){

        $request->validate([
            'firstName'=>'string|required',
            'lastName'=>'string|required',
            'email'=>'email|required',
            'dateOfBirth' => 'date|required',
            'nationalInusrance' => 'integer|required',
            'profileImage'=>'url',
            'fullAddress' => 'string',
            'bio' => 'string'
        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->dateofBirth = $request->dateOfBirth;
        $user->nationalInsurance = $request->nationalInsurance;
        $user->profileImage = $request->profileImage;
        $user->fullAddress = $request->fullAddress;
        $user->bio = $request->bio;
        $user->save();
    }

    public function update(Request $request, $id){


        $request->validate([
            'firstName'=>'string|required',
            'lastName'=>'string|required',
            'profileImage'=>'url',
            'fullAddress' => 'string',
            'bio' => 'string'
        ]);

        $user = Auth::User($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->profileImage = $request->profileImage;
        $user->fullAddress = $request->fullAddress;
        $user->bio = $request->bio;
        $user->save();
    }

    public function destroy($id){
        $user = Auth::User($id);
        $user->findOrFail()->delete();
    }

    public function view($id){
        $user = Auth::User($id)->get();
        return $user;
    }

    public function search(Request $request){
        $user = User::Query()->whereLike('bio', $request->keyword)->get();

        return $user;
    }
}
