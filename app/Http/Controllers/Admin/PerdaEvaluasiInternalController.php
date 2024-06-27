<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Answer;
use App\Models\Komponen;
use App\Models\Kriteria;
use App\Models\SubKomponen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PerdaEvaluasiInternal;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PerdaEvaluasiInternalController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($list) {
            return $list->name;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        if ($tahun == null) {
            $perda_evaluasi_internal = [];
            $status = '';
        } else {
            $perda_evaluasi_internal = PerdaEvaluasiInternal::with('komponens', 'komponens.sub_komponens', 'komponens.sub_komponens.kriterias', 'komponens.sub_komponens.kriterias.answers')->whereTahun($tahun)->whereUserId(Auth::user()->id)->first();
            if (!$perda_evaluasi_internal) {
                $this->generate_evaluasi($tahun);
                $perda_evaluasi_internal = PerdaEvaluasiInternal::with('komponens', 'komponens.sub_komponens', 'komponens.sub_komponens.kriterias', 'komponens.sub_komponens.kriterias.answers')->whereTahun($tahun)->whereUserId(Auth::user()->id)->first();
            }
            $status = $perda_evaluasi_internal->status;
        }
        return view('admin.perda.evaluasi_internal.index', compact('perda_evaluasi_internal', 'status', 'tahun'));
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
        foreach ($request->komponen as $idkom => $komponen) {
            Komponen::find($idkom)->update([
                'nilai' => $komponen['total_bobot']
            ]);
        }
        foreach ($request->sub_komponen as $idsub => $sub_komponen) {
            SubKomponen::find($idsub)->update([
                'nilai' => $sub_komponen['total_bobot']
            ]);
        }
        foreach ($request->kriteria as $key => $kriteria) {
            PerdaEvaluasiInternal::find($id)->update([
                'status' => 'submit',
            ]);
            $params = [
                'status' => $kriteria['status'],
            ];
            if (isset($kriteria['upload'])) {
                $kriteria['upload']->store('public/evaluasi-internal/');
                $params = array_merge($params, ['upload' => $kriteria['upload']->hashName()]);
            }
            Kriteria::find($key)->update($params);
        }

        Alert::toast('Data Evaluasi Internal berhasil diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download($filename)
    {
        $filePath = 'public/evaluasi-internal/' . $filename;
        if (Storage::exists($filePath)) {
            $absolutePath = storage_path('app/' . $filePath);
            Alert::toast('Berhasil download file', 'success');
            session()->flash('success', 'File downloaded successfully.');
            return response()->download($absolutePath);
        } else {
            Alert::toast('Gagal download file', 'danger');
            return redirect()->back();
        }
    }

    public function generate_evaluasi($tahun)
    {
        $list_komponens = [
            [
                "no"            => "1",
                "komponen"      => "Perencanaan Kinerja",
                "bobot"         => 30,
                "sub_komponen"  => [
                    [
                        "no"                => "1.a",
                        "sub_komponen"      => "Dokumen Perencanaan Kinerja telah tersedia",
                        "bobot"             => 6,
                        "kriteria"          => [
                            [
                                "no"              => "1",
                                "kriteria"        => "Terdapat pedoman teknis perencanaan kinerja.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "2",
                                "kriteria"        => "Terdapat dokumen perencanaan kinerja jangka menengah.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "3",
                                "kriteria"        => "Terdapat dokumen perencanaan kinerja jangka pendek.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "4",
                                "kriteria"        => "Terdapat dokumen perencanaan aktivitas yang mendukung kinerja.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "5",
                                "kriteria"        => "Terdapat dokumen perencanaan anggaran yang mendukung kinerja.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        "no"                => "1.b",
                        "sub_komponen"      => "Dokumen Perencanaan kinerja telah memenuhi standar yang baik, yaitu untuk mencapai hasil, dengan ukuran kinerja yang SMART, menggunakan penyelarasan (cascading) disetiap level secara logis, serta memperhatikan kinerja bidang lain (crosscutting)",
                        "bobot"             => 9,
                        "kriteria"          => [
                            [
                                "no"              => "1",
                                "kriteria"        => "Dokumen Perencanaan Kinerja telah diformalkan.",
                                "answer"          => [
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "2",
                                "kriteria"        => "Dokumen Perencanaan Kinerja telah dipublikasikan tepat waktu.",
                                "answer"          => [
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "3",
                                "kriteria"        => "Dokumen Perencanaan Kinerja telah menggambarkan Kebutuhan atas Kinerja sebenarnya yang perlu dicapai.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Penjabaran perencanaan Kinerja Berdasarkan Critical Sukses Faktor 100%",
                                    ],
                                    [
                                        "bobot"             => 0.75,
                                        "jawaban"           => "60% < Penjabaran perencanaan Kinerja Berdasarkan Critical Sukses Faktor <=99%",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "30% <Penjabaran perencanaan Kinerja Berdasarkan Critical Sukses Faktor  <= 60%",
                                    ],
                                    [
                                        "bobot"             => 0.25,
                                        "jawaban"           => "Penjabaran perencanaan Kinerja Berdasarkan Critical Sukses Faktor <= 30%",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "4",
                                "kriteria"        => "Kualitas Rumusan Hasil (Tujuan/Sasaran) telah jelas menggambarkan kondisi kinerja yang akan dicapai.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Tujuan dan Sasaran menggambarkan kinerja yang akan dicapai",
                                    ],
                                    [
                                        "bobot"             => 0.75,
                                        "jawaban"           => "Tujuan dan Sasaran kurang menggambarkan kinerja yang akan dicapai",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Tujuan dan Sasaran belum menggambarkan kinerja yang akan dicapai",
                                    ],
                                    [
                                        "bobot"             => 0.25,
                                        "jawaban"           => "Tujuan dan Sasaran tidak menggambarkan kinerja yang akan dicapai",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "5",
                                "kriteria"        => "Ukuran Keberhasilan (Indikator Kinerja) telah memenuhi kriteria SMART.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Indikator telah memenuhi kriteria SMART",
                                    ],
                                    [
                                        "bobot"             => 0.75,
                                        "jawaban"           => "Indikator kurang memenuhi kriteria SMART",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Indikator belum memenuhi kriteria SMART",
                                    ],
                                    [
                                        "bobot"             => 0.25,
                                        "jawaban"           => "Indikator tidak memenuhi kriteria SMART",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "6",
                                "kriteria"        => "Indikator Kinerja Utama (IKU) telah menggambarkan kondisi Kinerja Utama yang harus dicapai, tertuang secara berkelanjutan (sustainable - tidak sering diganti dalam 1 periode Perencanaan Strategis).",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Ya, IKU menggambarkan sasaran strategisnya, menujukan kinerja di level bidang urusan pemerintahan (intermediate outcome), menunjukan core business (alasan mengapa sebuah perangkat daerah dibentuk), menunjukan critical success factor (csf) dari ultimate outcome dan tidak sering diganti dalam 1 periode perencanaan",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Tidak, IKU tidak menggambarkan sasaran strategisnya, tidak menujukan kinerja di level bidang urusan pemerintahan (intermediate outcome), menunjukan core business (alasan mengapa sebuah perangkat daerah dibentuk), tidak menunjukan critical success factor (csf) dari ultimate outcome dan sering diganti dalam 1 periode perencanaan",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "7",
                                "kriteria"        => "Target yang ditetapkan dalam Perencanaan Kinerja dapat dicapai (achievable), menantang.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Target dapat dicapai (achievable), menantang",
                                    ],
                                    [
                                        "bobot"             => 0.75,
                                        "jawaban"           => "Target menantang namun tidak dapat dicapai",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Target dapat dicapai (achievable) tapi tidak menantang",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Target lebih rendah daripada realisasi tahun sebelumnya",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "8",
                                "kriteria"        => "Setiap Dokumen Perencanaan Kinerja menggambarkan hubungan yang berkesinambungan, serta selaras antara Kondisi/Hasil yang akan dicapai di setiap level jabatan (Cascading)",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Ada cascading yang menunjukkan Kinerja (sasaran) mulai level ultimate outcome (hijau) hingga Output (abu-abu) sudah menunjukan hubungan sebab akibat",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Cascading Tidak meunjukkan Kinerja (sasaran) mulai level ultimate outcome (hijau) hingga Output (abu-abu) belum menunjukan hubungan sebab akibat",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak ada cascading",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "9",
                                "kriteria"        => "Perencanaan kinerja dapat memberikan informasi tentang hubungan kinerja, strategi, kebijakan, bahkan aktivitas antar bidang/dengan tugas dan fungsi lain yang berkaitan (Crosscutting)",
                                "answer"          => [
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Ya, Terdapat crosscutting",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak ada crosscutting",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "10",
                                "kriteria"        => "Sasaran Strategis dan Indikator pada seluruh Dokumen Perencanaan (Pokin, Cascading, Renstra, Renja, IKU, Renaksi) selaras",
                                "answer"          => [
                                    [
                                        "bobot"             => 0.75,
                                        "jawaban"           => "Seluruh dokumen perencanaan selaras dengan Pohon Kinerja/Cascading",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Sebagian dokumen perencanaan selaras dengan Pohon Kinerja/Cascading",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Dokumen perencanaan tidak selaras dengan Pohon Kinerja/Casacding",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "11",
                                "kriteria"        => "Setiap pegawai merumuskan dan menetapkan Perencanaan Kinerja.",
                                "answer"          => [
                                    [
                                        "bobot"             => 0.75,
                                        "jawaban"           => "Ya, setiap pegawai menyusun dan menetapkan Perjanjian Kinerja dan SKP sesuai Cascading",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak, setiap pegawai menyusun dan menetapkan Perjanjian Kinerja dan SKP tidak sesuai Cascading",
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        "no"                => "1.c",
                        "sub_komponen"      => "Perencanaan Kinerja telah dimanfaatkan untuk mewujudkan hasil yang berkesinambungan",
                        "bobot"             => 15,
                        "kriteria"          => [
                            [
                                "no"              => "1",
                                "kriteria"        => "Anggaran yang ditetapkan telah mengacu pada Kinerja yang ingin dicapai.",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "100% Anggaran mengacu kepada kinerja yang ingin dicapai",
                                    ],
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "50% Anggaran mengacu kepada kinerja yang ingin",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Anggaran tidak mengacu kepada kinerja yang ingin dicapai",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "2",
                                "kriteria"        => "Aktivitas yang dilaksanakan telah mendukung Kinerja yang ingin dicapai.",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Rencana aksi memiliki kontrubusi yang jelas ke output, immediate outcome, intermiediate outcome dan ultimate outcome =100 %",
                                    ],
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Rencana aksi memiliki kontrubusi yang jelas ke output, immediate outcome, intermiediate outcome dan ultimate outcome <100%",
                                    ],
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Rencana aksi memiliki kontrubusi yang jelas ke output, immediate outcome, intermiediate outcome dan ultimate outcome <75%",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Rencana aksi memiliki kontrubusi yang jelas ke output, immediate outcome, intermiediate outcome dan ultimate outcome <50%",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Rencana aksi tidak memiliki kontrubusi yang jelas ke output, immediate outcome, intermiediate outcome dan ultimate outcome",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "3",
                                "kriteria"        => "Target yang ditetapkan dalam Perencanaan Kinerja telah dicapai dengan baik, atau setidaknya masih on the right track",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Target tercapai 100%",
                                    ],
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Target tercapai <100%",
                                    ],
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Target tercapai <75%",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Target tercapai <50%",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "4",
                                "kriteria"        => "Rencana aksi kinerja dapat berjalan dinamis karena capaian kinerja selalu dipantau secara berkala.",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Pemantauan rencana aksi dilakukan periodik minimal triwulan",
                                    ],
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Pemantauan rencana aksi dilakukan periodik minimal semesteran",
                                    ],
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Pemantauan rencana aksi dilakukan periodik minimal tahunan",
                                    ],
                                    [
                                        "bobot"             => 0.5,
                                        "jawaban"           => "Tidak dilakukan pemantauan",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "5",
                                "kriteria"        => "Terdapat perbaikan/penyempurnaan Dokumen Perencanaan Kinerja yang ditetapkan dari hasil analisis perbaikan kinerja sebelumnya",
                                "answer"          => [
                                    [
                                        "bobot"             => 3,
                                        "jawaban"           => "Terdapat output/ outcome baru dan terdapat perubahan target kinerja jika realisasi tahun sebelumya lebih baik ",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak ada output/ outcome baru dan tidak ada perubahan target kinerja padahal realisasi tahun sebelumya lebih baik ",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "6",
                                "kriteria"        => "Dilakukan reviu terhadap dokumen perencanaan",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Ya, reviu dokumen perencanaan dilakukan min. 1 tahun sekali",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak dilakukan reviu dokumen perencanaan",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "7",
                                "kriteria"        => "Setiap unit/satuan kerja memahami dan peduli, serta berkomitmen dalam mencapai kinerja yang telah direncanakan",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Ya, Perangkat Daerah telah melaksanakan acara komitmen pencapaian kinerja ditahun tersebut",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak dilaksanakan acara komitmen pencapaian kinerja ditahun tersebut",
                                    ],
                                ]
                            ],
                        ]
                    ],
                ],
            ],
            [
                "no"        => "2",
                "komponen"  => "Pengukuran Kinerja",
                "bobot"     => 30,
                "sub_komponen"  => [
                    [
                        "no"                => "2.a",
                        "sub_komponen"      => "Pengukuran Kinerja telah dilakukan",
                        "bobot"             => 6,
                        "kriteria"          => [
                            [
                                "no"              => "1",
                                "kriteria"        => "Terdapat pedoman teknis pengukuran kinerja dan pengumpulan data kinerja.",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "2",
                                "kriteria"        => "Terdapat Definisi Operasional yang jelas atas kinerja dan cara mengukur indikator kinerja.",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "3",
                                "kriteria"        => "Terdapat mekanisme yang jelas terhadap pengumpulan data kinerja yang dapat diandalkan.",
                                "answer"          => [
                                    [
                                        "bobot"             => 2,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        "no"                => "2.b",
                        "sub_komponen"      => "Pengukuran Kinerja telah menjadi kebutuhan dalam mewujudkan Kinerja secara Efektif dan Efisien dan telah dilakukan secara berjenjang dan berkelanjutan",
                        "bobot"             => 9,
                        "kriteria"          => [
                            [
                                "no"              => "1",
                                "kriteria"        => "Pimpinan selalu teribat sebagai pengambil keputusan (Decision Maker) dalam mengukur capaian kinerja",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Ya, Pimpinan sudah menandatangani/mengetahui hasil pengukuran kinerja",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak terlibat dalam mengukur kinerja",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "2",
                                "kriteria"        => "Data kinerja yang dikumpulkan telah relevan untuk mengukur capaian kinerja yang diharapkan.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Lebih dari 90% data (capaian) kinerja sasaran strategis yang dihasilkan mencakup data perbandingan target dengan realisasi, data perbandingan kinerja dengan tahun lalu, data perbandignan kinerja dengan target akhir renstra dan data perbandingan kabupaten/provinsi",
                                    ],
                                    [
                                        "bobot"             => 0.8,
                                        "jawaban"           => "75% < data (capaian) kinerja  mencakup data perbandingan target dengan realisasi, data perbandingan kinerja dengan tahun lalu, data perbandingan kinerja dengan target akhir renstra dan data perbandingan kabupaten/provinsi  < 90%",
                                    ],
                                    [
                                        "bobot"             => 0.6,
                                        "jawaban"           => "40% < data (capaian) kinerja mencakup data perbandingan target dengan realisasi, data perbandingan kinerja dengan tahun lalu, data perbandingan kinerja dengan target akhir renstra dan data perbandingan kabupaten/provinsi  < 75%",
                                    ],
                                    [
                                        "bobot"             => 0.4,
                                        "jawaban"           => "10% < data (capaian) kinerja mencakup data perbandingan target dengan realisasi, data perbandingan kinerja dengan tahun lalu, data perbandingan kinerja dengan target akhir renstra dan data perbandingan kabupaten/provinsi  < 40%",
                                    ],
                                    [
                                        "bobot"             => 0.2,
                                        "jawaban"           => "Data (capaian) kinerja mencakup data perbandingan target dengan realisasi, data perbandingan kinerja dengan tahun lalu, data perbandingan kinerja dengan target akhir renstra dan data perbandingan kabupaten/provinsi < 10%",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "3",
                                "kriteria"        => "Data kinerja yang dikumpulkan telah mendukung capaian kinerja yang diharapkan.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1,
                                        "jawaban"           => "Lebih dari 90% data realisasi sasaran strategis melebihi target",
                                    ],
                                    [
                                        "bobot"             => 0.8,
                                        "jawaban"           => "Apabila 75%< data realisasi sasaran strategis melebihi target < 90%",
                                    ],
                                    [
                                        "bobot"             => 0.6,
                                        "jawaban"           => "Apabila 40%< data realisasi sasaran strategis melebihi target <75%;",
                                    ],
                                    [
                                        "bobot"             => 0.4,
                                        "jawaban"           => "Apabila 10% < data realisasi sasaran strategis melebihi target <40%",
                                    ],
                                    [
                                        "bobot"             => 0.2,
                                        "jawaban"           => "data realisasi sasaran strategis melebihi target < 10%",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "4",
                                "kriteria"        => "Pengukuran kinerja telah dilakukan secara berkala.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Terdapat dokumen Pengukuran Kinerja Pertriwulan",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak Terdapat dokumen pengukuran kinerja pertriwulan",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "5",
                                "kriteria"        => "Setiap level organisasi melakukan pemantauan atas pengukuran capaian kinerja unit dibawahnya secara berjenjang.",
                                "answer"          => [
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Penilaian SKP langsung oleh atasan kepada bawahan secara berjenjang",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak, penilaian SKP kepada bawahan tidak lakukan langsung oleh atasan secara berjenjang",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "6",
                                "kriteria"        => "Pengumpulan data kinerja telah memanfaatkan Teknologi Informasi (Aplikasi).",
                                "answer"          => [
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                            [
                                "no"              => "7",
                                "kriteria"        => "Pengukuran capaian kinerja telah memanfaatkan Teknologi Informasi (Aplikasi).",
                                "answer"          => [
                                    [
                                        "bobot"             => 1.5,
                                        "jawaban"           => "Ya",
                                    ],
                                    [
                                        "bobot"             => 0,
                                        "jawaban"           => "Tidak",
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'no'                => '2.c',
                        'sub_komponen'      => 'Pengukuran Kinerja telah dijadikan dasar dalam pemberian Reward dan Punishment, serta penyesuaian strategi dalam mencapai kinerja yang efektif dan efisien',
                        'bobot'             => 15,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Pengukuran Kinerja telah menjadi dasar dalam penyesuaian (pemberian/pengurangan) tunjangan kinerja/penghasilan',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Terdapat implementasi dari Peraturan yang mengatur tentang Kinerja menjadi dasar pemberian TPP',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada dokumen pendukung/yang tidak berkinerja mendapat TPP sama dengan yang berkinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Strategi dalam mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Terdapat informasi yang mengambarkan perubahan strategi sebagai tindaklanjut dari pengukuran kinerja',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada  informasi yang mengambarkan perubahan strategi sebagai tindaklanjut dari pengukuran kinerja',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Jika output tercapai tidak perlu ada penyesuaian kebijakan',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Kebijakan dalam mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Terdapat informasi yang mengambarkan perubahan kebijakan sebagai tindaklanjut dari pengukuran kinerja',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada  informasi yang mengambarkan perubahan kebijakan sebagai tindaklanjut dari pengukuran kinerja',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Jika output tercapai tidak perlu ada penyesuaian kebijakan',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Aktivitas dalam mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Terdapat perubahan langkah aksi Jika Output tidak tercapai',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada  perubahan langkah aksi Jika Output tidak tercapai',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Jika output tercapai tidak perlu ada penyesuaian aktivitas',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Anggaran dalam mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Perubahan output atau langkah aksi tindaklanjut hasil pengukuran diikuti perubahan anggaran',
                                    ],
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Perubahan output atau langkah aksi tindaklanjut hasil pengukuran tidak diikuti perubahan anggaran',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Jika output tercapai tidak perlu ada penyesuaian anggaran',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Terdapat efisiensi atas penggunaan anggaran dalam mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Efisiensi anggaran digunakan penambahan output',
                                    ],
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Terdapat efisisensi anggaran atas Kinerja IKU yang tercapai 100% atau lebih',
                                    ],
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Tidak ada efisisensi anggaran atas Kinerja IKU yang tercapai 100% atau lebih',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Ada sisa anggaran atas Kinerja IKU yang tidak mencapai 100%',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Setiap unit/satuan kerja memahami dan peduli atas hasil pengukuran kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Perangkat Daerah mendapat raport kinerja triwulanan',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Perangkat Daerah tidak mendapat raport kinerja triwulanan',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '8',
                                'kriteria'        => 'Setiap unit/satuan kerja memahami dan peduli atas hasil pengukuran kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Terdapat Feedback dari atasan kepada bawahan atas hasil pengukuran kinerja (SKP)',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak Terdapat Feedback dari atasan kepada bawahan atas hasil pengukuran kinerja (SKP)',
                                    ],
                                ]
                            ],
                        ]
                    ],
                ]
            ],
            [
                'no'        => '3',
                'komponen'  => 'Pelaporan Kinerja',
                'bobot'     => 15,
                'sub_komponen'  => [
                    [
                        'no'                => '3.a',
                        'sub_komponen'      => 'Terdapat Dokumen Laporan yang menggambarkan Kinerja',
                        'bobot'             => 3,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah disusun.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Ya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah diformalkan dan di paraf semua pejabat administrator/pengawas',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Ya, dokumen telah diformalkan dan diparaf',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Ya, dokumen telah diformalkan namun belum diparaf',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah dipublikasikan di esr.menpan',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Ya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah disampaikan tepat waktu.',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Ya, dokumen diupload di esr sebelum 1 Maret setiap tahunnya',
                                    ],
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Ya, dokumen diupload di esr sebelum 31 Maret setiap Tahunnya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak upload atau diupload diatas tanggal 31 maret setiap tahunnya',
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'no'                => '3.b',
                        'sub_komponen'      => 'Dokumen Laporan Kinerja telah memenuhi Standar menggambarkan Kualitas atas Pencapaian Kinerja, informasi keberhasilan/kegagalan kinerja serta upaya perbaikan/penyempurnaannya',
                        'bobot'             => 4.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Dokumen Laporan Kinerja disusun secara berkualitas sesuai dengan standar.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila dokumen sudah disusun sesuai permenpan 53 2014, sesuai format bagian organisasi serta yang dilaporkan selaras dengan perjanjian kinerja tahun sebelumnya',
                                    ],
                                    [
                                        'bobot'             => 0.4,
                                        'jawaban'           => 'Apabila dokumen sudah disusun sesuai permenpan 53 2014, yang dilaporkan selaras dengan perjanjian kinerja tahun sebelumnya namun tidak sesuai format bagian organisasi',
                                    ],
                                    [
                                        'bobot'             => 0.1,
                                        'jawaban'           => 'Apabila dokumen sudah disusun sesuai permenpan 53 2014, namun yang dilaporkan tidak selaras dengan perjanjian kinerja tahun sebelumnya dan tidak sesuai format bagian organisasi',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Apabila dokumen sudah disusun tidak sesuai permenpan 53 2014, yang dilaporkan tidak selaras dengan perjanjian kinerja tahun sebelumnya dan tidak sesuai format bagian organisasi',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan analisis dan evaluasi realisasi kinerja dengan target tahunan.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan target dan realisasi tahun berjalan yang dilengkapi dengan narasinya',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Hanya ada target dan realisasi tetapi tidak ada narasinya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan analisis dan evaluasi realisasi kinerja dengan target jangka menengah.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan target dan realisasi tahun berjalan yang dibandingkan dengan target jangka menengan (Renstra) yang dilengkapi dengan narasinya',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Hanya ada target dan realisasi dan perbandingan dengan target jangka menengah tetapi tidak ada narasinya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan analisis dan evaluasi realisasi kinerja dengan realisasi kinerja tahun-tahun sebelumnya.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan target dan ralisasi tahun berjalan dan dibandingkan dengan realisasi tahun sebelumnya yang dilengkapi dengan narasinya',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Hanya ada target dan realisasi dan perbandingan tahun sebelumnya tetapi tidak ada narasinya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan perbandingan realisasi kinerja dengan realisasi kinerja di level kabupaten/provinsi/nasional',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Laporan kinerja menyajikan data dan informasi perbandingan realisasi kinerja dengan Realisasi rata rata kabupaten/provinsi/nasional',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Hanya ada target dan realisasi dan perbandingan tetapi tidak ada narasinya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan kualitas atas capaian kinerja beserta upaya nyata dan/atau hambatannya.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan upaya dan/atau hambatan yang telah dilakukan untuk mencapai kinerja',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Informasi yang tersaji hanya sebatas formalitas',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan program yang mendukung capaian kinerja',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan program yang relevan untuk mendukung kinerja',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan program yang kurang relevan untuk mendukung kinerja',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '8',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan efisiensi atas penggunaan sumber daya dalam mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan data efisiensi dengan capaian IKU > 100%',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan informasi efisiensi tidak dapat diukur karena capaian IKU < 100%',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '9',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan upaya perbaikan dan penyempurnaan kinerja ke depan (Rekomendasi perbaikan kinerja).',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan informasi rekomendasi perbaikan kinerja',
                                    ],
                                    [
                                        'bobot'             => 0.3,
                                        'jawaban'           => 'Apabila Laporan Kinerja menyajikan informasi rekomendasi perbaikan kinerja namun hanya formalitas',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada informasi atau Yang dilaporkan tidak selaras dengan perjanjian kinerja',
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'no'                => '3.c',
                        'sub_komponen'      => 'Pelaporan Kinerja telah memberikan dampak yang besar dalam penyesuaian strategi/kebijakan dalam mencapai kinerja berikutnya',
                        'bobot'             => 7.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Informasi dalam laporan kinerja selalu menjadi perhatian utama pimpinan (Bertanggung Jawab).',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'LKIP telah diserahkan kepada Pimpinan',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Pimpinan tidak mengetahui penyusunan LKIP',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Penyajian informasi dalam laporan kinerja menjadi kepedulian seluruh pegawai.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'LKIP telah disebarluaskan kepada seluruh pegawai',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'LKIP tidak disebarkan kepada seluruh pegawai',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Informasi dalam laporan kinerja berkala telah digunakan dalam penyesuaian aktivitas untuk mencapai kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => 'Rekomendasi LKIP digunakan sebagai penyesuaian aktivitas mencapai kinerja',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Rekomendasi LKIP tidak digunakan sebagai penyesuaian aktivitas mencapai kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Analisis keberhasilan/kegagalan mendalam dan menjawab permasalahan utama yang dihadapi',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Terdapat analisa yang menjawab permasalahan',
                                    ],
                                    [
                                        'bobot'             => 1.5,
                                        'jawaban'           => 'Terdapat analisa namun butuh pendalaman lebih lanjut untuk menjawab permasalahan',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Terdapat analisa namun belum menjawab permasalahan',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak ada analisa',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Informasi dalam laporan kinerja telah digunakan dalam evaluasi pencapaian keberhasilan kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Terdapat pembahasan/evaluasi atas laporan kinerja yang telah disusun untuk memperbaiki kinerja',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak Terdapat pembahasan/evaluasi atas laporan kinerja yang telah disusun untuk memperbaiki kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Informasi dalam laporan kinerja telah digunakan dalam penyesuaian perencanaan kinerja yang akan dihadapi berikutnya.',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Rekomendasi LKIP digunakan sebagai penyesuaian perencanaan kinerja',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Rekomendasi LKIP tidak digunakan sebagai penyesuaian perencanaan kinerja',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Informasi dalam laporan kinerja selalu mempengaruhi perubahan budaya kinerja organisasi.',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Terdapat perubahan budaya kinerja organisasi',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak terdapat perubahan budaya organisasi',
                                    ],
                                ]
                            ],
                        ]
                    ],
                ],
            ],
            [
                'no'        => '4',
                'komponen'  => 'Evaluasi Akuntabilitas Kinerja Internal Kinerja',
                'bobot'     => 25,
                'sub_komponen'  => [
                    [
                        'no'                => '4.a',
                        'sub_komponen'      => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan',
                        'bobot'             => 5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Terdapat pedoman teknis Evaluasi AKIP Internal',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Ya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Terdapat Rencana Tindak Lanjut LHE AKIP',
                                'answer'          => [
                                    [
                                        'bobot'             => 1.5,
                                        'jawaban'           => 'Ya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Terdapat Laporan Monev Rencana Aksi Tindak lanjut LHE AKIP',
                                'answer'          => [
                                    [
                                        'bobot'             => 1.5,
                                        'jawaban'           => 'Ya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Terdapat Dokumen Self Assessment Evaluasi Internal Perangkat Daerah',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Ya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak',
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'no'                => '4.b',
                        'sub_komponen'      => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan secara',
                        'bobot'             => 7.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Self Assessment Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan sesuai standar.',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Sesuai pedoman',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak sesuai pedoman',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Rencana Aksi Tindak Lanjut LHE AKIP relevan dengan rekomendasi LHE AKIP',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => '100% Relevan dengan Rekomendasi LHE AKIP',
                                    ],
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => '75% <= TL <100% Relevan dengan rekomendasi LHE AKIP',
                                    ],
                                    [
                                        'bobot'             => 0.5,
                                        'jawaban'           => '50% < TL <75%  Relevan dengan rekomendasi LHE AKIP',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak Relevan dengan rekomendasi LHE AKIP',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan oleh SDM yang memadai.',
                                'answer'          => [
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Tim yang bertugas melakukan evaluasi, Terdapat Anggota Tim Evaluasi telah mengikuiti Bintek Sakip',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak Terdapat tim evaluasi',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Laporan Monev Renaksi disusun sesuai dengan format yang telah ditentukan',
                                'answer'          => [
                                    [
                                        'bobot'             => 1.5,
                                        'jawaban'           => 'Laporan disusun sesuai format yang memuat Pendahuluan, Isi dan Kesimpulan serta link bukti dukung',
                                    ],
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Hanya terdapat tabel tindaklanjut dan link bukti dukung',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'disusun tidak menggunakan aplikasi',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan menggunakan Teknologi Informasi (Aplikasi)',
                                'answer'          => [
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Pengisian Evaluasi Internal menggunakan aplikasi',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Disusun tidak menggunakan aplikasi',
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'no'                => '4.c',
                        'sub_komponen'      => 'Implementasi SAKIP telah meningkat karena evaluasi Akuntabilitas Kinerja Internal sehingga memberikan kesan yang nyata (dampak) dalam efektifitas dan efisiensi Kinerja',
                        'bobot'             => 12.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Seluruh rekomendasi atas hasil evaluasi akuntablitas kinerja internal telah ditindaklanjuti.',
                                'answer'          => [
                                    [
                                        'bobot'             => 4,
                                        'jawaban'           => 'Telah dilaksanakan tindaklanjut 100% rekomendasi evaluasi AKIP',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Telah dilaksanakan tindaklanjut 75% <= rekomendasi evaluasi AKIP < 100%',
                                    ],
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Telah dilaksanakan tindaklanjut 50% <= rekomendasi evaluasi AKIP < 75%',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Belum dilaksanakan tindaklanjut atas rekomendasi evaluasi AKIP',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Telah terjadi peningkatan implementasi SAKIP dengan melaksanakan tindak lanjut atas rekomendasi hasil evaluasi akuntablitas Kinerja internal.',
                                'answer'          => [
                                    [
                                        'bobot'             => 4,
                                        'jawaban'           => 'Terjadi peningkatan Nilai SAKIP pada seluruh Dimensi AKIP',
                                    ],
                                    [
                                        'bobot'             => 3,
                                        'jawaban'           => 'Terjadi peningkatan Nilai SAKIP pada seluruh 3 Dimensi AKIP',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Terjadi peningkatan Nilai SAKIP pada seluruh 2 Dimensi AKIP',
                                    ],
                                    [
                                        'bobot'             => 1,
                                        'jawaban'           => 'Terjadi peningkatan Nilai SAKIP pada seluruh 1 Dimensi AKIP',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Tidak terjadi peningkatan Nilai SAKIP pada seluruh Dimensi AKIP',
                                    ],
                                ]
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Hasil dari Evaluasi Akuntabilitas Kinerja Internal telah dimanfaatkan dalam mendukung efektifitas dan efisiensi kinerja.',
                                'answer'          => [
                                    [
                                        'bobot'             => 4.5,
                                        'jawaban'           => 'Tidak ditemukan belanja-belanja yang tidak relevan dengan pencapaian kinerja dibandingkan dengan tahun sebelumnya',
                                    ],
                                    [
                                        'bobot'             => 2,
                                        'jawaban'           => 'Masih ditemukan sebagian kecil belanja-belanja yang tidak relevan dengan pencapaian kinerja dibandingkan dengan tahun sebelumnya',
                                    ],
                                    [
                                        'bobot'             => 0,
                                        'jawaban'           => 'Masih ditemukan sebagian besar belanja-belanja yang tidak relevan dengan pencapaian kinerja dibandingkan dengan tahun sebelumnya',
                                    ],
                                ]
                            ],
                        ]
                    ],
                ],
            ],
        ];
        $pei = PerdaEvaluasiInternal::create([
            'user_id' => Auth::user()->id,
            'tahun' => $tahun,
            'status' => 'new',
        ]);
        foreach ($list_komponens as $list_komponen) {
            $komponens = Komponen::create([
                'user_id' => Auth::user()->id,
                'perda_evaluasi_internal_id' => $pei->id,
                'no' => $list_komponen['no'],
                'komponen' => $list_komponen['komponen'],
                'bobot' => $list_komponen['bobot'],
                'nilai' => null,
            ]);
            foreach ($list_komponen['sub_komponen'] as $list_sub_komponen) {
                $sub_komponens = SubKomponen::create([
                    'user_id' => Auth::user()->id,
                    'komponen_id' => $komponens->id,
                    'no' => $list_sub_komponen['no'],
                    'sub_komponen' => $list_sub_komponen['sub_komponen'],
                    'bobot' => $list_sub_komponen['bobot'],
                    'nilai' => null,
                ]);
                foreach ($list_sub_komponen['kriteria'] as $list_kriteria) {
                    $kriterias = Kriteria::create([
                        'user_id' => Auth::user()->id,
                        'sub_komponen_id' => $sub_komponens->id,
                        'no' => $list_kriteria['no'],
                        'kriteria' => $list_kriteria['kriteria'],
                        'status' => '2',
                        'upload' => null
                    ]);
                    foreach ($list_kriteria['answer'] as $list_answer) {
                        $answers = Answer::create([
                            'user_id' => Auth::user()->id,
                            'kriteria_id' => $kriterias->id,
                            'bobot' => $list_answer['bobot'],
                            'jawaban' => $list_answer['jawaban'],
                        ]);
                    }
                }
            }
        }
    }
}
