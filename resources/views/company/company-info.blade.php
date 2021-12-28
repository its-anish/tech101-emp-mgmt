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

            <form method="POST" action="{{ route('department-store') }}">
                @csrf
                <x-input id="company_id" type="hidden" name="company_id" value="{{ $company->id }}" />
                <!-- Designation Name -->
                <div>
                    <x-label for="department_name" :value="__('Create New Department')" />

                    <x-input id="department_name" class="block mt-1 w-full" type="text" name="department_name"
                        :value="old('department_name')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>

            {{ count($company->departments) }}
            @if (count($company->departments) > 1)
                Departments
            @else
                Department
            @endif

            @if (count($company->departments) > 0)

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No. of Employees</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company->departments as $department)
                                <tr scope="row">
                                    <td>{{ $department->name }}</td>
                                    <td>{{ count($department->employees) }}</td>
                                    <td>
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('company-department', [$department->id]) }}">
                                            {{ __('Show') }}
                                        </a>
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
