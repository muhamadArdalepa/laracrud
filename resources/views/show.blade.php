@extends('base')
@include('navbar')

@section('main')

<div class="row">
    <div class="col-12">
        <h1 class="mb-3">{{ $student->name }} Biodata</h1>
        <ul class="list-group d-inline-block">
            <li class="list-group-item list-group-item-action d-flex align-items-center">
                <small class="me-3">NIM</small>
                <b class="fs-5">{{ $student->nim }}</b>
            </li>
            <li class="list-group-item list-group-item-action d-flex align-items-center">
                <small class="me-3">Name</small>
                <b class="fs-5">{{ $student->name }}</b>
            </li>
            <li class="list-group-item list-group-item-action d-flex align-items-center">
                <small class="me-3">Gender</small>
                <b class="fs-5">{{ $student->gender =='M'?'Male':'Female' }}</b>
            </li>
            <li class="list-group-item list-group-item-action d-flex align-items-center">
                <small class="me-3">Major</small>
                <b class="fs-5">{{ $student->major }}</b>
            </li>
            <li class="list-group-item list-group-item-action d-flex align-items-center">
                <small class="me-3">Address</small>
                <b class="fs-5">{{ $student->address == '' ? 'N/A':$student->address }}</b>
            </li>
        </ul>
        <br>
        <a href="{{ url()->previous() }}" class="btn btn-success mt-3">Back</a>

    </div>
</div>

@endsection