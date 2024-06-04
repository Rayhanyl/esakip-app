@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Evaluasi Internal</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <form action="{{ route('aspu.evaluasi.internal') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="perda">Perangkat Daerah</label>
                        <select class="form-select select2" id="perda" name="perda">
                            <option value="" selected>-- All --</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $perda ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                        <select class="form-select" id="tahun" name="tahun">
                            <option value="" selected>- Pilih Tahun -</option>
                            @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                <option value="{{ $i }}">
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 py-4">
                        <button class="btn btn-primary btn-sm w-100 ">Seacrh</button>
                    </div>
                </div>
            </form>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Evaluasi Internal</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-evaluasi-internal">
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Perangkat Daerah</th>
                                            <th>Tahun</th>
                                            <th>Nilai</th>
                                            <th>Predikat</th>
                                            <th>LHE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
                $('#data-evaluasi-internal').DataTable({
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
