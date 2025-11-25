<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    // Data yang diambil dari tabel
    public function collection()
    {
        return Siswa::with(['user', 'kelas'])->get();
    }

    // Heading Excel
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'NIS',
            'Jurusan',
            'Kelas',
            'Alamat',
            'Tanggal Dibuat',
        ];
    }

    // Mapping tiap baris
    public function map($siswa): array
    {
        return [
            $siswa->id,
            $siswa->nama,
            $siswa->user->email ?? '-',
            $siswa->nis,
            $siswa->jurusan,
            $siswa->kelas->nama_kelas ?? '-',
            $siswa->alamat,
            $siswa->created_at->format('d/m/Y'),
        ];
    }
}
