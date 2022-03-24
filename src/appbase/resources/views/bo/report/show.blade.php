@extends('layouts.appbo')

@section('content_title', 'Report Info')

@section('toolbar')

<!-- button back -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('report.index') }}">
        <i class="fas fa-lg fa-arrow-left"></i>
    </a>
</li>

<!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('report.close', ['report' => $viewModel->data->id]) }}">
        <span style="font-weight: bold;">status = {{ $viewModel->data->activitystatus_id }}</span>
    </a>
</li> -->

@if ($viewModel->data->activitystatus_id == 1)
<!-- button close -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('report.close', ['report' => $viewModel->data->id]) }}">
        <span style="font-weight: bold;">Close</span>
    </a>
</li>
<!-- button pending -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('report.pending', ['report' => $viewModel->data->id]) }}">
        <span style="font-weight: bold;">Pending</span>
    </a>
</li>
<!-- button cancel -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('report.cancel', ['report' => $viewModel->data->id]) }}">
        <span style="font-weight: bold;">Cancel</span>
    </a>
</li>

<!-- button edit -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('report.edit', ['report' => $viewModel->data->id]) }}">
        <i class="fas fa-lg fa-edit"></i>
    </a>
</li>
@endif


<!-- button delete -->
<li class="nav-item">
    <a onclick="event.preventDefault(); document.getElementById('frmData').submit();"
       class="nav-link" href="#">
        <i class="fas fa-lg fa-trash"></i>
    </a>
    <form id="frmData" role="form" id="frmData" method="POST" action="{{ route('report.destroy', ['report' => $viewModel->data->id]) }}">
        @csrf
        @method('DELETE')
    </form>
</li>


@endsection

@section('content')
    @include('bo.report.data-field-items')
@endsection

@section('style')

    <!-- Styles -->
    <!-- <link href="{{ asset('css/CustomForShow.css') }}" rel="stylesheet"> -->

@endsection

@section('js')

    <!-- javascript -->
    <!-- <script src="{{ asset('js/CustomForShow.js') }}" defer></script> -->

@endsection

