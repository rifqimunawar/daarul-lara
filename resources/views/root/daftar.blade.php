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
        <form action="/daftar" class="p-2" method="post">
          @csrf

          <div class="mb-3">
            <label for="name" class="d-flex justify-content-start p-2">Nama Lengkap</label>
            <input name="name" class="form-control" type="text" placeholder="Nama Lengkap" required>
          </div>

          <div class="mb-3">
            <label for="wa" class="d-flex justify-content-start p-2">No WhatsApps</label>
            <input name="wa" class="form-control" type="text" placeholder="No WhatsApps Aktif" required>
          </div>

          <div class="mb-3">
            <label for="alamat" class="d-flex justify-content-start p-2">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" 
            id="floatingTextarea2" style="height: 100px"></textarea>
          </div>

          {{-- @dd($harga) --}}

          <div hidden>
            <input type="text" name="cara_id" id="" value="{{ $hargaCara }}"readonly>
            <input type="text" name="category_cource_id" id="" value="{{ $hargaCategory }}"readonly>
            <input type="text" name="cource_id" id="" value="{{ $hargaCource }}"readonly>
            <input type="text" name="teacher_id" id="" value="{{ $hargaTeacher }}"readonly>
            <input type="text" name="durasi_id" id="" value="{{ $hargaDurasi }}"readonly>
            <input type="text" name="paket_id" id="" value="{{ $hargaPaket }}"readonly>
            <input type="text" name="peserta_id" id="" value="{{ $hargaPeserta }}"readonly>
            <input type="text" name="harga" id="" value="{{ $harga->harga }}"readonly>
          </div>
  
          <div class="row">
            <div class="col">
              <a href="/" class="btn btn-warning">Kembali</a>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary"> Lanjutkan</button>
            </div>
          </div>
        </form>
      </div>
      
    </div>
    <div class="col">
      <div class="card">
        Keterangan

        <hr>

          {{-- @dd($harga) --}}
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td class="text-start">Cara Belajar</td>
              <td class="text-start">{{ $cara }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td class="text-start">Category Cources</td>
              <td class="text-start">{{ $category }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td class="text-start">Kursus</td>
              <td class="text-start">{{ $harga->cource->name }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td class="text-start">Pengajar</td>
              <td class="text-start">{{ $teacher   }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td class="text-start">Paket Kursus / Bulan</td>
              <td class="text-start">{{ $paket }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td class="text-start">Durasi Kursus</td>
              <td class="text-start">{{ $durasi }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">7</th>
              <td class="text-start">Peserta Kursus</td>
              <td class="text-start">{{ $peserta }}</td>
              <td> </td>
            </tr>
            <tr>
              <th scope="row">8</th>
              <td colspan="2">Total Harga</td>
              <td>{{ $harga->harga }}</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
      
@endsection