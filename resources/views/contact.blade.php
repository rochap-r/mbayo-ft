
<!-- Layout Start -->
@extends('main_layouts.general')

<!-- title section -->
@section('title','mbayo-ft.com | Contactez-nous')

<!-- content section -->
@section('content')
            <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
                <div class="row py-5">
                    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-4 text-white animated zoomIn">Contactez-nous</h1>
                        <a href="{{ route('home') }}" class="h5 text-white">Mbayo-ft</a>
                        <i class="far fa-circle text-white px-2"></i>
                        <a href="" class="h5 text-white">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Contact Start -->
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Nous contacter</h5>
                    <h1 class="mb-0">Si vous avez des questions, n'hésitez pas à nous contacter</h1>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="mb-2">Appelez pour vos questions</h5>
                                <h4 class="text-primary mb-0">+243 89 599 41 97</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="mb-2">E-mail de contact</h5>
                                <h4 class="text-primary mb-0">contact@mbayo-ft.com</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="mb-2">Visitez notre bureau</h5>
                                <h4 class="text-primary mb-0">123, 30/juin, KZI, RDC</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <!-- message start -->
                    <div class="global-message info d-none"></div>
                    <!-- message End -->
                    <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s">
                        <form method="POST" onsubmit="return false" autocomplete="off">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control border-0 bg-light px-4" placeholder="votre nom" style="height: 55px;">
                                    <small class="error text-danger name"></small>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control border-0 bg-light px-4" placeholder="Votre e-mail" style="height: 55px;">
                                    <small class="error text-danger email"></small>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" id="subject" class="form-control border-0 bg-light px-4" placeholder="Sujet" style="height: 55px;">
                                    <small class="error text-danger subject"></small>
                                </div>
                                <div class="col-12">
                                    <textarea name="body" id="body" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
                                    <small class="error text-danger body"></small>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="send-message-btn" type="submit">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection
@section('custom_js')
    <script>
        $(document).on('click','#send-message-btn',(e)=>{
            e.preventDefault()
            let $this=e.target;

            let crsf_token=$($this).parents("form").find("input[name='_token']").val()
            let name=$($this).parents("form").find("input[name='name']").val()
            let email=$($this).parents("form").find("input[name='email']").val()
            let subject=$($this).parents("form").find("input[name='subject']").val()
            let body=$($this).parents("form").find("textarea[name='body']").val()

            let formData= new FormData();
            formData.append('_token',crsf_token);
            formData.append('name',name);
            formData.append('email',email);
            formData.append('subject',subject);
            formData.append('body',body);

            $.ajax({
                url:"{{ route('contact.store') }}",
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
                        clearData($($this).parents("form"),['name','email','subject','body']);
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