
@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')

<h2>Tambah Jadwal Latihan</h2>
<p>Silakan isi formulir untuk menambahkan jadwal kegiatan baru.</p>

<form action="{{ route('jadwal-latihan.store') }}" method="POST">
    @csrf

    <label>Kode Jadwal</label>
    <input type="text" name="kode"
           value="{{ old('kode') }}"
           placeholder="Contoh: JL001" required>
    @error('kode')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Nama Kegiatan</label>
    <input type="text" name="nama_kegiatan"
           value="{{ old('nama_kegiatan') }}"
           placeholder="Contoh: Latihan Vokal Rutin" required>
    @error('nama_kegiatan')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Kategori</label>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Latihan Rutin" {{ old('kategori') == 'Latihan Rutin' ? 'selected' : '' }}>Latihan Rutin</option>
        <option value="Latihan Gabungan" {{ old('kategori') == 'Latihan Gabungan' ? 'selected' : '' }}>Latihan Gabungan</option>
        <option value="Persiapan Lomba" {{ old('kategori') == 'Persiapan Lomba' ? 'selected' : '' }}>Persiapan Lomba</option>
        <option value="Penampilan" {{ old('kategori') == 'Penampilan' ? 'selected' : '' }}>Penampilan</option>
    </select>
    @error('kategori')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Tanggal</label>
    <input type="date" name="tanggal"
           value="{{ old('tanggal') }}" required>
    @error('tanggal')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Waktu</label>
    <input type="time" name="waktu"
           value="{{ old('waktu') }}" required>
    @error('waktu')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Lokasi</label>
    <input type="text" name="lokasi"
           value="{{ old('lokasi') }}"
           placeholder="Contoh: Aula Kampus" required>
    @error('lokasi')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Materi Lagu</label>
    <input type="text" name="materi_lagu"
           value="{{ old('materi_lagu') }}"
           placeholder="Contoh: Lagu Indonesia Raya" required>
    @error('materi_lagu')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Pelatih</label>
    <input type="text" name="pelatih"
           value="{{ old('pelatih') }}"
           placeholder="Nama pelatih" required>
    @error('pelatih')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Jumlah Peserta</label>
    <input type="number" name="jumlah"
           value="{{ old('jumlah') }}"
           min="1" placeholder="Jumlah peserta" required>
    @error('jumlah')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Kondisi Jadwal</label>
    <select name="kondisi" required>
        <option value="">-- Pilih Kondisi --</option>
        @foreach(['Terjadwal', 'Selesai', 'Ditunda', 'Dibatalkan'] as $kondisi)
            <option value="{{ $kondisi }}"
                {{ old('kondisi') == $kondisi ? 'selected' : '' }}>
                {{ $kondisi }}
            </option>
        @endforeach
    </select>
    @error('kondisi')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Keterangan</label>
    <textarea name="keterangan" rows="4"
              placeholder="Keterangan tambahan">{{ old('keterangan') }}</textarea>
    @error('keterangan')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan Jadwal</button>
    <a href="{{ route('jadwal-latihan.index') }}" class="btn">Kembali</a>
</form>

@endsection
