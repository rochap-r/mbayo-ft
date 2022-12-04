
<!-- Layout Start -->
@extends('main_layouts.general')

<!-- title section -->
@section('title',$service->title)

@section('custom_css')
    <style>
        .bg-header{
            background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url("{{ asset($bg->service_bg_image) }}") center center no-repeat;
            background-size: cover;
        }
        
    </style>
@endsection

<!-- content section -->
@section('content')
    <div class="container-fluid bg-primary py-5  bg-header" style="margin-bottom: 60px">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">{{ $service->title }}</h1>
                <a href="{{ route('home') }}" class="h5 text-white">Mbayo-FT</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('service.index') }}" class="h5 text-white">MFT Service</a>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="row g-5">
                <div class="col-lg-11 ">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid rounded mb-5 w-100" id="service_img"   src="{{ $service->image ? asset('storage/'.$service->image->path.'') : 'https://via.placeholder.com/600x400?text=mbayo-ft.com' }}" alt="">
                        <h1 class="mb-4 text-primary">{{ $service->title }}</h1>
                        <p class="mb-3 text-lg text-uppercase fw-bold">
                            <a href="{{ route('service.index') }}#services" class="btn btn-sm btn-outline-success fw-bold"><i class="fa fa-phone-square"></i> nous contacter pour ce service</a>&nbsp;
                            <small><span class="fa fa-user"></span>&nbsp;  <span class="text-primary">Publié par : {{$service->user->name }} du MFT</span></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <small ><span class="fa fa-calendar"></span>&nbsp; <span class="text-primary">Disponible depuis : {{$service->created_at->diffForHumans()}}</span> </small>
                        </p>
                        {!! $service->body !!}
                        <p class="my-4 text-lg text-uppercase fw-bold">
                            <a href="{{ route('service.index') }}#services" class="btn btn-sm btn-outline-success fw-bold "><i class="fa fa-phone-square"></i> Contactez nous pour ce service!</a>
                            &nbsp;&nbsp;
                            <a href="{{ route('service.index') }}" class="btn btn-sm btn-outline-primary fw-bold"><i class="fa fa-angle-double-left"></i> revoir tous les services</a>
                        </p>
                    </div>
                    <!-- Blog Detail End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection