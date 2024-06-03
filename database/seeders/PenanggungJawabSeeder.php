<?php

namespace Database\Seeders;

use App\Models\PenanggungJawab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenanggungJawabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penanggung_jawabs = [
            ['penanggung_jawab' => 'Kabupaten Majalengka'],
            ['penanggung_jawab' => 'Dinas Pendidikan'],
            ['penanggung_jawab' => 'Dinas Kesehatan'],
            ['penanggung_jawab' => 'Rumah Sakit Umum Daerah Cideres'],
            ['penanggung_jawab' => 'Rumah Sakit Umum Daerah Majalengka'],
            ['penanggung_jawab' => 'Dinas Pekerjaan Umum dan Tata Ruang'],
            ['penanggung_jawab' => 'Dinas Perumahan, Kawasan Permukiman dan Pertanahan'],
            ['penanggung_jawab' => 'Dinas Sosial'],
            ['penanggung_jawab' => 'Badan Penanggulangan Bencana Daerah'],
            ['penanggung_jawab' => 'Satuan Polisi Pamong Praja dan Pemadam Kebakaran'],
            ['penanggung_jawab' => 'Badan Kesatuan Bangsa dan Politik'],
            ['penanggung_jawab' => 'Dinas Perhubungan'],
            ['penanggung_jawab' => 'Dinas Lingkungan Hidup'],
            ['penanggung_jawab' => 'Dinas Kependudukan dan Pencatatan Sipil'],
            ['penanggung_jawab' => 'Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana'],
            ['penanggung_jawab' => 'Dinas Ketenagakerjaan Koperasi dan Usaha Kecil Menengah'],
            ['penanggung_jawab' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu'],
            ['penanggung_jawab' => 'Dinas Pemuda dan Olah Raga'],
            ['penanggung_jawab' => 'Dinas Ketahanan Pangan, Pertanian Dan Perikanan'],
            ['penanggung_jawab' => 'Dinas Pemberdayaan Masyarakat dan Desa'],
            ['penanggung_jawab' => 'Dinas Arsip dan Perpustakaan Daerah'],
            ['penanggung_jawab' => 'Dinas Komunikasi dan Informatika'],
            ['penanggung_jawab' => 'Dinas Pariwisata dan Kebudayaan'],
            ['penanggung_jawab' => 'Dinas Perdagangan dan Perindustrian'],
            ['penanggung_jawab' => 'Badan Keuangan dan Aset Daerah'],
            ['penanggung_jawab' => 'Badan Pendapatan Daerah'],
            ['penanggung_jawab' => 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia'],
            ['penanggung_jawab' => 'Badan Perencanaan Pembangunan Daerah Penelitian dan Pengembangan'],
            ['penanggung_jawab' => 'Sekretariat Daerah'],
            ['penanggung_jawab' => 'Sekretariat DPRD'],
            ['penanggung_jawab' => 'Inspektorat'],
            ['penanggung_jawab' => 'Kecamatan Argapura'],
            ['penanggung_jawab' => 'Kecamatan Banjaran'],
            ['penanggung_jawab' => 'Kecamatan Bantarujeg'],
            ['penanggung_jawab' => 'Kecamatan Cigasong'],
            ['penanggung_jawab' => 'Kecamatan Cikijing'],
            ['penanggung_jawab' => 'Kecamatan Cingambul'],
            ['penanggung_jawab' => 'Kecamatan Dawuan'],
            ['penanggung_jawab' => 'Kecamatan Jatitujuh'],
            ['penanggung_jawab' => 'Kecamatan Jatiwangi'],
            ['penanggung_jawab' => 'Kecamatan Kadipaten'],
            ['penanggung_jawab' => 'Kecamatan Kasokandel'],
            ['penanggung_jawab' => 'Kecamatan Lemahsugih'],
            ['penanggung_jawab' => 'Kecamatan Leuwimunding'],
            ['penanggung_jawab' => 'Kecamatan Ligung'],
            ['penanggung_jawab' => 'Kecamatan Maja'],
            ['penanggung_jawab' => 'Kecamatan Majalengka'],
            ['penanggung_jawab' => 'Kecamatan Malausma'],
            ['penanggung_jawab' => 'Kecamatan Palasah'],
            ['penanggung_jawab' => 'Kecamatan Panyingkiran'],
            ['penanggung_jawab' => 'Kecamatan Rajagaluh'],
            ['penanggung_jawab' => 'Kecamatan Sindang'],
            ['penanggung_jawab' => 'Kecamatan Sindangwangi'],
            ['penanggung_jawab' => 'Kecamatan Sukahaji'],
            ['penanggung_jawab' => 'Kecamatan Sumberjaya'],
            ['penanggung_jawab' => 'Kecamatan Talaga'],
            ['penanggung_jawab' => 'Kecamatan Kertajati'],
        ];

        foreach ($penanggung_jawabs as $penanggung_jawab) {
            PenanggungJawab::create($penanggung_jawab);
        };
    }
}
