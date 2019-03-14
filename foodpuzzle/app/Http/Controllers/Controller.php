<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert(Request $req)
    {
    	$email = $req->input('email');
    	$name = $req->input('name');
    	$password = $req->input('password');
    	$c_password = $req->input('c_password');

    	//password and confirm password must match
    	if ($password == $c_password)
    	{
    		$data = array('username'=>$name, 'password'=>$password, 'email'=>$email);
    		DB::table('users')->insert($data);
    		echo "<a href='/login'>Sign Up Successdully! Please login.</a>";
    	}
    	else
    	{
    		echo "<a href='/register'>The confirm password does not match the password, Please try again!</a>";
    	}
    }

    function login(Request $req)
    {
    	$inputName = $req->input('inputName');
    	$inputPassword = $req->input('inputPassword');

    	//To retrieve the 'username' and 'password' from 'users' table
    	$username = DB::table('users')->where('username', $inputName)->value('username');
    	$password = DB::table('users')->where('username', $inputName)->value('password');

    	if ($inputName == $username)
    	{
    		if ($inputPassword == $password)
    		{    			
    			//to result page
    			echo "<a href='/search-result'>LogIn Successfully!</a>";
    		}
    		else
    		{
    			//re-enter your password
    			echo "<a href='/login'>Wrong Password, Please try again!</a>";
    		}    		
    	}
    	else
    	{
    		//the username have not been registered yet
    		echo "<a href='/register'>The username have not been registered yet, Please register first!</a>";
    	}
    }
}
