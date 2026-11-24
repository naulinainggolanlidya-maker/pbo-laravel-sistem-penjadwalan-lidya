
@extends('layouts.app')

@section('title', 'Daftar Jadwal')

@section('content')

<h2>Daftar Jadwal Latihan</h2>

<p>Kelola seluruh jadwal kegiatan UKM Paduan Suara.</p>

<a href="{{ route('jadwal-latihan.create') }}" class="btn">
    + Tambah Jadwal
</a>

@if(count($jadwalLatihan) > 0)

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kegiatan</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($jadwalLatihan as $jadwal)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jadwal['kode'] }}</td>
            <td>{{ $jadwal['nama_kegiatan'] }}</td>
            <td>{{ $jadwal['kategori'] }}</td>
            <td>{{ $jadwal['tanggal'] }}</td>
            <td>{{ $jadwal['lokasi'] }}</td>
            <td>{{ $jadwal['jumlah'] }}</td>
            <td>{{ $jadwal['kondisi'] }}</td>
            <td>
                <a href="{{ route('jadwal-latihan.show', $jadwal['kode']) }}">
                    Detail
                </a>

                |

                <a href="{{ route('jadwal-latihan.edit', $jadwal['kode']) }}">
                    Edit
                </a>

                |

                <form action="{{ route('jadwal-latihan.destroy', $jadwal['kode']) }}"
                      method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else

<p>Belum ada data jadwal latihan. Silakan tambahkan jadwal baru.</p>

@endif

@endsection
