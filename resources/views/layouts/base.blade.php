<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
<h1>hoi</h1>
        </div>
        <nav>
            @guest
                <a href="">Inloggen</a>
                <a href="">Regristeren</a>
            @endguest
            @auth
                <a href="profile.destroy">Logout</a>
            @endauth
        </nav>
    </header>
    {{-- <main>
        <div class="">
            <h1>Wedstrijden</h1>
            <div class="wedstrijden">
                <p>hoi</p>
                <table>
                    <tr>
                        <th>Team1</th>
                        <th>Team2</th>
                    </tr>
                    <tr>
                        <td>hoi</td>
                        <td>.</td>
                        <td>hoi</td>
                    </tr>
                </table>
            </div>
        </div>
    </main> --}}
{{ $slot }}
    <footer>
        <div class="upperFooter">
                <div class="logoFooter">
<h1>hoi</h1>
                </div>
                <a href="" class="superNavX">q</a>
                <a href="" class="superNavX">q</a>
                <a href="" class="superNavX">q</a>
                <a href="" class="superNavX">q</a>
                <nav>
                    <a href="">q</a>
                    <a href="">q</a>
                    <a href="">q</a>
                    <a href="">q</a>
                </nav>
                <div class="logos">
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                </div>
        </div>
        <div class="underFooter">
            <div class="underFooterText">
                <p>&copy; 2024 Football. All rights</p>
                <p>Privacy Policy</p>
                <p>Terms of Service</p>
            </div>
        </div>

    </footer>
</body>
</html>
