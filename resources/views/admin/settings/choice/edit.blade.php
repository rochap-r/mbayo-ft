@extends("admin.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb 76 eme video à commencer-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Pourquoi nous choisir?</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mis à jour de la section Pourquoi nous choisir?</li>
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
                    <form action="{{ route('admin.choice.update') }}" method="POST" id="post_form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Le Titre en bas de pourquoi nous choisir?</label>
                                            <input type="text" name="title" value="{{ old('title',$choice->title) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de la section">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Décrivez la qualité de vos services</label>
                                            <input type="text" name="quality" value="{{ old('quality',$choice->quality) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez vos qualités">
                                            @error('quality')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Décrivez les recompenses de vos services!</label>
                                            <input type="text" name="recompense" value="{{ old('recompense',$choice->recompense) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez vos recompenses">
                                            @error('recompense')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Comment est votre personnel?</label>
                                            <input type="text" name="personnel" value="{{ old('personnel',$choice->personnel) }}"  required class="form-control" id="inputProductTitle" placeholder="saisissez vos pontentiel">
                                            @error('personnel')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Comment assistez-vous vos clients?</label>
                                            <input type="text" name="assistance" value="{{ old('assistance',$choice->assistance) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez l'assistance">
                                            @error('assistance')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">L'image de la section</label>
                                                    <input  type="file" required class="form-control" name="image"  id="image ">
                                                    @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="user-image text-center p-2">
                                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$choice->image) }}" alt="L'image d'à-propos">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Le Titre de la section notre equipe!</label>
                                            <input type="text" name="team_title" value="{{ old('team_title',$choice->team_title) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de la section">
                                            @error('team_title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                         {{-- separator --}}
                                         <hr class="text-dark">
                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Mettre à jour la section</button>
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
