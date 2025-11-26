@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">
            FNXPERT Assessment Login
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <strong>Error:</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium text-gray-700">Email</label>
                <input type="email" name="email"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                Login
            </button>
        </form>

    </div>

</div>
@endsection
