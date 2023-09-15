@section('title')
    {{ 'Daftar' }}
@endsection
@extends('.root.layout')
@section('content')

<div class="container text-center">
  <h1 class="mb-4 mt-5">Daftar</h1>
  <div class="row">
    <div class="col">
      <div class="card">
        <form action="" class="p-2" method="post">

          <div class="mb-3">
            <label for="name" class="d-flex justify-content-start p-2">Nama Lengkap</label>
            <input name="name" class="form-control" type="text" placeholder="Nama Lengkap" required>
          </div>

          <div class="mb-3">
            <label for="alamat" class="d-flex justify-content-start p-2">Alamat</label>
            <textarea class="form-control" placeholder="Alamat Lengkap" 
            id="floatingTextarea2" style="height: 100px"></textarea>
          </div>
  
          <div class="row">
            <div class="col">
              <a href="/" class="btn btn-warning">Kembali</a>
            </div>
            <div class="col">
              <a href="" class="btn btn-primary">Lanjutkan</a>
            </div>
          </div>
        </form>
      </div>
      
    </div>
    <div class="col">
      <div class="card">
        Keterangan
      </div>
    </div>
  </div>
</div>
      
@endsection