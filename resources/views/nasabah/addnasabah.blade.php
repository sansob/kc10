<?php
/**
 * Created by PhpStorm.
 * User: sansob
 * Date: 01/07/18
 * Time: 15.00
 */
?>

@extends('voyager::master')


@section('content')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-window-list"></i>
            Add Nasabah Koperasi
        </h1>


        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">
                        <!-- form start -->
                        <form role="form"  action="{{route('nasabah.store')}}"
                              method="POST" enctype="multipart/form-data">
                            <!-- PUT Method if we are editing -->


                            <!-- CSRF TOKEN -->
                            @csrf

                            <div class="panel-body">


                                <!-- Adding / Editing -->

                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">UID</label>
                                    <input type="text" class="form-control" name="id_koperasi" placeholder="UID"
                                           value="{{Auth::user()->id}}" readonly>


                                </div>
                                <div class="form-group  col-md-12">

                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">NIK</label>
                                    <input type="number" class="form-control" name="nik" step="any" placeholder="NIK"
                                           value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">Nomor Rekening</label>
                                    <input type="number" class="form-control" name="no_rek" step="any"
                                           placeholder="Nomor Rekening" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">Perkerjaan</label>
                                    <input type="text" class="form-control" name="perkerjaan" placeholder="Perkerjaan"
                                           value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">Alamat</label>
                                    <textarea class="form-control" name="alamat" rows="5"></textarea>


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12">

                                    <label for="name">Nama Pinjaman</label>
                                    <input type="text" class="form-control" name="nama_pinjaman" placeholder="Nama Pinjaman" value="">


                                </div>

                                <div class="form-group  col-md-12">

                                    <label for="name">Jumlah Pinjaman</label>
                                    <input type="number" class="form-control" name="jumlah_pinjaman" step="any" placeholder="Jumlah Pinjaman" value="">


                                </div>

                                <div class="form-group  col-md-12">

                                    <label for="name">Jatuh Tempo</label>
                                    <input type="date" class="form-control" name="jatuh_tempo" placeholder="Jatuh Tempo" value="">


                                </div>

                                <div class="form-group  col-md-12">

                                    <label for="name">Cicilan Bulanan</label>
                                    <input type="number" class="form-control" name="cicilan_bulanan" step="any" placeholder="Cicilan Bulanan" value="">


                                </div>


                            </div><!-- panel-body -->

                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Save</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
