<!DOCTYPE html>
<html>

<head>
    <title>Cetak KRS</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
        }

        /* Judul Dokumen */
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #444;
            padding-bottom: 10px;
        }

        h3 {
            margin: 0;
            color: #2c3e50;
        }

        /* Info Mahasiswa */
        .info-mahasiswa {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .info-mahasiswa b {
            display: inline-block;
            width: 100px;
        }

        /* Tabel Profesional */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px;
            text-align:
                center;
            font-size: 11px;
            text-transform: uppercase;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* Zebra Striping */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Alignment */
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>KARTU RENCANA STUDI (KRS)</h3>
        <p>Tahun Akademik 2025/2026</p>
    </div>
    <div class="info-mahasiswa">
        <b>No. Reg</b> : {{ $registrasi->noReg }} <br>
        <b>NIM</b> : {{ $registrasi->nim }} <br>
        <b>Nama</b> : {{ $registrasi->mahasiswa->nama }}
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Grup</th>
                <th>Dosen</th>
                <th>Ruang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($krskhs as $j)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $j->jadwal->hari }}</td>
                    <td class="text-center">{{ $j->jadwal->waktu }}</td>
                    <td>{{ $j->jadwal->matakuliah->namaMk }}</td>
                    <td class="text-center">{{ $j->jadwal->matakuliah->sks }}</td>
                    <td class="text-center">{{ $j->jadwal->grup }}</td>
                    <td>{{ $j->jadwal->dosen->namaDosen }}</td>
                    <td>{{ $j->jadwal->ruang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
