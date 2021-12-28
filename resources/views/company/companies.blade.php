<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Company') }}
        </h2>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('company-create') }}">
            {{ __('Create New Company') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            @if (session()->has('success'))
                <h3>{{ session('success') }}</h3>
            @endif
            {{ count($companies) }}
            @if (count($companies) > 1)
                Companies
            @else
                Company
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>No. of Employees</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr scope="row">
                                <th>{{ $company->name }}</th>
                                <th>{{ $company->location }}</th>
                                <th>{{ $company->contact }}</th>
                                <th>{{ count($company->employees) }}</th>
                                <th>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('company-show', $company->id) }}">
                                        {{ __('Show') }}
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
