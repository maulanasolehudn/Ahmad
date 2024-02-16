<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoControllers extends Controller
{
    public function index()
    {
        $foto = Foto::latest()->paginate(5);
        return view ('foto.index',compact('foto'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function create()
    {
        return view('foto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => ['mimes:jpg,png,jpeg', 'image', 'max:2048'],
            'id_foto' => 'required',
             'judul_foto' => 'required',
            'deskripsi' => 'required',
            'tanggal_unggah' => 'required',
            'lokasi_file' => 'required',
        ]);
    
        $params = $request->all();

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('uploads');
            $params['picture'] = $path;
        }

        $foto = Foto::create($params);

        if ($foto) {
            return redirect(route('foto.index'))->with('success','Added!');
        }

        return redirect(route('foto.index'))->with('error','Gagal!');
    }
    public function show(Foto $foto)
    {
        return view('foto.show', compact('foto'));
    }
    public function edit(Foto $foto)
    {
        return view('foto.edit', compact('foto'));
    }
    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'picture' => ['mimes:jpg,png,jpeg', 'image', 'max:2048'],
            'id_foto' => 'required',
            'judul_foto' => 'required',
            'deskripsi' => 'required',
            'tanggal_unggah' => 'required',
            'lokasi_file' => 'required',
        ]);

        $params = $request->all();

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('uploads');
            $params['picture'] = $path;
            
            if ($foto->picture) {
                Storage::delete($foto->picture);
            }
        }

        if ($foto->update($params)) {

            return redirect(route('foto.index'))->with('success','Updated!');
        }
    }

    public function destroy(Foto $foto)
    {
        if ($foto->picture) {
            Storage::delete($foto->picture);
        }

        if ($foto->delete()) {
            return redirect(route('foto.index'))->with('success','Deleted!');
        }

        return redirect(route('foto.index'))->with('error','Sorry, unable to delete this!');
    }
}