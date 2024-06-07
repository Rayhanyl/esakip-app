<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Models\SasaranBupati;
use App\Models\SasaranProgram;
use App\Models\PenanggungJawab;
use App\Models\SasaranPengampu;
use App\Models\SasaranStrategis;
use App\Models\PengampuSementara;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use App\Models\SasaranPenanggungJawab;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SasaranStrategisIndikator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\StoreSasaranStrategisRequest;
use App\Http\Requests\UpdateSasaranStrategisRequest;


class SasaranStrategisController extends Controller
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';

        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('pengampu_sementara', PengampuSementara::all()->keyBy('id')->transform(function ($list) {
            $position = !empty($list->jabatan) ? $list->jabatan : (!empty($list->pelaksana) ? $list->pelaksana : $list->fungsional);
            return $list->nip_baru . ' - ' . $list->nama_pegawai . ' - ' . $position;
        }));
        View::share('sasaran_bupati_options', SasaranBupati::all()->keyBy('id')->transform(function ($sasaran_bupati) {
            return $sasaran_bupati->sasaran_bupati;
        }));
        View::share('tahun_options', collect(array_combine(range(2029, 2020, -1), range(2029, 2020, -1)))->transform(function ($list) {
            return $list;
        }));
        View::share('tipe_perhitungan_options', collect(array_combine(
            ["1", "2"],
            ["Kumulatif", "Non-Kumulatif"],
        ))->transform(function ($list) {
            return $list;
        }));
        View::share('satuan_options', Satuan::all()->keyBy('id')->transform(function ($list) {
            return $list->satuan;
        }));
        View::share('sasaran_strategis', SasaranStrategis::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::all();
        return view('admin.perda.perencanaan_kinerja.sasaran_strategis.index', compact('satuan'));
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
        try {
            $data = SasaranStrategis::create(array_merge($request->except('indikator_sasaran', 'pengampu_id'), ['user_id' => Auth::user()->id]));
            SasaranPengampu::create([
                'sasaran_id' => $data->id,
                'pengampu_sementara_id' => $request->pengampu_id,
            ]);
            foreach ($request->indikator_sasaran as $value) {
                $penanggung_jawabs = $value['penanggung_jawab'];
                unset($value['penanggung_jawab']);
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_strategis_id' => $data->id]);
                $data_indikator = SasaranStrategisIndikator::create($params);
                foreach ($penanggung_jawabs as $penanggung_jawab) {
                    SasaranPenanggungJawab::create([
                        'sasaran_id' => $data_indikator->id,
                        'penanggung_jawab' => $penanggung_jawab
                    ]);
                }
            }
            Alert::toast('Berhasil menyimpan data sasaran strategis', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the error if the deletion fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to delete the record. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranStrategis $sasaranStrategis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranStrategis $sasaranStrategis)
    {
        $sasaranStrategis->load('indikators', 'indikators.sasaran_penanggung_jawabs');
        return view('admin.perda.perencanaan_kinerja.sasaran_strategis.edit', compact('sasaranStrategis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SasaranStrategis $sasaranStrategis)
    {
        try {
            $data = $sasaranStrategis->update($request->except('indikator_sasaran', 'pengampu_id'));
            foreach ($request->indikator_sasaran as $key => $value) {
                $penanggung_jawabs = $value['penanggung_jawab'];
                unset($value['penanggung_jawab']);
                $params = array_merge($value, ['sasaran_strategis_id' => $sasaranStrategis->id]);
                $indikator = SasaranStrategisIndikator::find($key);
                $data_indikator = $indikator->update($params);
                foreach ($penanggung_jawabs as $key => $penanggung_jawab) {
                    SasaranPenanggungJawab::find($key)->update([
                        'sasaran_id' => $indikator->id,
                        'penanggung_jawab' => $penanggung_jawab
                    ]);
                }
            }
            Alert::toast('Berhasil menyimpan data sasaran strategis', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            // Handle the error if the deletion fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to delete the record. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranStrategis $sasaranStrategis)
    {
        // Attempt to delete the record
        try {
            // Delete the SasaranBupati record along with its associated SasaranBupatiIndikator records
            $sasaranStrategis->delete();

            // Return a success message
            Alert::toast('Berhasil menghapus data sasaran strategis', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back();
        }
    }

    public function indicator(Request $request)
    {
        $iter = $request->iter;
        $tahun = $request->tahun;
        return view('admin.perda.perencanaan_kinerja.sasaran_strategis._partials.indicator', compact('iter', 'tahun'));
    }

    public function get_indicator(Request $request)
    {
        $indicators = SasaranStrategisIndikator::whereSasaranStrategisId($request->id)->get();
        return response()->json($indicators);
    }

    public function penanggung_jawab(Request $request)
    {
        $iter = $request->iter;
        return view('admin.perda.perencanaan_kinerja.sasaran_strategis._partials.penanggung-jawab', compact('iter'));
    }

    public function get_pengampu(Request $request)
    {
        $nip = '';
        $nama = '';
        if (is_numeric($request->q)) {
            $nip = $request->q;
        }else{
            $nama = $request->q;
        }
        // Set the page number and number of items per page
        $page = $request->input('page', 1);
        $perPage = 12202; // You can adjust this value as needed

        $response = Http::withHeaders([
            'User-Agent' => 'insomnia/2023.5.8',
            'Authorization' => 'Bearer ' . session('token')
        ])->get($this->baseUrl . '/esakip/list_pengampu?opd=&nip='.$nip.'&nama=' . $nama);
        // Check if the request was successful
        if ($response->successful()) {
            $data = json_decode($response->getBody()->getContents());
            // Paginate the data
            $paginatedData = Paginator::resolveCurrentPage('page') ?: 1;
            $paginatedData = new LengthAwarePaginator(
                collect($data->result)->forPage($page, $perPage),
                count($data->result),
                $perPage,
                $page,
                ['path' => Paginator::resolveCurrentPath()]
            );
            return response()->json($paginatedData);
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
}
