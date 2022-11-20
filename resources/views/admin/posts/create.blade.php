
	@extends("admin.layouts.app")

	@section("style")
	<link href="{{ asset('admin/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<style>
		.imageuploadfy{
			border:0;
			max-width:100%;
		}
	</style>
	
	@endsection
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Articles</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Création</li>
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
					  <h5 class="card-title">Ajouter un nouvel Article</h5>
					  <hr/>
					  <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" id="post_form">
						@csrf
                       	<div class="form-body mt-4">
							<div class="row">
							   <div class="col-lg-12">
							  	 <div class="border border-3 p-4 rounded">
								   <div class="mb-3">
									<label for="inputProductTitle" class="form-label">Le titre de l'article</label>
									<input type="text" value="{{ old('title') }}" name="title" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
								   @error('title')
									   <p class="text-danger">{{ $message }}</p>
								   @enderror

								   </div>
								   <div class="mb-3">
									   <label for="inputProductTitle" class="form-label">Limace d'article (Slug)</label>
									   <input type="text" name="slug" value="{{ old('slug') }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
									   @error('slug')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								   <div class="mb-3">
									   <label for="inputProductDescription" class="form-label">Extrait d'article</label>
									   <textarea class="form-control"  required id="inputProductDescription" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
									   @error('excerpt')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								   <div class="mb-3">
									   <label for="inputProductTitle" class="form-label">Catégorie d'article</label>
									   <div class="card">
										   <div class="card-body">
											   <div class="border p-3 rounded">
												   <div class="mb-3">
													   <select class="single-select" name="category_id" >
														   @foreach($categories as $key=>$categorie)
																<option value="{{ $key }}">{{ $categorie }}</option>
														   @endforeach
													   </select>
													   @error('category_id')
													  	 <p class="text-danger">{{ $message }}</p>
													   @enderror
												   </div>
											   </div>
										   </div>
									   </div>
								   </div>

								   <div class="mb-3">
									   <label for="inputProductDescription" class="form-label">Image d'article</label>
									   <input id="image-uploadify" required name="thumbnail" type="file" accept="image/*">
									   @error('thumbnail')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								  <div class="mb-3">

									<label for="inputProductDescription" class="form-label">Contenu d'article</label>
									<textarea id="body" cols="40" required class="ckeditor form-control" name="body" id="inputProductDescription" rows="3">{{ old('body') }}</textarea>
									@error('body')
									 	<p class="text-danger">{{ $message }}</p>
									@enderror
								  </div>
                                  <div class="mb-3">
                                      <div class="form-check form-switch">
                                          <input type="checkbox" name="approved" class="form-check-input" id="flexSwitchCheckChecked">
                                          <label for="flexSwitchCheckChecked" class="form-check-label text-primary">Approuver</label>
                                      </div>
                                  </div>
								   <button onclick="event.preventDefault(); document.getElementById('post_form').submit()" class="btn btn-primary text-uppercase">Ajouter Nouvel Article</button>
								 </div>
							   </div>
						   </div><!--end row-->
						</div>
					  </form>
				  </div>
			  </div>
			</div>
		</div>
		<!--end page wrapper -->
		@endsection

	@section("script")
	<script src="{{ asset('admin/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script src="{{ asset('admin/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

	<script>

		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();

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
		