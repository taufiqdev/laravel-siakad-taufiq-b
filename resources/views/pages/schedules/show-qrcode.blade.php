@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Absensi Mata Kuliah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Absensi Mata Kuliah</a></div>
                    <div class="breadcrumb-item">Show QR Code</div>
                </div>
            </div>

            <div class="section-body">
                <div class="visible-print text-center">
                    {!! QrCode::size(200)->generate($schedule->kode_absensi); !!}
                    <p>Scan me to return to Absen</p>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
