<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\KrsKhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nim = Auth::user()->nim; // <-- user yang Log In
        $registrasi = Registrasi::where('nim', $nim)
            ->first(); // <-- apa sdh Registrasi
        // Jika belum registrasi, buat baris Registrasi
        if (! $registrasi) {
            $registrasi = Registrasi::create([
                'tanggal' => now(),
                'nim' => $nim,
            ]);
        }
        $noReg = $registrasi->noReg; // <-- cacat noReg nya
        session(['noReg' => $noReg]); // <-- Simpan ke session
        $krskhs = KrsKhs::with([ // <-- baca semua data registrasi
            'jadwal.matakuliah',
            'jadwal.dosen',
        ])
            ->where('noReg', $noReg) // <-- berdasarkan noReg
            ->get();

        // Kirim ke View untuk ditampilkan
        return view('registrasi.index', compact('registrasi', 'krskhs'));
        // $data = \App\Models\Registrasi::with(['mahasiswa'])->get();
        // return view('registrasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrasi $registrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrasi $registrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrasi $registrasi)
    {
        //
    }
}
