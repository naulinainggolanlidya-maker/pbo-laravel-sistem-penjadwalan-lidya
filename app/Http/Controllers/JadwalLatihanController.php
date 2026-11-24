<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller as BaseController;

class JadwalLatihanController extends BaseController
{
    private const SESSION_KEY = 'jadwal_latihan';

    // 1. Menampilkan seluruh jadwal
    public function index()
    {
        $jadwalLatihan = session(self::SESSION_KEY, []);

        return view('jadwal.index', compact('jadwalLatihan'));
    }

    // 2. Menampilkan form tambah
    public function create()
    {
        return view('jadwal.create');
    }

    // 3. Menyimpan jadwal baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::notIn(
                    array_keys(session(self::SESSION_KEY, []))
                ),
            ],
            'nama_kegiatan' => 'required|string|max:100',
            'kategori' => 'required|string|max:60',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:150',
            'materi_lagu' => 'required|string|max:150',
            'pelatih' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Terjadwal,Selesai,Ditunda,Dibatalkan',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $jadwal = session(self::SESSION_KEY, []);

        $jadwal[$validated['kode']] = $validated;

        session([self::SESSION_KEY => $jadwal]);

        return redirect()
            ->route('jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil ditambahkan.');
    }

    // 4. Menampilkan detail jadwal
    public function show(string $kode)
    {
        $jadwal = $this->ambilJadwal($kode);

        return view('jadwal.show', compact('jadwal'));
    }

    // 5. Menampilkan form edit
    public function edit(string $kode)
    {
        $jadwal = $this->ambilJadwal($kode);

        return view('jadwal.edit', compact('jadwal'));
    }

    // 6. Memperbarui jadwal
    public function update(Request $request, string $kode)
    {
        $data = session(self::SESSION_KEY, []);

        $this->pastikanKodeAda($data, $kode);

        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'kategori' => 'required|string|max:60',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:150',
            'materi_lagu' => 'required|string|max:150',
            'pelatih' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Terjadwal,Selesai,Ditunda,Dibatalkan',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $data[$kode] = array_merge(
            $data[$kode],
            $validated,
            ['kode' => $kode]
        );

        session([self::SESSION_KEY => $data]);

        return redirect()
            ->route('jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil diperbarui.');
    }

    // 7. Menghapus jadwal
    public function destroy(string $kode)
    {
        $data = session(self::SESSION_KEY, []);

        $this->pastikanKodeAda($data, $kode);

        unset($data[$kode]);

        session([self::SESSION_KEY => $data]);

        return redirect()
            ->route('jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil dihapus.');
    }

    // Mengambil satu jadwal berdasarkan kode
    private function ambilJadwal(string $kode): array
    {
        $data = session(self::SESSION_KEY, []);

        $this->pastikanKodeAda($data, $kode);

        return $data[$kode];
    }

    // Memastikan kode jadwal tersedia
    private function pastikanKodeAda(array $data, string $kode): void
    {
        abort_unless(
            isset($data[$kode]),
            404,
            'Jadwal latihan tidak ditemukan.'
        );
    }
}
