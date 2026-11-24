
@extends('layouts.app')

@section('title', 'Detail Jadwal')

@section('content')

<h2>Detail Jadwal Latihan</h2>
<p>Informasi lengkap kegiatan UKM Paduan Suara.</p>

<table>
    <tr>
        <th width="30%">Kode Jadwal</th>
        <td>{{ $jadwal['kode'] }}</td>
    </tr>
    <tr>
        <th>Nama Kegiatan</th>
        <td>{{ $jadwal['nama_kegiatan'] }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $jadwal['kategori'] }}</td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td>{{ $jadwal['tanggal'] }}</td>
    </tr>
    <tr>
        <th>Waktu</th>
        <td>{{ $jadwal['waktu'] }}</td>
    </tr>
    <tr>
        <th>Lokasi</th>
        <td>{{ $jadwal['lokasi'] }}</td>
    </tr>
    <tr>
        <th>Materi Lagu</th>
        <td>{{ $jadwal['materi_lagu'] }}</td>
    </tr>
    <tr>
        <th>Pelatih</th>
        <td>{{ $jadwal['pelatih'] }}</td>
    </tr>
    <tr>
        <th>Jumlah Peserta</th>
        <td>{{ $jadwal['jumlah'] }} orang</td>
    </tr>
    <tr>
        <th>Kondisi</th>
        <td>{{ $jadwal['kondisi'] }}</td>
    </tr>
    <tr>
        <th>Keterangan</th>
        <td>{{ $jadwal['keterangan'] ?: '-' }}</td>
    </tr>
</table>

<br>

<a href="{{ route('jadwal-latihan.edit', $jadwal['kode']) }}"
   class="btn">Edit Jadwal</a>

<a href="{{ route('jadwal-latihan.index') }}"
   class="btn">Kembali</a>

@endsection
