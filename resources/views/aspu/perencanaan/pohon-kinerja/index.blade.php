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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ route('aspu.perencanaan.pohon-kinerja') }}" method="get" id="form-sastra">
                                <div class="row">
                                    <x-admin.form.select label="Sasaran Strategis" name="id"
                                        value="{{ $id ?? '' }}" :lists="$sastra_options" id="sastra_select2" />
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            @if ($data_chart)
                                <div id="chartDiv1" style="max-width: 100%; height:800px;"></div>
                            @else
                                <h3 class="text-center">Silahkan Pilih Sasaran Strategis</h3>
                            @endif
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
            @if ($data_chart)
                var chart = JSC.chart('chartDiv1', {
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
                        points: @json($data_chart)
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
            @endif
            $('#sastra_select2').on('change', function() {
                $('#form-sastra').submit();
            })
        </script>
    @endpush
@endsection
