@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ url('dokter/'.$model->id) }}" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" name="_method" value="PATCH">

        @include('dokter._form')
    </form>
@endsection