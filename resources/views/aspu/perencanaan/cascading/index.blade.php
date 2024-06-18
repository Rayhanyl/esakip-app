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
                            <div id="tree"></div>
                            <div id="tree2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script-landingpage')
        <script>
            const data = {
                id: 'Species',
                name: 'Species',
                children: [{
                        id: '2',
                        name: 'Plants',
                        category: 'Species',
                        children: [{
                                id: '3',
                                name: 'Mosses',
                                category: 'Plants',
                            },
                            {
                                id: '4',
                                name: 'Ferns',
                                category: 'Plants',
                            },
                        ],
                    },
                    {
                        id: '8',
                        name: 'Fungi',
                    },
                    {
                        id: '9',
                        name: 'Lichens',
                    },
                    {
                        id: '10',
                        name: 'Animals',
                        children: [{
                                id: '11',
                                name: 'Invertebrates',
                                category: 'Animals',
                                children: [{
                                    id: '12',
                                    name: 'Insects',
                                    category: 'Invertebrates',
                                }, ],
                            },
                            {
                                id: '16',
                                name: 'Vertebrates',
                                category: 'Animals',
                                children: [{
                                        id: '17',
                                        name: 'Fish',
                                        category: 'Vertebrates',
                                    },
                                    {
                                        id: '19',
                                        name: 'Reptiles',
                                        category: 'Vertebrates',
                                    },
                                ],
                            },
                        ],
                    },
                ],
            };
            const options = {
                contentKey: 'name',
                width: '100%',
                height: 700,
                nodeWidth: 400,
                nodeHeight: 200,
                childrenSpacing: 150,
                siblingSpacing: 30,
                direction: 'top',
                fontSize: '20px',
                fontFamily: 'sans-serif',
                fontWeight: 600,
                fontColor: '#a06dcc',
                canvasStyle: 'background: #FFFFFF;',
            };
            const tree = new ApexTree(document.getElementById('tree'), options);
            const graph = tree.render(data);

            const tree2 = new ApexTree(document.getElementById('tree2'), options);
            const graph2 = tree2.render(data);
        </script>
    @endpush
@endsection
