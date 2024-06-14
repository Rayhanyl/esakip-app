@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5">
                <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Sistem Akuntabilitas Kinerja Instansi.</h1>
                    <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Pemerintah Kabupaten Majalengka</p>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="">
                        <div class="card bg-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/images/logo/pemkab1.png') }}" alt="Image"
                                        class="img-fluid rounded w-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Nilai SAKIP <i class="bi bi-graph-down"></i></h3>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="card shadow rounded-5">
                        <div class="card-body rounded-5">
                            <canvas id="myLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script-landingpage')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const labels = @json($labels);
                const data = @json($data);

                const ctx = document.getElementById('myLineChart').getContext('2d');
                const myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Grafik Nilai SAKIP',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Year'
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Value'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
