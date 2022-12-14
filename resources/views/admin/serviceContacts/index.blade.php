@extends("admin.layouts.app")

@section("style")
    <link href="{{ asset('admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb  video 72 contact-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Contacts de Clients</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tous les Contacts</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                            <a class="dropdown-item" href="javascript:;">Action</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Service</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($askServices as $contact)
                                            <tr>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->service->title}}</td>
                                                <td>{{ \Str::limit($contact->body,60) }}</td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $contact->id }}').submit()" class="ms-3 text-danger"><i class='bx bxs-trash'></i></a>
                                                        <form action="{{ route('admin.serviceContact.destroy',$contact) }}" id="delete_form_{{ $contact->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
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
    </div>
    <!--end page wrapper -->
@endsection
@section("script")
    <script src="{{ asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'excel', 'pdf']
            } );

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );

            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
        } );
    </script>
@endsection
