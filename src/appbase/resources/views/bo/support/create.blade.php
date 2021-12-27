@extends('layouts.appbo')

@section('content_title', 'Support Add')

@section('toolbar')

<li class="nav-item">
    <a class="nav-link" href="{{ route('support.index') }}">
        <i class="fas fa-lg fa-arrow-left"></i>
    </a>
</li>

<li class="nav-item">
    <a onclick="event.preventDefault(); document.getElementById('frmData').submit();"
       class="nav-link" href="#">
        <i class="fas fa-lg fa-save"></i>
    </a>
</li>

@endsection


@section('content')

<form role="form" id="frmData" method="POST" action="{{ route('support.store') }}" enctype="multipart/form-data">
    @csrf
    @include('bo.support.data-field-items')

</form>

@endsection

@section('js')

    @include('bo.support._script')

@endsection