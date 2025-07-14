<?php

namespace App\Http\Controllers;

use App\Models\AaStudio;
use Illuminate\Http\Request;

class AdminStudioController extends Controller
{
    public function index() {
        $data = $request->all();

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['gambar'] = $filename;
    }

    

    AmaaStudio::create($data);
    return redirect('/admin/studios')->with('success', 'Studio berhasil ditambahkan!');
    }

    public function create() {
        return view('admin.studios.create');
    }

    public function store(Request $request)
    {
        AaStudio::create($request->all());
        return redirect('/admin/studios')->with('success', 'Studio berhasil ditambahkan!');
    }

    public function edit($id) {
        $studio = AaStudio::findOrFail($id);
        return view('admin.studios.edit', compact('studio'));
    }

    public function update(Request $request, $id) {
        $studio = AmaaStudio::findOrFail($id);
        $data = $request->all();

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['gambar'] = $filename;
    }

    $studio->update($data);
    return redirect('/admin/studios')->with('success', 'Studio berhasil diperbarui!');
    }

    public function destroy($id) {
        $studio = AaStudio::findOrFail($id);
        $studio->delete();
        return redirect('/admin/studios')->with('success', 'Studio berhasil dihapus!');
    }
}
