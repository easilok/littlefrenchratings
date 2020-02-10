@extends('layouts.app')

@section('content')

<div class="container mx-auto center-card-container">
	<div class="form-center-card mt-5">
		<div class="mb-6 text-xl text-platform-color font-bold">{{ __('Reset Password') }}</div>

		<div class="w-full flex justify-center">
			<form method="POST" class="w-full justify-center" action="{{ route('password.update') }}">
				@csrf

				<input type="hidden" name="token" value="{{ $token }}">
				<div class="mb-4">
					<label for="email" class="form-label">
							{{ __('E-Mail Address') }}
					</label>
					<input id="email" type="email"
					class="{{$errors->has('email') ? 'border-red-400' : 'border-grey-200'}} form-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
					@if ($errors->has('email'))
							<span class="input-validation-error" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
				</div>

				<div class="mb-4">
					<label for="password" class="form-label">
							{{ __('Password') }}
					</label>
					<input id="password" type="password"
					class="{{$errors->has('password') ? 'border-red-400' : 'border-grey-200'}} form-input"
					name="password" placeholder="Palavra-passe" required>

					@if ($errors->has('password'))
							<span class="input-validation-error" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
							</span>
					@endif
				</div>

				<div class="mb-4">
					<label for="password_confirmation" class="form-label">
							{{ __('Confirm Password') }}
					</label>
					<input id="password_confirmation" type="password" class="border-grey-200 form-input"
					name="password_confirmation" placeholder="Confirmar Palavra-passe" required>
				</div>

				<div class="flex justify-end">
					<button type="submit" class="btn-std btn-platform">
							{{ __('Reset Password') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
