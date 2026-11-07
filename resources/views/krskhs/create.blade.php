@extends('main.app')
@section('title', '.:Registrasi:.')

@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body p-4">
            <a href="{{ route('krskhs.pdf') }}" target="_blank" class="btn btn-primary">
                Print KRS
            </a>
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
                    @forelse($jadwal as $j)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $j->hari }}</td>
                            <td class="text-center">{{ $j->waktu }}</td>
                            <td>{{ $j->matakuliah->namaMk }}</td>
                            <td class="text-center">{{ $j->matakuliah->sks }}</td>
                            <td class="text-center">{{ $j->grup }}</td>
                            <td>{{ $j->dosen->namaDosen }}</td>
                            <td>{{ $j->ruang }}</td>
                            <td class="text-center">
                                <form action="{{ route('krskhs.store') }}"method="POST">
                                    @csrf
                                    <input type="hidden" name="idJadwal" value="{{ $j->idJadwal }}">
                                    <button type="submit" class="btn btn-primarybtn-sm">Pilih</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada data jadwal.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
