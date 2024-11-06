@php use function Statamic\trans as __; @endphp

<x-statamic::card>
    <header class="flex justify-between items-center p-4 border-b dark:bg-dark-650 dark:border-b dark:border-dark-900">
        <h2>{{ __('Updates') }}</h2>
        @if ($count)
            <a href="{{ cp_route('updater') }}" class="rounded-md bg-slate-50 px-2 py-1.5 text-xs font-medium ring-1 ring-inset ring-slate-500/20 whitespace-nowrap antialiased">
                {{ trans_choice('1 update available|:count updates available', $count) }}
            </a>
        @endif
    </header>
    <section class="px-4 py-2">
        @if (! $count)
            <p class="text-base text-center text-gray-700">{{ __('Everything is up to date.') }}</p>
        @endif

        @if ($hasStatamicUpdate)
            <div class="flex items-center justify-between text-sm">
                <a href="{{ cp_route('updater.product', 'statamic') }}"class="hover:text-blue font-bold py-1">Statamic Core</a>
            </div>
        @endif

        @foreach ($updatableAddons as $slug => $addon)
            <div class="flex items-center justify-between w-full text-sm">
                <a href="{{ cp_route('updater.product', $slug) }}" class="hover:text-blue py-1">{{ $addon }}</a>
            </div>
        @endforeach
    </section>
</x-statamic::card>
