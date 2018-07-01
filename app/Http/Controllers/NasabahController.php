<?php

namespace App\Http\Controllers;

use App\NasabahKoperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nasabah/viewnasabah');
    }

    public function dataNasabah()
    {
        $auth = Auth::user()->id;
        $nasbah = NasabahKoperasi::select(['id', 'nama', 'nik', 'no_rek', 'perkerjaan', 'created_at', 'id_koperasi'])
            ->where('id_koperasi', '=', $auth);

        try {
            return Datatables::of($nasbah)
                ->addColumn('action', function ($nasbah) {
                    return '<a href="trans/' . $nasbah->id_koperasi . "/" . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="voyager-search"></i> Lihat Transaksi</a>
     <a href="#edit-' . $nasbah->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                })
                ->make(true);
        } catch (\Exception $e) {
            echo $e;
        }

        //return Datatables::of(NasabahKoperasi::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nasabah/addnasabah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = new NasabahKoperasi();
        $req->nama = $request['nama'];
        $req->nik = $request['nik'];
        $req->no_rek = $request['no_rek'];
        $req->alamat = $request['alamat'];
        $req->perkerjaan = $request['perkerjaan'];
        $req->id_koperasi = $request['id_koperasi'];
        $req->save();
        return redirect(route('nasabah.create'));

//        DB::table('nasabah_koperasi')->insert(
//            ['nama' => $request['nama'],
//                'nik' => $request['nik'],
//                'no_rek' => $request['no_rek'],
//                'alamat' => $request['alamat'],
//                'perkerjaan' => $request['perkerjaan'],
//                'id_koperasi' => $request['id_koperasi'],
//
//            ]);

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
