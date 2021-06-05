<div class="row clearfix">
    <div class="col-md-6">Nama Lengkap</div>
    
    <div class="col-md-6">
        <input class="form-control" type="text" name="nama" value="{{ $model->nama }}"> 
        @foreach($errors->get('nama') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<

<div class="row clearfix">
    <div class="col-md-6">jabatan</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="jabatan" value="{{ $model->jabatan }}">
        @foreach($errors->get('jabatan') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>





<button type="submit" class="btn btn-primary">SIMPAN</button>