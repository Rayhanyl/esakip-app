@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Indikator Kinerja Utama</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <form class="row g-3" action="{{ route('aspu.perencanaan.pemkab-iku') }}" method="GET">
                            <div class="col-12 col-lg-12">
                                <div class="col-4">
                                    <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                                    <select class="form-select select2" id="tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="col-4">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Indikator Kinerja Utama</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover"
                                    id="data-table-indikator-kinerja-utama-pemkab" style="width: 100%;">
                                    <thead class="table-info">
                                        <tr style="font-size: 10px">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center" colspan="3">Target Kinerja</th>
                                        </tr>
                                        <tr style="font-size: 10px">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator Sasaran</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Penjelasan / Formulasi</th>
                                            <th class="text-center">Sumber Data</th>
                                            <th class="text-center">Penanggung Jawab</th>
                                            <th class="text-center">2024</th>
                                            <th class="text-center">2025</th>
                                            <th class="text-center">2026</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr style="font-size: 10px">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->pemkab_sastra->sasaran }}</td>
                                                <td>{{ $item->indikator }}</td>
                                                <td class="text-center">{{ $item->satuan->satuan }}</td>
                                                <td>{{ $item->penjelasan }}</td>
                                                <td>{{ $item->sumber_data }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($item->penanggung_jawabs as $penanggung_jawab)
                                                            <li>{{ $penanggung_jawab->penanggung_jawab }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="text-center">{{ $item->target1 }}</td>
                                                <td class="text-center">{{ $item->target2 }}</td>
                                                <td class="text-center">{{ $item->target3 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script-landingpage')
        <script>
            $(document).ready(function() {
                $('#data-table-indikator-kinerja-utama-pemkab').DataTable({
                    lengthMenu: [
                        [5, 25, 50, -1],
                        [5, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
