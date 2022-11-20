
@extends("admin.layouts.app")
@section("style")
    <link href="{{ asset('admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Services</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edition du service</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edition du service: {{ $service->title }}</h5>
                    <hr/>
                    <form action="{{ route('admin.services.update',$service) }}" method="POST" enctype="multipart/form-data" id="post_form_{{ $service->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Le titre du service</label>
                                            <input type="text" value="{{ old('title',$service->title) }}" name="title" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Limace du service (Slug)</label>
                                            <input type="text" name="slug" value="{{ old('slug',$service->slug) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
                                            @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Déscription du service</label>
                                            <input type="text" name="description" value="{{ old('description',$service->description) }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Extrait du service</label>
                                            <textarea class="form-control"  required id="inputProductDescription" name="excerpt" rows="3">{{ old('excerpt',$service->excerpt) }}</textarea>
                                            @error('excerpt')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label for="inputProductDescription" class="form-label">Image d'article</label>
                                                            <input id="image-uploadify"  name="thumbnail" type="file" accept="image/*">
                                                            @error('thumbnail')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <img width="240" src="{{ $service->image ? asset('storage/'.$service->image->path.'') : asset('storage/placeholders/article-placeholder.jpg') }}" class="img-responsive" alt="Image du service">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Contenu du service</label>
                                            <textarea id="body" required class="ckeditor form-control" name="body" id="inputProductDescription" rows="3">{{ old('body',str_replace('jpeg','jpg',str_replace('../../', '../../../', $service->body))) }}</textarea>
                                            @error('body')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="approved" class="form-check-input" id="flexSwitchCheckChecked" {{ $service->approved ? 'checked':''}}>
                                                <label for="flexSwitchCheckChecked" class="form-check-label {{ $service->approved ? 'text-success':'text-danger' }}">{{ $service->approved ? 'Approuvé':'Non Approuvé' }}</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button onclick="event.preventDefault(); document.getElementById('post_form_{{ $service->id }}').submit()" class="btn btn-primary text-uppercase">Editer ce service</button>&nbsp&nbsp&nbsp
                                            <button onclick="event.preventDefault(); document.getElementById('delete_form_{{ $service->id }}').submit()" class="btn btn-danger text-uppercase">supprrimer ce service</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                    <form action="{{ route('admin.services.destroy',$service) }}" method="POST" id="delete_form_{{ $service->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
    <script src="{{ asset('admin/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });


            setTimeout(()=>{ $(".general-message").fadeOut(); },5000)
        })

    </script>
@endsection
