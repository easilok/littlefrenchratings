@extends('layouts.app')

@section('content')
<div class="container mx-auto center-card-container">
	<div class="form-center-card mt-5">
		<div class="mb-6 text-xl text-platform-color font-bold">{{ __('Verify Your Email Address') }}</div>

		<div class="card-body">
				@if (session('resent'))
						<div class="alert alert-success" role="alert">
								{{ __('A fresh verification link has been sent to your email address.') }}
						</div>
				@endif

				{{ __('Before proceeding, please check your email for a verification link.') }}
				{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
		</div>
	</div>
</div>
@endsection
