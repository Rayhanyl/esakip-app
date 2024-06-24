@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Pohon Kinerja</h1>
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
                                <x-admin.form.select label="Perda" name="user_id" value="{{ $user_id ?? '' }}"
                                    :lists="$user_options ?? []" id="user_id_select2" />
                                <x-admin.form.select label="Sasaran Strategis" name="id" value="{{ $id ?? '' }}"
                                    :lists="$sastra_options ?? []" id="sastra_select2" />
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center" id="label-chart">Pilih Perda & Sasaran Strategis</h3>
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
                    type: 'organizational',
                    defaultAnnotation: {
                        padding: [5, 5],
                        margin: [5, 5],
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

                    toolbar: {
                        defaultItem: {
                            margin: 5,
                            events_click: orientChart
                        },
                        items: {
                            Left_icon: 'system/default/zoom/arrow-left',
                            Right_icon: 'system/default/zoom/arrow-right',
                            Down_icon: 'system/default/zoom/arrow-down',
                            Up_icon: 'system/default/zoom/arrow-up'
                        }
                    }
                });

                function orientChart(direction) {
                    var isVertical = /up|down/.test(
                        direction.toLowerCase()
                    );
                    chart.options({
                        type: 'organizational ' + direction,
                        defaultPoint_annotation: {
                            syncWidth: !isVertical,
                            syncHeight: isVertical,
                            margin: isVertical ? [15, 5] : [5, 15]
                        }
                    });
                }
            }
            $('#user_id_select2').on('select2:select', function() {
                const user_id = $(this).val();
                $.ajax({
                    url: "{{ route('aspu.perencanaan.pohon-kinerja.get-sasaran') }}",
                    data: {
                        user_id
                    },
                    success: function(result) {
                        let list = result.map(el => ({
                            id: el.id,
                            text: el.sasaran
                        }));
                        list.unshift({
                            id: '',
                            text: '- Pilih Sasaran Strategis -',
                        })
                        $('#sastra_select2').html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                    }
                });
            })
            $('#sastra_select2').on('change', function() {
                const id = $(this).val()
                $.ajax({
                    url: "{{ route('aspu.perencanaan.pohon-kinerja.get-chart') }}",
                    data: {
                        id
                    },
                    beforeSend: function() {
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
                            $('#label-chart').html('Failed to Fetching Data').show();
                        }
                    }
                });
            })
        </script>
    @endpush
@endsection
