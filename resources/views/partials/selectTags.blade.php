<div class="form-group">
	<select name="tags[]" title="tags" class="form-control" multiple>
		@foreach ($tags as $tag)
		
		<option value="{{ $tag->id }}"> {{ $tag->name }} </option>

		@endforeach
	</select>
</div>