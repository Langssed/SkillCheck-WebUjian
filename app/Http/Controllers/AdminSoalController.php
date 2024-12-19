<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Soal;
use Illuminate\Http\Request;

class AdminSoalController extends Controller
{
    // Fungsi untuk menampilkan halaman daftar soal
    public function index()
    {
        // Ambil semua data soal dengan relasi ke tabel mapel
        $soal = Soal::with('mapel')
                    ->orderBy('mapel_id') // Urutkan berdasarkan mapel_id
                    ->get();
        
        // Kirim data ke view
        return view('admin.soal.index', compact('soal'));
    }

    // Fungsi untuk menampilkan form tambah soal
    public function create()
    {
        // Ambil semua mata pelajaran
        $mapel = Mapel::all();

        if ($mapel->isEmpty()) {
            // Jika tidak ada mata pelajaran, alihkan ke halaman lain atau tampilkan pesan error
            return redirect()->route('admin.soal.index')->with('error', 'Mata Pelajaran tidak ditemukan');
        }

        // Kirim data ke view
        return view('admin.soal.create', compact('mapel'));
    }   
    

    // Fungsi untuk menyimpan soal baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mapel_id' => 'required|exists:mapel,id',
            'question' => 'required|string|max:1000', 
            'options' => 'required|array|min:4|max:4', 
            'correct_answer' => 'required|integer|min:1|max:4', // Indeks 1-based dari form
        ]);

        // Konversi array options ke JSON
        $options = json_encode($request->options);

        // Simpan soal baru dengan penyesuaian correct_answer
        Soal::create([
            'mapel_id' => $request->mapel_id,
            'question' => $request->question,
            'options' => $options,
            'correct_answer' => $request->correct_answer - 1, // Penyesuaian ke 0-based
        ]);

        // Redirect ke halaman daftar soal dengan pesan sukses
        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil ditambahkan');
    }



    // Fungsi untuk menampilkan form edit soal
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        return view('admin.soal.edit', compact('soal'));
    }

    // Fungsi untuk memperbarui data soal
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'options.*' => 'required|string',
            'correct_answer' => 'required|integer|in:1,2,3,4', // Masih menggunakan angka 1-4 dari form
        ]);

        $soal = Soal::findOrFail($id);
        $soal->question = $request->question;
        $soal->options = json_encode($request->options);

        // Sesuaikan correct_answer untuk array 0-based
        $soal->correct_answer = $request->correct_answer - 1;

        $soal->save();

        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil diperbarui.');
    }


    // Fungsi untuk menghapus soal
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->route('admin.soal.index')->with('success', 'Soal berhasil dihapus');
    }
}