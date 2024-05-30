@extends('landingpage.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Pengukuran Kinerja</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section sec-services">
        <div class="container">
            {{-- <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                    <h2 class="heading text-primary">Featured Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. </p>
                </div>
            </div> --}}
            <form action="#" method="get">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="">Perangkat Daerah</label>
                        <select class="form-select" id="perangkat_daerah" name="perangkat_daerah">
                            <option value="" selected>- Pilih Perangkat Daerah -</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="">Tahun</label>
                        <select class="form-select" id="tahun" name="tahun">
                            <option value="" selected>- Pilih Tahun -</option>
                            @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                <option value="{{ $i }}">
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="">Triwulan</label>
                        <select class="form-select" id="triwulan" name="triwulan">
                            <option value="" selected>- Pilih Triwulan -</option>
                            <option value="1" selected>1</option>
                            <option value="2" selected>2</option>
                            <option value="3" selected>3</option>
                            <option value="4" selected>4</option>
                            <option value="tahunan" selected>Tahunan</option>
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
                            <h4 class="card-title">Tabel Pengukuran Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="data-table-pengukuran-kinerja-landingpage">
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Perangkat Daerah</th>
                                            <th>Tahun</th>
                                            <th>Triwulan</th>
                                            <th>Capaian (%)</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td></td>
                                                <td>{{ $item->year }}</td>
                                                <td>{{ $item->triwulan }}</td>
                                                <td>{{ $item->capaian }}</td>
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
                $('#data-table-pengukuran-kinerja-landingpage').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [5, 10, 15, -1],
                        [5, 10, 15, 'All'],
                    ],
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
