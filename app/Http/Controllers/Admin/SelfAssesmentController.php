<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Komponen;
use App\Models\Kriteria;
use App\Models\SubKomponen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PerdaEvaluasiInternal;

class SelfAssesmentController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($list) {
            return $list->name;
        }));
        View::share('tahun_options', collect(array_combine(range(2029, 2020, -1), range(2029, 2020, -1)))->transform(function ($list) {
            return $list;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? 2024;
        $user = User::whereRole('perda')->first();
        $perangkat_daerah = $request->perangkat_daerah ?? $user->id;
        $perda_evaluasi_internal = PerdaEvaluasiInternal::with('komponens', 'komponens.sub_komponens', 'komponens.sub_komponens.kriterias')->whereTahun($tahun)->whereUserId($perangkat_daerah)->get();
        if (count($perda_evaluasi_internal) == 0) {
            $this->generate_evaluasi($tahun, $perangkat_daerah);
            $perda_evaluasi_internal = PerdaEvaluasiInternal::with('komponens', 'komponens.sub_komponens', 'komponens.sub_komponens.kriterias')->whereTahun($tahun)->whereUserId($perangkat_daerah)->get();
        }
        return view('admin.inspek.self_assesment.index', compact('tahun', 'user', 'perangkat_daerah', 'perda_evaluasi_internal'));
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


    public function generate_evaluasi($tahun, $perangkat_daerah)
    {
        $list_komponens = [
            [
                'no'            => '1',
                'komponen'      => 'Perencanaan Kinerja',
                'bobot'         => 30,
                'sub_komponen'  => [
                    [
                        'no'                => '1.a',
                        'sub_komponen'      => 'Dokumen Perencanaan Kinerja telah tersedia',
                        'bobot'             => 6,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Terdapat pedoman teknis perencanaan kinerja.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Terdapat dokumen perencanaan kinerja jangka panjang.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Terdapat dokumen perencanaan kinerja jangka menengah.',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Terdapat dokumen perencanaan kinerja jangka pendek.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Terdapat dokumen perencanaan aktivitas yang mendukung kinerja.',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Terdapat dokumen perencanaan anggaran yang mendukung kinerja.',
                            ],
                        ]
                    ],
                    [
                        'no'                => '1.b',
                        'sub_komponen'      => 'Dokumen Perencanaan kinerja telah memenuhi standar yang baik, yaitu untuk mencapai hasil, dengan ukuran kinerja yang SMART, menggunakan penyelarasan (cascading) disetiap level secara logis, serta memperhatikan kinerja bidang lain (crosscutting)',
                        'bobot'             => 9,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Dokumen Perencanaan Kinerja telah diformalkan.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Dokumen Perencanaan Kinerja telah dipublikasikan tepat waktu.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Dokumen Perencanaan Kinerja telah menggambarkan Kebutuhan atas Kinerja sebenarnya yang perlu',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Kualitas Rumusan Hasil (Tujuan/Sasaran) telah jelas menggambarkan kondisi kinerja yang akan dicapai.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Ukuran Keberhasilan (Indikator Kinerja) telah memenuhi kriteria SMART.',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Indikator Kinerja Utama (IKU) telah menggambarkan kondisi Kinerja Utama yang harus dicapai, tertuang',
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Target yang ditetapkan dalam Perencanaan Kinerja dapat dicapai (achievable), menantang, dan realistis.',
                            ],
                            [
                                'no'              => '8',
                                'kriteria'        => 'Setiap Dokumen Perencanaan Kinerja menggambarkan hubungan yang berkesinambungan, serta',
                            ],
                            [
                                'no'              => '9',
                                'kriteria'        => 'Perencanaan kinerja dapat memberikan informasi tentang hubungan kinerja, strategi, kebijakan, bahkan',
                            ],
                            [
                                'no'              => '10',
                                'kriteria'        => 'Setiap unit/satuan kerja merumuskan dan menetapkan Perencanaan Kinerja.',
                            ],
                            [
                                'no'              => '11',
                                'kriteria'        => 'Setiap pegawai merumuskan dan menetapkan Perencanaan Kinerja.',
                            ],
                        ]
                    ],
                    [
                        'no'                => '1.c',
                        'sub_komponen'      => 'Perencanaan Kinerja telah dimanfaatkan untuk mewujudkan hasil yang',
                        'bobot'             => 15,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Anggaran yang ditetapkan telah mengacu pada Kinerja yang ingin dicapai.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Aktivitas yang dilaksanakan telah mendukung Kinerja yang ingin dicapai.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Target yang ditetapkan dalam Perencanaan Kinerja telah dicapai dengan baik, atau setidaknya masih on',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Rencana aksi kinerja dapat berjalan dinamis karena capaian kinerja selalu dipantau secara berkala.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Terdapat perbaikan/penyempurnaan Dokumen Perencanaan Kinerja yang ditetapkan dari hasil analisis',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Terdapat perbaikan/penyempurnaan Dokumen Perencanaan Kinerja dalam mewujudkan kondisi/hasil',
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Setiap unit/satuan kerja memahami dan peduli, serta berkomitmen dalam mencapai kinerja yang telah',
                            ],
                            [
                                'no'              => '8',
                                'kriteria'        => 'Setiap Pegawai memahami dan peduli, serta berkomitmen dalam mencapai kinerja yang telah',
                            ],
                        ]
                    ],
                ],
            ],
            [
                'no'        => '2',
                'komponen'  => 'Pengukuran Kinerja',
                'bobot'     => 30,
                'sub_komponen'  => [
                    [
                        'no'                => '2.a',
                        'sub_komponen'      => 'Pengukuran Kinerja telah dilakukan',
                        'bobot'             => 6,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Terdapat pedoman teknis pengukuran kinerja dan pengumpulan data kinerja.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Terdapat Definisi Operasional yang jelas atas kinerja dan cara mengukur indikator kinerja.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Terdapat mekanisme yang jelas terhadap pengumpulan data kinerja yang dapat diandalkan.',
                            ],
                        ]
                    ],
                    [
                        'no'                => '2.b',
                        'sub_komponen'      => 'Pengukuran Kinerja telah menjadi kebutuhan dalam mewujudkan Kinerja secara Efektif dan Efisien dan telah dilakukan secara berjenjang dan',
                        'bobot'             => 9,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Pimpinan selalu teribat sebagai pengambil keputusan (Decision Maker) dalam mengukur capaian',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Data kinerja yang dikumpulkan telah relevan untuk mengukur capaian kinerja yang diharapkan.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Data kinerja yang dikumpulkan telah mendukung capaian kinerja yang diharapkan.',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Pengukuran kinerja telah dilakukan secara berkala.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Setiap level organisasi melakukan pemantauan atas pengukuran capaian kinerja unit dibawahnya',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Pengumpulan data kinerja telah memanfaatkan Teknologi Informasi (Aplikasi).',
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Pengukuran capaian kinerja telah memanfaatkan Teknologi Informasi (Aplikasi).',
                            ],
                        ]
                    ],
                    [
                        'no'                => '2.c',
                        'sub_komponen'      => 'Pengukuran Kinerja telah dijadikan dasar dalam pemberian Reward dan Punishment, serta penyesuaian strategi dalam mencapai kinerja yang',
                        'bobot'             => 15,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Pengukuran Kinerja telah menjadi dasar dalam penyesuaian (pemberian/pengurangan) tunjangan',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Pengukuran Kinerja telah menjadi dasar dalam penempatan/penghapusan Jabatan baik struktural',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian (Refocusing) Organisasi.',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Strategi dalam mencapai kinerja.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Kebijakan dalam mencapai kinerja.',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Aktivitas dalam mencapai kinerja.',
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Pengukuran kinerja telah mempengaruhi penyesuaian Anggaran dalam mencapai kinerja.',
                            ],
                            [
                                'no'              => '8',
                                'kriteria'        => 'Terdapat efisiensi atas penggunaan anggaran dalam mencapai kinerja.',
                            ],
                            [
                                'no'              => '9',
                                'kriteria'        => 'Setiap unit/satuan kerja memahami dan peduli atas hasil pengukuran kinerja.',
                            ],
                            [
                                'no'              => '10',
                                'kriteria'        => 'Setiap pegawai memahami dan peduli atas hasil pengukuran kinerja.',
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
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah disusun secara berkala.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah diformalkan.',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah direviu.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah dipublikasikan.',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah disampaikan tepat waktu.',
                            ],
                        ]
                    ],
                    [
                        'no'                => '3.b',
                        'sub_komponen'      => 'Dokumen Laporan Kinerja telah memenuhi Standar menggambarkan Kualitas atas Pencapaian Kinerja, informasi keberhasilan/kegagalan',
                        'bobot'             => 4.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Dokumen Laporan Kinerja disusun secara berkualitas sesuai dengan standar.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah mengungkap seluruh informasi tentang pencapaian kinerja.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan perbandingan realisasi kinerja dengan target tahunan.',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan perbandingan realisasi kinerja dengan target jangka',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan perbandingan realisasi kinerja dengan realisasi kinerja',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan perbandingan realisasi kinerja dengan realiasi kinerja di',
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan kualitas atas capaian kinerja beserta upaya nyata dan/atau',
                            ],
                            [
                                'no'              => '8',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan efisiensi atas penggunaan sumber daya dalam mencapai',
                            ],
                            [
                                'no'              => '9',
                                'kriteria'        => 'Dokumen Laporan Kinerja telah menginfokan upaya perbaikan dan penyempurnaan kinerja ke depan',
                            ],
                        ]
                    ],
                    [
                        'no'                => '3.c',
                        'sub_komponen'      => 'Pelaporan Kinerja telah memberikan dampak yang besar dalam',
                        'bobot'             => 7.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Informasi dalam laporan kinerja selalu menjadi perhatian utama pimpinan (Bertanggung Jawab).',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Penyajian informasi dalam laporan kinerja menjadi kepedulian seluruh pegawai.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Informasi dalam laporan kinerja berkala telah digunakan dalam penyesuaian aktivitas untuk mencapai',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Informasi dalam laporan kinerja berkala telah digunakan dalam penyesuaian penggunaan anggaran',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Informasi dalam laporan kinerja telah digunakan dalam evaluasi pencapaian keberhasilan kinerja.',
                            ],
                            [
                                'no'              => '6',
                                'kriteria'        => 'Informasi dalam laporan kinerja telah digunakan dalam penyesuaian perencanaan kinerja yang akan',
                            ],
                            [
                                'no'              => '7',
                                'kriteria'        => 'Informasi dalam laporan kinerja selalu mempengaruhi perubahan budaya kinerja organisasi.',
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
                                'kriteria'        => 'Terdapat pedoman teknis Evaluasi Akuntabilitas Kinerja Internal.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan pada seluruh unit kerja/perangkat daerah.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan secara berjenjang.',
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
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan sesuai standar.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan oleh SDM yang memadai.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan dengan pendalaman yang memadai.',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan pada seluruh unit kerja/perangkat daerah.',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan menggunakan Teknologi Informasi (Aplikasi).',
                            ],
                        ]
                    ],
                    [
                        'no'                => '4.c',
                        'sub_komponen'      => 'Implementasi SAKIP telah meningkat karena evaluasi Akuntabilitas Kinerja Internal sehingga memberikan kesan yang nyata (dampak)',
                        'bobot'             => 12.5,
                        'kriteria'          => [
                            [
                                'no'              => '1',
                                'kriteria'        => 'Seluruh rekomendasi atas hasil evaluasi akuntablitas kinerja internal telah ditindaklanjuti.',
                            ],
                            [
                                'no'              => '2',
                                'kriteria'        => 'Telah terjadi peningkatan implementasi SAKIP dengan melaksanakan tindak lanjut atas rerkomendasi hasil evaluasi akuntablitas Kinerja internal.',
                            ],
                            [
                                'no'              => '3',
                                'kriteria'        => 'Hasil Evaluasi Akuntabilitas Kinerja Internal telah dimanfaatkan untuk perbaikan dan peningkatan',
                            ],
                            [
                                'no'              => '4',
                                'kriteria'        => 'Hasil dari Evaluasi Akuntabilitas Kinerja Internal telah dimanfaatkan dalam mendukung efektifitas dan',
                            ],
                            [
                                'no'              => '5',
                                'kriteria'        => 'Telah terjadi perbaikan dan peningkatan kinerja dengan memanfaatkan hasil evaluasi akuntablitas kinerja internal.',
                            ],
                        ]
                    ],
                ],
            ],
        ];
        $pei = PerdaEvaluasiInternal::create([
            'user_id' => $perangkat_daerah,
            'tahun' => $tahun,
            'status' => '1',
        ]);
        foreach ($list_komponens as $list_komponen) {
            $komponens = Komponen::create([
                'user_id' => $perangkat_daerah,
                'perda_evaluasi_internal_id' => $pei->id,
                'no' => $list_komponen['no'],
                'komponen' => $list_komponen['komponen'],
                'bobot' => $list_komponen['bobot'],
                'nilai' => null,
            ]);
            foreach ($list_komponen['sub_komponen'] as $list_sub_komponen) {
                $sub_komponens = SubKomponen::create([
                    'user_id' => $perangkat_daerah,
                    'komponen_id' => $komponens->id,
                    'no' => $list_sub_komponen['no'],
                    'sub_komponen' => $list_sub_komponen['sub_komponen'],
                    'bobot' => $list_sub_komponen['bobot'],
                    'nilai' => null,
                ]);
                foreach ($list_sub_komponen['kriteria'] as $list_kriteria) {
                    Kriteria::create([
                        'user_id' => $perangkat_daerah,
                        'sub_komponen_id' => $sub_komponens->id,
                        'no' => $list_kriteria['no'],
                        'kriteria' => $list_kriteria['kriteria'],
                        'status' => '2',
                        'upload' => null
                    ]);
                }
            }
        }
    }
}
