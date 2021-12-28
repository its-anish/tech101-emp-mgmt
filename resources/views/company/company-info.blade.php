<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            @if (session()->has('success'))
                <h3>{{ session('success') }}</h3>
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>No. of Employees</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($departments as $department)
                            <tr scope="row">
                                <th>{{ $department->name }}</th>
                                <th>{{ count($department->employees) }}</th>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
