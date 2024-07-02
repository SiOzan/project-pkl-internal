<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::latest()->get();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('guru.create', compact('mapel'));
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
            'nama' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'id_mapel' => 'required',
            'mengajar_sejak' => 'required',
            'foto' => 'required|max:2048|mimes:png,jpg',
        ]);

        $guru = new Guru();
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->id_mapel = $request->id_mapel;
        $guru->mengajar_sejak = $request->mengajar_sejak;
        // upload foto
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/foto', $name);
            $guru->foto = $name;
        }
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('guru.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $guru = Guru::findOrFail($id);
        $mapel = Mapel::all();
        return view('guru.edit', compact('guru', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'id_mapel' => 'required',
            'mengajar_sejak' => 'required|numeric',
            // 'foto' => 'required|max:2048|mimes:png,jpg',
        ]);

        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->id_mapel = $request->id_mapel;
        $guru->mengajar_sejak = $request->mengajar_sejak;
        if ($request->hasFile('foto')) {
            $guru->deleteImage(); //untuk hapus gambarr sebelum diganti gambar baru
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/foto', $name);
            $guru->foto = $name;
        }
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru = Guru::findOrFail($guru->id);
        $guru->deleteImage();
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'data berhasil dihapus!');
    }
}
