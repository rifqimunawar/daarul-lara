<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Daarul Ilmi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard_template/assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('dashboard_template/assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('dashboard_template/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('dashboard_template/assets/js/charts-pie.js') }}" defer></script>


    {{-- link unutk memilih icon yang dibawah --}}
    {{-- https://gist.github.com/leMaur/d2131aa3bddf9c8ccd220df0a5c15bce --}}


    {{-- @vite ([]) --}}
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Sidebar start-->
        @include('dashboard.partials.sidebar')
        <!-- Sidebar end -->
        <div class="flex flex-col flex-1 w-full">

            <!-- Header Start -->
            @include('dashboard.partials.header')
            <!-- Header end -->

            <!-- Main start -->
            @yield('content')
            <!-- main end -->

        </div>
    </div>
</body>

</html>
