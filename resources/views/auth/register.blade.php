@extends('layout.master')
@section('content')
	<div class="register">
		<div class="container">
			<div class="col-md-6">
				<form action="{{ route('register.submit') }}" method="POST" role="form">
					@csrf 
					<legend>Form title</legend>
				
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" type="text" class="form-control" id="" placeholder="Input field" value="{{ old('name') }}">
						@error('name')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Address</label>
						<input name="address" type="text" class="form-control" id="" placeholder="Input field"value="{{ old('address') }}">
						@error('address')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
						<label for="">Bio</label>
						<textarea class="form-control" name="bio" id="" cols="30" rows="10">{{old('bio')}}</textarea>
						
						@error('bio')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Email address</label>
						<input name="email" type="email" class="form-control" id="" placeholder="Input field" value="{{old('email')}}">
						@error('email')
							<p class="text-danger">{{ $message }}</p>
						@enderror
 
					</div>
					<div class="form-group">
						<label for="">Gender</label>
						<div class="form-check">
						  <input class="form-check-input" value="1" type="radio" name="gender" {{ old('gender') == 1 ? 'checked' : '' }} id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">
						    Male
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" value="2" type="radio" name="gender" {{ old('gender') == 1 ? 'checked' : '' }} id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">
						    Female
						  </label>
						@error('gender')
							<p class="text-danger">{{ $message }}</p>
						@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" type="password" class="form-control" id="" placeholder="Input field"value="{{old('password')}}">
						@error('password')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Re-type Password</label>
						<input name="repassword" type="password" class="form-control" id="" placeholder="Input field"value="{{old('repassword')}}">
						@error('repassword')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>		    
@stop