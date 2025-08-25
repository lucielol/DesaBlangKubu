<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use Carbon\Carbon;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data penduduk
        $residents = Resident::all();

        // Statistik Utama
        $totalPenduduk = $residents->count();
        $kepalaKeluarga = $residents->where('status_hubungan_keluarga', 'Kepala Keluarga')->count();
        $lakiLaki = $residents->where('jenis_kelamin', 'L')->count();
        $perempuan = $residents->where('jenis_kelamin', 'P')->count();

        // Kelompok Umur
        $kelompokUmur = $this->hitungKelompokUmur($residents);

        // Berdasarkan Dusun (menggunakan RT sebagai dusun)
        $berdasarkanDusun = $this->hitungBerdasarkanDusun($residents);

        // Berdasarkan Pendidikan
        $berdasarkanPendidikan = $this->hitungBerdasarkanPendidikan($residents);

        // Berdasarkan Pekerjaan
        $berdasarkanPekerjaan = $this->hitungBerdasarkanPekerjaan($residents);

        // Berdasarkan Agama
        $berdasarkanAgama = $this->hitungBerdasarkanAgama($residents);

        // Berdasarkan Perkawinan
        $berdasarkanPerkawinan = $this->hitungBerdasarkanPerkawinan($residents);

        return view('pages.home.infografis', compact(
            'totalPenduduk',
            'kepalaKeluarga',
            'lakiLaki',
            'perempuan',
            'kelompokUmur',
            'berdasarkanDusun',
            'berdasarkanPendidikan',
            'berdasarkanPekerjaan',
            'berdasarkanAgama',
            'berdasarkanPerkawinan'
        ));
    }

    /**
     * Hitung kelompok umur
     */
    private function hitungKelompokUmur($residents)
    {
        $kelompokUmur = [
            '0-4' => 0,
            '5-9' => 0,
            '10-14' => 0,
            '15-19' => 0,
            '20-64' => 0,
            '65+' => 0
        ];

        foreach ($residents as $resident) {
            if ($resident->tanggal_lahir) {
                $umur = Carbon::parse($resident->tanggal_lahir)->age;

                if ($umur >= 0 && $umur <= 4) {
                    $kelompokUmur['0-4']++;
                } elseif ($umur >= 5 && $umur <= 9) {
                    $kelompokUmur['5-9']++;
                } elseif ($umur >= 10 && $umur <= 14) {
                    $kelompokUmur['10-14']++;
                } elseif ($umur >= 15 && $umur <= 19) {
                    $kelompokUmur['15-19']++;
                } elseif ($umur >= 20 && $umur <= 64) {
                    $kelompokUmur['20-64']++;
                } else {
                    $kelompokUmur['65+']++;
                }
            }
        }

        return $kelompokUmur;
    }

    /**
     * Hitung berdasarkan dusun (RT)
     */
    private function hitungBerdasarkanDusun($residents)
    {
        return $residents->groupBy('rt')
            ->map(function ($group) {
                return $group->count();
            })
            ->sortKeys()
            ->toArray();
    }

    /**
     * Hitung berdasarkan pendidikan
     */
    private function hitungBerdasarkanPendidikan($residents)
    {
        return $residents->groupBy('pendidikan')
            ->map(function ($group) {
                return $group->count();
            })
            ->sortKeys()
            ->toArray();
    }

    /**
     * Hitung berdasarkan pekerjaan
     */
    private function hitungBerdasarkanPekerjaan($residents)
    {
        $pekerjaanUmum = [
            'Petani',
            'Pedagang',
            'PNS',
            'Swasta',
            'Wiraswasta',
            'Pelajar/Mahasiswa',
            'Guru',
            'Dokter',
            'Perawat',
            'Polisi',
            'TNI',
            'Sopir',
            'Tukang',
            'Buruh',
            'Nelayan',
            'Peternak',
            'Pensiunan',
            'Petani/Pekebun',
            'Pedagang Kecil',
            'Pedagang Besar',
            'Karyawan Swasta',
            'Karyawan BUMN',
            'Wirausaha',
            'Mahasiswa',
            'Pelajar',
            'Dosen',
            'Bidan',
            'Perawat',
            'Tentara',
            'Anggota TNI',
            'Anggota Polri',
            'Supir',
            'Tukang Kayu',
            'Tukang Batu',
            'Tukang Jahit',
            'Buruh Tani',
            'Buruh Pabrik',
            'Buruh Bangunan',
            'Nelayan',
            'Peternak',
            'Pensiunan PNS',
            'Pensiunan Swasta'
        ];

        $pekerjaanData = [];
        $lainnya = 0;

        foreach ($residents as $resident) {
            $pekerjaan = trim($resident->pekerjaan); // Hapus spasi di awal/akhir

            if (empty($pekerjaan)) {
                $lainnya++;
                continue;
            }

            $cocok = false;
            foreach ($pekerjaanUmum as $umum) {
                if (stripos($pekerjaan, $umum) !== false || stripos($umum, $pekerjaan) !== false) {
                    if (!isset($pekerjaanData[$umum])) {
                        $pekerjaanData[$umum] = 0;
                    }
                    $pekerjaanData[$umum]++;
                    $cocok = true;
                    break;
                }
            }

            if (!$cocok) {
                $lainnya++;
            }
        }

        // Urutkan berdasarkan jumlah (descending) kecuali "Lainnya"
        arsort($pekerjaanData);

        // Tambahkan "Lainnya" di akhir jika ada
        if ($lainnya > 0) {
            $pekerjaanData['Lainnya'] = $lainnya;
        }

        return $pekerjaanData;
    }

    /**
     * Hitung berdasarkan agama
     */
    private function hitungBerdasarkanAgama($residents)
    {
        return $residents->groupBy('agama')
            ->map(function ($group) {
                return $group->count();
            })
            ->sortKeys()
            ->toArray();
    }

    /**
     * Hitung berdasarkan status perkawinan
     */
    private function hitungBerdasarkanPerkawinan($residents)
    {
        return $residents->groupBy('status_perkawinan')
            ->map(function ($group) {
                return $group->count();
            })
            ->sortKeys()
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
