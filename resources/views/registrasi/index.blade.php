<div class="card-header">
    @if (auth()->user()->role == 'mahasiswa')
        <a href="{{ route('registrasi.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i>
            Tambah Registrasi
        </a>
    @else
        <span class="badge bg-secondary">Mode Lihat Data [{{ auth()->user()->role }}]</span>
    @endif
</div>

@extends('main.app')
@section('title', '.:Registrasi:.')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('krskhs.pdf') }}" target="_blank" class="btn btnprimary">
                Print KRS
            </a>
            <a href="{{ route('krskhs.create') }}" class="btn btn-success">
                Tambah Jadwal
            </a>
        </div>
        <div class="card-body p-4">
            <p>
                No. Reg : {{ $registrasi->noReg }} <br>
                NIM : {{ $registrasi->nim }} <br>
                {{-- Nama Mahasiswa : {{ $registrasi->mahasiswas->nama }} --}}
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Grup</th>
                        <th>Nama Dosen</th>
                        <th>Ruang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($krskhs as $j)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $j->jadwal->hari }}</td>
                            <td class="text-center">{{ $j->jadwal->waktu }}</td>
                            <td>{{ $j->jadwal->matakuliah->namaMk }}</td>
                            <td class="text-center">{{ $j->jadwal->matakuliah > sks }}</td>
                            <td class="text-center">{{ $j->jadwal->grup }}</td>
                            <td>{{ $j->jadwal->dosen->namaDosen }}</td>
                            <td>{{ $j->jadwal->ruang }}</td>
                            <td class="text-center">
                                <form action="{{ route('krskhs.destroy', $j->idKrs) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dangerbtn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada data
                                jadwal.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
