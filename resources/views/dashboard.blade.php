@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-3xl bg-white rounded-xl shadow-lg p-10 text-center border border-gray-200">

        {{-- Page Title --}}
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Main Page</h1>

        {{-- Buttons Section --}}
        <div class="flex flex-col sm:flex-row justify-center items-center gap-6">

            {{-- Company Button --}}
            <a href="{{ route('company.index') }}"
               class="w-64 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition transform hover:scale-105">
                Company
            </a>

            {{-- Employee Button --}}
            <a href="{{ route('employee.index') }}"
               class="w-64 px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md transition transform hover:scale-105">
                Employee
            </a>

        </div>

    </div>

</div>
@endsection
