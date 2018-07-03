<?php

namespace App\Http\Controllers;

use App\NasabahKoperasi;
use App\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('screening.viewscreening');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screening/addscreening');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = new Screening();
        $req->koperasi_id = $request['koperasi_id'];
        $req->nik = $request['nik'];
        $req->nama = $request['nama'];
        $req->alamat = $request['alamat'];
        $req->status = "Pengajuan";
        $req->alasan = $request['alasan'];
        $req->save();
        return redirect(route('screening.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Screening::find($id);
        return view('screening.detailscreening')
            ->with('data', $data);
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

    public function dataScreening()
    {
        $auth = Auth::user()->id;
        $nasbah = Screening::select(['id', 'nik', 'nama', 'alamat', 'status', 'created_at', 'updated_at', 'deleted_at', 'alasan', 'koperasi_id'])
            ->where('koperasi_id', '=', $auth);

        try {
            return Datatables::of($nasbah)
                ->addColumn('action', function ($nasbah) {
                    return '<a href="/admin/checking/show/' . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="voyager-search"></i> Lihat Pengajuan</a>
     ';
                })
                ->make(true);
        } catch (\Exception $e) {
            echo $e;
        }

    }


    public function dataNasabahScreening($nik)
    {
        $auth = Auth::user()->id;
        $nasbah = NasabahKoperasi::select(['id', 'nama', 'nik', 'no_rek', 'perkerjaan', 'created_at', 'id_koperasi'])
            ->where('nik', '=', $nik);

        try {
            return Datatables::of($nasbah)
                ->addColumn('action', function ($nasbah) {
                    return '<a href="/admin/trans/' . $nasbah->id_koperasi . "/" . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="voyager-search"></i> Lihat Transaksi</a>
     ';
                })
                ->make(true);
        } catch (\Exception $e) {
            echo $e;
        }

        //return Datatables::of(NasabahKoperasi::query())->make(true);
    }
}
