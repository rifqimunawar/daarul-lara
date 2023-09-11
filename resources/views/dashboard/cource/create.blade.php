@section('title')
    {{ 'Dashboard' }}
@endsection
@extends('.dashboard.layout')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">




            <!-- General elements -->
            <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Tambah Cource
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('store.cource') }}" method="post">
                    @csrf
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Nama Cource</span>
                        <input name="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Cource....." />
                    </label>
                    <label class="block mt-4 mb-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Category Cource
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="category_cource_id">
                            {{-- <option disabled>category-cources</option> --}}
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    @if ($errors->has('name'))
                        <div class="text-orange-500 text-sm mb-4">{{ $errors->first('name') }}</div>
                    @endif
                    <div class="flex items-center justify-start">
                        <a href="{{ route('index.cource') }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-white text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Kembali</a>
                        <button type="submit"
                            class="mt-5 mb-5 ml-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</button>
                    </div>
                </form>

            </div>


        </div>
    </main>
@endsection
