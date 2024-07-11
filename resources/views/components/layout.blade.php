@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | {{ config('app.name') }}</title>

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/tabler-icons.min.css">

    @vite('resources/css/app.css')

    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('assets/js/head.js') }}"></script>

    @stack('styles')
</head>

<body>
    <!-- Begin page -->
    <div class="flex wrapper">

        <!-- Start Sidebar -->
        <x-sidebar />
        <!-- End Sidebar -->

        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- Topbar Start -->
            <x-header />
            <!-- Topbar End -->

            <main class="flex-grow p-6">

                <!-- Page Title Start -->
                <h4 class="mb-2 text-lg font-medium text-slate-900">{{ $title }}</h4>
                <!-- Page Title End -->

                {{ $slot }}

            </main>

            <!-- Footer Start -->
            <footer class="flex items-center h-16 px-6 bg-white border-t border-gray-200 shadow footer">
                <div class="flex justify-center w-full gap-4 md:justify-between">
                    <div>
                        2024 © {{ config('app.name') }}
                    </div>
                    <div class="hidden gap-2 md:flex item-center md:justify-end">
                        Design &amp; Develop by<a href="#" class="text-primary">Naufal</a>
                    </div>
                </div>
            </footer>
            <!-- Footer End -->

        </div>
        <!-- End Page content -->

    </div>


    <!-- Plugin Js -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/iconify-icon/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/preline/preline.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- App Js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')

    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ Session::get('success') }}',
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ Session::get('error') }}',
            })
        </script>
    @endif
</body>

</html>
