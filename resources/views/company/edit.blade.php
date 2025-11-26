@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center mb-6">Edit Company</h2>

        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Company Name *</label>
                <input type="text" name="name" required
                       value="{{ $company->name }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email"
                       value="{{ $company->email }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Website</label>
                <input type="text" name="website"
                       value="{{ $company->website }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Logo</label>
                
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" 
                         class="w-32 h-32 object-cover rounded-lg mb-3 shadow border">
                @endif
                
                <input type="file" name="logo"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition">
                Update
            </button>

        </form>
    </div>

</div>
@endsection
