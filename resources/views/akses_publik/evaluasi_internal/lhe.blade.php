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

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #f2f2f2;
        color: black;
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
    <p>Nomor &nbsp;:&nbsp;&nbsp; {{ $evaluasi->no_surat ?? '' }}</p>
    <p>Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
        Hasil Evaluasi Akuntabilitas Kinerja <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instansi
        Pemerintah
        (AKIP) Tahun
        {{ $evaluasi->tahun }}
    </p>
    <p>Yth.&nbsp;&nbsp;Kepala Dinas {{ $user->name }}
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;di
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Majalengka
    </p>

    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan ini kami sampaikan hasil evaluasi AKIP Tahun
        {{ $evaluasi->tahun }} pada Dinas {{ $user->name }}, <br>
        dengan uraian sebagai berikut:</p>

    <h3>1. Pendahuluan</h3>
    <p style="text-align:justify; padding:0px 20px; line-height:1.5;">
        Berdasarkan Peraturan Pemerintah Nomor 8 Tahun 2006 tentang Pelaporan Keuangan dan Kinerja Instansi Pemerintah
        dan Peraturan Presiden Nomor 29 Tahun 2014 tentang Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP),
        kami telah melakukan evaluasi akuntabilitas kinerja pada Dinas {{ $user->name }}. Pelaksanaan evaluasi Tahun
        {{ $evaluasi->tahun }} berpedoman pada Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi
        Nomor 88 Tahun 2021 tentang Evaluasi Akuntabilitas Kinerja Instansi Pemerintah.
        <br>
        Tujuan evaluasi adalah untuk mengetahui tingkat implementasi Sistem Akuntabilitas Kinerja Instansi Pemerintah
        dalam mendorong peningkatan pencapaian kinerja yang tepat sasaran dan berorientasi hasil (result oriented
        government). Secara lebih rinci, sasaran evaluasi AKIP adalah: (a) memperoleh informasi mengenai implementasi
        SAKIP; (b) menilai tingkat
        implementasi SAKIP; (c) menilai tingkat akuntabilitas kinerja; (d) memberikan saran perbaikan untuk peningkatan
        AKIP; dan (e)
        memonitor tindak lanjut rekomendasi hasil evaluasi periode sebelumnya.
        <br>Ruang lingkup evaluasi akuntabilitas kinerja instansi pemerintah meliputi penilaian kualitas perencanaan
        kinerja, pengukuran kinerja berjenjang, pelaporan kinerja, evaluasi akuntabilitas kinerja internal, dan capaian
        kinerja atas output maupun outcome serta kinerja lainnya pada level Perangkat Daerah. Pelaksanaan evaluasi AKIP
        menggunakan kombinasi metodologi kualitatif dan kuantitatif dengan mempertimbangkan kepraktisan dan kemanfaatan
        yang disesuaikan dengan tujuan evaluasi. Langkah praktis diambil agar lebih cepat memberikan petunjuk untuk
        perbaikan implementasi SAKIP, sehingga dapat menghasilkan rekomendasi untuk meningkatkan akuntabilitas kinerja.
    </p>
    <br>
    <br>
    <h3>2. Hasil Evaluasi</h3>
    <p style="text-align:justify; padding:0px 20px; line-height:1.5;">
        Hasil evaluasi atas akuntabilitas kinerja Dinas <b>{{ $user->name }}</b>. menunjukkan bahwa nilai sebesar
        <b>{{ $evaluasi->nilai_akuntabilitas_kinerja }}</b> dengan predikat “<b>{{ $predikat }}</b>”. Hal tersebut
        menunjukkan bahwa implementasi akuntabilitas kinerja “{{ $predikat_name }}”, <b>yaitu kualitas penerapan
            manajemen
            kinerja birokrasi dan penyelenggaraan pemerintahan yang berorientasi pada hasil telah menunjukkan hasil yang
            baik pada sebagian unit kerja.</b>
        <br>
        Rincian hasil evaluasi tersebut adalah sebagai berikut:
    </p>
    <div style="padding:0px 20px;">
        <table id="customers">
            <thead>
                <tr>
                    <th>Komponen yang dinilai</th>
                    <th>Bobot</th>
                    <th>Nilai {{ $evaluasi->tahun }}</th>
                <tr>
            </thead>
            <tbody>
                <tr>
                    <td>a. &nbsp;&nbsp; Perencanaan Kinerja</td>
                    <td>{{ $nilaibobot[0] }}</td>
                    <td>{{ $nilaiTotal[0] }}</td>
                </tr>
                <tr>
                    <td>b. &nbsp;&nbsp; Pengukuran Kinerja</td>
                    <td>{{ $nilaibobot[1] }}</td>
                    <td>{{ $nilaiTotal[1] }}</td>
                </tr>
                <tr>
                    <td>c. &nbsp;&nbsp; Pelaporan Kinerja</td>
                    <td>{{ $nilaibobot[2] }}</td>
                    <td>{{ $nilaiTotal[2] }}</td>
                </tr>
                <tr>
                    <td>d. &nbsp;&nbsp; Evaluasi Akuntabilitas Kinerja Internal</td>
                    <td>{{ $nilaibobot[3] }}</td>
                    <td>{{ $nilaiTotal[3] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Nilai Hasil Evaluasi</b></td>
                    <td><b>100</b></td>
                    <td><b>{{ $evaluasi->nilai_akuntabilitas_kinerja }}</b></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Predikat AKIP</b></td>
                    <td></td>
                    <td><b>{{ $predikat }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="text-align:justify; padding:0px 20px; line-height:1.5;">
        <h4>Penjelasan lebih lanjut atas hasil evaluasi akuntabilitas kinerja pada Dinas {{ $user->name }}. Tahun
            {{ $evaluasi->tahun }} sebagai berikut:
        </h4>
        <p>1.) Perencanaan Kinerja
            <br>
            Catatan dari aplikasi terkait perencanaan Kinerja
        </p>
        <p>2.) Pengukuran Kinerja
            <br>
            Catatan dari aplikasi terkait Pengukuran Kinerja
        </p>
        <p>3.) Pelaporan Kinerja
            <br>
            Catatan dari aplikasi terkait Pelaporan Kinerja
        </p>
        <p>4.) Evaluasi Internal
            <br>
            Catatan dari aplikasi terkait Evaluasi Internal
        </p>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <div style="text-align:justify; padding:0px 20px; line-height:1.5;">
        <h3>3. Rekomendasi</h3>
        <p>Berdasarkan uraian di atas serta dalam rangka lebih mengefektifkan penerapan akuntabilitas kinerja, kami
            merekomendasikan beberapa hal sebagai berikut:</p>
        <p>
            1.) Gabungan rekomendasi Perencanaan Kinerja, Pengukuran Kinerja, Pelaporan Kinerja dan Evaluasi Internal
        </p>
        <p>
            2.) dst.
        </p>
    </div>

    <p style="text-align:justify; line-height:1.5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan hasil evaluasi
        AKIP sebagai penerapan manajemen kinerja. Kami
        menghargai upaya yang telah dilakukan dalam implementasi SAKIP di Dinan {{ $user->name }}. Terhadap hasil
        evaluasi yang telah disampaikan, Kami mengharapkan agara Saudara beserta seluruh jajaran memberikan perhatian
        yang lebih besar pada upaya implementasi SAKIP di Dinas {{ $user->name }}. dan menindaklanjuti rekomendasi
        yang telah kami sampaikan.
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Atas perhatian dan kerja sama Saudara, kami ucapkan terima kasih.
    </p>

    <div style="text-align:justify;margin-left:500px;">
        <p>Inspektur,</p>
        <br><br><br>
        <p>Hendra Krisniawan, S.STP., CGCAE</p>
        <p>Pembina Utama Muda</p>
        <p>NIP.&nbsp;19780226&nbsp;199703&nbsp;1&nbsp;002</p>
    </div>


    <div>
        <p>Tembusan:</p>
        <p>&nbsp;1. Bupati Majalengka</p>
        <p>&nbsp;2. Sekretaris Daerah Kabupaten Majalengka</p>
    </div>
</body>

</html>
