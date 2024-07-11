<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex min-h-screen justify-center items-center bg-slate-100">
        <div class="bg-white rounded-xl p-5 pb-8 w-96 max-w-full">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-1/2 mx-auto my-4">

            @if (Session::has('error'))
                <div class="text-center text-red-500 bg-red-100 rounded mb-3 py-2">{{ Session::get('error') }}</div>
            @endif

            <form action="{{ route('authenticate') }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <input type="text" name="email" id="emailInput"
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                        value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <input type="password" name="password" id="passwordInput"
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                        required>
                </div>
                <button class="py-1 w-full mt-4 bg-indigo-400 text-white rounded">Login</button>
            </form>

            <div class="text-center mt-4">
                <span>Copyright &copy; 2024 {{ config('app.name') }}</span>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ Session::get('success') }}',
            })
        </script>
    @endif

</body>

</html>
