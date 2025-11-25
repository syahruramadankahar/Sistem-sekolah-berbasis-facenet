@extends('layouts.app')

@section('content')

<div class="page-inner">
    <h3 class="fw-bold mb-3">Riwayat Absensi</h3>
    <p class="text-muted mb-4">Berikut adalah riwayat absensi Anda.</p>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th width="20%">Tanggal</th>
                            <th width="15%">Status</th>
                            <th width="25%">Foto Bukti</th>
                            <th width="20%">Waktu</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($absensi as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>

                                <td>
                                    @if($item->status == 'hadir')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($item->status == 'izin')
                                        <span class="badge bg-warning text-dark">Izin</span>
                                    @else
                                        <span class="badge bg-danger">Alpha</span>
                                    @endif
                                </td>

                                <td>
                                    @if($item->foto_bukti)
                                        <a href="{{ asset('storage/foto_absensi/' . $item->foto_bukti) }}" 
                                           class="btn btn-sm btn-outline-primary"
                                           target="_blank">
                                           Lihat Foto
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada data absensi.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
