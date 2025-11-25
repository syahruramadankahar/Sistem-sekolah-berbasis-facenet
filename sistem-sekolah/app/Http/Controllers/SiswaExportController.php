<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class SiswaExportController extends Controller
{
    public function exportExcel()
    {
        $filename = "laporan_data_siswa_" . date('Y-m-d_H-i-s') . ".csv";

        $siswa = Siswa::with(['user', 'kelas'])
            ->orderBy('kelas_id')
            ->orderBy('nama')
            ->get();

        $totalSiswa = $siswa->count();
        $tanggalCetak = now()->translatedFormat('d F Y H:i');
        $waktuCetak = now()->translatedFormat('H:i:s');

        header('Content-Type: text/csv; charset=UTF-8');
        header("Content-Disposition: attachment; filename={$filename}");
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        $output = fopen('php://output', 'w');
        fwrite($output, "\xEF\xBB\xBF"); // BOM untuk UTF-8

        // ==================== HEADER LAPORAN ====================
        $this->writeEmptyLine($output);
        $this->writeCenteredLine($output, "LAPORAN DATA SISWA");
        $this->writeCenteredLine($output, "SISTEM INFORMASI SEKOLAH");
        $this->writeEmptyLine($output);
        
        // ==================== INFORMASI META DATA ====================
        $this->writeMetadataLine($output, "TANGGAL CETAK", $tanggalCetak);
        $this->writeMetadataLine($output, "WAKTU CETAK", $waktuCetak);
        $this->writeMetadataLine($output, "TOTAL SISWA", $totalSiswa . " ORANG");
        $this->writeMetadataLine($output, "JENIS LAPORAN", "DATA SISWA LENGKAP");
        $this->writeEmptyLine($output);
        $this->writeSeparatorLine($output, "=");

        // ==================== HEADER TABEL ====================
        $header = [
            'NO. URUT', 
            'NOMOR INDUK SISWA (NIS)', 
            'NAMA LENGKAP', 
            'ALAMAT EMAIL', 
            'PROGRAM JURUSAN', 
            'KELAS', 
            'ALAMAT TEMPAT TINGGAL'
        ];
        fputcsv($output, $header, ';');
        $this->writeSeparatorLine($output, "-");

        // ==================== DATA SISWA ====================
        $counter = 1;
        foreach ($siswa as $item) {
            $rowData = [
                $this->formatNumber($counter++),
                $this->formatNIS($item->nis),
                $this->formatNama($item->nama),
                $this->formatEmail($item->user->email ?? 'EMAIL TIDAK TERSEDIA'),
                $this->formatJurusan($item->jurusan),
                $this->formatKelas($item->kelas->nama_kelas ?? 'KELAS TIDAK TERSEDIA'),
                $this->formatAlamat($item->alamat ?? 'ALAMAT TIDAK TERSEDIA')
            ];
            
            fputcsv($output, $rowData, ';');
        }

        // ==================== FOOTER & SUMMARY ====================
        $this->writeSeparatorLine($output, "=");
        $this->writeEmptyLine($output);
        
        // Summary Statistik
        $this->writeCenteredLine($output, "STATISTIK DATA SISWA");
        $this->writeEmptyLine($output);
        
        // Summary per Jurusan
        $summaryJurusan = $siswa->groupBy('jurusan')->map->count();
        $this->writeSummaryHeader($output, "DISTRIBUSI JURUSAN");
        foreach ($summaryJurusan as $jurusan => $count) {
            $this->writeSummaryLine($output, $jurusan, $count . " siswa");
        }
        
        $this->writeEmptyLine($output);
        
        // Summary per Kelas
        $summaryKelas = $siswa->groupBy(function($item) {
            return $item->kelas->nama_kelas ?? 'TANPA KELAS';
        })->map->count();
        
        $this->writeSummaryHeader($output, "DISTRIBUSI KELAS");
        foreach ($summaryKelas as $kelas => $count) {
            $this->writeSummaryLine($output, $kelas, $count . " siswa");
        }

        $this->writeEmptyLine($output);
        $this->writeSeparatorLine($output, "=");
        
        // ==================== RINGKASAN AKHIR ====================
        $this->writeEmptyLine($output);
        $this->writeCenteredLine($output, "RINGKASAN AKHIR");
        $this->writeMetadataLine($output, "TOTAL SELURUH SISWA", $totalSiswa . " ORANG");
        $this->writeMetadataLine($output, "JUMLAH JURUSAN", $summaryJurusan->count() . " JURUSAN");
        $this->writeMetadataLine($output, "JUMLAH KELAS", $summaryKelas->count() . " KELAS");
        $this->writeEmptyLine($output);

        // ==================== FOOTER DOKUMEN ====================
        $this->writeSeparatorLine($output, "=");
        $this->writeCenteredLine($output, "DOKUMEN RESMI SISTEM INFORMASI SEKOLAH");
        $this->writeCenteredLine($output, "Laporan dihasilkan secara otomatis pada " . now()->translatedFormat('d F Y'));
        $this->writeCenteredLine($output, "Hak Cipta © " . date('Y') . " - Sistem Informasi Sekolah");
        $this->writeEmptyLine($output);

        fclose($output);
        exit;
    }

    /**
     * ==================== HELPER METHODS ====================
     */

    private function writeMetadataLine($output, $label, $value)
    {
        fputcsv($output, [$label . ":", $value], ';');
    }

    private function writeCenteredLine($output, $text)
    {
        fputcsv($output, [$text], ';');
    }

    private function writeEmptyLine($output)
    {
        fputcsv($output, [''], ';');
    }

    private function writeSeparatorLine($output, $char = "-")
    {
        $separator = str_repeat($char, 80);
        fputcsv($output, [$separator], ';');
    }

    private function writeSummaryHeader($output, $title)
    {
        fputcsv($output, [$title], ';');
    }

    private function writeSummaryLine($output, $item, $value)
    {
        fputcsv($output, ["  " . $item, $value], ';');
    }

    /**
     * ==================== FORMATTING METHODS ====================
     */

    private function formatNumber($number)
    {
        return str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    private function formatNIS($nis)
    {
        return "'" . $nis; // Tambah apostrof untuk jaga format NIS
    }

    private function formatNama($nama)
    {
        return mb_convert_case(trim($nama), MB_CASE_TITLE, "UTF-8");
    }

    private function formatEmail($email)
    {
        return strtolower(trim($email));
    }

    private function formatJurusan($jurusan)
    {
        return mb_convert_case(trim($jurusan), MB_CASE_UPPER, "UTF-8");
    }

    private function formatKelas($kelas)
    {
        return mb_convert_case(trim($kelas), MB_CASE_UPPER, "UTF-8");
    }

    private function formatAlamat($alamat)
    {
        $alamat = trim($alamat);
        if (strlen($alamat) > 60) {
            $alamat = substr($alamat, 0, 57) . '...';
        }
        return $alamat;
    }

    /**
     * ==================== METHOD ALTERNATIF UNTUK EKSPOR RINGKAS ====================
     */
    public function exportExcelSimple()
    {
        $filename = "data_siswa_ringkas_" . date('Y-m-d_H-i-s') . ".csv";

        $siswa = Siswa::with(['user', 'kelas'])
            ->orderBy('kelas_id')
            ->orderBy('nama')
            ->get();

        header('Content-Type: text/csv; charset=UTF-8');
        header("Content-Disposition: attachment; filename={$filename}");
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        $output = fopen('php://output', 'w');
        fwrite($output, "\xEF\xBB\xBF");

        // Header Ringkas
        fputcsv($output, ['LAPORAN DATA SISWA'], ';');
        fputcsv($output, ['Tanggal: ' . now()->translatedFormat('d F Y H:i')], ';');
        fputcsv($output, [''], ';');
        
        // Header Tabel
        fputcsv($output, [
            'No', 
            'NIS', 
            'Nama Siswa', 
            'Email', 
            'Jurusan', 
            'Kelas', 
            'Alamat'
        ], ';');

        // Data
        $counter = 1;
        foreach ($siswa as $item) {
            fputcsv($output, [
                $counter++,
                $item->nis,
                $item->nama,
                $item->user->email ?? '-',
                $item->jurusan,
                $item->kelas->nama_kelas ?? '-',
                $item->alamat ?? '-'
            ], ';');
        }

        // Footer Ringkas
        fputcsv($output, [''], ';');
        fputcsv($output, ['Total: ' . $siswa->count() . ' siswa'], ';');
        fputcsv($output, ['Selesai: ' . now()->translatedFormat('H:i:s')], ';');

        fclose($output);
        exit;
    }

    // EXPORT PDF
    public function exportPdf()
    {
        $siswa = Siswa::with(['user', 'kelas'])
            ->orderBy('kelas_id')
            ->orderBy('nama')
            ->get();

        $data = [
            'siswa' => $siswa,
            'tanggal' => now()->translatedFormat('d F Y H:i'),
            'jumlah' => $siswa->count()
        ];

        $pdf = Pdf::loadView('admin.siswa.pdf', $data)
                    ->setPaper('a4', 'portrait')
                    ->setOption('defaultFont', 'Arial')
                    ->setOption('isHtml5ParserEnabled', true)
                    ->setOption('isRemoteEnabled', true);

        return $pdf->download('data_siswa_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}