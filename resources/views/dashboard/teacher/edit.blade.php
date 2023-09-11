@section('title')
    {{ 'Dashboard' }}
@endsection
@extends('.dashboard.layout')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">




            <!-- General elements -->
            <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Edit Teacher
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="/dashboard/teacher/{{ $teacher->id }}/update" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                        <input name="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Full Name....." value="{{ $teacher->name }}" />
                    </label>

                    @if ($errors->has('name'))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('name') }}</div>
                    @endif

                    <label class="block mt-4 mb-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Mata Pelajaran
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="cource_id">
                            @foreach ($cource as $item)
                                <option value="{{ $item->id }}"{{ $teacher->id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>


                    <div class="flex d-justify-content-between">
                        <!-- Bagian kiri: Input gambar -->
                        <div class="w-full mr-4">
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400 mb-2">Foto Profil</span>
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                                800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" name="img"
                                            value="{{ $teacher->img }}" />
                                    </label>
                                </div>
                            </label>
                        </div>

                        <!-- Bagian kanan: Tampilkan gambar yang dipilih -->
                        <div class="w-1/2 mr-4 flex items-center justify-center">
                            <img src="{{ asset('img/' . $teacher->img) }}" alt="Foto Profil"
                                style="max-width: 50%; height: auto;" />
                        </div>


                    </div>

                    <div class="flex items-center justify-start">
                      <a href="{{ route('index.teacher') }}"
                          class="px-4 py-2 text-sm font-medium leading-5 text-white text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Kembali</a>
                      <button type="submit"
                          class="mt-5 mb-5 ml-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</button>
                  </div>

                </form>

            </div>


        </div>
    </main>
@endsection
