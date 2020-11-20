@extends('app')
@section('title', 'Account Settings')
@section('content')
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">

            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                        <form action="{{ route('update.general') }}" method="POST" class="w-full">
                            @method('put')
                            @csrf
                            <h3 class="text-blue-500 text-lg mb-3">General Information</h3>
                            @if(session('success_general'))
                                <h3 class="text-green-500 text-center">{{ session('success_general') }}</h3>
                            @endif
                            <label for="name">Your Name</label>
                            @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
                            <input id="name"
                                   class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                                   placeholder="Your Name"
                                   name="name" type="text" value="{{ old('name') ?? $user->name }}">
                            <label for="email">Your Email</label>
                            @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
                            <input id="email"
                                   class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                                   placeholder="Your Email"
                                   name="email" type="email" value="{{ old('email') ?? $user->email }}">
                            <label for="url">Your URL</label>
                            <input id="url"
                                   class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                                   type="text" value="{{ Request()->getHost() . '/' . $user->username }}" disabled>

                            <button type="submit"
                                    class="block w-full text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                        </form>
                    </div>
                </div>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                        <form action="{{ route('update.password') }}" method="POST" class="w-full">
                            @method('put')
                            @csrf
                            <h3 class="text-blue-500 text-lg mb-3">Change Password</h3>
                            @if(session('success_password'))
                                <h3 class="text-green-500 text-center">{{ session('success_password') }}</h3>
                            @endif
                            <label for="current">Current Password</label>
                            @error('current') <small class="text-red-500">{{ $message }}</small> @enderror
                            <input id="current"
                                   class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                                   placeholder="Current Password"
                                   name="current" type="password" value="{{ old('current') }}">
                            <label for="new">New Password</label>
                            @error('new') <small class="text-red-500">{{ $message }}</small> @enderror
                            <input id="new"
                                   class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                                   placeholder="New Password"
                                   name="new" type="password">
                            <label for="confirm">Confirm New Password</label>
                            @error('confirm') <small class="text-red-500">{{ $message }}</small> @enderror
                            <input id="confirm"
                                   class="block w-full bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                                   name="confirm" type="password" placeholder="Confirm New Password">

                            <button type="submit"
                                    class="block w-full text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
