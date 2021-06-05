@extends('layouts.index')

@section('content')
    <br/>

    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br/>
    @endif    
    
    <a class="btn btn-info" href="{{ url('dokter/create') }}">Tambah</a>
    <br/><br/>
    <form method="GET" action="{{ url('pegawai') }}">
        <input type="text" name="keyword" value="{{ $keyword }}" />
        <button type="submit">Search</button>
    </form>
    <br/>
    <table class="table-bordered table">
        <tr class="text-center">
            <th>Nama</th>
            <th>Jabatan</th>
        
            <th colspan="2">AKSI</th>
        </tr>
        @foreach($datas as $key=>$value)
            <tr>
                
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jabatan }}</td>

                <td class="text-center"><a class="btn btn-info" href="{{ url('dokter/'.$value->id.'/edit') }}">Update</a></td>
                <td class="text-center">
                    <form action="{{ url('dokter/'.$value->id) }}" method="POST">
                        @csrf 
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $datas->links() }}
@endsection