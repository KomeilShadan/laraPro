<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Tag;
use Illuminate\Foundation\Inspiring;

class pageController extends Controller
{
	public function welcome()
	    {
	    	return view('welcome');
	    }

	public function about()
	    {
	    	$staff = ['karim', 'abbas', 'mamad'];
	    	$quote = [Inspiring::quote()];

	        return view('about', compact('quote')); 	
	    }

	public function showUser(User $user)
		{
			return view('showUser', compact('user'));
		}

	public function showOrder(User $user)
		{
			return view('showOrders', compact('user'));
		}

	public function addForm(User $user)
		{
			$tags = Tag::all();
			return view('addForm', compact('user', 'tags'));		
		}
	      
}