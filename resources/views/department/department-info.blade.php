<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $department->company->name }} -> {{ $department->name }}
        </h2>
        <a class="underline text-sm text-gray-600 hover:text-gray-900"
            href="{{ route('employee-create', [$department->id]) }}">
            {{ __('Add Employee') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            @if (session()->has('success'))
                <h3>{{ session('success') }}</h3>
            @endif

            {{ count($department->employees) }}
            @if (count($department->employees) > 1)
                Employees
            @else
                Employee
            @endif

            @if (count($department->employees) > 0)

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department->employees as $employee)
                                <tr scope="row">
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->contact }}</td>
                                    <td>
                                        {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('company-department', [$company->id, $department->id]) }}">
                                            {{ __('Show') }}
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>
    </div>
</x-app-layout>
