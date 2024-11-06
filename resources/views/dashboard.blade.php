@php use function Statamic\trans as __; @endphp

@extends('statamic::layout')
@section('title', __('Dashboard'))

@section('content')

    <div class="widgets @container grid sm:grid-cols-2 items-start gap-8 py-6" x-masonry.wait.700>
        @foreach($widgets as $widget)
            <div class="widget w-full md:{{ Statamic\Support\Str::tailwindSpanClass($widget['width']) }} {{ $widget['classes'] }}">
                {!! $widget['html'] !!}
            </div>
        @endforeach
    </div>

    @include('statamic::partials.docs-callout', [
        'topic' => __('Widgets'),
        'url' => Statamic::docsUrl('widgets')
    ])

@stop
