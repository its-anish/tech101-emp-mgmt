<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Employee') }}
        </h2>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('employee-create') }}">
            {{ __('Create New Employee') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            @if (session()->has('success'))
                <h3>{{ session('success') }}</h3>
            @endif
            {{ count($employees) }}
            @if (count($employees) > 1)
                Employees
            @else
                Employee
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Company</th>
                            <th>Designation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr scope="row">
                                <th>{{ $employee->name }}</th>
                                <th>{{ $employee->email }}</th>
                                <th>{{ $employee->contact }}</th>
                                <th>{{ $employee->company->name }}</th>
                                <th>{{ $employee->department->name }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
