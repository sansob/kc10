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
            ->with('kid', $kid)
            ->with('id', $id)
            ->with('koperasi', $koperasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function getTransaksiSimpan($id)
//    {
//        $auth = Auth::user()->id;
//        $nasbah = Transaksi::select(['id', 'nama_transaksi', 'koperasi_id', 'tipe', 'nominal', 'created_at', 'status_pinjaman', 'nasabah_id'])
//            ->where('koperasi_id', '=', $auth)
//            ->where('tipe', '=', 'simpanan');
//        //->where('nasabah_id', '=', $id);
//
//        try {
//            return Datatables::of($nasbah)
//                ->addColumn('action', function ($nasbah) {
//                    return '<a href="trans/' . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="voyager-search"></i> Lihat Transaksi</a>
//     <a href="#edit-' . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
//                })
//                ->make(true);
//        } catch (\Exception $e) {
//            echo $e;
//        }
//    }

    /**
     * @param $kid
     * @param $id
     * @return mixed
     */
    public function getTransaksiPinjam($id, $kid)
    {
        $auth = Auth::user()->id;
        $pinjam = Transaksi::select(['id', 'nama_transaksi', 'tipe', 'nominal', 'created_at', 'nasabah_id', 'status_pinjaman'])
            ->where('nasabah_id', '=', $kid)
            ->where('koperasi_id', '=', $id)
            ->where('tipe', '=', 'pinjaman');


        try {
            return Datatables::of($pinjam)
//                ->addColumn('action', function ($pinjam) {
//                    return '
//     <a href="/admin/trans/delete/' . $pinjam->id . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
//                })
                ->make(true);
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function create($kid, $id)
    {
        return view('transaksi/addtransaksi')
            ->with('kid', $kid)
            ->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = new Transaksi();
        $req->koperasi_id = $request['koperasi_id'];
        $req->nasabah_id = $request['nasabah_id'];
        $req->tipe = "pinjaman";
        $req->nama_transaksi = $request['nama_transaksi'];
        $req->nominal = $request['nominal'];
        $req->status_pinjaman = $request['status_pinjaman'];
        $req->save();
        return redirect(url('admin/trans/') . "/" . $req->koperasi_id . "/" . $req->nasabah_id);
    }



    /**
     * Display the specified resource.
     *s
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
    public function destroy($id, $nid, $kid)
    {
        $del = Transaksi::find($id);
        $del->delete;
        return redirect(url('admin/trans/') . "/" . $kid . "/" . $nid);
    }
}
