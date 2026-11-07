<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Krskhs;
use App\Models\Registrasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrskhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = Jadwal::with(['dosen', 'matakuliah'])->get();

        return view('krskhs.create', compact('jadwal'));
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
    public function show(Krskhs $krskhs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Krskhs $krskhs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Krskhs $krskhs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Krskhs $krskhs)
    {
        //
    }

    public function pdf()
    {
        $nim = Auth::user()->nim;

        // Mengambil data registrasi yang sama dengan logika index
        $registrasi = Registrasi::where('nim', $nim)->firstOrFail();

        // Mengambil data KrsKhs dengan relasi yang sama
        $krskhs = Krskhs::with([
            'jadwal.matakuliah',
            'jadwal.dosen',
        ])
            ->where('noReg', $registrasi->noReg)
            ->get();
        // Render ke view 'registrasi.pdf'
        $pdf = Pdf::loadView('krskhs.pdf', compact('registrasi', 'krskhs'))->setPaper('a4', 'landscape');

        // Menampilkan PDF di browser
        return $pdf->stream('KRS_'.$registrasi->nim.'.pdf');
    }
}
