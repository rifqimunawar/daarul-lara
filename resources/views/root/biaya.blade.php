@section('title')
    {{ 'Biaya' }}
@endsection
@extends('.root.layout')
@section('content')
    <div class="container text-center">
        <h1 class="mb-4 mt-5">Biaya dan Pendaftaran</h1>
        <div class="card">
            <form action="{{ route('cekHarga') }}" method="post" class="p-3">
                @csrf
                <div class="mb-3">
                    <label for="cara" class="mb-2 d-flex justify-content-start fs-4 pl-3">Cara Belajar</label>
                    <select class="form-select form-select-lg mb-3" name="cara" required id="caraBelajar"
                        aria-label="Large select example">
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                        @foreach ($cara as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="category" class="mb-2 d-flex justify-content-start fs-4 pl-3">Category Courses</label>
                    <select id="category" name="category" class="form-select form-select-lg mb-3"
                        aria-label="Large select example" required>
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label for="cource" class="mb-2 d-flex justify-content-start fs-4 pl-3">Courses</label>
                    <select id="cource" name="cource" class="form-select form-select-lg mb-3"
                        aria-label="Large select example" required>
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="teacher" class="mb-2 d-flex justify-content-start fs-4 pl-3">Pengajar</label>
                    <select id="teacher" name="teacher" class="form-select form-select-lg mb-3"
                        aria-label="Large select example" required>
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="paket" class="mb-2 d-flex justify-content-start fs-4 pl-3">Paket Kursus / Bulan</label>
                    <select id="paket" name="paket" class="form-select form-select-lg mb-3"
                        aria-label="Large select example" required>
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                        @foreach ($paket as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="durasi" class="mb-2 d-flex justify-content-start fs-4 pl-3">Durasi Kursus</label>
                    <select id="durasi" name="durasi" class="form-select form-select-lg mb-3"
                        aria-label="Large select example" required>
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                        @foreach ($durasi as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="peserta" class="mb-2 d-flex justify-content-start fs-4 pl-3">Peserta Kursus</label>
                    <select id="peserta" name="peserta" class="form-select form-select-lg mb-3"
                        aria-label="Large select example" required>
                        <option disabled selected>---- Pilih Salah Satu ----</option>
                        @foreach ($peserta as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center" id="cekHargaButtonDiv">
                    <button type="submit" class="btn btn-warning px-4" id="cekHargaButton">Cek Harga</button>
                </div>

                <div class="text-center" id="lanjutkanButtonDiv" style="display: none;">
                    <button type="submit" class="btn btn-primary px-4">Lanjutkan Pendaftaran</button>
                </div>

                <div class="h2 m-4">Total Harga: Rp </div>
                <div class="h2 m-4" id="total">
                    <input type="text" name="hargaTotal" class="form-control form-control-lg text-center " readonly
                        id="hargaTotal">
                </div>

                <script>
                    // Mendapatkan elemen-elemen select
                    const caraBelajarSelect = document.querySelector('#caraBelajar');
                    const categorySelect = document.querySelector('#category');
                    const courseSelect = document.querySelector('#cource');
                    const teacherSelect = document.querySelector('#teacher');
                    const paketSelect = document.querySelector('#paket');
                    const durasiSelect = document.querySelector('#durasi');
                    const pesertaSelect = document.querySelector('#peserta');
                    const hargaCaraBelajar = JSON.parse(JSON.stringify({!! json_encode($hargaCara) !!}));
                    const hargaCategory = JSON.parse(JSON.stringify({!! json_encode($categoryCourseData) !!}));
                    const hargaCourse = JSON.parse(JSON.stringify({!! json_encode($courseData) !!}));
                    const hargaPaket = JSON.parse(JSON.stringify({!! json_encode($hargaPaket) !!}));
                    const hargaDurasi = JSON.parse(JSON.stringify({!! json_encode($hargaDurasi) !!}));
                    const hargaTeacher = JSON.parse(JSON.stringify({!! json_encode($hargaTeacher) !!}));
                    const hargaPeserta = JSON.parse(JSON.stringify({!! json_encode($hargaPeserta) !!}));

                    // Mengonversi nilai-nilai dalam objek menjadi integer
                    Object.keys(hargaCaraBelajar).forEach(key => {
                        hargaCaraBelajar[key] = parseInt(hargaCaraBelajar[key]);
                    });

                    Object.keys(hargaCategory).forEach(key => {
                        hargaCategory[key] = parseInt(hargaCategory[key]);
                    });

                    Object.keys(hargaCourse).forEach(key => {
                        hargaCourse[key] = parseInt(hargaCourse[key]);
                    });

                    Object.keys(hargaPaket).forEach(key => {
                        hargaPaket[key] = parseInt(hargaPaket[key]);
                    });

                    Object.keys(hargaTeacher).forEach(key => {
                        hargaTeacher[key] = parseInt(hargaTeacher[key]);
                    });

                    Object.keys(hargaDurasi).forEach(key => {
                        hargaDurasi[key] = parseInt(hargaDurasi[key]);
                    });

                    Object.keys(hargaPeserta).forEach(key => {
                        hargaPeserta[key] = parseInt(hargaPeserta[key]);
                    });


                    const submitButton = document.querySelector('button[type="submit"]');

                    // Menambahkan event listener untuk menghitung harga saat pilihan dropdown berubah
                    [caraBelajarSelect, categorySelect, courseSelect, teacherSelect, paketSelect, durasiSelect, pesertaSelect].forEach(
                            select => {
                                select.addEventListener('change', function() {
                                    const selectedCaraBelajar = caraBelajarSelect.value;
                                    const selectedCategory = categorySelect.value;
                                    const selectedCourse = courseSelect.value;
                                    const selectedTeacher = teacherSelect.value;
                                    const selectedPaket = paketSelect.value;
                                    const selectedDurasi = durasiSelect.value;
                                    const selectedPeserta = pesertaSelect.value;

                                    const totalHarga =
                                        hargaCaraBelajar[selectedCaraBelajar] +
                                        hargaCategory[selectedCategory] +
                                        hargaCourse[selectedCourse] +
                                        hargaTeacher[selectedTeacher] +
                                        hargaPaket[selectedPaket] +
                                        hargaDurasi[selectedDurasi] +
                                        hargaPeserta[selectedPeserta];

                                    const totalElement = document.getElementById('total');
                                    const formattedTotalHarga = totalHarga.toLocaleString('id-ID');

                                    // Mengatur nilai input dengan hasil perhitungan yang telah diformat
                                    const hargaTotalInput = document.getElementById('hargaTotal');
                                    hargaTotalInput.value = formattedTotalHarga;

                                });
                              });
                </script>

                <script>
                    // Mendapatkan elemen tombol "Cek Harga"
                    const cekHargaButton = document.getElementById('cekHargaButton');

                    // Mendapatkan elemen div tombol "Lanjutkan Pendaftaran"
                    const lanjutkanButtonDiv = document.getElementById('lanjutkanButtonDiv');

                    // Menambahkan event listener untuk tombol "Cek Harga"
                    cekHargaButton.addEventListener('click', function(event) {
                        event.preventDefault(); // Menghentikan pengiriman form (jika perlu)

                        // Mengubah tampilan elemen "Cek Harga" menjadi disembunyikan
                        cekHargaButton.style.display = 'none';

                        // Mengubah tampilan elemen "Lanjutkan Pendaftaran" menjadi ditampilkan
                        lanjutkanButtonDiv.style.display = 'block';
                    });
                </script>

            </form>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').change(function() {
            let category_id = $(this).val();

            if (category_id) {
                $.ajax({
                    url: '/get-courses-by-category/' + category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cource').empty();
                        $('#cource').append(
                            '<option selected>---- Pilih Salah Satu ----</option>');
                        $.each(data, function(key, value) {
                            $('#cource').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#cource').empty();
                $('#cource').append('<option selected>---- Pilih Salah Satu ----</option>');
            }
        });
    });


    // ini digunakan untuk select teacher by courses 
    // =================================================
    $(document).ready(function() {
        $('#cource').change(function() {
            let cource_id = $(this).val();

            if (cource_id) {
                $.ajax({
                    url: '/get-teacher-by-cource/' + cource_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#teacher').empty();
                        $('#teacher').append(
                            '<option selected>---- Pilih Salah Satu ----</option>');
                        $.each(data, function(key, value) {
                            $('#teacher').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#teacher').empty();
                $('#teacher').append('<option selected>---- Pilih Salah Satu ----</option>');
            }
        });
    });
</script>
