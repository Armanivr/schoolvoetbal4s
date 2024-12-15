<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/a781d73fe4.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <header class="bg-[#1F7A8C] shadow-md shadow-gray-400 flex justify-evenly items-center border-b border-[#1f7a8ce5] p-2 fixed w-[100%]">
        <img src="{{ asset('images/balplein_full.png') }}" alt="balplein" class="h-18">
        {{-- <nav class="">
            @guest
                <a href="" class="py-2 px-5 text-[#022B3A] hover:text-[#FFFFFF] bg-[#FFFFFF] hover:bg-[#022B3A] hover:scale-90 transition-all ease-in-out delay-20 rounded-sm mx-2 hover:underline">Inloggen</a>
                <a href="" class="py-2 px-5 text-[#022B3A] hover:text-[#FFFFFF] bg-[#FFFFFF] hover:bg-[#022B3A] hover:scale-90 transition-all ease-in-out delay-20 rounded-sm mx-2 hover:underline">Registreren</a>
            @endguest
            @auth
                <a href="profile.destroy" class="py-2 px-5 text-[#022B3A] hover:text-[#FFFFFF] bg-[#FFFFFF] hover:bg-[#022B3A] hover:scale-90 transition-all ease-in-out delay-20 rounded-sm mx-2 hover:underline">Logout</a>
            @endauth
        </nav> --}}
    </header>
    <div class="h-[10%]"></div>
    <main>
        {{ $slot }}
    </main>
    <footer class="bg-[#1F7A8C] shadow-md shadow-gray-400 flex justify-evenly items-center border-t p-2 text-white fixed bottom-0 w-full">
        
        <div class="">
            <div class="">
                <p>&copy; 2024 BalPlein. All rights</p>
                <p>Privacy Policy</p>
                <p>Terms of Service</p>
            </div>
        </div>
    </footer>
</body>
</html