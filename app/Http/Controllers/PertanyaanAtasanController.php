<?php

namespace App\Http\Controllers;

use App\Models\PertanyaanAtasan;
use App\Models\KompetensiAtasan;
use Alert;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;

class PertanyaanAtasanController extends Controller
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
        $pertanyaanAtasan = PertanyaanAtasan::latest()->get();
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('pertanyaanAtasan.index', compact('pertanyaanAtasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kompetensiAtasan = KompetensiAtasan::all();
        return view('pertanyaanAtasan.create', compact('kompetensiAtasan'));
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

        $pertanyaanAtasan = new PertanyaanAtasan();
        $pertanyaanAtasan->pertanyaan = $request->pertanyaan;
        $pertanyaanAtasan->id_kompetensi = $request->id_kompetensi;
        $pertanyaanAtasan->save();

        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('pertanyaanAtasan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PertanyaanAtasan  $pertanyaanAtasan
     * @return \Illuminate\Http\Response
     */
    public function show(PertanyaanAtasan $pertanyaanAtasan)
    {
        return view('pertanyaanAtasan.show', compact('pertanyaanAtasan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PertanyaanAtasan  $pertanyaanAtasan
     * @return \Illuminate\Http\Response
     */
    public function edit(PertanyaanAtasan $pertanyaanAtasan)
    {
        $pertanyaanAtasan = PertanyaanAtasan::findOrFail($pertanyaanAtasan->id);
        $kompetensiAtasan = KompetensiAtasan::all();
        return view('pertanyaanAtasan.edit', compact('pertanyaanAtasan', 'kompetensiAtasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PertanyaanAtasan  $pertanyaanAtasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PertanyaanAtasan $pertanyaanAtasan)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required',
            'id_kompetensi' => 'required',
        ]);

        $pertanyaanAtasan = PertanyaanAtasan::findOrFail($pertanyaanAtasan->id);
        $pertanyaanAtasan->pertanyaan = $request->pertanyaan;
        $pertanyaanAtasan->id_kompetensi = $request->id_kompetensi;
        $pertanyaanAtasan->save();

        Alert::success('Success', 'data berhasil diperbarui')->autoclose(1000);
        return redirect()->route('pertanyaanAtasan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PertanyaanAtasan  $pertanyaanAtasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PertanyaanAtasan $pertanyaanAtasan)
    {
        $pertanyaanAtasan = PertanyaanAtasan::findOrFail($pertanyaanAtasan->id);
        $pertanyaanAtasan->delete();

        Alert::success('Success', 'data berhasil dihapus!')->autoclose(1000);
        return redirect()->route('pertanyaanAtasan.index');
    }
}
