<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Designation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('department-store') }}">
                    @csrf

                    <!-- Designation Name -->
                    <div>
                        <x-label for="department_name" :value="__('Designation Name')" />

                        <x-input id="department_name" class="block mt-1 w-full" type="text" name="department_name"
                            :value="old('department_name')" required autofocus />
                    </div>

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
