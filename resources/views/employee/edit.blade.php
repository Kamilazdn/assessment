@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center mb-6">Edit Employee</h2>

        <form action="{{ route('employee.update', $employee->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">First Name *</label>
                <input type="text" name="first_name" required
                       value="{{ $employee->first_name }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Last Name *</label>
                <input type="text" name="last_name" required
                       value="{{ $employee->last_name }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Company *</label>
                <select name="company_id" required 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">

                    @foreach($company as $companies)
                        <option value="{{ $companies->id }}" 
                            {{ $employee->company_id == $companies->id ? 'selected' : '' }}>
                            {{ $companies->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email"
                       value="{{ $employee->email }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Phone</label>
                <input type="text" name="phone"
                       value="{{ $employee->phone }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition">
                Update Employee
            </button>

        </form>
    </div>

</div>
@endsection
