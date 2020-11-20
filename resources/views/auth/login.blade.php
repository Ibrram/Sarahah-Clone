@extends('app')
@section('title', 'Login')

@section('content')
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-2/6 md:w-1/2 bg-gray-800 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
                <h2 class="text-white text-lg font-medium title-font mb-5">Login</h2>
                @if(session('status'))
                    <p class="block text-center text-green-500 mb-3">{{ session('status') }}</p>
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @error('email') <small class="mb-3 block text-red-500">{{ $message }}</small> @enderror
                    <input class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" name="email" value="{{ @old('email') }}" placeholder="Email or Username" type="text">
                    @error('password') <small class="mb-3 block text-red-500">{{ $message }}</small> @enderror
                    <input class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" name="password" placeholder="Password" type="password">
                    <button class="block w-full text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Login</button>
                </form>
                <a href="{{ route('password.request') }}" class="text-blue-600 mt-3">Forget Password?</a>
                <p class="text-xs text-gray-600 mt-3 text-center">OR use social media login</p>
                <span class="inline-flex justify-center mt-3">
                    <a href="{{ route('social.handle', 'facebook') }}" class="text-gray-600">
                      <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                      </svg>
                    </a>
                    <a href="{{ route('social.handle', 'twitter') }}" class="ml-3 text-gray-600">
                      <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                      </svg>
                    </a>
                </span>
            </div>
        </div>
    </section>
@endsection
