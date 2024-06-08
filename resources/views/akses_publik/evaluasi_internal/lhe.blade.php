<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LHE Document {{ $user->name }} Tahun {{ $evaluasi->tahun }}</title>
</head>

<style>
    /* Width */
    .w-100 {
        width: 100%;
    }

    .w-80 {
        width: 80%;
    }

    .w-75 {
        width: 75%;
    }

    .w-50 {
        width: 50%;
    }

    .w-25 {
        width: 25%;
    }

    .w-20 {
        width: 20%;
    }

    /* Width */
    /* Height */
    .h-100 {
        height: 100%;
    }

    /* Height */
    /* Text */
    .text-center {
        text-align: center !important;
    }

    .text-end {
        text-align: right !important;
    }

    .text-start {
        text-align: left !important;
    }

    /* Text */
    .center {
        margin: auto;
        width: 50%;
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>

<body>
    <table style="width: 100%">
        <tr>
            <th class="w-20">
                <img class="w-100" src="https://e-sakipraharja.majalengkakab.go.id/assets/images/logo/pemkab1.png"
                    alt="img pemkab">
            </th>
            <th class="w-80">
                <h5>PEMERINTAH KABUPATEN MAJALENGKA</h5>
                <h3>INSPEKTORAT</h3>
                <h6>Jln K.H Abdul Halim No. 520 Majalengka, Jawa Barat 45413,</h6>
                <h6>Telp (0233) 281157 Laman inspektorat.majalengkakab.go.id Pos-el
                    inspektorat@majalengkakab.go.id</h6>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <hr style="border:3px solid black;">
            </th>
        </tr>
    </table>

    <p class="right">Majalengka,
        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evaluasi->created_at)->format('j F Y') }}</p>
    <p>Nomor: ………………</p>
    <p>Hal: Hasil Evaluasi Akuntabilitas Kinerja Instansi Pemerintah (AKIP) Tahun {{ $evaluasi->tahun }}</p>
    <p>Yth. Kepala Dinas {{ $user->name }}<br>di<br>Majalengka</p>

    <p>Dengan ini kami sampaikan hasil evaluasi AKIP Tahun {{ $evaluasi->tahun }} pada Dinas {{ $user->name }}, dengan
        uraian sebagai berikut:</p>

    <h3>1. Pendahuluan</h3>
    <p>Berdasarkan Peraturan Pemerintah Nomor 8 Tahun 2006 tentang Pelaporan Keuangan dan Kinerja Instansi Pemerintah
        dan Peraturan Presiden Nomor 29 Tahun 2014 tentang Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP),
        kami telah melakukan evaluasi akuntabilitas kinerja pada Dinas {{ $user->name }}. Pelaksanaan evaluasi Tahun
        {{ $evaluasi->tahun }} berpedoman
        pada Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 88 Tahun 2021 tentang
        Evaluasi Akuntabilitas Kinerja Instansi Pemerintah.</p>
    <p>Tujuan evaluasi adalah untuk mengetahui tingkat implementasi Sistem Akuntabilitas Kinerja Instansi Pemerintah
        dalam mendorong peningkatan pencapaian kinerja yang tepat sasaran dan berorientasi hasil (result oriented
        government). Secara lebih rinci, sasaran evaluasi AKIP adalah:
    <ul>
        <li>(a) memperoleh informasi mengenai implementasi SAKIP.</li>
        <li>(b) menilai tingkat implementasi SAKIP.</li>
        <li>(c) menilai tingkat akuntabilitas kinerja.</li>
        <li>(d) memberikan saran perbaikan untuk peningkatan AKIP.</li>
        <li>(e) memonitor tindak lanjut rekomendasi hasil evaluasi periode sebelumnya.</li>
    </ul>
    </p>
    <p>Ruang lingkup evaluasi akuntabilitas kinerja instansi pemerintah meliputi penilaian kualitas perencanaan kinerja,
        pengukuran kinerja berjenjang, pelaporan kinerja, evaluasi akuntabilitas kinerja internal, dan capaian kinerja
        atas output maupun outcome serta kinerja lainnya pada level Perangkat Daerah.</p>
    <p>Pelaksanaan evaluasi AKIP menggunakan kombinasi metodologi kualitatif dan kuantitatif dengan mempertimbangkan
        kepraktisan dan kemanfaatan yang disesuaikan dengan tujuan evaluasi. Langkah praktis diambil agar lebih cepat
        memberikan petunjuk untuk perbaikan implementasi SAKIP, sehingga dapat menghasilkan rekomendasi untuk
        meningkatkan akuntabilitas kinerja.</p>

    <h3>2. Hasil Evaluasi</h3>
    <p>Hasil evaluasi atas akuntabilitas kinerja Dinas {{ $user->name }}. menunjukkan bahwa nilai sebesar
        {{ $evaluasi->nilai_akuntabilitas_kinerja }} dengan
        predikat “{{ $predikat }}”.
        Hal tersebut menunjukkan bahwa implementasi akuntabilitas kinerja “{{ $predikat_name }}”, yaitu kualitas
        penerapan manajemen
        kinerja birokrasi dan penyelenggaraan pemerintahan yang berorientasi pada hasil telah menunjukkan hasil yang
        baik pada sebagian unit kerja.</p>

    <table>
        <tr>
            <th>Komponen yang dinilai</th>
            <th>Bobot</th>
            <th>Nilai {{ $evaluasi->tahun }}</th>
        </tr>
        <tr>
            <td>Perencanaan Kinerja</td>
            <td>30</td>
            <td>{{ $nilaibobot[0] }}</td>
        </tr>
        <tr>
            <td>Pengukuran Kinerja</td>
            <td>30</td>
            <td>{{ $nilaibobot[1] }}</td>
        </tr>
        <tr>
            <td>Pelaporan Kinerja</td>
            <td>15</td>
            <td>{{ $nilaibobot[2] }}</td>
        </tr>
        <tr>
            <td>Evaluasi Akuntabilitas Kinerja Internal</td>
            <td>25</td>
            <td>{{ $nilaibobot[3] }}</td>
        </tr>
        <tr>
            <td>Nilai Hasil Evaluasi</td>
            <td>100</td>
            <td>{{ $evaluasi->nilai_akuntabilitas_kinerja }}</td>
        </tr>
        <tr>
            <td>Predikat AKIP</td>
            <td></td>
            <td>{{ $predikat }}</td>
        </tr>
    </table>

    <h4>Penjelasan lebih lanjut atas hasil evaluasi akuntabilitas kinerja pada Dinas {{ $user->name }}. Tahun
        {{ $evaluasi->tahun }} sebagai berikut:
    </h4>
    <ol>
        <li>Perencanaan Kinerja<br>Catatan dari aplikasi terkait perencanaan Kinerja</li>
        <li>Pengukuran Kinerja<br>Catatan dari aplikasi terkait Pengukuran Kinerja</li>
        <li>Pelaporan Kinerja<br>Catatan dari aplikasi terkait Pelaporan Kinerja</li>
        <li>Evaluasi Internal<br>Catatan dari aplikasi terkait Evaluasi Internal</li>
    </ol>

    <h3>3. Rekomendasi</h3>
    <p>Berdasarkan uraian di atas serta dalam rangka lebih mengefektifkan penerapan akuntabilitas kinerja, kami
        merekomendasikan beberapa hal sebagai berikut:</p>
    <ol>
        <li>Gabungan rekomendasi Perencanaan Kinerja, Pengukuran Kinerja, Pelaporan Kinerja dan Evaluasi Internal</li>
        <li>dst.</li>
    </ol>

    <p>Demikian disampaikan hasil evaluasi AKIP sebagai penerapan manajemen kinerja. Kami menghargai upaya yang telah
        dilakukan dalam implementasi SAKIP di Dinan {{ $user->name }}. Terhadap hasil evaluasi yang telah
        disampaikan, Kami
        mengharapkan agara Saudara beserta seluruh jajaran memberikan perhatian yang lebih besar pada upaya implementasi
        SAKIP di Dinas {{ $user->name }}. dan menindaklanjuti rekomendasi yang telah kami sampaikan.<br>Atas
        perhatian dan kerja sama
        Saudara, kami ucapkan terima kasih.</p>

    <p>Tembusan:</p>

    <img src="" alt="">

    <ol>
        <li>Bupati Majalengka</li>
        <li>Sekretaris Daerah Kabupaten Majalengka</li>
    </ol>

</body>

</html>
