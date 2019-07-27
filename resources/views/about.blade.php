@extends('welcome')

@section('staff')

	@foreach($quote as $person)
	<li> {{ $person }} </li>
	@endforeach 

@stop
