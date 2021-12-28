<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $_department->company->name }} -> {{ $_department->name }} -> {{ __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('employee-store') }}">
                    @csrf

                    <!-- Employee Name -->
                    <div>
                        <x-label for="employee_name" :value="__('Employee Name')" />

                        <x-input id="employee_name" class="block mt-1 w-full" type="text" name="employee_name"
                            :value="old('employee_name')" required autofocus />
                    </div>

                    <!-- Employee Email -->
                    <div>
                        <x-label for="employee_email" :value="__('Email')" />

                        <x-input id="employee_email" class="block mt-1 w-full" type="email" name="employee_email"
                            :value="old('employee_email')" required autofocus />
                    </div>

                    <!-- Employee Contact -->
                    <div>
                        <x-label for="employee_contact" :value="__('Contact')" />

                        <x-input id="employee_contact" class="block mt-1 w-full" type="text" name="employee_contact"
                            :value="old('employee_contact')" required autofocus />
                    </div>

                    <div>
                        <x-label for="employee_departments" :value="__('Departments')" />

                        @foreach ($_department->company->departments as $department)
                            <input type="checkbox" name="employee_department[]" id="employee_department[]"
                                value="{{ $department->id }}"
                                {{ $_department->id == $department->id ? 'checked' : '' }}>
                            {{ $department->name }}
                        @endforeach
                    </div>


                    <x-input id="employee_company_id" type="hidden" name="employee_company_id"
                        value="{{ $_department->company->id }}" />


                    <x-input id="employee_department_id" type="hidden" name="employee_department_id"
                        value="{{ $_department->id }}" />

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
