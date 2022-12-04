<!-- Layout Start -->
@extends('main_layouts.general')

<!-- title section -->
@section('title','mbayo-ft.com | Découvrez nos services')
@section('custom_css')
    <style>
        .bg-header{
           background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url("{{ asset('mft_template/img/carousel-2.jpg') }}") center center no-repeat;
            background-size: cover;
        }
        
    </style>
@endsection

<!-- content section -->
@section('content')
    <div class="container-fluid bg-primary py-5 bg-header">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Services</h1>
                <a href="{{ route('home') }}" class="h5 text-white">Mbayo-ft</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">Services</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->

    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Nos services</h5>
                <h1 class="mb-0">Des services personnalisés pour que vos entreprises prosperent</h1>
            </div>
            <div class="row g-5">

                @foreach($services as $service)

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <img id="service_img" src="{{ $service->image? asset('storage/'.$service->image->path.'') : asset('storage/placeholders/post-placeholder.png')  }}" alt="">
                        </div>
                        <div class="second">
                            <a href="{{ route('service.show',$service) }}">
                                <h4 class="mb-3">{{ $service->title }}</h4>
                            </a>
                            <p class="m-0">{{ $service->excerpt }}</p>
                            <a href="{{ route('service.show',$service) }}" class="btn btn-link btn-primary">découvrir</a>
                            <a class="btn btn-lg btn-primary rounded" href="{{ route('service.show',$service) }}">
                                <i class="fa fa-eye "></i>
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Nous contacter</h3>
                        <p class="text-white mb-3">Pour plus des precisions, appeler nous au numero ci-dessous</p>
                        <h2 class="text-white mb-0">+243 89 599 41 97</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" id="services" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Demander un service</h5>
                        <h1 class="mb-0">Demande de service? N'hésitez pas à nous contacter</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-5 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Réponse sous 24h</h5>
                        </div>
                        <div class="col-sm-7 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>Assistance téléphonique 24h/24</h5>
                        </div>
                    </div>
                    <p class="mb-4">Entrez en contact avec nous pour avoir nos service, vous pouvez le faire via le téléphone en appelant au numéro ci-déssous ou en
                        remplissant le formulaire juste à votre droit et nous réagirons le plus vite possible.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Nous Appeler par Téléphone</h5>
                            <h4 class="text-primary mb-0">+243 89 599 41 97</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- message start -->
                    <div class="global-message info d-none"></div>
                    <!-- message End -->
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form method="POST" onsubmit="return false" autocomplete="off">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" name="name" placeholder="Votre Nom ou l'entreprise" style="height: 55px;">
                                    <small class="error text-danger name"></small>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" name="email" placeholder="Votre email de l'entreprise" style="height: 55px;">
                                    <small class="error text-danger email"></small>
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" name="service_id" style="height: 55px;">
                                        @foreach($servicesContact as $key=>$value)
                                        <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" name="body"  rows="5" placeholder="Message"></textarea>
                                    <small class="error text-danger body"></small>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3 send-message-btn" type="submit">Soumettre</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->

@endsection
@section('custom_js')
    <script>
        $(document).on('click','.send-message-btn',(e)=>{
            e.preventDefault()
            let $this=e.target;

            let crsf_token=$($this).parents("form").find("input[name='_token']").val()
            let name=$($this).parents("form").find("input[name='name']").val()
            let email=$($this).parents("form").find("input[name='email']").val()
            let service_id=$($this).parents("form").find("select[name='service_id']").val()
            let body=$($this).parents("form").find("textarea[name='body']").val()

            let formData= new FormData();
            formData.append('_token',crsf_token);
            formData.append('name',name);
            formData.append('email',email);
            formData.append('service_id',service_id);
            formData.append('body',body);

            $.ajax({
                url:"{{ route('service.contact') }}",
                data:formData,
                type:'POST',
                datatype:'JSON',
                processData:false,
                contentType:false,
                success: function (data) {
                    //console.log(data)
                    if(data.success){
                        $(".global-message").removeClass('d-none');
                        $(".global-message").addClass('alert alert-info');
                        $(".global-message").text(data.message);
                        clearData($($this).parents("form"),['name','email','body']);
                        setTimeout( ()=>{ 
                            $('.global-message').fadeOut() 
                        },5000)
                    }
                    else{
                        for(const error in data.errors)
                        {
                            $("small."+error).text(data.errors[error])
                        }
                    }
                }
            })
        })
    </script>
@endsection