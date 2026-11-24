
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalLatihanController;

Route::get('/', function () {
    return redirect()->route('jadwal-latihan.index');
});

Route::prefix('jadwal-latihan')
    ->name('jadwal-latihan.')
    ->group(function () {

        // Menampilkan daftar jadwal
        Route::get('/', [JadwalLatihanController::class, 'index'])
            ->name('index');

        // Form tambah (statis harus sebelum {kode})
        Route::get('/create', [JadwalLatihanController::class, 'create'])
            ->name('create');

        // Menyimpan jadwal
        Route::post('/', [JadwalLatihanController::class, 'store'])
            ->name('store');

        // Detail jadwal
        Route::get('/{kode}', [JadwalLatihanController::class, 'show'])
            ->name('show');

        // Form edit
        Route::get('/{kode}/edit', [JadwalLatihanController::class, 'edit'])
            ->name('edit');

        // Memperbarui jadwal
        Route::put('/{kode}', [JadwalLatihanController::class, 'update'])
            ->name('update');

        // Menghapus jadwal
        Route::delete('/{kode}', [JadwalLatihanController::class, 'destroy'])
            ->name('destroy');
    });
