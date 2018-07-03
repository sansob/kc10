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
            Request Checking
        </h1>


        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">
                        <!-- form start -->
                        <form role="form" action="{{route('screening.store')}}"
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
                                           value="{{Auth::user()->id}}" readonly>


                                </div>


                                <div class="form-group  col-md-12">

                                    <label for="name">NIK</label>
                                    <input type="number" class="form-control" name="nik"
                                           placeholder="NIK" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12">

                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama"
                                    >


                                </div>
                                <div class="form-group  col-md-12">

                                    <label for="name">Alamat</label>
                                    <textarea class="form-control" name="alamat" rows="5"></textarea>
                                </div>


                                <div class="form-group  col-md-12">

                                    <label for="name">Alasan Request Screening</label>
                                    <textarea class="form-control" name="alasan" rows="5"></textarea>
                                </div>

                                <!-- GET THE DISPLAY OPTIONS -->


                            </div><!-- panel-body -->

                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Request</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
