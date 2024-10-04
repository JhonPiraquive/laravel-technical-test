<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('text.customer.title') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-button type="success" route="{{ route('customer.create') }}" class="mb-2">
                        <x-heroicon-s-plus class="w-4 text-white"/>&nbsp;Create
                    </x-button>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('text.attributes.name')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('text.attributes.email')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('text.attributes.phone')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('text.attributes.address')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('text.customer.table.options')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $customer->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $customer->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $customer->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $customer->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <x-button type="warning" route="{{ route('customer.edit', ['customer' => $customer->id]) }}">
                                                <x-heroicon-s-pencil class="w-4"/>
                                            </x-button>
                                            <x-button :type='"info"' route="{{ route('customer.view', ['customer' => $customer->id]) }}">
                                                <x-heroicon-s-eye class="w-4"/>
                                            </x-button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="4">
                                            @lang('text.attributes.no_data')
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
