@extends('app')
@section('title', $user->name)
@section('content')
    <section class="text-gray-500 bg-gray-900 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Send Message to {{ $user->username }}</h1>
                @if(!session('message'))
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Leave a constructive message :)</p>
                @endif
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                        <div class="relative">
                            @if(session('message'))
                                <div class="mx-auto font-bold block text-center">
                                    <h3>{{ session('message') }}</h3>
                                </div>
                            @else
                                <label for="message" class="leading-7 text-sm text-gray-400">Your Message</label>
                                <form action="{{ route('post.user', $user->id) }}" method="POST">
                                    @csrf
                                    @error('message') <small class="mb-2 block text-red-500">{{ $message }}</small> @enderror
                                    <textarea id="message" name="message" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ @old('message') }}</textarea>
                                    <button class="mt-5 flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
