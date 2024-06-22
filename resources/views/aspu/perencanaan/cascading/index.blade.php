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
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Filter</label>
                                        <select name="" id="" class="form-control">
                                            <option value="1">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chartDiv1" style="max-width: 100%; height:800px;"></div>
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
            var chart = JSC.chart('chartDiv1', {
                debug: true,
                type: 'organizational',

                /* These options will apply to all annotations including point nodes and breadcrumbs. */
                defaultAnnotation: {
                    padding: [5, 10],
                    margin: [15, 5]
                },
                defaultTooltip_enabled: false,

                defaultSeries: {
                    color: '#dde1e8',
                    defaultPoint: {
                        label_maxWidth: 400,
                        /* Default line styling for connector lines */
                        connectorLine: {
                            /* No radius on first angle, then 5px on the second angle. */
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
                    points: @json($dummy_data)
                    // points: [{
                    //         x: 'Project Manager',
                    //         id: 'PM'
                    //     },
                    //     {
                    //         x: 'Deputy Project Manager',
                    //         id: 'DPM',
                    //         parent: 'PM'
                    //     },
                    //     {
                    //         x: 'System Engineering',
                    //         id: 'SE',
                    //         parent: 'DPM'
                    //     },
                    //     {
                    //         x: 'Independent Test Group',
                    //         id: 'ITG',
                    //         parent: 'DPM'
                    //     },
                    //     {
                    //         x: 'Project Technical Lead',
                    //         id: 'PTL',
                    //         parent: 'DPM'
                    //     },
                    //     {
                    //         x: 'Quality Assurance',
                    //         id: 'QA',
                    //         parent: 'DPM'
                    //     },
                    //     {
                    //         x: 'Configuration Manager',
                    //         id: 'CM',
                    //         parent: 'DPM'
                    //     },

                    //     {
                    //         x: 'S/W Subproject Manager 1',
                    //         id: 'SM1',
                    //         parent: 'PTL'
                    //     },
                    //     {
                    //         x: 'Team 1',
                    //         id: 'team11',
                    //         parent: 'SM1'
                    //     },
                    //     {
                    //         x: 'Team 2',
                    //         id: 'team12',
                    //         parent: 'SM1'
                    //     },
                    //     {
                    //         x: 'Team 3',
                    //         id: 'team13',
                    //         parent: 'SM1'
                    //     },

                    //     {
                    //         x: 'S/W Subproject Manager 2',
                    //         id: 'SM2',
                    //         parent: 'PTL'
                    //     },
                    //     {
                    //         x: 'Team 1',
                    //         id: 'team21',
                    //         parent: 'SM2'
                    //     },
                    //     {
                    //         x: 'Team 2',
                    //         id: 'team22',
                    //         parent: 'SM2'
                    //     },

                    //     {
                    //         x: 'S/W Subproject Manager 3',
                    //         id: 'SM3',
                    //         parent: 'PTL'
                    //     },
                    //     {
                    //         x: 'Team 1',
                    //         id: 'team31',
                    //         parent: 'SM3'
                    //     },
                    //     {
                    //         x: 'Team 2',
                    //         id: 'team32',
                    //         parent: 'SM3'
                    //     }
                    // ]
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
        </script>
    @endpush
@endsection
