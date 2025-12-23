@extends('layout')
@section('content')

                   <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add Facilities</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Create New
                                <a href="{{ url('admin/destination/') }}" class="float-right">back</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if (Session::has('sukses'))
                                <p class="text-success">{{ session('sukses') }}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="POST" enctype="multipart/form-data" action="{{ url('admin/destination') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Destination Title</th>
                                            <td><input name="title" id="" class="form-control"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Select Categories</th>
                                            <td>
                                                <select class="form-control" name="category_id" id="">
                                                    <option value="0">--- Select ---</option>
                                                    @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <th>Pilih Fasilitas</th>
                                            <td>
                                                <select name="facility_id[]" id="facility" class="form-control" multiple>
                                                    @foreach ($facilities as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <th>Pilih Fasilitas</th>
                                            <td>
                                                @foreach ($facilities as $facility)
                                                    <label>
                                                        <input type="checkbox" name="facility_id[]" value="{{ $facility->id }}">
                                                        {{ $facility->title }}
                                                    </label><br>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                           <th>Province</th>
                                           <td>
                                                <select name="provincy_id" id="province" class="form-control lg:form-select dynamic" data-dependent="city">
                                                    <option value="">-- Pilih Provinsi</option>
                                                    @if (!empty($province))
                                                        @foreach ($province as $item)
                                                            <option value="{{ $item->id }}">{{ $item->provincy_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                           </td>
                                       </tr>
                                        <tr>
                                            <th>Kota</th>
                                            <td>
                                                <select name="city_id" id="city" class="form-control lg:form-select dynamic" data-dependent="kec">
                                                    <option value="">-- Pilih Kota --</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td>
                                                <select name="state_id" id="kec" class="form-control lg:form-select">
                                                    <option value="">-- Pilih Kecamatan --</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><textarea name="description" id="" class="form-control"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Average Price</th>
                                            <td><input type="number" name="price" id="" class="form-control"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Foto Tempat</th>
                                            <td><input type="file" name="img_url" id="" class="form-control"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Galeri</th>
                                            <td><input type="file" name="gallery_imgs[]" class="form-control" multiple></td>
                                        </tr>
                                        <tr>
                                            <th>Jam Operasional</th>
                                            <td><input type="text" name="open_hours" id="" class="form-control" placeholder="09:00-17:00"></input></td>
                                        </tr>
                                        <tr>
                                            <th>Official Website</th>
                                            <td><input name="website" id="" class="form-control"></input></td>
                                        </tr>
                                    </table>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

    @section('script')
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        {{-- <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}

        <!--JQuery -->
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}

        <!-- Tambah CDN Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- <script>
            $(document).ready(function(){
                $('.dynamic').change(function(){
                    if($(this).val() !='')
                    {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url : "{{ route('destination.fetch') }}",
                            method : "POST",
                            data : {select:select, value:value, _token:_token, dependent:dependent},
                            success:function(result)
                            {
                                $('#'+dependent).html(result);
                            }
                        })
                    }
                })
            })
        </script> --}}

        <script>

            $('#facility').select2({
                placeholder: "Pilih fasilitas",
                allowClear: true,
                width: '100%'
            });

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
                    var provincy_id=$(this).val();
                    if(provincy_id){
                        $.get('/get-kota/'+provincy_id, function(data){
                            $('#city').empty().append('<option value="">-- Pilih Kota --</option>');
                            $.each(data, function(key, value){
                                $('#city').append('<option value="'+value.id+'">'+value.city_name+'</option>');
                            })
                        })
                    }
                })
            })
            $('#city').on('change', function(){
                var city_id=$(this).val();
                if(city_id){
                    $.get('/get-kecamatan/'+city_id, function(data){
                        $('#kec').empty().append('<option value="">-- Pilih Kecamatan --</option>');
                        $.each(data, function(key, value){
                            $('#kec').append('<option value="'+value.id+'">'+value.kecamatan_name+'</option>');
                        })
                    })
                }
            })
        </script>


    @endsection



@endsection
