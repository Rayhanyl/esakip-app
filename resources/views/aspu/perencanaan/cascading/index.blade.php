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
        <div class="container">
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
                            <div id="myChart" class="chart--container">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .chart--container {
            height: 100%;
            width: 100%;
            min-height: 950px;
        }
        .zc-ref {
            display: none;
        }
    </style>
    @push('script-landingpage')
        <script>
            let chartData = [{
                    id: 'execdir',
                    name: 'Meningkatnya Produktivitas Daerah',
                    parent: '',
                    cls: 'bg-success'
                },

                {
                    id: 'fkn1l',
                    fake: true,
                    parent: 'execdir',
                    sibling: 'fkn1',
                    name: '1L'
                },
                {
                    id: 'fkn1',
                    fake: true,
                    name: '1',
                    parent: 'execdir'
                },
                {
                    id: 'deputydir',
                    name: 'DEPUTY<br>DIRECTOR',
                    parent: 'execdir',
                    sibling: 'fkn1',
                    cls: 'bblack'
                },

                {
                    id: 'asstdir',
                    name: 'ASST to the<br>EXECUTIVE DIRECTOR',
                    parent: 'fkn1',
                    sibling: 'fkn3',
                    cls: 'bblack'
                },
                {
                    id: 'fkn3',
                    fake: true,
                    name: '3',
                    parent: 'fkn1'
                },
                {
                    id: 'itmanag',
                    name: 'IT Manager',
                    parent: 'fkn1',
                    cls: 'bblack',
                    sibling: 'fkn3'
                },

                // orange
                {
                    id: 'dirtran',
                    name: 'Director<br>Transportation<br>& Planning<br>Services',
                    parent: 'fkn3',
                    cls: 'borange'
                },

                {
                    id: 'adminasst',
                    name: 'Administrative<br>Assistant',
                    parent: 'dirtran',
                    sibling: 'fkn4',
                    cls: 'borange'
                },
                {
                    id: 'fkn4',
                    fake: true,
                    name: '4',
                    parent: 'dirtran'
                },
                {
                    id: 'fkn4d',
                    fake: true,
                    name: '4D',
                    parent: 'dirtran',
                    sibling: 'fkn4'
                },

                {
                    id: 'progcoo1',
                    name: 'Program<br>Coordinator',
                    parent: 'fkn4',
                    cls: 'borange'
                },
                {
                    id: 'transplan',
                    name: 'Trans-<br>portation<br>Planner',
                    parent: 'progcoo1',
                    cls: 'borange'
                },
                {
                    id: 'gistech',
                    name: 'GIS<br>Technician',
                    parent: 'progcoo1',
                    reference: 'transplan',
                    cls: 'borange'
                },

                {
                    id: 'progcoo2',
                    name: 'Program<br>Coordinator',
                    parent: 'fkn4',
                    cls: 'borange'
                },
                {
                    id: 'transplan2',
                    name: 'Trans-<br>portation<br>Planner',
                    parent: 'progcoo2',
                    cls: 'borange'
                },
                {
                    id: 'intern',
                    name: 'Intern',
                    parent: 'progcoo2',
                    reference: 'transplan2',
                    cls: 'borange'
                },

                {
                    id: 'progcoo3',
                    name: 'Program<br>Coordinator',
                    parent: 'fkn4',
                    cls: 'borange'
                },
                {
                    id: 'transplan3',
                    name: 'Trans-<br>portation<br>Planner',
                    parent: 'progcoo3',
                    cls: 'borange'
                },
                {
                    id: 'transplan4',
                    name: 'Trans-<br>portation<br>Planner',
                    parent: 'progcoo3',
                    reference: 'transplan3',
                    cls: 'borange'
                },

                // blue
                {
                    id: 'dirfin',
                    name: 'Director,<br>Finance',
                    parent: 'fkn3',
                    cls: 'blightblue'
                },

                {
                    id: 'accasst',
                    name: 'Accounting<br>Administrative<br>Assistant',
                    parent: 'dirfin',
                    sibling: 'fkn6',
                    cls: 'blightblue'
                },
                {
                    id: 'fkn6',
                    fake: true,
                    name: '6',
                    parent: 'dirfin'
                },
                {
                    id: 'fkn6d',
                    fake: true,
                    name: '6D',
                    parent: 'dirfin',
                    sibling: 'fkn6'
                },

                {
                    id: 'chacc',
                    name: 'Chief<br>Accountant',
                    parent: 'fkn6',
                    cls: 'blightblue'
                },
                {
                    id: 'payacc',
                    name: 'Payroll<br>Accountant',
                    parent: 'fkn6',
                    reference: 'chacc',
                    cls: 'blightblue'
                },

                // red
                {
                    id: 'dir911',
                    name: 'Director,<br>9-1-1 &<br>Public Safety',
                    parent: 'fkn3',
                    cls: 'bred'
                },

                {
                    id: 'adminasst2',
                    name: 'Administrative<br>Assistant',
                    parent: 'dir911',
                    sibling: 'fkn5',
                    cls: 'bred'
                },
                {
                    id: 'fkn5',
                    fake: true,
                    name: '5',
                    parent: 'dir911'
                },
                {
                    id: 'fkn5d',
                    fake: true,
                    name: '5D',
                    parent: 'dir911',
                    sibling: 'fkn5'
                },

                {
                    id: '911sm',
                    name: '9-1-1<br>Support<br>Manager',
                    parent: 'fkn5',
                    cls: 'bred'
                },
                {
                    id: '911ss',
                    name: '9-1-1<br>System<br>Specialist',
                    parent: '911sm',
                    cls: 'bred rshifted'
                },
                {
                    id: '911acs',
                    name: '9-1-1 ACOG<br>System<br>Specialist I',
                    parent: '911sm',
                    reference: '911ss',
                    cls: 'bred rshifted'
                },

                {
                    id: '911ipm',
                    name: '9-1-1<br>Institute<br>Programs<br>Manager',
                    parent: 'fkn5',
                    cls: 'bred'
                },

                {
                    id: '911gism',
                    name: '9-1-1 GIS<br>Manager',
                    parent: 'fkn5',
                    cls: 'bred'
                },
                {
                    id: '911giss',
                    name: '9-1-1 GIS<br>Specialist',
                    parent: '911gism',
                    cls: 'bred rshifted'
                },
                {
                    id: '911gist',
                    name: '9-1-1 GIS<br>Technician',
                    parent: '911gism',
                    reference: '911giss',
                    cls: 'bred rshifted'
                },

                {
                    id: 'facman',
                    name: 'Facilities<br>Management',
                    parent: 'fkn5',
                    cls: 'bred'
                },

                // dark blue
                {
                    id: 'dirwat',
                    name: 'Director,Water<br>Resources',
                    parent: 'fkn3',
                    cls: 'bblue'
                },

                {
                    id: 'adminasst3',
                    name: 'Administrative<br>Assistant',
                    parent: 'dirwat',
                    sibling: 'fkn7',
                    cls: 'bblue'
                },
                {
                    id: 'fkn7',
                    fake: true,
                    name: '7',
                    parent: 'dirwat'
                },
                {
                    id: 'fkn7d',
                    fake: true,
                    name: '7D',
                    parent: 'dirwat',
                    sibling: 'fkn7'
                },
                {
                    id: 'cip',
                    name: 'CIP',
                    parent: 'fkn7',
                    cls: 'bblue'
                },

                // green
                {
                    id: 'dirpr',
                    name: 'Director, PR<br>and Comm.<br>Development',
                    parent: 'fkn3',
                    cls: 'bgreen'
                },
                {
                    id: 'cdbg',
                    name: 'CDBG,REAP',
                    parent: 'dirpr',
                    cls: 'bgreen rshifted'
                },
                {
                    id: 'clci',
                    name: 'CLEAN CITIES',
                    parent: 'dirpr',
                    reference: 'cdbg',
                    cls: 'bgreen rshifted'
                },
                {
                    id: 'edd',
                    name: 'EDD',
                    parent: 'dirpr',
                    reference: 'cdbg',
                    cls: 'bgreen rshifted'
                },
                {
                    id: 'grde',
                    name: 'GRAPHIC<br>DESIGN',
                    parent: 'dirpr',
                    reference: 'cdbg',
                    cls: 'bgreen rshifted'
                }
            ];

            let chartConfig = {
                type: 'tree',
                backgroundColor: '#f9f9f9',
                options: {
                    aspect: 'tree-down',
                    orgChart: true,
                    packingFactor: 1,
                    link: {
                        lineColor: '#000'
                    },
                    'link[parent-911sm]': {
                        aspect: 'side-before'
                    },
                    'link[parent-911gism]': {
                        aspect: 'side-before'
                    },
                    'link[parent-dirpr]': {
                        aspect: 'side-before'
                    },
                    node: {
                        height: '65px',
                        borderColor: '#333333',
                        borderWidth: '1px',
                        shadow: true,
                        shadowAlpha: 0.5,
                        shadowDistance: '2px',
                        label: {
                            color: '#fff',
                            fontSize: '10px'
                        },
                        hoverState: {
                            visible: false
                        },
                        tooltip: {
                            text: '<b>%text</b><br>%data-title'
                        }
                    },
                    'node[cls-rshifted]': {
                        offsetX: '25px'
                    },
                    'node[cls-lshifted]': {
                        offsetX: '-25px'
                    },
                    'node[cls-bblack]': {
                        backgroundColor: '#000',
                        width: '120px'
                    },
                    'node[cls-borange]': {
                        backgroundColor: '#F6931D',
                        width: '80px'
                    },
                    'node[cls-bred]': {
                        backgroundColor: '#C00000',
                        width: '80px'
                    },
                    'node[cls-blightblue]': {
                        backgroundColor: '#00B9C2',
                        width: '80px'
                    },
                    'node[cls-bblue]': {
                        backgroundColor: '#00408F',
                        width: '80px'
                    },
                    'node[cls-bgreen]': {
                        backgroundColor: '#70AD47',
                        width: '80px'
                    }
                },
                plotarea: {
                    margin: '20px 20x 20x 0'
                },
                series: chartData
            };

            zingchart.render({
                id: 'myChart',
                width: '100%',
                height: '100%',
                data: chartConfig
            });
        </script>
    @endpush
@endsection
