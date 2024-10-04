<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('text.customer.content.store_title') }}
        </h2>
    </header>

    <form method="post" action="{{ route('customer.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        @include('customer.partials.fields')

        <div class="flex items-center gap-4">
            <x-button :type='"primary"'>{{ __('text.customer.buttons.save') }}</x-button>
        </div>
    </form>
</section>
