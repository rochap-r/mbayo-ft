
<!-- Layout Start -->
@extends('main_layouts.main')

<!-- title section -->
@section('title')

@section('content')
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $i=0; ?>
                @foreach($services as $service)
                    <div  @if($i==0) class="carousel-item active" @else class="carousel-item "  @endif >
                        <img class="w-100" src="{{asset('storage/'.$service->image->path)}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{ $service->description }}</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">{{ $service->title }}</h1>
                                <a href="{{ route('service.show',$service) }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Détails...</a>
                                <a href="{{ route('service.index') }}#services" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contactez-nous</a>
                            </div>
                        </div>
                    </div>
                        <?php $i++; ?>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Precedent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </div>

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Clients satisfaits</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{ $count->clients }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Projets réalisés</h5>
                            <h1 class="mb-0" data-toggle="counter-up">{{ $count->projets }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Recompenses</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{ $count->recompenses }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">À propos de nous</h5>
                        <h1 class="mb-0">{{ $about->title }}</h1>
                    </div>
                    <p class="mb-4">{{ $about->decription }}</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $about->caracteristique1 }}</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $about->caracteristique2 }}</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $about->caracteristique3 }}</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>{{ $about->caracteristique4 }}</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Entrez en contact avec nous</h5>
                            <h4 class="text-primary mb-0">{{ $contact->tel }}</h4>
                        </div>
                    </div>
                    <a href="{{ route('service.index') }}#services" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Demander un service</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('storage/'.$about->image)}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pourquoi nous choisir</h5>
                <h1 class="mb-0">{{ $choice->title }}</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Meilleur de l'industrie</h4>
                            <p class="mb-0">{{ $choice->quality }}</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Reconpenses</h4>
                            <p class="mb-0">{{ $choice->recompense }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{asset($choice->image)}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Personnel professionnel</h4>
                            <p class="mb-0">{{ $choice->personel }}</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>Assistance 24h/24 et 7j/7</h4>
                            <p class="mb-0">{{ $choice->assistance }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->


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
                            <a class="btn btn-lg btn-primary rounded" href="{{ route('service.show',$service) }}">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Nous contacter</h3>
                        <p class="text-white mb-3">Pour plus des precisions, appeler nous au numero ci-dessous</p>
                        <h2 class="text-white mb-0">{{ $contact->tel }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Membres de l'équipe</h5>
                <h1 class="mb-0">{{ $choice->team_title }}</h1>
            </div>
            <div class="row g-5">
                @forelse ($teams as $team)
                   <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('storage/'.$team->image->path) }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">{{ $team->name }}</h4>
                            <p class="text-uppercase m-0">MFT Equipe</p>
                        </div>
                    </div>
                </div> 
                @empty
                    
                @endforelse
                
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">FT-Infos+</h5>
                <h1 class="mb-0">Découvrez les actualités de dernière tendance</h1>
            </div>
            <div class="row g-5">
                @forelse($latest_posts as $post)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ $post->image ? asset('storage/'.$post->image->path.'') : 'https://via.placeholder.com/600x400?text=mbayo-ft.com' }}" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4 text-uppercase" href="{{ route('category.show',$post->category) }}">{{ $post->category->name }}</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{ \Str::limit($post->author->name,7,'') }}</small>
                                <small class="me-3 "><i class="far fa-comment-alt text-primary me-2 "></i>{{ $post->comments_count }}</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                            <h4 class="mb-3">{{ \Str::limit( $post->title,20) }}</h4>
                            <p>{{ \Str::limit($post->excerpt,30) }}</p>
                            <a class="text-uppercase" href="{{ route('post.show',$post) }}">Lire... <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="lead"> Aucun Article n'est disponible!</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Blog End-->

@endsection