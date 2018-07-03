@extends('voyager::master')


@section('content')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-window-list"></i> Detail Screening
        </h1>


        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">

                        <table class="table table-bordered">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{ $data->nik }}</td>
                            </tr>


                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $data->alamat }}</td>
                            </tr>

                            <tr>
                                <td>Alasan</td>
                                <td>:</td>
                                <td>{{ $data->alasan }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><b>{{ $data->status }}</b></td>
                            </tr>


                        </table>
                    </div>
                    <br>

                    @if (($data->status) === "Pengajuan" or ($data->status) === "pengajuan")
                        <h1 class="page-title">
                            <i class="voyager-window-list"></i> Data masih dalam pengajuan. Silakan coba lagi kembali
                        </h1>


                    @elseif (($data->status) === "tolak" or ($data->status) === "Tolak")
                        <h1 class="page-title">
                            <i class="voyager-window-list"></i> Pengajuan Screening ditolak.
                        </h1>


                    @elseif(($data->status) === "ajukan" or ($data->status) === "Ajukan")

                        <h1 class="page-title">
                            <i class="voyager-window-list"></i> Data Screening
                        </h1>


                        <br>
                        <div class="panel panel-bordered">

                            <br>
                            <table class="table table-bordered" id="nasabah-table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Nomor Rekening</th>
                                    <th>Pekerjaan</th>
                                    <th>Dibuat</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#nasabah-table').DataTable({

            processing: true,
            serverSide: false,
            paging: true,
            searching: true,

            ajax: '/admin/checking/dataNasabahScreening/{!! $data->nik !!}',
            columns: [
                {data: 'nama', name: 'nama'},
                {data: 'nik', name: 'nik'},
                {data: 'no_rek', name: 'no_rek'},
                {data: 'perkerjaan', name: 'perkerjaan'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            destroy: true,
        });
    });
</script>

