
<!-- Layout Start -->
@extends('main_layouts.general')

    <!-- title section -->
    @section('title','mbayo-ft.com | A-propos de nous')

    <!-- content section -->
    @section('content')
            <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
                <div class="row py-5">
                    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-4 text-white animated zoomIn">A-propos de nous</h1>
                        <a href="{{ route('home') }}" class="h5 text-white">Mbayo-ft</a>
                        <i class="far fa-circle text-white px-2"></i>
                        <a href="" class="h5 text-white">A-propos</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar End -->

        <!-- About Start -->
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <div class="section-title position-relative pb-3 mb-5">
                            <h5 class="fw-bold text-primary text-uppercase">À propos de nous</h5>
                            <h1 class="mb-0">La meilleure solution de services avec une experience de 10 ans</h1>
                        </div>
                        <p class="mb-4">Nous offrons des sevices de meilleure qualité dans divers domaines tel qu'en sécurité personnelle et industrielle, Expertise Comptable et Expertise en Ingénierie Géologique.</p>
                        <div class="row g-0 mb-3">
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Récompensés</h5>
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Personnel professionnel</h5>
                            </div>
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Assistance 24h/24 et 7j/7</h5>
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Des prix équitables</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="mb-2">Entrez en contact avec nous</h5>
                                <h4 class="text-primary mb-0">+243 89 599 41 97</h4>
                            </div>
                        </div>
                        <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Demander un service</a>
                    </div>
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('mft_template/img/about.jpg')}}" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Team Start -->
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Membres de l'équipe</h5>
                    <h1 class="mb-0">L'Expertise  professionnel prêt à aider votre entreprise</h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{asset('mft_template/img/team-1.jpg')}}" alt="">
                                <div class="team-social">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary">Xavier K</h4>
                                <p class="text-uppercase m-0">CD Sécurité</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{asset('mft_template/img/team-2.jpg')}}" alt="">
                                <div class="team-social">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary">RUTH R</h4>
                                <p class="text-uppercase m-0">CD Expertise Comptable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{asset('mft_template/img/team-3.jpg')}}" alt="">
                                <div class="team-social">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary">Robert M</h4>
                                <p class="text-uppercase m-0">CD Expertise Géologique</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

    @endsection