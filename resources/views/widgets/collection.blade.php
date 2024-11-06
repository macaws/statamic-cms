@php use Statamic\Facades\Site; @endphp

<x-statamic::card>
    <div class="flex justify-between items-center px-4 py-2 border-b dark:bg-dark-650 dark:border-b dark:border-dark-900">
        <h2>
            <a href="{{ $collection->showUrl() }}" v-pre>
                {{ __($title) }}
            </a>
        </h2>
        @if($canCreate)
            <create-entry-button
                button-class="btn btn-sm"
                url="{{ $collection->createEntryUrl(Site::selected()) }}"
                :blueprints="{{ $blueprints->toJson() }}"
                text="{{ $button }}"
            ></create-entry-button>
        @endif
    </div>
    <collection-widget
        collection="{{ $collection->handle() }}"
        :additional-columns="{{ $columns->toJson() }}"
        :filters="{{ $filters->toJson() }}"
        initial-sort-column="{{ $sortColumn }}"
        initial-sort-direction="{{ $sortDirection }}"
        :initial-per-page="{{ $limit }}"
    ></collection-widget>
</x-statamic::card>
