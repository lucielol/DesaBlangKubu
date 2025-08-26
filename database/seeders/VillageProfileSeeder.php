<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VillageProfile::create([
            'village_name' => 'Desa Blang Kubu',
            'district' => 'Peudada',
            'regency' => 'Bireuen',
            'province' => 'Aceh',
            'vision' => 'Terwujudnya Desa Blang Kubu yang Maju, Mandiri, dan Sejahtera dengan Masyarakat yang Berakhlak Mulia, Berbudaya, dan Berwawasan Lingkungan',
            'mission' => "• Meningkatkan kualitas pendidikan dan kesehatan masyarakat\n• Mengembangkan perekonomian desa berbasis potensi lokal\n• Membangun infrastruktur desa yang berkelanjutan\n• Meningkatkan pelayanan publik yang transparan dan akuntabel\n• Melestarikan nilai-nilai budaya dan adat istiadat",
            'history' => 'Desa Blang Kubu memiliki sejarah yang panjang dan menarik. Berdasarkan cerita turun-temurun dari para tetua desa, nama "Blang Kubu" berasal dari dua kata dalam bahasa Aceh: "Blang" yang berarti sawah/ladang dan "Kubu" yang berarti benteng/pertahanan. Konon pada masa lampau, wilayah ini merupakan area persawahan yang subur dan strategis. Para petani dan penduduk setempat membangun kubu (benteng) untuk melindungi sawah dan pemukiman mereka dari serangan musuh. Seiring berjalannya waktu, kawasan ini berkembang menjadi sebuah desa yang makmur. Desa Blang Kubu secara resmi berdiri pada tahun 1920-an dan telah mengalami berbagai perubahan seiring dengan perkembangan zaman. Dari awalnya hanya beberapa keluarga, kini desa ini telah berkembang menjadi desa yang maju dengan jumlah penduduk yang terus bertambah.',
            'area_size' => '2.5 km²',
            'geographic_info' => 'Dataran rendah dengan ketinggian 5-15 meter di atas permukaan laut',
            'boundaries' => "• Utara: Desa Seunudon\n• Selatan: Desa Cot Kruet\n• Barat: Desa Blang Cut\n• Timur: Desa Meunasah Dayah",
            'topography' => 'Dataran rendah dengan ketinggian 5-15 meter di atas permukaan laut',
            'climate' => 'Tropis basah dengan curah hujan 2000-3000 mm per tahun',
            'head_village_name' => 'Ahmad Syafiq',
            'secretary_name' => 'Muhammad Rizki',
            'treasurer_name' => 'Siti Aminah',
            'bpd_chairman' => 'Abdul Rahman',
            'bpd_vice_chairman' => 'Fatimah Zahra',
            'google_maps_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7946.752966207239!2d96.577174!3d5.20337945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30474ff7f25f4faf%3A0x6219631d6c85562b!2sBlang%20Kubu%2C%20Kec.%20Peudada%2C%20Kabupaten%20Bireuen%2C%20Aceh!5e0!3m2!1sid!2sid!4v1756108848179!5m2!1sid!2sid',
        ]);
    }
}
