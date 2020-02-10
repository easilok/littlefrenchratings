@extends('layouts.app')

@section('content')
<div class="container mx-auto center-card-container">
	<div class="form-center-card mt-5">
		<div class="mb-6 text-xl text-platform-color font-bold">{{ __('Confirm Password') }}</div>

		<div class="w-full flex justify-center">
			{{ __('Please confirm your password before continuing.') }}

			<form method="POST" class="w-full justify-center" action="{{ route('password.confirm') }}">
				@csrf

				<div class="mb-4">
					<label for="password" class="form-label">{{ __('Password') }}</label>

					<input id="password" type="password" 
						class="{{$errors->has('password') ? 'border-red-400' : 'border-grey-200'}} form-input" 
						name="password" required autocomplete="current-password">
					@if ($errors->has('password'))
						<span class="input-validation-error" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
						</span>
					@enderror
				</div>

				<div class="md:flex md:justify-end">
					@if (Route::has('password.request'))
					<div class="md:mr-12 mb-4 md:mb-0">
						<!-- <a class="w-full md:w-auto block text-center shadow bg-teal-500 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded no-underline leading-none" href="{{ route('password.request') }}">-->
						<a class="md:block btn-std btn-platform" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
						</a>
					</div>
					@endif
					<div class="">
						<button type="submit" class="btn-std btn-platform">
							{{ __('Confirm Password') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
