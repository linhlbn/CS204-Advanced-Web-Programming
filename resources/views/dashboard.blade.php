<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">
                <!-- Welcome message after login at user page -->
                <div class="p-6 text-gray-900" style="border-bottom:1px solid #ddd;">
                    {{ __("Welcome to Student's Page. Our latest study info will update soon!") }}
                </div>
                <!-- Latest Information div -->
                <div class="p-6 text-gray-900 bg-gray-100 mt-4" style="border-radius:10px;">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-2" style="text-decoration: underline;">Latest Information</h3>
                    <!-- You can update the latest information here -->
                    <p style="text-align:center;">  </p>
                </div>
                <!-- Your Messages div -->
                <div class="p-6 text-gray-900 bg-gray-100 mt-4" style="border-radius:10px;">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-2" style="text-decoration: underline;">Your Messages</h3>
                    <!-- You can update the user messages here -->
                    <p style="text-align:center;">  </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
