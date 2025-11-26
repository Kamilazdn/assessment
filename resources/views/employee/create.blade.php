@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center mb-6">Add Employee</h2>

        <form action="{{ route('employee.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">First Name<span class="text-red-500"> *</span></label>
                <input type="text" name="first_name" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Last Name<span class="text-red-500"> *</span></label>
                <input type="text" name="last_name" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Phone</label>
                <input type="text" name="phone"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Company<span class="text-red-500"> *</span></label>
                <select name="company_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    <option value="">-- Select Company --</option>
                    @foreach($company as $companies)
                        <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                Submit
            </button>

        </form>
    </div>

</div>
@endsection
