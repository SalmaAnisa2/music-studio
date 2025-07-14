<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AaStudio;

class StudioController extends Controller
{
    public function index()
    {
        $studios = AaStudio::all();
        return view('admin.studio.index', compact('studios'));
    }

    public function create()
    {
        return view('admin.studio.create');
    }

    public function store(Request $request)
    {
        AaStudio::create($request->all());
        return redirect('/admin/studios')->with('success', 'Studio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $studio = AaStudio::findOrFail($id);
        return view('admin.studio.edit', compact('studio'));
    }

    public function update(Request $request, $id)
    {
        $studio = AaStudio::findOrFail($id);
        $studio->update($request->all());
        return redirect('/admin/studios')->with('success', 'Studio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $studio = AaStudio::findOrFail($id);
        $studio->delete();
        return redirect('/admin/studios')->with('success', 'Studio berhasil dihapus!');
    }
}