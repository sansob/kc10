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
            Add Transaksi
        </h1>


        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">
                        <!-- form start -->
                        <form role="form" action="{{url('admin/trans/add/')}}/{{$kid}}/{{{$id}}}"
                              method="POST" enctype="multipart/form-data">
                            <!-- PUT Method if we asre editing -->


                            <!-- CSRF TOKEN -->
                            @csrf

                            <div class="panel-body">


                                <!-- Adding / Editing -->

                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">KID</label>
                                    <input type="text" class="form-control" name="koperasi_id" placeholder="UID"
                                           value="{{$kid}}" readonly>


                                </div>

                                <div class="form-group  col-md-12">

                                    <label for="name">NID</label>
                                    <input type="text" class="form-control" name="nasabah_id" placeholder="UID"
                                           value="{{$id}}" readonly>


                                </div>

                                <div class="form-group  col-md-12">

                                    <label for="name">Nama Transaksi</label>
                                    <input type="text" class="form-control" name="nama_transaksi"
                                           placeholder="Nama Transaksi" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">Nominal</label>
                                    <input type="number" class="form-control" name="nominal" step="any"
                                           placeholder="Nominal Transaksi Dalam Rupiah"
                                           value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">Status Pinjaman</label>
                                    <select class="form-control select2 select2-hidden-accessible"
                                            name="status_pinjaman" tabindex="-1" aria-hidden="true">
                                        <option value="Belum Lunas">Belum Lunas</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="status" selected="&quot;selected&quot;">Pilih</option>
                                    </select><span
                                            class="select2 select2-container select2-container--default select2-container--focus"
                                            dir="ltr" style="width: 100%;"><span class="selection"></span></span>


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
