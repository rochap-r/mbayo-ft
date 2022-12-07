    @extends('main_layouts.general')

    <!-- title section -->
    @section('title','mbayo-ft.com | FT-Infos+ Actualités à la une!')

    @section('custom_css')
    <style>
        .bg-header{
            background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url("{{ asset('storage/'.$bg->mft_bg_image) }}") center center no-repeat;
            background-size: cover;
        }
        
    </style>
    @endsection

    <!-- content section -->
    @section('content')
                <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
                    <div class="row py-5">
                        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-4 text-white animated zoomIn">Actualités à la une!</h1>
                            <a href="{{ route('home') }}" class="h5 text-white">Mbayo-ft</a>
                            <i class="far fa-circle text-white px-2"></i>
                            <a href="" class="h5 text-white">FT-Infos+</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navbar End -->

            <!-- Blog Start -->
            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="row g-5">
                        <!-- Blog list Start -->
                        <div class="col-lg-8">
                            <div class="row g-5">
                                @forelse($posts as $post)
                                    <div class="col-md-6 wow slideInUp" data-wow-delay="0.6s">
                                    <div class="blog-item bg-light rounded overflow-hidden">
                                        <div class="blog-img position-relative overflow-hidden">
                                            <img class="img-fluid" src="{{ $post->image ? asset('storage/'.$post->image->path.'') : 'https://via.placeholder.com/600x400?text=mbayo-ft.com' }}" alt="">
                                            <a class="position-absolute top-0 start-0 bg-primary text-white text-uppercase rounded-end mt-5 py-2 px-4" href="{{ route('category.show',$post->category) }}">{{ $post->category->name }}</a>
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
                                    <p class="lead text-danger"> Aucun Article n'est disponible!</p>
                                @endforelse

                                {{-- pagination --}}
                                <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- Blog list End -->

                        <!-- Sidebar Start -->
                        <div class="col-lg-4">
                            <!-- Category Start -->
                            <x-ftInfos.side-categories :categories="$categories"/>
                            <!-- Category End -->

                            <!-- Recent Post Start -->
                            <x-ftInfos.side-recent-posts :recent_posts="$latest_posts"/>
                            <!-- Recent Post End -->

                        </div>
                        <!-- Sidebar End -->
                    </div>
                </div>
            </div>
            <!-- Blog End -->
    @endsection