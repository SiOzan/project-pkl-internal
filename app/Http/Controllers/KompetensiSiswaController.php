<?php

namespace App\Http\Controllers;

use App\Models\KompetensiSiswa;
use Alert;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;

class KompetensiSiswaController extends Controller
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
        $kompetensiSiswa = KompetensiSiswa::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('kompetensiSiswa.index', compact('kompetensiSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kompetensiSiswa.create');
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
            'kompetensi' => 'required|unique:kompetensi_siswas',
        ]);

        $kompetensiSiswa = new KompetensiSiswa();
        $kompetensiSiswa->kompetensi = $request->kompetensi;
        $kompetensiSiswa->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('kompetensiSiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KompetensiSiswa  $kompetensiSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(KompetensiSiswa $kompetensiSiswa)
    {
        return view('kompetensiSiswa.show', compact('kompetensiSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KompetensiSiswa  $kompetensiSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(KompetensiSiswa $kompetensiSiswa)
    {
        return view('kompetensiSiswa.edit', compact('kompetensiSiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KompetensiSiswa  $kompetensiSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KompetensiSiswa $kompetensiSiswa)
    {
        $validated = $request->validate([
            'kompetensi' => 'required',
        ]);

        $kompetensiSiswa = KompetensiSiswa::findOrFail($kompetensiSiswa->id);
        $kompetensiSiswa->kompetensi = $request->kompetensi;
        $kompetensiSiswa->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('kompetensiSiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KompetensiSiswa  $kompetensiSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(KompetensiSiswa $kompetensiSiswa)
    {
        $kompetensiSiswa = KompetensiSiswa::findOrFail($kompetensiSiswa->id);
        $kompetensiSiswa->delete();

        Alert::success('Success', 'data berhasil dihapus!')->autoclose(1000);
        return redirect()->route('kompetensiSiswa.index');
    }
}
