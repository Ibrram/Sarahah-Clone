@extends('app')
@section('title', 'Reset Password')
@section('content')
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-2/6 md:w-1/2 bg-gray-800 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
                <h2 class="text-white text-lg font-medium title-font mb-5">Forget Password ?</h2>
                @if($errors->any())
                    <p class="block text-center text-red-500 mb-3">{{ $errors->first() }}</p>
                @elseif(session('status'))
                    <p class="block text-center text-green-500 mb-3">{{ session('status') }}</p>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <input class="w-full block bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" name="email" placeholder="Your Email" type="email">
                    <button class="w-full block text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
                </form>
                <a href="{{ route('login') }}" class="mt-3 text-indigo-500">Back to login?</a>
            </div>
        </div>
    </section>
@endsection
