@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Rencana Aksi</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route ('aspu.rencana.aksi') }}">Perangkat Daerah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route ('aspu.pemkab-rencana.aksi') }}">Pemerintah Kabupaten</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <form class="row" action="{{ route ('aspu.rencana.aksi') }}" method="get">
                        @csrf
                        <div class="col-12 col-lg-3">
                            <label class="form-label fs-5 fw-bold" for="">Tahun</label>
                            <select class="form-select" id="basicSelect" name="year">
                                <option value="" selected>- Pilih Tahun -</option>
                                @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label class="form-label fs-5 fw-bold" for="">Perangkat Daerah</label>
                            <select class="form-select select2" id="perda" name="perda">
                                <option value="" selected>-- All --</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $perda ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg-3 py-4">
                            <button class="btn btn-primary btn-sm w-100 ">Seacrh</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Rencana Aksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-rencana-aksi">
                                    <thead class="table-info">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th colspan="4">Target</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>IKU</th>
                                            <th>Rencana Aksi</th>
                                            <th>Indikator</th>
                                            <th>I</th>
                                            <th>II</th>
                                            <th>III</th>
                                            <th>IV</th>
                                            <th>Penanggung Jawab</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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
                $('#data-table-rencana-aksi').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
