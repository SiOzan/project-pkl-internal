<?php

namespace App\Http\Controllers;

use App\Models\PertanyaanSiswa;
use App\Models\KompetensiSiswa;
use App\Http\Middleware\IsAdmin;
use Alert;
use Illuminate\Http\Request;

class PertanyaanSiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', IsAdmin::class]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaanSiswa = PertanyaanSiswa::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('pertanyaanSiswa.index', compact('pertanyaanSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kompetensiSiswa = KompetensiSiswa::all();
        return view('pertanyaanSiswa.create', compact('kompetensiSiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required',
            'id_kompetensi' => 'required',
        ]);

        $pertanyaanSiswa = new PertanyaanSiswa();
        $pertanyaanSiswa->pertanyaan = $request->pertanyaan;
        $pertanyaanSiswa->id_kompetensi = $request->id_kompetensi;
        $pertanyaanSiswa->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('pertanyaanSiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PertanyaanSiswa  $pertanyaanSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(PertanyaanSiswa $pertanyaanSiswa)
    {
        return view('pertanyaanSiswa.show', compact('pertanyaanSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PertanyaanSiswa  $pertanyaanSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(PertanyaanSiswa $pertanyaanSiswa)
    {
        $pertanyaanSiswa = PertanyaanSiswa::findOrFail($pertanyaanSiswa->id);
        $kompetensiSiswa = KompetensiSiswa::all();
        return view('pertanyaanSiswa.edit', compact('pertanyaanSiswa', 'kompetensiSiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PertanyaanSiswa  $pertanyaanSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PertanyaanSiswa $pertanyaanSiswa)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required',
            'id_kompetensi' => 'required',
        ]);

        $pertanyaanSiswa = PertanyaanSiswa::findOrFail($pertanyaanSiswa->id);
        $pertanyaanSiswa->pertanyaan = $request->pertanyaan;
        $pertanyaanSiswa->id_kompetensi = $request->id_kompetensi;
        $pertanyaanSiswa->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('pertanyaanSiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PertanyaanSiswa  $pertanyaanSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PertanyaanSiswa $pertanyaanSiswa)
    {
        $pertanyaanSiswa = PertanyaanSiswa::findOrFail($pertanyaanSiswa->id);
        $pertanyaanSiswa->delete();

        Alert::success('Success', 'data berhasil dihapus!')->autoclose(1000);
        return redirect()->route('pertanyaanSiswa.index');
    }
}
