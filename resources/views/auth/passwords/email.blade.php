@extends('layouts.app')

@section('content')
<div class="container mx-auto center-card-container">
	<div class="form-center-card mt-5">
		<div class="mb-6 text-xl text-platform-color font-bold">{{ __('Reset Password') }}</div>

		<div class="w-full flex justify-center">
			@if (session('status'))
			<div class="p-3 bg-red-light text-white italic mb-5" role="alert">
				{{session('status')}}
			</div>
			@endif
			<form method="POST" class="w-full justify-center" action="{{ route('password.email') }}">
				@csrf

				<div class="mb-4">
					<label for="email" class="form-label" for="email">
							{{ __('E-Mail Address') }}
					</label>
					<input id="email" type="email"
						class="{{$errors->has('email') ? 'border-red-400' : 'border-grey-200'}} form-input" 
						name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
					@if ($errors->has('email'))
							<span class="input-validation-error" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
				</div>

				<div class="flex justify-end">
					<button type="submit" class="btn-std btn-platform">
							{{ __('Send Password Reset Link') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
