<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TravelIn</title>
  </head>

  <!-- link css -->
  <link rel="stylesheet" href="{{ asset('travelIn/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('travelIn/style2.css') }}" />

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
        </header>
        {{-- <div class="w-full px-4">
            <h1 class="text-xl font-semibold mb-4">Add Destination</h1>

            <div class="border shadow-sm border rounded-lg mb-6 p-4">
                <div class="border-b pb-3 mb-4 flex justify-between items-center">
                    <a href="{{ url('user/create/') }}" class="text-blue-600">back</a>
                </div>

                @if (Session::has('sukses'))
                    <p class="text-green-600">{{ session('sukses') }}</p>
                @endif

                <form method="POST" enctype="multipart/form-data" action="{{ url('user/destination/store') }}">
                    @csrf
                    <table class="w-full border border-gray-400">
                        <tr class="border-b">
                            <th class="p-2 text-left w-48">Destination Title</th>
                            <td class="p-2">
                                <input name="title" class="w-full border p-2 rounded" />
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Select Categories</th>
                            <td class="p-2">
                                <select name="category_id" class="w-full border p-2 rounded">
                                    <option value="0">--- Select ---</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Province</th>
                            <td class="p-2">
                                <select name="provincy_id" id="province" class="w-full border p-2 rounded dynamic" data-dependent="city">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @if (!empty($provinsis))
                                        @foreach ($provinsis as $item)
                                            <option value="{{ $item->id }}">{{ $item->provincy_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Kota</th>
                            <td class="p-2">
                                <select name="city_id" id="city" class="w-full border p-2 rounded dynamic" data-dependent="kec">
                                    <option value="">-- Pilih Kota --</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Kecamatan</th>
                            <td class="p-2">
                                <select name="state_id" id="kec" class="w-full border p-2 rounded">
                                    <option value="">-- Pilih Kecamatan --</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Description</th>
                            <td class="p-2">
                                <textarea name="description" class="w-full border p-2 rounded"></textarea>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Average Price</th>
                            <td class="p-2">
                                <input type="number" name="price" class="w-full border p-2 rounded" />
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Foto Tempat</th>
                            <td class="p-2">
                                <input type="file" name="img_url" class="w-full border p-2 rounded" />
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Galeri</th>
                            <td class="p-2">
                                <input type="file" name="gallery_imgs[]" class="w-full border p-2 rounded" multiple />
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Jam Operasional</th>
                            <td class="p-2">
                                <input type="text" name="open_hours" class="w-full border p-2 rounded" placeholder="09:00-17:00" />
                            </td>
                        </tr>

                        <tr class="border-b">
                            <th class="p-2 text-left">Official Website</th>
                            <td class="p-2">
                                <input name="website" class="w-full border p-2 rounded" />
                            </td>
                        </tr>
                    </table>

                    <button type="submit" class="mt-4 bg-yellow-500 text-black px-4 py-2 rounded">Submit</button>
                </form>
            </div>
        </div> --}}
        <main class="raja">
            <div class="utama">
                <h3>Tambahkan Destinasimu!</h3>
                <form method="POST" enctype="multipart/form-data" action="{{ url('user/destination/store') }}">
                        @if (Session::has('sukses'))
                            <p class="text-green-600">{{ session('sukses') }}</p>
                        @endif
                    @csrf
                    <div class="destination-des">
                        <div class="input-box">
                            <span class="detail-input">Nama Destinasi</span>
                            <input type="text" name="title" id="#" placeholder="Insert Name of Destination">
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Kategori Destinasi</span>
                            <select name="category_id" id="">
                                <option value="0">--- Select ---</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Letak Provinsi</span>
                            <select name="provincy_id" id="province" class="w-full border p-2 rounded dynamic" data-dependent="city">
                                <option value="">-- Pilih Provinsi --</option>
                                @if (!empty($provinsis))
                                    @foreach ($provinsis as $item)
                                        <option value="{{ $item->id }}">{{ $item->provincy_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Pilih Fasilitas</span>

                            <div class="checkbox-group">
                                @foreach ($facilities as $facility)
                                    <label class="checkbox-item">
                                        <input type="checkbox" class="checkbox-input" name="facility_id[]" value="{{ $facility->id }}">
                                        {{ $facility->title }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Letak Kota</span>
                            <select name="city_id" id="city" class="" data-dependent="kec">
                                <option value="">-- Pilih Kota --</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Letak Kecamatan</span>
                            <select name="state_id" id="kec" class="">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Deskripsi Destinasi</span>
                            <textarea name="description" id=""></textarea>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Harga Kira-kira</span>
                            <input type="number" name="price" class="w-full border p-2 rounded" />
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Foto Destinasi</span>
                            <input type="file" name="img_url" class="w-full border p-2 rounded" />
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Galeri Destinasi</span>
                            <input type="file" name="gallery_imgs[]" class="w-full border p-2 rounded" multiple/>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Jam Operasional</span>
                            <input type="text" name="open_hours" class="w-full border p-2 rounded" multiple/>
                        </div>
                        <div class="input-box">
                            <span class="detail-input">Website Offisial</span>
                            <input type="text" name="website" class="w-full border p-2 rounded" multiple/>
                        </div>
                    </div>
                    <button type="submit" class="submit-bt">Submit</button>
                </form>
            </div>
        </main>

        <!-- /.container-fluid -->
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <!-- Tambah CDN Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <!-- Swiper -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

        <!-- JavaScript -->
        <script src="{{ asset('travelIn/app.js') }}"></script>

        <script>
        $(document).ready(function(){

            $('#city').select2({
                placeholder: "-- Pilih Kota --",
                allowClear: true,
                width: '100%'
            });

            $('#kec').select2({
                placeholder: "-- Pilih Kecamatan --",
                allowClear: true,
                width: '100%'
            });

            $('#province').on('change', function(){
                var provincy_id = $(this).val();

                if(provincy_id){
                    $.get('/get-kota/'+provincy_id, function(data){
                        $('#city').empty().append('<option value="">-- Pilih Kota --</option>');
                        $.each(data, function(key, value){
                            $('#city').append('<option value="'+value.id+'">'+value.city_name+'</option>');
                        });

                        $('#city').trigger('change'); // refresh select2
                    });
                }
            });

            $('#city').on('change', function(){
                var city_id = $(this).val();

                if(city_id){
                    $.get('/get-kecamatan/'+city_id, function(data){
                        $('#kec').empty().append('<option value="">-- Pilih Kecamatan --</option>');
                        $.each(data, function(key, value){
                            $('#kec').append('<option value="'+value.id+'">'+value.kecamatan_name+'</option>');
                        });

                        $('#kec').trigger('change'); // refresh select2
                    });
                }
            });

        });
        </script>

    </body>
</html>
