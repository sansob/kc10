<?php

namespace App\Http\Controllers;

use App\KoperasiDetail;
use App\NasabahKoperasi;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2($kid, $id)
    {
        $data = NasabahKoperasi::find($id);
        $koperasi = KoperasiDetail::find($kid);
        return view('transaksi/lihattransaksi')
            ->with('data', $data)
            ->with('koperasi', $koperasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTransaksiSimpan($id)
    {
        $auth = Auth::user()->id;
        $nasbah = Transaksi::select(['id', 'nama_transaksi', 'koperasi_id', 'tipe', 'nominal', 'created_at', 'nasabah_id'])
            ->where('koperasi_id', '=', $auth)
            ->where('tipe', '=', 'simpanan')
            ->where('nasabah_id', '=', $id);

        try {
            return Datatables::of($nasbah)
                ->addColumn('action', function ($nasbah) {
                    return '<a href="trans/' . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="voyager-search"></i> Lihat Transaksi</a>
     <a href="#edit-' . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                })
                ->make(true);
        } catch (\Exception $e) {
            echo $e;
        }
    }

    /**
     * @param $kid
     * @param $id
     * @return mixed
     */
    public function getTransaksiPinjam($id, $kid)
    {
        $auth = Auth::user()->id;
        $pinjam = Transaksi::select(['id', 'nama_transaksi', 'tipe', 'nominal', 'created_at', 'nasabah_id'])
            ->where('nasabah_id', '=', $kid)
            ->where('koperasi_id', '=', $id)
            ->where('tipe', '=', 'pinjaman');


        try {
            return Datatables::of($pinjam)
                ->addColumn('action', function ($pinjam) {
                    return '<a href="trans/' . $pinjam->id . '" class="btn btn-xs btn-primary"><i class="voyager-search"></i> Lihat Transaksi</a>
     <a href="#edit-' . $pinjam->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                })
                ->make(true);
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
