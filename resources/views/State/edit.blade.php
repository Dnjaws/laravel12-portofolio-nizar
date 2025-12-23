@extends('layout')
@section('content')

                   <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Update Kecamatan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Update
                                <a href="{{ url('admin/state/') }}" class="float-right">back</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if (Session::has('sukses'))
                                <p class="text-success">{{ session('sukses') }}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{ url('admin/state/' .$data->id) }}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Kota</th>
                                            <td>
                                                <select name="city_id" class="form-control" required>
                                                    <option value="">-- Pilih Kota --</option>
                                                    @foreach ($city as $item)
                                                        <option value="{{ $item->id }}" {{ $data->city_id == $item->id ? 'selected' : '' }} >{{ $item->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td><input value="{{ $data->kecamatan_name }}" name="kecamatan_name" type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-warning" id="">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

    {{-- @section('script')
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection --}}

@endsection
