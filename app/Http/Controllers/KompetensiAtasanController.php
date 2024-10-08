<?php

namespace App\Http\Controllers;

use App\Models\KompetensiAtasan;
use Alert;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;

class KompetensiAtasanController extends Controller
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
        $kompetensiAtasan = KompetensiAtasan::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('kompetensiAtasan.index', compact('kompetensiAtasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kompetensiAtasan.create');
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
            'kompetensi' => 'required|unique:kompetensi_atasans',
        ]);

        $kompetensiAtasan = new KompetensiAtasan();
        $kompetensiAtasan->kompetensi = $request->kompetensi;
        $kompetensiAtasan->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('kompetensiAtasan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function show(KompetensiAtasan $kompetensiAtasan)
    {
        return view('kompetensiAtasan.show', compact('kompetensiAtasan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function edit(KompetensiAtasan $kompetensiAtasan)
    {
        return view('kompetensiAtasan.edit', compact('kompetensiAtasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KompetensiAtasan $kompetensiAtasan)
    {
        $validated = $request->validate([
            'kompetensi' => 'required',
        ]);

        $kompetensiAtasan = KompetensiAtasan::findOrFail($kompetensiAtasan->id);
        $kompetensiAtasan->kompetensi = $request->kompetensi;
        $kompetensiAtasan->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('kompetensiAtasan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KompetensiAtasan  $kompetensiAtasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KompetensiAtasan $kompetensiAtasan)
    {
        $kompetensiAtasan = KompetensiAtasan::findOrFail($kompetensiAtasan->id);
        $kompetensiAtasan->delete();

        Alert::success('Success', 'data berhasil dihapus!')->autoclose(1000);
        return redirect()->route('kompetensiAtasan.index');
    }
}
