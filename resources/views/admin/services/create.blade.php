
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
					<div class="breadcrumb-title pe-3">Services</div>
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
					  <h5 class="card-title">Ajouter un nouvel Service</h5>
					  <hr/>
					  <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="post_form">
						@csrf
                       	<div class="form-body mt-4">
							<div class="row">
							   <div class="col-lg-12">
							  	 <div class="border border-3 p-4 rounded">
								   <div class="mb-3">
									<label for="inputProductTitle" class="form-label">Le titre du service</label>
									<input type="text" value="{{ old('title') }}" name="title" required class="form-control" id="inputProductTitle" placeholder="Tapez le titre de l'article">
								   @error('title')
									   <p class="text-danger">{{ $message }}</p>
								   @enderror

								   </div>
								   <div class="mb-3">
									   <label for="inputProductTitle" class="form-label">Limace du service (Slug)</label>
									   <input type="text" name="slug" value="{{ old('slug') }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez le slug de l'article">
									   @error('slug')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								   <div class="mb-3">
										<label for="inputProductTitle" class="form-label">Déscription du service</label>
										<input type="text" name="description" value="{{ old('description') }}"  required class="form-control" id="inputProductTitle" placeholder="Tapez la description de l'article">
										@error('description')
										<p class="text-danger">{{ $message }}</p>
										@enderror
									</div>

								   <div class="mb-3">
									   <label for="inputProductDescription" class="form-label">Extrait du service</label>
									   <textarea class="form-control"  required id="inputProductDescription" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
									   @error('excerpt')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>

								   <div class="mb-3">
									   <label for="inputProductDescription" class="form-label">Image du service</label>
									   <input id="image-uploadify" required name="thumbnail" type="file" accept="image/*">
									   @error('thumbnail')
									   <p class="text-danger">{{ $message }}</p>
									   @enderror
								   </div>
								  <div class="mb-3">

									<label for="inputProductDescription" class="form-label">Contenu du service</label>
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
		