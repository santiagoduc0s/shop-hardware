@extends('layouts.app')

@section('meta')
    @include('includes.metas')
@endsection

@push('css')
    @include('includes.styles')
@endpush

@section('title')
    @isset($meta_title)
        <title>{{ env('APP_NAME') . " - $meta_title" }}</title>
    @else
        <title>{{ env('APP_NAME') }}</title>
    @endif
@endsection

@section('content')
    {{ $slot }}

    <x-ui.tap-top/>
@endsection

@section('js')
    @include('includes.scripts')
@endsection
