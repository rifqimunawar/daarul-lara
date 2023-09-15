@section('title')
    {{ 'Biaya' }}
@endsection
@extends('.root.layout')
@section('content')
    <div class="container text-center">
        <h1 class="mb-4 mt-5">Biaya dan Pendaftaran</h1>
        <div class="card">
            <form action="" class="p-3">
                <div class="mb-3">
                    <label for="cara" class="mb-2 d-flex justify-content-start fs-4 pl-3">Cara Belajar</label>
                    <select class="form-select form-select-lg mb-3" name="cara" id="caraBelajar"
                        aria-label="Large select example">
                        <option selected>---- Pilih Salah Satu ----</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="category" class="mb-2 d-flex justify-content-start fs-4 pl-3">Category Courses</label>
                    <select id="category" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option selected>---- Pilih Salah Satu ----</option>
                        <option value="1">SD</option>
                        <option value="2">SMP</option>
                        <option value="3">SMA</option>
                        <option value="4">Kuliah</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cource" class="mb-2 d-flex justify-content-start fs-4 pl-3">cources</label>
                    <select id="cource" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option selected>---- Pilih Salah Satu ----</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="paket" class="mb-2 d-flex justify-content-start fs-4 pl-3">Paket Kursus / Bulan</label>
                    <select id="paket" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option selected>---- Pilih Salah Satu ----</option>
                        <option value="4">4 Pertemuan/Bulan</option>
                        <option value="8">8 Pertemuan/Bulan</option>
                        <option value="10">10 Pertemuan/Bulan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="durasi" class="mb-2 d-flex justify-content-start fs-4 pl-3">Durasi Kursus</label>
                    <select id="durasi" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option selected>---- Pilih Salah Satu ----</option>
                        <option value="60">60 menit / pertemuan</option>
                        <option value="90">90 menit / pertemuan</option>
                        <option value="120">120 menit / pertemuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="peserta" class="mb-2 d-flex justify-content-start fs-4 pl-3">Peserta Kursus</label>
                    <select id="peserta" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option selected>---- Pilih Salah Satu ----</option>
                        <option value="1">1 orang / private</option>
                        <option value="2">2 orang / kelompok</option>
                        <option value="3">3 orang / kelompok</option>
                        <option value="4">4 orang / kelompok</option>
                        <option value="5">5 orang / kelompok</option>
                        <option value="6">6 orang / kelompok</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Cek Harga</button>
                </div>

                <div class="h2 m-4">Total Harga: Rp </div>
                <div class="h2 m-4" id="total"></div>

                <script>
                    // Mendapatkan elemen-elemen select
                    const caraBelajarSelect = document.querySelector('#caraBelajar');
                    const categorySelect = document.querySelector('#category');
                    const courseSelect = document.querySelector('#cource');
                    const paketSelect = document.querySelector('#paket');
                    const durasiSelect = document.querySelector('#durasi');
                    const pesertaSelect = document.querySelector('#peserta');

                    // Mendefinisikan harga untuk setiap opsi
                    const hargaCaraBelajar = {
                        'Online': 10000,
                        'Offline': 20000,
                        'Hybrid': 20000
                    };

                    const hargaCategory = {
                        '1': 20000, // SD
                        '2': 25000, // SMP
                        '3': 30000, // SMA
                        '4': 40000 // Kuliah
                    };

                    // Anda harus mengisi harga untuk setiap opsi course sesuai kebutuhan
                    const hargaCourse = {
                        '1': 5000, // Contoh harga untuk course SD
                        '2': 6000, // Contoh harga untuk course SMP
                        // ...
                    };

                    const hargaPaket = {
                        '4': 5000, // Contoh harga untuk 4 Pertemuan/Bulan
                        '8': 8000, // Contoh harga untuk 8 Pertemuan/Bulan
                        '10': 10000 // Contoh harga untuk 10 Pertemuan/Bulan
                    };

                    const hargaDurasi = {
                        '60': 3000, // Contoh harga untuk 60 menit / pertemuan
                        '90': 4000, // Contoh harga untuk 90 menit / pertemuan
                        '120': 5000 // Contoh harga untuk 120 menit / pertemuan
                    };

                    const hargaPeserta = {
                        '1': 0, // Harga untuk 1 orang / private (misalnya 0 jika tidak ada tambahan biaya)
                        '2': 1000, // Harga tambahan untuk 2 orang / kelompok
                        '3': 2000, // Harga tambahan untuk 3 orang / kelompok
                        '4': 3000, // Harga tambahan untuk 4 orang / kelompok
                        '5': 4000, // Harga tambahan untuk 5 orang / kelompok
                        '6': 5000 // Harga tambahan untuk 6 orang / kelompok
                    };

                    // Mendapatkan tombol submit
                    const submitButton = document.querySelector('button[type="submit"]');

                    // Menambahkan event listener untuk menghitung harga saat tombol submit ditekan
                    // Menambahkan event listener untuk menghitung harga saat tombol submit ditekan
                    submitButton.addEventListener('click', function(event) {
                        event.preventDefault(); // Menghentikan pengiriman form

                        // Mendapatkan nilai dari setiap select
                        const selectedCaraBelajar = caraBelajarSelect.value;
                        const selectedCategory = categorySelect.value;
                        const selectedCourse = courseSelect.value;
                        const selectedPaket = paketSelect.value;
                        const selectedDurasi = durasiSelect.value;
                        const selectedPeserta = pesertaSelect.value;

                        // Menghitung harga
                        const totalHarga = 
                            hargaCaraBelajar[selectedCaraBelajar] +
                            hargaCategory[selectedCategory] +
                            hargaCourse[selectedCourse] +
                            hargaPaket[selectedPaket] +
                            hargaDurasi[selectedDurasi] +
                            hargaPeserta[selectedPeserta];

                        // Menampilkan hasil di dalam elemen dengan id "total"
                        const totalElement = document.getElementById('total');
                        totalElement.textContent = ' Rp ' + totalHarga;
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

            // console.log($this)

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
</script>
