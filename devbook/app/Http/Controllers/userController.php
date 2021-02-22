<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{

    public function loginCheck(){

        $sixMonthLogin = User::Query()->where('lastLogin' > Carbon::now()-subDays(182)->get());
        $sixMonthLogin->notify((new loginEmail($sixMonthLogin->email)));
        $notificationDate = Carbon::now();
        $this->inactiveDeletion();
    }

    public function inactiveDeletion(){
        User::Query()->where('lastLogin' > Carbon::now()-subDays(188)->delete());
    }

    public function search(Request $request){
        $user = User::Query()->whereLike('bio', $request->keyword)->get();

        return $user;
    }
}
