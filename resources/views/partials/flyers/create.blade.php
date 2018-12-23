@inject('countries', 'Country')
@csrf


<div class="form-group">
	<label>Street </label>
	<input name="street" type="text" class="form-control"   placeholder="Enter Street" value="{{ old('street') }}" required>
</div>

<div class="form-group">
 	<label>City</label>
 	<input name="city" type="text" class="form-control"  placeholder="City" value="{{ old('city') }}" required>
</div>
<div class="form-group">
	<label>Country</label>
	<select class="form-control" name="country">
		@foreach ($countries->all() as $country => $code )
			<option value="{{ $code }}"> {{ $country }}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label>Zip/Posta code</label>
	<input type="text" name="zip" class="form-control"  placeholder="Zip/Posta code" value="{{ old('zip') }}" required>
</div>
<div class="form-group">
	<label>State</label>
	<input name="state" type="text" class="form-control"  placeholder="State" value="{{ old('state') }}" required>
</div>
<div class="form-group">
	<label>Price</label>
	<input name="price" type="number" class="form-control"  placeholder="Price" value="{{ old('price') }}" required>
</div>
<div class="form-group">
 	<label>Description</label>
 	<textarea class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" required rows="10">{{ old('description') }}</textarea>
</div>
<div class="form-group button-submit">
	<button type="submit" class="btn btn-primary">Create Flyer </button>
</div>
