@extends('welcome')

@section('editForm')

	<a href="/users/{{ $order->user_id }}/addOrder">
		<input type="button" name="back" value="back">
	</a>


	<form method="post" action="/orders/{{ $order->id }}">

		@method('PATCH')

		@csrf

		<div class="form-group"> <h3>edit the item</h3>
			<textarea name="item" class="form-control"> {{ $order->item }} </textarea>
			@can('update', $order) <input type="submit" name="submit"> @endcan
		</div>

		@include('partials.editTags')
	</form>

	@unless($order->tags->isEmpty())
		<hr>
		<h3> Tags </h3>
		<ul>
		@foreach ($order->tags as $tag)
			<li>{{ $tag->name }}</li>
		@endforeach
		</ul>
	@endunless
@endsection