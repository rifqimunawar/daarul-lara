@section('title')
    {{ 'Dashboard' }}
@endsection
@extends('.dashboard.layout')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">




            <!-- General elements -->
            <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Edit Student
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="/dashboard/student/{{ $student->id }}/update" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                        <input name="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Full Name....." value="{{ $student->name }}"readonly />
                    </label>
                    @if ($errors->has('name'))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('name') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Nomor WhatsApps</span>
                        <input name="wa"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nomor wa....." value="{{ $student->wa }}"readonly />
                    </label>
                    @if ($errors->has('wa'))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('wa') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                        <textarea name="alamat"
                            class="block w-full mt-1 text-sm dark:border-gray-600 
                        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple 
                        dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Alamat Student....." style="height: 100px" readonly>{{ $student->alamat }}</textarea>
                    </label>
                    @if ($errors->has('alamat'))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('alamat') }}</div>
                    @endif


                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Cara Belajar</span>
                        <input name="cara_id"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Cara Belajar....." value="{{ $student->hargaCara->name }}" readonly/>
                    </label>
                    @if ($errors->has('cara_id'))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('cara_id') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Category Cources</span>
                        <input name="category_cource_id "
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Category Cources....." value="{{ $student->categoryCource->name }}"readonly />
                    </label>
                    @if ($errors->has('category_cource_id '))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('category_cource_id ') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Cources</span>
                        <input name="cource_id "
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Cources....." value="{{ $student->Cource->name }}" readonly />
                    </label>
                    @if ($errors->has('cource_id '))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('cource_id ') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Pengajar</span>
                        <input name="teacher "
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Pengajar....." value="{{ $student->teacher->name }}" readonly/>
                    </label>
                    @if ($errors->has('teacher '))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('teacher ') }}</div>
                    @endif

                    
                    <label class="block text-sm mb-4">
                      <span class="text-gray-700 dark:text-gray-400">Paket Kursus / Bulan</span>
                      <input name="teacher "
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          placeholder="Pengajar....." value="{{ $student->hargaPaket->name }}" readonly />
                  </label>
                  @if ($errors->has('teacher '))
                      <div class="text-orange-500 text-sm mb-4">{{ $errors->first('teacher ') }}</div>
                  @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Durasi</span>
                        <input name="teacher "
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Pengajar....." value="{{ $student->hargaDurasi->name }}" readonly />
                    </label>
                    @if ($errors->has('teacher '))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('teacher ') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Peserta</span>
                        <input name="peserta_id "
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Pengajar....." value="{{ $student->hargaPeserta->name }}" readonly />
                    </label>
                    @if ($errors->has('peserta_id '))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('peserta_id ') }}</div>
                    @endif

                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">HARGA / BIAYA</span>
                        <input name="peserta_id "
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Pengajar....." value="{{ $student->harga }}" readonly />
                    </label>
                    @if ($errors->has('peserta_id '))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('peserta_id ') }}</div>
                    @endif

                    <label class="block mt-4 mb-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                          KONFIRMASI
                      </span>
                      <p>Jika sudah melakukan pembayaran pilih "ya"</p>
                      <select
                          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                          name="status" class="form-select">
                            <option value="0" {{ $student->status == 0 ? 'selected' : '' }}>Tidak</option>
                            <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Ya</option>
                      </select>
                  </label>

                    <div class="flex items-center justify-start">
                        <a href="{{ route('index.student') }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-white text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Kembali</a>
                        <button type="submit"
                            class="mt-5 mb-5 ml-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</button>
                    </div>

                </form>

            </div>


        </div>
    </main>
@endsection
