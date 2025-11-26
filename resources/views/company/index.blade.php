@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-8 border border-gray-200">

        <div class="flex justify-between items-center mb-6 pb-4 border-b">
            <h2 class="text-3xl font-bold text-gray-700">Companies</h2>

            <a href="{{ route('company.create') }}"
               class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Add Company
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-gray-700 font-semibold">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Website</th>
                    <th class="px-4 py-3">Logo</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($company as $companies)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $companies->name }}</td>
                        <td class="px-4 py-3">{{ $companies->email }}</td>
                        <td class="px-4 py-3">
                            @if($companies->website)
                                <a href="{{ $companies->website }}" 
                                target="_blank" 
                                class="text-blue-600 hover:underline">
                                    {{ $companies->website }}
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($companies->logo)
                                <img src="{{ asset('storage/' . $companies->logo) }}" class="w-32 h-32 object-cover rounded-lg mb-3 shadow border">
                            @endif

                        </td>

                        <td class="px-4 py-3 flex space-x-2 justify-center">

                            <a href="{{ route('company.edit', $companies->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm">
                                Edit
                            </a>

                            <form id="deleteForm_{{ $companies->id }}" action="{{ route('company.destroy', $companies->id) }}" method="POST">                                
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        onclick="openDeleteModal({{ $companies->id }})"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
    <div id="deleteModal"
        class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">
        
        <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">
            <h2 class="text-xl font-bold text-gray-800 mb-3">Delete Company</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this company?</p>

            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">
                    Cancel
                </button>

                <button id="confirmDeleteBtn"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

    <script>
        let deleteFormId = null;

        function openDeleteModal(id) {
            deleteFormId = "deleteForm_" + id;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            document.getElementById(deleteFormId).submit();
        });
    </script>

    <div class="mt-4">
        {{ $company->links('pagination::tailwind') }}
    </div>

</div>
@endsection
