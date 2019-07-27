@extends('showOrders')


@section('addForm')

@include('partials.flashAddMessage')

	<form method="post" action="/users/{{ $user->id }}/orders">

	 @csrf

		<div>
			<textarea name="item"> {{ old('item') }} </textarea>
		</div>

		@include('partials.selectTags')

		<div>
			<input type="submit" name="submit">
		</div>
	</form>
	
@endsection