@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-5/6 lg:w-3/5 xl:w-1/2">
            <div class="border-2 p-5 rounded-lg shadow-md">
                <div class="mb-6 text-xl text-teal font-bold">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label for="email" class="block text-grey font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                                    {{ __('E-Mail Address') }}
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="email" type="email"
                                class="bg-grey-lighter appearance-none border-2 {{$errors->has('email') ? 'border-red-light' : 'border-grey-lighter'}}  rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-teal" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-red-light italic" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label for="password"
                                    class="block text-grey font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    {{ __('Password') }}
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="password" type="password"
                                class="bg-grey-lighter appearance-none border-2 {{$errors->has('password') ? 'border-red-light' : 'border-grey-lighter'}} rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-teal"
                                name="password" placeholder="Palavra-passe" required>

                                @if ($errors->has('password'))
                                    <span class="text-red-light italic " role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label for="password_confirmation"
                                    class="block text-grey font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    {{ __('Confirm Password') }}
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="password_confirmation" type="password"
                                class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-teal"
                                name="password_confirmation" placeholder="Confirmar Palavra-passe" required>
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3 md:flex md:justify-between">
                                <div class="mb-5 md:mb-0">
                                    <button type="submit" class="shadow bg-teal hover:bg-teal-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
