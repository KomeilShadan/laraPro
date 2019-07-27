<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;	// *
use App\Http\Controllers\Controller;	// *
use App\User;
use App\Order;
use App\Tag;

class orderController extends Controller
{
    public function submit(User $user,Request $request)
    {
    	$this->validate($request, [
    		'item' => 'bail|required|min:3|alpha'
    	]);

    	$user->orders()->create($request->all());

    	$order = Order::latest()->first();
    	$tagIds = $request->input('tags');
    	$order->tags()->sync($tagIds);

    	session()->flash('add_message', 'order submitted!');

    	return back();
    }

    public function editForm(Order $order)
    {
    	$tags = Tag::all();
		return view('editForm', compact('order', 'tags'));    	
    }

    public function update(Order $order, Request $request)
    {
    	
    	$order->update($request->all());

    	$tagIds = $request->input('tags');
    	$order->tags()->sync($tagIds);
    	
    	return back();

    }
}
