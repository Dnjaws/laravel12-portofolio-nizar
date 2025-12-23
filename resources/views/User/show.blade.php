<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('travelIn/style3.css') }}" />

    <!-- link Google Icon -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_outward"
    />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


</head>
<body>
    <nav class="navbar">
        <div class="nav-left">
            <h4><a class="logo" href="{{ url('/dashboard') }}">TravelIn</a> </h4>
        </div>

        <div class="nav-center">
            <ul class="menu">
                <li><a href="#">Discover</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Community</a></li>
            </ul>
        </div>

        <div class="nav-right">
            @guest
                <a href="#">Register</a>
                <a href="#">Login</a>
            @endguest

            @auth
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button class="btn-auth">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <main class="show">
        <h2 class="des-title">{{ $destination->title }}</h2>
        <div class="show-box">
            <div class="swiper mySwiper box-img">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="slide-img" src="{{ asset($destination->img_url) }}">
                    </div>

                        @foreach ($destination->galleries as $g)
                            <div class="swiper-slide">
                                <img src="{{ asset($g->img_src) }}" class="slide-img">
                            </div>
                        @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <div class="swiper-pagination"></div>

            </div>
            <hr>
            <div class="show-item">
                <div class="box-des">
                    <p>{{ $destination->description }}</p>
                </div>
                <div class="container">
                    <div class="left-info">
                        <p><strong>Harga Rata-rata:</strong> {{ $destination->price }}</p>
                        <p><strong>Jam Buka:</strong> {{ $destination->open_hours }}</p>
                    </div>

                    <div class="right-info">
                        <p><strong>Provinsi:</strong> {{ $destination->provinsi->provincy_name }}</p>
                        <hr class="poin">
                        <p><strong>Kota:</strong> {{ $destination->kota->city_name }}</p>
                        <hr class="poin">
                        <p><strong>Kecamatan:</strong> {{ $destination->kecamatan->kecamatan_name }}</p>

                        <p><strong>Fasilitas:</strong></p>
                        <ul>
                            @foreach($destination->facilities as $f)
                                <li>{{ $f->title }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
        </div>
    </main>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- JS2 -->
    <script src="{{ asset('travelIn/app2.js') }}"></script>

</body>
</html>
