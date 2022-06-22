@extends('layouts.appbo')

@section('content_title', 'Support List')

@section('style')

<style>
    
</style>

@endsection

@section('toolbar')

<li class="nav-item">
    <a class="nav-link" href="{{ route('support.create') }}">
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
        @include('bo.support.data-list-filters')
    </div>
@endsection

@section('content')

        <nav class="navbar navbar-expand ">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('support.index.today') }}" style="font-weight: bold;">
                        Today
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('support.index.open') }}" style="font-weight: bold;">
                        Open
                    </a>
                </li>

                <li class="nav-item" style="border-bottom: 5px solid red;">
                    <a class="nav-link" href="{{ route('support.index.custom') }}" style="font-weight: bold;">
                        Custom
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('support.index') }}" style="font-weight: bold;">
                        All
                    </a>
                </li>

            </ul>

        </nav>

        <!-- Form Custom Search -->
        <div>

            <form role="form" id="frmData" method="POST" action="{{ route('support.store') }}" enctype="multipart/form-data">
                @csrf

                <div style="display: flex; justify-content=center;">
                    @include('bo.support.index-custom-fields')
                </div>
            </form>

        </div>        

        <div>
            <!-- Code Result  -->
        </div>

@endsection

@section('js')

    <script src="{{ asset('js/CustomForIndex.js') }}" defer></script>
    @include('bo.support._script')

@endsection

