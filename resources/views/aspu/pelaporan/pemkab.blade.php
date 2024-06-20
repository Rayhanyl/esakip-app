@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Pelaporan Kinerja</h1>
                    <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Pelaporan kinerja merupakan bentuk
                        akuntabilitas dari pelaksanaan tugas dan fungsi yang dipercayakan kepada setiap instansi
                        pemerintahan atas penggunaan anggaran</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <form class="row g-3" action="{{ route('aspu.pelaporan.pemkab-index') }}" method="GET">
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                        <select class="form-select" id="tahun" name="tahun">
                            <option value="" selected>-- All --</option>
                            @for ($i = date('Y') + 10; $i >= date('Y') - 5; $i--)
                                <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 py-4">
                        <button class="btn btn-primary btn-sm w-100"><i class="bi bi-search"></i>
                            Search</button>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Pelaporan Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-pelaporan-kinerja-pemkab"
                                    style="width: 100%;">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">File pelaporan Kinerja</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Terdownload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $pelaporan)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $pelaporan->tahun }}</td>
                                                <td class="text-center">
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Download File Pelaporan Kinerja"
                                                        class="text-primary btn-count-file" data-id="{{ $pelaporan->id }}"
                                                        data-tipe="pemkab"
                                                        href="{{ route('aspu.pelaporan.download', ['id' => $pelaporan->id, 'tipe' => 'pemkab']) }}">
                                                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    {{ $pelaporan->keterangan }}
                                                </td>
                                                <td class="text-center">
                                                    <span class="keterangan-count" id="keterangan-{{ $pelaporan->id }}">
                                                        <b class="text-primary">
                                                            ({{ $pelaporan->count ?? '0' }})
                                                        </b>
                                                    </span>
                                                </td>
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
                $('#data-pelaporan-kinerja-pemkab').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });

                $('.btn-count-file').on('click', function(event) {
                    var downloadUrl = $(this).attr('href');
                    window.open(downloadUrl, '_blank');
                });

                $('.btn-count-file').on('click', function(event) {
                    event.preventDefault();
                    var pelaporanId = $(this).data('id');
                    var pelaporanTipe = $(this).data('tipe');
                    $.ajax({
                        url: '{{ route('aspu.pelaporan.count') }}',
                        type: 'POST',
                        data: {
                            id: pelaporanId,
                            tipe: pelaporanTipe,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#keterangan-' + pelaporanId).text(response.count);
                            } else {
                                console.log('Gagal menambahkan keterangan.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ' + error);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
