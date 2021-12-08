@extends('admin::back.layouts.app')

@php
    $title = 'Виджеты';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('inetstudio.widgets-package.widgets::back.partials.breadcrumbs.index')
    @endpush

    <div class="widgets-package">
        <widgets-package_widgets_pages_index
            v-bind:datatable-prop="{
                attributes: {
                    id: 'widgetsTable'
                },
                options: {{ $table->generateJson() }}
            }"
        />
    </div>
@endsection
