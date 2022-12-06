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
                    <form action="{{ route('admin.about.update') }}" method="POST" id="post_form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Limace d'article (Slug)</label>
                                            <input type="text" name="title" value="{{ old('title',$about->title) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'à-propos!">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Top Text</label>
                                            <textarea  required class="form-control" name="description"  id="description">
                                                {{ old('description',$about->description) }}
                                            </textarea>
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">La 1ère Caractéristique de cette Société!</label>
                                            <input type="text" name="caracteristique1" value="{{ old('caracteristique1',$about->caracteristique1) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez la 1ère Caractéristique de cette Société">
                                            @error('caracteristique1')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">La 2ème Caractéristique de cette Société!</label>
                                            <input type="text" name="caracteristique2" value="{{ old('caracteristique2',$about->caracteristique2) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez la 2ème Caractéristique de cette Société">
                                            @error('caracteristique2')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">La 3ème Caractéristique de cette Société!</label>
                                            <input type="text" name="caracteristique3" value="{{ old('caracteristique3',$about->caracteristique3) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez la 3ème Caractéristique de cette Société!">
                                            @error('caracteristique3')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">La 4ème Caractéristique de cette Société!</label>
                                            <input type="text" name="caracteristique4" value="{{ old('caracteristique4',$about->caracteristique4) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez la 4ème Caractéristique de cette Société">
                                            @error('caracteristique4')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- separator --}}
                                        <hr class="text-dark">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">L'image d'à-propos</label>
                                                    <input  type="file" required class="form-control" name="image"  id="image ">
                                                    @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="user-image text-center p-2">
                                                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$about->image) }}" alt="L'image d'à-propos">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- separator --}}
                                        <hr class="text-dark">
                                        <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Mettre à jour la page A-propos</button>
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
