<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users= User::select('id','name', 'email' , 'image' , 'qualification' , 'phone' ,'adress')
        ->orderBy('id','DESC')
        ->paginate(3);

        return view('users.index',[
            'users' => $users
        ]);
    }

    public function destroy( $userId){
       
        
        User::findOrFail($userId)->delete();
        return redirect(url('/users'));
    }
    
    

}
