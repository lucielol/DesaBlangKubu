<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resident;
use Faker\Factory as Faker;

class ResidentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 50) as $i) {
            Resident::create([
                'nik' => $faker->unique()->numerify('################'),
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2005-12-31'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'pekerjaan' => $faker->jobTitle,
                'pendidikan' => $faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),

                'alamat' => $faker->address,
                'rt' => str_pad($faker->numberBetween(1, 10), 3, '0', STR_PAD_LEFT),
                'rw' => str_pad($faker->numberBetween(1, 10), 3, '0', STR_PAD_LEFT),
                'desa' => $faker->streetName,
                'kecamatan' => $faker->city,
                'kabupaten' => $faker->city,
                'provinsi' => $faker->state,
                'kode_pos' => $faker->postcode,

                'kewarganegaraan' => $faker->randomElement(['WNI', 'WNA']),
                'no_kk' => $faker->numerify('################'),
                'status_hubungan_keluarga' => $faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak', 'Famili']),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'is_deceased' => $faker->boolean(5),
            ]);
        }
    }
}
