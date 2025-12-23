<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TravelIn</title>
  </head>

  <!-- link css -->
  <link rel="stylesheet" href="{{ asset('travelIn/style.css') }}" />

  <!-- link Google Icon -->
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_outward"
  />

  <!-- link bootsrap -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
  />

  <!-- JS Swiper -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
  />

  <body>
    <header>
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
                    <div class="user-info">
                        <span class="user-role">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>

                        <form method="POST" action="{{ url('/logout') }}" style="display: inline;">
                            @csrf
                            <button class="btn-auth">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
      <div class="content">
        <div class="cont">
          <h1>✈️ TravelIn — karena liburan gak harus ribet!</h1>
          <p>
            Buat kamu yang sering bilang “mau jalan-jalan tapi gak tahu ke
            mana”, sini deh, biar TravelIn bantu cari tempat seru yang cocok
            banget buat kamu.
          </p>
        </div>
        <div class="trip">
          <div class="search-box">
              <div class="card">
                  <h4>Category</h4>
                  <input type="text" name="" id="" placeholder="Select Category" />
                </div>
                <div class="card">
                    <h4>Province</h4>
                    <input type="text" name="" id="" placeholder="Select Province" />
                </div>
                <div class="card">
                    <h4>City</h4>
                    <input type="text" name="" id="" placeholder="Select City" />
                </div>
                <a href="#">Explore Now</a>
            </div>
            <div class="travel-box">
                <h4>Rekomendasi buat yang Nolep!</h4>

                <div class="cards swiper nolep-swiper">
                    <div class="card-wrapper swiper-wrapper">
                        @foreach ($destinations as $item)
                            <div class="card swiper-slide">
                                <h3>{{ $item->title }}</h3>

                                <img src="{{ asset($item->img_url) }}" alt="" />

                                <div class="btn-city">
                                    <a href="#">Read More!</a>
                                    <h5>
                                        {{ $item->kota->city_name ?? '' }} <br />
                                        <span>{{ $item->provinsi->provincy_name }}</span>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    {{-- <main class="one">
      <div class="hero">
        <h1>TravelIn</h1>
      </div>
      <div class="container">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
          facere, ad sed non temporibus magnam nisi cupiditate. Quod veniam
          animi quas nostrum dolor reiciendis. Id amet nemo aliquam quisquam,
          pariatur fugiat eos deserunt at distinctio delectus dicta rem
          eligendi! Veritatis quibusdam velit incidunt architecto perspiciatis.
          Laborum excepturi atque nihil laudantium quaerat saepe magni
          blanditiis, accusantium enim officiis autem, accusamus aut vitae
          similique repudiandae incidunt doloremque ipsam quia sit! Voluptatibus
          explicabo similique distinctio officia dignissimos dolores assumenda
          magni laudantium quos perspiciatis veniam deserunt, eius qui optio
          voluptas nesciunt magnam quam beatae!
        </p>
        <img src="img/nIG.svg" alt="" />
      </div>
    </main> --}}
    <main class="secc">
        <div class="container swiper trenn-swiper">
            <div class="title1">
            <h1>Rekomendasi yang sedang <span>TRENN!!🔥🔥🔥</span></h1>
            <p>
                Sekali lagi, tidak ada alasan untuk nolep lagi bung!! TravelIn siap
                membantu anda mencari destinasi terbaik dengan detail!
            </p>
            </div>

            <div class="card-list swiper-wrapper">
                @foreach ($destinations as $d)
                    <div class="card-item swiper-slide">
                        <a href="{{ route('user.destination.show', $d->id) }}" class="card-link">
                            <img src="{{ asset($d->img_url) }}" class="card-img" />
                            <h1 class="utitle">{{ $d->title }}</h1>

                            <div class="group-badge">
                                <p class="badge">{{ $d->category->title ?? '' }}</p>
                            </div>

                            <h3 class="kota">{{ $d->kota->city_name ?? '' }}</h3>

                            <h2 class="card-title">
                                {{ Str::limit($d->description, 100) }}
                            </h2>

                            <button class="button material-symbols-rounded">
                                arrow_outward
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Navigasi -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </main>
    <main class="third">
        <div class="textsec">
            <h1>Kamu Pelit ya Gamau Bagi-bagi Destinasi Liburan?😢</h1>
            <h2 class="text2">Menjadi seorang contributor di website TravelIn✈️</h2>
            <p class="des">
                Jangan pelit liburan, dong! 😆
                Yuk, bagi destinasi liburan seru kamu di TravelIn — biar semua bisa ikutan healing bareng! 💆‍♂️✈️

                Caranya gampang banget! 💡
                Cukup login ke akunmu, isi detail destinasi yang mau kamu bagikan, lalu tunggu admin meng-approve.

                Setelah itu… voila! 🌟
                Cerita liburanmu siap menginspirasi banyak traveler lain di seluruh Indonesia! 🇮🇩
            </p>
        </div>
        <div class="conts">
            <div class="cont-item">
                <div class="isi">
                    <h1>Ayo tekan <span>tombol ini</span> untuk berkontribusi</h1>
                    <a class="atap" href="{{ url('user/destination/create') }}">Kontribusi Sekarang</a>
                </div>
                <div class="imgsec"><img src="{{ asset('travelIn/img/textsec.png') }}" alt=""></div>
            </div>
        </div>
    </main>

    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="{{ asset('travelIn/app.js') }}"></script>
  </body>
</html>
