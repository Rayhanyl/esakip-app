@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Perjanjian Kinerja</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="row g-3" action="{{ route('aspu.perencanaan.pemkab-perjanjian') }}" method="GET">
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
                                <button class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Perjanjian Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-perjanjian-kinerja-pemkab"
                                    style="width: 100%;">
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Sasaran Strategis</th>
                                            <th>Indikator</th>
                                            <th>Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                $('#data-table-perjanjian-kinerja-pemkab').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
