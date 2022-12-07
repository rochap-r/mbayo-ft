@extends("admin.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb 76 eme video à commencer-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">A-propos de Nous</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mis à jour de la page A-propos</li>
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
                    <h5 class="card-title">Mettre à jour de la page A-propos</h5>
                    <hr/>
                    <form action="{{ route('admin.bgConfig.update') }}" method="POST" id="post_form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                      
                                        {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="mft_bg_image" class="form-label">Fond d'écran pages MFT-Infos</label>
                                                    <input  type="file" required class="form-control" name="mft_bg_image"  id="mft_bg_image ">
                                                    @error('mft_bg_image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="user-image text-center p-2">
                                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$bg->mft_bg_image) }}" alt="Fond d'écran pages MFT-Infos">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">

                                         {{-- separator --}}
                                         <hr class="text-dark">

                                         <div class="row">
                                             <div class="col-md-8">
                                                 <div class="mb-3">
                                                     <label for="service_bg_image" class="form-label">Fond écran pages Services</label>
                                                     <input  type="file" required class="form-control" name="service_bg_image"  id="service_bg_image ">
                                                     @error('service_bg_image')
                                                     <p class="text-danger">{{ $message }}</p>
                                                     @enderror
                                                 </div>
                                             </div>
                                             <div class="col-md-4 ">
                                                 <div class="user-image text-center p-2">
                                                     <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$bg->service_bg_image) }}" alt="Fond écran pages Services">
                                                 </div>
                                             </div>
                                         </div>
                                         {{-- separator --}}
                                         <hr class="text-dark">

                                          {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="contact_bg_image" class="form-label">Fond écran page contact</label>
                                                    <input  type="file" required class="form-control" name="contact_bg_image"  id="contact_bg_image ">
                                                    @error('contact_bg_image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="user-image text-center p-2">
                                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$bg->contact_bg_image) }}" alt="Fond écran page contact">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">

                                         {{-- separator --}}
                                         <hr class="text-dark">

                                         <div class="row">
                                             <div class="col-md-8">
                                                 <div class="mb-3">
                                                     <label for="about_bg_image" class="form-label">Fond écran page à-propos</label>
                                                     <input  type="file" required class="form-control" name="about_bg_image"  id="about_bg_image ">
                                                     @error('about_bg_image')
                                                     <p class="text-danger">{{ $message }}</p>
                                                     @enderror
                                                 </div>
                                             </div>
                                             <div class="col-md-4 ">
                                                 <div class="user-image text-center p-2">
                                                     <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$bg->about_bg_image) }}" alt="L'image d'à-propos">
                                                 </div>
                                             </div>
                                         </div>
                                         {{-- separator --}}
                                         <hr class="text-dark">

                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Mettre à jour les fonds d'écrans</button>
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
