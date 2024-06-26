@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Cascading</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <x-admin.form.select label="Sasaran Strategis" name="id" value="{{ $id ?? '' }}"
                                    :lists="$sastra_options ?? []" id="sastra_select2" />
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center" id="label-chart">Pilih Perda & Sasaran Strategis</h3>
                            <h3 class="text-center text-danger" id="error-chart" style="display: none">Failed to Fetch Data</h3>
                            <div id="box-chart" style="display: none">
                                <div id="chartDiv1" style="max-width: 100%; height:800px;"></div>
                            </div>
                            <div id="loading-chart" style="display: none">
                                <div class="d-flex justify-content-center align-items-center gap-3">
                                    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <h3>Fetching Data ....</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    </style>
    @push('script-landingpage')
        <script type="text/javascript">
            function init_chart(data_chart, element) {
                var chart = JSC.chart(element, {
                    debug: true,
                    export: true,
                    type: 'organizational',
                    defaultAnnotation: {
                        padding: [30, 30],
                        margin: [30, 30],
                    },
                    defaultTooltip_enabled: false,
                    defaultSeries: {
                        color: '#dde1e8',
                        defaultPoint: {
                            label_maxWidth: 400,
                            connectorLine: {
                                radius: [0, 5],
                                color: '#424242',
                                width: 1,
                                caps: {
                                    end: {
                                        type: 'arrow',
                                        size: 6
                                    }
                                }
                            }
                        }
                    },
                    series: [{
                        points: data_chart
                    }],
                });
            }
            $('#sastra_select2').on('change', function() {
                const id = $(this).val()
                $.ajax({
                    url: "{{ route('aspu.perencanaan.pemkab-cascading.get-chart') }}",
                    data: {
                        id
                    },
                    beforeSend: function() {
                        $('#error-chart').hide();
                        $('#label-chart').hide();
                        $('#box-chart').hide();
                        $('#loading-chart').show();
                    },
                    success: function(result) {
                        $('#loading-chart').hide();
                        $('#box-chart').show();
                        init_chart(result, 'chartDiv1');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            $('#loading-chart').hide();
                            $('#box-chart').hide();
                            $('#error-chart').show();
                        }
                    }
                });
            })
        </script>
    @endpush
@endsection
