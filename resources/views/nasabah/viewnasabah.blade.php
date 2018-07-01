@extends('voyager::master')


@section('content')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-window-list"></i> Data Nasabah
        </h1>
        <a href="{{route('nasabah.create')}}" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>Add New</span>
        </a>

        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">


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

            ajax: '{!! route('nasabah.dataNasabah') !!}',
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

