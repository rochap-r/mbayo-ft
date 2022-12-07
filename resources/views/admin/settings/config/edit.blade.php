@extends("admin.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb 76 eme video à commencer-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Configuration</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mis à jour des données de Configuration</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                            <a class="dropdown-item" href="javascript:;">Actions</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Mettre à jour les données de Configuration</h5>
                    <hr/>
                    <form action="{{ route('admin.config.update') }}" method="POST" id="post_form">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">L'email de réception de mails de Visiteurs</label>
                                            <input type="email" name="contact_email" value="{{ old('contact_email',$config->contact_email) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez l'adresse e-mail de reception de mails des visiteurs'">
                                            @error('contact_email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">L'email de réception de mails de clients de services</label>
                                            <input type="email" name="service_email" value="{{ old('service_email',$config->service_email) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez l'adresse e-mail de reception de mails des clients'">
                                            @error('service_email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Avez-vous déjà satisfait combien des clients?</label>
                                            <input type="number" name="clients" value="{{ old('clients',$config->clients) }}"  required class="form-control" id="inputProductTitle" min="0" max="100">
                                            @error('clients')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Avez-vous déjà réalisé combien de projets?</label>
                                            <input type="number" name="projets" value="{{ old('projets',$config->projets) }}"  required class="form-control" id="inputProductTitle" min="0" max="100">
                                            @error('projets')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Combien de récompenses Avez-vous reçu?</label>
                                            <input type="number" name="recompenses" value="{{ old('recompenses',$config->recompenses) }}"  required class="form-control" id="inputProductTitle" min="0" max="100">
                                            @error('recompenses')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">
                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Mettre à jour les données de Configuration</button>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
  <script>
        $(document).ready(function () {


            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
        })

    </script>
@endsection
