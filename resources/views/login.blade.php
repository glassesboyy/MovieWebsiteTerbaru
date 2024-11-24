<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login - MovieZul</title>
</head>

<body>
    @include('partials.navbar')
    <div class="w-full h-screen bg-gradient-to-b from-black to-purple-700 flex justify-center items-center">
        <div class="w-1/3 bg-white p-10 rounded-xl ">
            <h1 class="text-3xl font-bold mb-5 text-center">Login</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="mb-2 justify-center text-center" role="alert">
                        <span class="text-xs font-semibold text-red-500">{{ $error }}</span>
                    </div>
                @endforeach
            @endif
            @include('partials.form', [
                'action' => route('login.submit'),
                'fields' => [
                    [
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                        'placeholder' => 'name@flowbite.com',
                    ],
                    [
                        'name' => 'password',
                        'label' => 'Password',
                        'type' => 'password',
                        'placeholder' => 'Enter your password',
                    ],
                ],
                'buttonText' => 'Login',
            ])
        </div>
    </div>
</body>

</html>
