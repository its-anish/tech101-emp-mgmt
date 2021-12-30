<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('company-store') }}">
                    @csrf

                    <!-- Company Name -->
                    <div>
                        <x-label for="company_name" :value="__('Company Name')" />

                        <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                            :value="old('company_name')" autofocus />
                    </div>

                    <!-- Company Location -->
                    <div>
                        <x-label for="company_location" :value="__('Location')" />

                        <x-input id="company_location" class="block mt-1 w-full" type="text" name="company_location"
                            :value="old('company_location')" />
                    </div>

                    <!-- Company Contact -->
                    <div>
                        <x-label for="company_contact" :value="__('Contact')" />

                        <x-input id="company_contact" class="block mt-1 w-full" type="text" name="company_contact"
                            :value="old('company_contact')" />
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
