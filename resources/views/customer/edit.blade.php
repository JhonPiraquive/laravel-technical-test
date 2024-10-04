<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('text.customer.title') }}
                </h2>
            </div>
            <div class="text-right">
                <x-button :type='"info"' route="{{ route('customer.index') }}">
                    <x-heroicon-o-arrow-left class="w-4"/>
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('customer.partials.update', [
                        'customer' => $customer,
                        'disabled' => false
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
