@extends("admin.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb 76 eme video à commencer-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Contactez-nous</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mis à jour de la page Contact</li>
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
                    <h5 class="card-title">Mettre à jour de la page Contact</h5>
                    <hr/>
                    <form action="{{ route('admin.contact.update') }}" method="POST" id="post_form">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Le titre en bas de nous contactez!</label>
                                            <input type="text" name="title" value="{{ old('title',$contact->title) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le titre du contact!">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">L'email de contact de la société</label>
                                            <input type="email" name="email" value="{{ old('email',$contact->email) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez l'adresse e-mail de contact'">
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Le numéro de télephone de la société </label>
                                            <input type="tel" name="tel" value="{{ old('tel',$contact->tel) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le numéro de télephone'">
                                            @error('tel')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">L'adresse physique de la société!</label>
                                            <input type="text" name="adress" value="{{ old('adress',$contact->adress) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez l'adresse de cette Société">
                                            @error('adress')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="mb-3">
                                            <label for="footerDescription" class="form-label">Tapez la déscription du pied de page!</label>
                                            <textarea  required class="form-control" name="footerDescription"  id="footerDescription">
                                                {{ old('footerDescription',$contact->footerDescription) }}
                                            </textarea>
                                            @error('footerDescription')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">
                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Mettre à jour la page Contact</button>
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
