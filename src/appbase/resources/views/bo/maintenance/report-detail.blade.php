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
        @include('bo.maintenance.report-detail-list-filters')
    </div>
@endsection

@section('content')

        <nav class="navbar navbar-expand ">

            <ul class="navbar-nav">

                <li class="nav-item" style="border-bottom: 5px solid red;">
                    <a class="nav-link" href="{{ route('maintenance.report.detail') }}" style="font-weight: bold;">
                        All
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('maintenance.report.detail.custom') }}" style="font-weight: bold;">
                        Custom
                    </a>
                </li>

            </ul>

        </nav>

        <div style="margin-top: 10px;">
            @include('bo.maintenance.report-detail-list-items')
        </div>

@endsection

@section('js')

    <script src="{{ asset('js/CustomForIndex.js') }}" defer></script>

@endsection
