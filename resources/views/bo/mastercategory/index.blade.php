@extends('layouts.appbo')

@section('content_title', 'Master Category List')

@section('toolbar')

<li class="nav-item">
    <a class="nav-link" href="{{ route('mastercategory.create') }}">
        <i class="fas fa-lg fa-plus"></i>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" href="#" >
        <i class="fas fa-lg fa-filter"></i>
    </a>
</li>

@endsection

@section('control_sidebar')
    <div class="control-sidebar-content">
        @include('bo.mastercategory.data-list-filters')
    </div>
@endsection

@section('content')

        <div style="margin-top: 10px;">
            @include('bo.mastercategory.data-list-items')
        </div>

@endsection

@section('js')

    <script src="{{ asset('js/CustomForIndex.js') }}" defer></script>

@endsection
