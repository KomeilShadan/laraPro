@extends('welcome')

@section('orders')

	<h1> {{ $user->name }} </h1>

	<ul>
	@foreach($user->orders as $order)

		<li>

		<a href="/orders/{{ $order->id }}/edit">	

		 {{ $order->item }} 
		 
		</a>

		</li>

	@endforeach	
	</ul>

	

@endsection