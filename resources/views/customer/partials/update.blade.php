<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('text.customer.content.update_title') }}
        </h2>
    </header>

    <form method="post" action="{{ route('customer.update', ['customer' => $customer->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

       @include('customer.partials.fields', $customer)

        <div class="flex items-center gap-4">
            <x-button :type='"primary"'>{{ __('text.customer.buttons.save') }}</x-button>

            @if (session('status') === 'customer-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('text.customer.response.save') }}</p>
            @endif
        </div>
    </form>
</section>
