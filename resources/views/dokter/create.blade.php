@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ url('dokter') }}" enctype="multipart/form-data">
        @csrf 
        @include('dokter._form')
    </form>
@endsection