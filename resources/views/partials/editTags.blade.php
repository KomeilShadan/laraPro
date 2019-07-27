<div class="form-group">
	<select name="tags[]" title="tags" class="form-control" multiple>
		@foreach ($tags as $tag)
		
		<option
			@foreach ($order->tags as $order_tag)
				@if ($order_tag->name == $tag->name)
					selected 
				@endif
			@endforeach

		value="{{ $tag->id }}"> {{ $tag->name }} </option>

		@endforeach
	</select>
</div>