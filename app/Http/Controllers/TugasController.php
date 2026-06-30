<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    // READ: Mengambil semua data tugas
    public function index()
    {
        $semuaTugas = Tugas::all();

        return response()->json([
            'status_code' => 200,
            'pesan' => 'Berhasil mengambil semua data tugas.',
            'data' => $semuaTugas
        ], 200);
    }

    // CREATE: Menambahkan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'tenggat_waktu' => 'required|date',
        ]);

        $tugasBaru = Tugas::create([
            'nama_tugas' => $request->nama_tugas,
            'mata_kuliah' => $request->mata_kuliah,
            'tenggat_waktu' => $request->tenggat_waktu,
            'status' => false
        ]);

        return response()->json([
            'status_code' => 201,
            'pesan' => 'Tugas baru berhasil ditambahkan',
            'data' => $tugasBaru
        ], 201);
    }

    // UPDATE: Mengubah status tugas yang tadinya false (belum) menjadi true (selesai)
    public function update($id)
    {
        $tugas = Tugas::findOrFail($id);

        if (!$tugas) {
            return response()->json([
                'status_code' => 404,
                'pesan' => 'Data tugas tidak ditemukan'
            ], 404);
        }

        $tugas->status = !$tugas->status;
        $tugas->save();

        return response()->json([
            'status_code' => 200,
            'pesan' => 'Status tugas berhasil diperbarui',
            'data' => $tugas
        ], 200);
    }

    // DELETE: Menghapus tugas dari database
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);

        if (!$tugas) {
            return response()->json([
                'status_code' => 404,
                'pesan' => 'Data tugas tidak ditemukan'
            ], 404);
        }

        $tugas->delete();

        return response()->json([
            'status_code' => 200,
            'pesan' => 'Tugas telah dihapus dari database'
        ], 200);
    }
}
