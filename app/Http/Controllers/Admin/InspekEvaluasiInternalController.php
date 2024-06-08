<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InspekKomponen;
use App\Models\InspekSubKomponen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\InspekEvaluasiInternal;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreInspekEvaluasiInternalRequest;
use App\Http\Requests\UpdateInspekEvaluasiInternalRequest;

class InspekEvaluasiInternalController extends Controller
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
        $tahun = $request->tahun;
        $perangkat_daerah = $request->perangkat_daerah;
        if ($tahun == null && $perangkat_daerah == null) {
            $inspek_evaluasi_internal = [];
            $total = 0;
        } else {
            $inspek_evaluasi_internal = InspekEvaluasiInternal::with('komponens', 'komponens.sub_komponens')->whereTahun($tahun)->whereUserId($perangkat_daerah)->get();
            if (count($inspek_evaluasi_internal) == 0) {
                $this->generate_evaluasi($perangkat_daerah, $tahun);
                $inspek_evaluasi_internal = InspekEvaluasiInternal::with('komponens', 'komponens.sub_komponens')->whereTahun($tahun)->whereUserId($perangkat_daerah)->get();
            }
            $total = 0;
            foreach ($inspek_evaluasi_internal[0]->komponens as $key => $value) {
                $total += $value->bobot;
            }
        }
        return view('admin.inspek.evaluasi_internal.index', compact('inspek_evaluasi_internal', 'tahun', 'perangkat_daerah', 'total'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        InspekEvaluasiInternal::find($id)->update([
            'nilai_akuntabilitas_kinerja' => $request->total_nilai,
            'predikat' => $request->predikat_nilai,
            'no_surat' => $request->no_surat,
        ]);
        foreach ($request->komponen as $key_komponen => $komponen) {
            InspekKomponen::find($key_komponen)->update(
                [
                    'catatan' => $komponen['catatan'],
                    'rekomendasi' => $komponen['rekomendasi'],
                ]
            );
        }
        foreach ($request->sub_komponen as $key_sub_komponen => $sub_komponen) {
            InspekSubKomponen::find($key_sub_komponen)->update(
                [
                    'nilai' => $sub_komponen['nilai'],
                ]
            );
        }

        Alert::toast('Berhasil menambahkan nilai Evaluasi Internal', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }


    public function generate_evaluasi($perangkat_daerah, $tahun)
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
                    ],
                    [
                        'no'                => '1.b',
                        'sub_komponen'      => 'Dokumen Perencanaan kinerja telah memenuhi standar yang baik, yaitu untuk mencapai hasil, dengan ukuran kinerja yang SMART, menggunakan penyelarasan (cascading) disetiap level secara logis, serta memperhatikan kinerja bidang lain (crosscutting)',
                        'bobot'             => 9,
                    ],
                    [
                        'no'                => '1.c',
                        'sub_komponen'      => 'Perencanaan Kinerja telah dimanfaatkan untuk mewujudkan hasil yang',
                        'bobot'             => 15,
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
                    ],
                    [
                        'no'                => '2.b',
                        'sub_komponen'      => 'Pengukuran Kinerja telah menjadi kebutuhan dalam mewujudkan Kinerja secara Efektif dan Efisien dan telah dilakukan secara berjenjang dan',
                        'bobot'             => 9,
                    ],
                    [
                        'no'                => '2.c',
                        'sub_komponen'      => 'Pengukuran Kinerja telah dijadikan dasar dalam pemberian Reward dan Punishment, serta penyesuaian strategi dalam mencapai kinerja yang efektif dan efisien',
                        'bobot'             => 15,
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
                    ],
                    [
                        'no'                => '3.b',
                        'sub_komponen'      => 'Dokumen Laporan Kinerja telah memenuhi Standar menggambarkan Kualitas atas Pencapaian Kinerja, informasi keberhasilan/kegagalan kinerja serta upaya perbaikan/penyempurnaannya',
                        'bobot'             => 4.5,
                    ],
                    [
                        'no'                => '3.c',
                        'sub_komponen'      => 'Pelaporan Kinerja telah memberikan dampak yang besar dalam penyesuaian strategi/kebijakan dalam mencapai kinerja berikutnya',
                        'bobot'             => 7.5,
                    ],
                ],
            ],
            [
                'no'        => '4',
                'komponen'  => 'Evaluasi Akuntabilitas Kinerja Internal',
                'bobot'     => 25,
                'sub_komponen'  => [
                    [
                        'no'                => '4.a',
                        'sub_komponen'      => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan',
                        'bobot'             => 5,
                    ],
                    [
                        'no'                => '4.b',
                        'sub_komponen'      => 'Evaluasi Akuntabilitas Kinerja Internal telah dilaksanakan secara berkualitas dengan Sumber Daya yang memadai',
                        'bobot'             => 7.5,
                    ],
                    [
                        'no'                => '4.c',
                        'sub_komponen'      => 'Implementasi SAKIP telah meningkat karena evaluasi Akuntabilitas Kinerja Internal sehingga memberikan kesan yang nyata (dampak) dalam efektifitas dan efisiensi Kinerja',
                        'bobot'             => 12.5,
                    ],
                ],
            ],
        ];
        $pei = inspekEvaluasiInternal::create([
            'user_id' => $perangkat_daerah,
            'tahun' => $tahun,
        ]);
        foreach ($list_komponens as $list_komponen) {
            $komponens = InspekKomponen::create([
                'user_id' => $perangkat_daerah,
                'inspek_evaluasi_internal_id' => $pei->id,
                'no' => $list_komponen['no'],
                'komponen' => $list_komponen['komponen'],
                'bobot' => $list_komponen['bobot'],
                'nilai' => null,
            ]);
            foreach ($list_komponen['sub_komponen'] as $list_sub_komponen) {
                InspekSubKomponen::create([
                    'user_id' => $perangkat_daerah,
                    'inspek_komponen_id' => $komponens->id,
                    'no' => $list_sub_komponen['no'],
                    'sub_komponen' => $list_sub_komponen['sub_komponen'],
                    'bobot' => $list_sub_komponen['bobot'],
                    'nilai' => null,
                ]);
            }
        }
    }
}
