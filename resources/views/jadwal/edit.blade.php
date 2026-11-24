
@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')

<h2>Edit Jadwal Latihan</h2>
<p>Ubah informasi jadwal latihan sesuai kebutuhan.</p>

<form action="{{ route('jadwal-latihan.update', $jadwal['kode']) }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Kode Jadwal</label>
    <input type="text" value="{{ $jadwal['kode'] }}" disabled>

    <label>Nama Kegiatan</label>
    <input type="text" name="nama_kegiatan"
           value="{{ old('nama_kegiatan', $jadwal['nama_kegiatan']) }}" required>
    @error('nama_kegiatan')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Kategori</label>
    <select name="kategori" required>
        @foreach(['Latihan Rutin', 'Latihan Gabungan', 'Persiapan Lomba', 'Penampilan'] as $kategori)
            <option value="{{ $kategori }}"
                {{ old('kategori', $jadwal['kategori']) == $kategori ? 'selected' : '' }}>
                {{ $kategori }}
            </option>
        @endforeach
    </select>
    @error('kategori')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Tanggal</label>
    <input type="date" name="tanggal"
           value="{{ old('tanggal', $jadwal['tanggal']) }}" required>
    @error('tanggal')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Waktu</label>
    <input type="time" name="waktu"
           value="{{ old('waktu', $jadwal['waktu']) }}" required>
    @error('waktu')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Lokasi</label>
    <input type="text" name="lokasi"
           value="{{ old('lokasi', $jadwal['lokasi']) }}" required>
    @error('lokasi')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Materi Lagu</label>
    <input type="text" name="materi_lagu"
           value="{{ old('materi_lagu', $jadwal['materi_lagu']) }}" required>
    @error('materi_lagu')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Pelatih</label>
    <input type="text" name="pelatih"
           value="{{ old('pelatih', $jadwal['pelatih']) }}" required>
    @error('pelatih')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Jumlah Peserta</label>
    <input type="number" name="jumlah"
           value="{{ old('jumlah', $jadwal['jumlah']) }}"
           min="1" required>
    @error('jumlah')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Kondisi Jadwal</label>
    <select name="kondisi" required>
        @foreach(['Terjadwal', 'Selesai', 'Ditunda', 'Dibatalkan'] as $kondisi)
            <option value="{{ $kondisi }}"
                {{ old('kondisi', $jadwal['kondisi']) == $kondisi ? 'selected' : '' }}>
                {{ $kondisi }}
            </option>
        @endforeach
    </select>
    @error('kondisi')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Keterangan</label>
    <textarea name="keterangan" rows="4">{{ old('keterangan', $jadwal['keterangan'] ?? '') }}</textarea>
    @error('keterangan')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan Perubahan</button>

    <a href="{{ route('jadwal-latihan.index') }}" class="btn">
        Batal
    </a>

</form>

@endsection
