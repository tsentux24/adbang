<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opds = Opd::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.dataopd', compact('opds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_opd' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'kategori_sektor' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'status' => 'required|in:Aktif,Non-Aktif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Format nomor telepon
        $no_telepon = $request->no_telepon;
        if (strpos($no_telepon, '62') !== 0) {
            if (strpos($no_telepon, '0') === 0) {
                $no_telepon = '62' . substr($no_telepon, 1);
            } else {
                $no_telepon = '62' . $no_telepon;
            }
        }

        Opd::create([
            'nama_opd' => $request->nama_opd,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kategori_sektor' => $request->kategori_sektor,
            'alamat' => $request->alamat,
            'no_telepon' => $no_telepon,
            'status' => $request->status,
        ]);

        return redirect('dataopd')->with('success', 'Data OPD berhasil ditambahkan.');
    }

    /**
     * Get data for editing via AJAX
     */
    public function edit($id)
{
    try {
        $opd = Opd::findOrFail($id);

        return response()->json([
            'success' => true,
            'opd' => $opd
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Data OPD tidak ditemukan'
        ], 404);
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $opd = Opd::findOrFail($id);

        // Validasi data
        $validated = $request->validate([
            'nama_opd' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'kategori_sektor' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'status' => 'required|in:Aktif,Non-Aktif'
        ]);

        // Format nomor telepon
        if (!str_starts_with($validated['no_telepon'], '+62')) {
            $validated['no_telepon'] = '+62' . ltrim($validated['no_telepon'], '0');
        }

        $opd->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data OPD berhasil diperbarui'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal memperbarui data OPD: ' . $e->getMessage()
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $opd = Opd::findOrFail($id);
        $opd->delete();
        return redirect('dataopd')->with('success', 'Data OPD Berhasil Di Hapus!');;
    }
}
