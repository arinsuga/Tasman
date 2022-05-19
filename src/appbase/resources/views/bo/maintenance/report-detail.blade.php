@extends('layouts.appbo')

@section('content_title', 'Report Detail')

@section('toolbar')

<li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" href="#" >
        <i class="fas fa-lg fa-filter"></i>
    </a>
</li>

@endsection

@section('control_sidebar')
    <div class="control-sidebar-content">
        @include('bo.maintenance.data-list-filters')
    </div>
@endsection

@section('content')

        <div style="margin-top: 10px;">
            @include('bo.maintenance.report-detail-list-items')
        </div>

@endsection

@section('js')

    <script src="{{ asset('js/CustomForIndex.js') }}" defer></script>

@endsection
