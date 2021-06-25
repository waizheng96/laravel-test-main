<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class TestController extends Controller
{
    public function q1() {
        // Write a query to get list of users which using gmail
        $answer1 = User::where('email','like','%@gmail.com')->get();

        return view('q1')->with([
            'answer1' => $answer1
        ]);
    }
    
    public function q2() {
        // Write a query to get list of items with price below than 300
        // if no result, get below 400, 500, 600 and so on until it show something

        $tempValue;
        $count = 300;
        $valid = true;

        while($valid){
            $tempValue = Item::where('price','<', $count)->get();
            $valid = !(count($tempValue) > 0);
            $count += 100;
        }

        $answer2 = $tempValue;

        // Based on $answer2 result, sum up the price
        $answer3 = $answer2->sum('price');
        
        return view('q2')->with([
            'answer2' => $answer2,
            'answer3' => $answer3
        ]);
    }

    public function q3() {
        // Define the relationship in App\Models\User to fix the logic below
        $user = User::find(1);
        $user->address;

        // Currently only show first_name
        // Please include last_name by defining a full_name accessor in App\Models\User 

        return view('q3')->with([
            'user' => $user,
        ]);
    }

    public function q4() {
        $users = User::get();

        foreach($users as $user){
            if($user->gender == 'male'){
                $user->name_prefix = "Mr ";
            } else if ($user->gender == 'female'){
                $user->name_prefix = "Ms ";
            }
        }

        // Write a logic to map a new key for each user based on user->gender, 
        // The value is either 'Mr' or 'Ms'
        // Key name: name_prefix

        return view('q4')->with([
            'users' => $users,
        ]);
    }

    public function q5(Request $request) {
        // Copy and paste this link in your browser: http://yourlocalhostwithorwithoutport/q5?param1=parameter1&param2=parameter2
        // Get the query param from the url and assign the variables below accordingly
        // http://127.0.0.1:8000/q5?param1=parameter1&param2=parameter2

        $param1 = $request->input('param1');
        $param2 = $request->input('param2');

        return view('q5')->with([
            'param1' => $param1,
            'param2' => $param2,
        ]);
    }
}
