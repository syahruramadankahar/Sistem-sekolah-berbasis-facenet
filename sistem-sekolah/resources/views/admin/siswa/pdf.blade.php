<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Siswa</title>
    <style>
        body {
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #1f2937;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #4f46e5;
        }

        .header h1 {
            color: #4f46e5;
            margin: 0 0 8px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .header p {
            margin: 4px 0;
            color: #6b7280;
        }

        .summary {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #4f46e5;
        }

        .summary p {
            margin: 5px 0;
            font-weight: 600;
        }

        .badge {
            background: #4f46e5;
            color: white;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            font-weight: 700;
            padding: 12px 8px;
            text-align: center;
            border: none;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 10px 8px;
            border: 1px solid #e5e7eb;
            font-size: 11px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f1f5f9;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 10px;
        }

        .page-break {
            page-break-after: always;
        }

        /* Column widths matching the web version */
        .col-no { width: 5%; }
        .col-nis { width: 12%; }
        .col-nama { width: 20%; }
        .col-email { width: 20%; }
        .col-jurusan { width: 15%; }
        .col-kelas { width: 15%; }
        .col-alamat { width: 23%; }
    </style>
</head>
<body>

    <div class="header">
        <h1>LAPORAN DATA SISWA</h1>
        <p>Sistem Informasi Sekolah</p>
        <p>Tanggal Cetak: {{ $tanggal }}</p>
    </div>

    <div class="summary">
        <p>Total Data: <span class="badge">{{ $jumlah }} Siswa</span></p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-no text-center">No</th>
                <th class="col-nama text-left">Nama Lengkap</th>
                <th class="col-nis text-center">NIS</th>
                <th class="col-email text-left">Email</th>
                <th class="col-jurusan text-center">Jurusan</th>
                <th class="col-kelas text-center">Kelas</th>
                <th class="col-alamat text-left">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $key => $s)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-left"><strong>{{ $s->nama }}</strong></td>
                    <td class="text-center"><strong>{{ $s->nis }}</strong></td>
                    <td class="text-left">{{ $s->user->email ?? '-' }}</td>
                    <td class="text-center">{{ $s->jurusan }}</td>
                    <td class="text-center">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                    <td class="text-left">{{ $s->alamat ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center" style="padding: 20px;">
                        <em>Tidak ada data siswa</em>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dihasilkan oleh Sistem Informasi Sekolah &copy; {{ date('Y') }} | Halaman <span class="page-number"></span></p>
    </div>

    <script>
        // Add page numbers
        var totalPages = Math.ceil(document.querySelectorAll('tbody tr').length / 15); // Estimate pages
        document.querySelectorAll('.page-number').forEach(function(el) {
            el.textContent = '1'; // Simple page number, can be enhanced with PDF libraries
        });
    </script>

</body>
</html>