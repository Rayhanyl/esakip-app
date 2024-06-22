<?php

namespace App\Http\Controllers\Aspu\Evaluasi;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\InspekEvaluasiInternal;
use RealRashid\SweetAlert\Facades\Alert;

class AspuEvaluasiController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $userIds = $user->pluck('id');
        $perda = $request->perda;
        $tahun = $request->tahun;
        // Query to filter data
        $query = InspekEvaluasiInternal::query();

        // Filter by user role
        $query->whereHas('user', function ($q) use ($userIds) {
            $q->whereIn('id', $userIds);
        });

        // Filter by perda
        if ($perda) {
            $query->where('user_id', $perda);
        }

        // Filter by tahun
        if ($tahun) {
            $query->where('tahun', $tahun);
        }

        // Retrieve filtered data with relationships
        $data = $query->with('komponens.sub_komponens')->get();
        // Calculate the sum of nilai for each InspekEvaluasiInternal
        $nilaiSums = [];
        foreach ($data as $inspekEvaluasi) {
            $sum = 0;
            foreach ($inspekEvaluasi->komponens as $komponen) {
                foreach ($komponen->sub_komponens as $subKomponen) {
                    $sum += $subKomponen->nilai;
                }
            }
            $nilaiSums[$inspekEvaluasi->id] = $sum;
        }
        return view('aspu.evaluasi.index', compact('user', 'data', 'perda', 'tahun', 'nilaiSums'));
    }

    public function download(Request $request, $id)
    {
        $evaluasi = InspekEvaluasiInternal::findOrFail($id);
        $komponens = $evaluasi->komponens;
        $nilaiTotal = $komponens->pluck('nilai');
        $nilaiBobot = $komponens->pluck('bobot');
        $catatan = $komponens->pluck('catatan');
        $rekomendasi = $komponens->pluck('rekomendasi');
        $nilai = $evaluasi->nilai_akuntabilitas_kinerja;

        $predikat = 'N/A';
        if ($nilai > 90 && $nilai <= 100) {
            $predikat = 'AA';
        } elseif ($nilai > 80 && $nilai <= 90) {
            $predikat = 'A';
        } elseif ($nilai > 70 && $nilai <= 80) {
            $predikat = 'BB';
        } elseif ($nilai > 60 && $nilai <= 70) {
            $predikat = 'B';
        } elseif ($nilai > 50 && $nilai <= 60) {
            $predikat = 'CC';
        } elseif ($nilai > 30 && $nilai <= 50) {
            $predikat = 'C';
        } elseif ($nilai > 0 && $nilai <= 30) {
            $predikat = 'D';
        } elseif ($nilai == 0) {
            $predikat = 'E';
        } else {
            $predikat = 'Invalid nilai';
        }

        $predikat_name = 'N/A';
        if ($nilai > 90 && $nilai <= 100) {
            $predikat_name = 'Sangat Memuaskan';
            $predikat_description = 'Telah terwujud Good Governance. Seluruh kinerja  dikelola dengan sangat memuaskan di seluruh unit  kerja. Telah terbentuk pemerintah yang yang  dinamis, adaptif, dan efisien (Reform). Pengukuran  kinerja telah dilakukan sampai ke level individu.';
        } elseif ($nilai > 80 && $nilai <= 90) {
            $predikat_name = 'Memuaskan';
            $predikat_description = 'Terdapat gambaran bahwa instansi pemerintah/unit  kerja dapat memimpin perubahan dalam  mewujudkan pemerintahan berorientasi hasil,  karena pengukuran kinerja telah dilakukan sampai  ke level eselon 4/Pengawas/Subkoordinator.';
        } elseif ($nilai > 70 && $nilai <= 80) {
            $predikat_name = 'Sangat Baik';
            $predikat_description = 'Terdapat gambaran bahwa AKIP sangat baik pada  2/3 unit kerja, baik itu unit kerja utama, maupun  unit kerja pendukung. Akuntabilitas yang sangat  baik ditandai dengan mulai terwujudnya efisiensi  penggunaan anggaran dalam mencapai kinerja, memiliki sistem manajemen kinerja yang andal dan berbasis teknologi informasi, serta pengukuran kinerja telah dilakukan sampai ke level eselon  3/koordinator.';
        } elseif ($nilai > 60 && $nilai <= 70) {
            $predikat_name = 'Baik';
            $predikat_description = 'Terdapat gambaran bahwa AKIP sudah baik pada 1/3 unit kerja, khususnya pada unit kerja utama. Terlihat masih perlu adanya sedikit perbaikan pada  unit kerja, serta komitmen dalam manajemen  kinerja. Pengukuran kinerja baru dilaksanakan  sampai dengan level eselon 2/unit kerja.';
        } elseif ($nilai > 50 && $nilai <= 60) {
            $predikat_name = 'Cukup (Memadai)';
            $predikat_description = 'Terdapat gambaran bahwa AKIP cukup baik. Namun  demikian, masih perlu banyak perbaikan walaupun  tidak mendasar khususnya akuntabilitas kinerja  pada unit kerja.';
        } elseif ($nilai > 30 && $nilai <= 50) {
            $predikat_name = 'Kurang';
            $predikat_description = 'Sistem dan tatanan dalam AKIP kurang dapat diandalkan. Belum terimplementasi sistem manajemen kinerja sehingga masih perlu banyak  perbaikan mendasar di level pusat.';
        } elseif ($nilai > 0 && $nilai <= 30) {
            $predikat_name = 'Sangat Kurang';
            $predikat_description = 'Sistem dan tatanan dalam AKIP sama sekali tidak  dapat diandalkan. Sama sekali belum terdapat penerapan manajemen kinerja sehingga masih perlu  banyak perbaikan/perubahan yang sifatnya sangat  mendasar, khususnya dalam implementasi SAKIP.';
        } elseif ($nilai == 0) {
            $predikat_name = 'Sangat Kurang';
            $predikat_description = 'Sistem dan tatanan dalam AKIP sama sekali tidak  dapat diandalkan. Sama sekali belum terdapat penerapan manajemen kinerja sehingga masih perlu  banyak perbaikan/perubahan yang sifatnya sangat  mendasar, khususnya dalam implementasi SAKIP.';
        } else {
            $predikat_name = 'Invalid nilai';
            $predikat_description = 'Invalid';
        }

        $user = User::findOrFail($evaluasi->user_id);
        $yth = 'N/A';
        if (Str::contains($user->name, 'Kecamatan') == true || Str::contains($user->name, 'Perangkat Daerah') == true) {
            $yth = 'Camat';
        } else if (Str::contains($user->name, 'Dinas') == true || Str::contains($user->name, 'Badan') == true) {
            $yth = 'Kepala';
        } else if (Str::contains($user->name, 'Sekretariat Daerah') == true) {
            $yth = 'Sekertaris daerah';
        } else if (Str::contains($user->name, 'Sekretariat Dewan') == true) {
            $yth = 'Sekertaris dprd';
        } else if (Str::contains($user->name, 'Inspektorat') == true) {
            $yth = 'Inspektur';
        } else if (Str::contains($user->name, 'Pamong Praja') == true) {
            $yth = 'Kepala satuan polisi pamong praja';
        } else {
            $yth = '';
        }

        $pdf = PDF::loadView('aspu.evaluasi.pdf', [
            'evaluasi' => $evaluasi,
            'user' => $user,
            'yth' => $yth,
            'predikat_name' => $predikat_name,
            'predikat_description' => $predikat_description,
            'totalBobot' => $nilai,
            'predikat' => $predikat,
            'komponens' => $komponens,
            'nilaibobot' => $nilaiBobot,
            'nilaiTotal' => $nilaiTotal,
            'catatan' => $catatan,
            'rekomendasi' => $rekomendasi,
        ], ['orientation' => 'portrait']);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('Document LHE_' . $user->name . '_' . $evaluasi->tahun . '.pdf');
        // return view('akses_publik.evaluasi_internal.lhe', [
        //     'evaluasi' => $evaluasi,
        //     'user' => $user,
        //     'predikat_name' => $predikat_name,
        //     'totalBobot' => $nilai,
        //     'predikat' => $predikat,
        //     'komponens' => $komponens,
        //     'nilaibobot' => $nilaiBobot,
        //     'nilaiTotal' => $nilaiTotal,
        // ]);
    }
}
