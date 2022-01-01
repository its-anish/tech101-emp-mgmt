<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

                <div id="error-message">
                </div>

                <form id="create-company-form" method="POST" action="{{ route('company-store') }}">
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

    <script>
        $(document).ready(function() {
            $("#create-company-form").submit(function(e) {
                e.preventDefault();
                var url = "{{ route('company-store') }}";
                var data = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        window.location.href = "{{ route('companies') }}";
                    },
                    error: function(response) {
                        var jsonError = response.responseJSON;
                        var errorMsg = '<div class="font-medium text-red-600">' + jsonError
                            .message +
                            '</div><ul class="mt-3 list-disc list-inside text-sm text-red-600">';

                        if (jsonError.errors != undefined) {
                            for (var key in jsonError.errors) {
                                var errors = jsonError.errors[key];
                                errors.forEach(error => {
                                    errorMsg +=
                                        "<li>" + error + "</li>";
                                });
                            }
                        }

                        errorMsg += "</ul>";

                        $("#error-message").html("").html(errorMsg);

                    },
                });
            });
        });
    </script>
</x-app-layout>
