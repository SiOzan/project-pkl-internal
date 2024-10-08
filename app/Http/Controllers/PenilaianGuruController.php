<?php

namespace App\Http\Controllers;

use App\Models\PenilaianGuru;
use App\Models\PertanyaanAtasan;
use App\Models\PertanyaanGuru;
use App\Models\PertanyaanSiswa;
use Illuminate\Http\Request;

class PenilaianGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = PenilaianGuru::all();
        // $pertanyaanAtasan = PertanyaanAtasan::all();
        return view('penilaian', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianGuru  $penilaianGuru
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianGuru $penilaianGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianGuru  $penilaianGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(PenilaianGuru $penilaianGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenilaianGuru  $penilaianGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenilaianGuru $penilaianGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianGuru  $penilaianGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianGuru $penilaianGuru)
    {
        //
    }
}
