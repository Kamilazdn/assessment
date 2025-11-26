@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center mb-6">Add Company</h2>

        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Company Name<span class="text-red-500"> *</span></label>
                <input type="text" name="name" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Website</label>
                <input type="text" name="website"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Logo <small class="text-gray-400">(min 100x100)</small></label>
                <input type="file" name="logo"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                Submit
            </button>

        </form>
    </div>

</div>
@endsection
