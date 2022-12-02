@extends("admin.layouts.app")
@section("style")
    <link href="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">MFT Articles</p>
                                    <h4 class="my-1 text-info">{{ $nbPost }}</h4>
                                    <p class="mb-0 font-13">Total</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bx-message-square-edit'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">MFT Utilisateurs</p>
                                    <h4 class="my-1 text-danger">{{ $nbUser }}</h4>
                                    <p class="mb-0 font-13">Total</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-user'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">MFT NB-Commentaires</p>
                                    <h4 class="my-1 text-success">{{ $nbComment }}</h4>
                                    <p class="mb-0 font-13">Total</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-comment-dots '></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">MFT Services</p>
                                    <h4 class="my-1 text-warning">{{ $nbService }}</h4>
                                    <p class="mb-0 font-13">Total</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bx-run'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">MFT Messages Visiteurs</p>
                                    <h4 class="my-1 text-info">{{ $nbContact }}</h4>
                                    <p class="mb-0 font-13">Total</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bx-mail-send'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">MFT Messages Contacts Services</p>
                                    <h4 class="my-1 text-danger">{{ $nbContactService }}</h4>
                                    <p class="mb-0 font-13">Total</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-envelope'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div><!--end row-->
        </div>
    </div>
@endsection

@section("script")
    <script src="{{  asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{  asset('admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{  asset('admin/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{  asset('admin/plugins/chartjs/js/Chart.extension.js')}}"></script>
    <script src="{{  asset('admin/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{  asset('admin/js/index.js')}}"></script>
@endsection
