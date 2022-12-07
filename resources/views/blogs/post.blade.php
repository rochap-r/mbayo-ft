
<!-- Layout Start -->
@extends('main_layouts.general')

<!-- title section -->
@section('title',$post->title)
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
                <h1 class="display-4 text-white animated zoomIn">{{ $post->title }}</h1>
                <a href="{{ route('home') }}" class="h5 text-white">Mbayo-FT</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('post.home') }}" class="h5 text-white">FT-Infos+ Detail</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
    
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ $post->image ? asset('storage/'.$post->image->path.'') : 'https://via.placeholder.com/600x400?text=mbayo-ft.com' }}" alt="">
                        <h1 class="mb-4 text-primary">{{ $post->title }}</h1>
                        <p class="text-justify mb-3 text-lg">
                            <small><span class="fa fa-user"></span>&nbsp;  <span class="text-primary">{{$post->author->name }}</span></small>&nbsp;&nbsp;&nbsp;&nbsp;
                            <small ><span class="fa fa-calendar"></span>&nbsp; <span class="text-primary">{{$post->created_at->diffForHumans()}}</span> </small>
                        </p>
                        {!! $post->body !!}
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-5 mt-6">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">{{ $post->comments->count() }} Commentaires</h3>
                        </div>
                        @foreach($post->comments as $comment)
                            <div class="d-flex mb-4" id="comment_{{$comment->id}}" style="margin: 30px auto 20px auto;">
                                <img src="{{ $comment->userComment->image? asset('storage/'.$comment->userComment->image->path.'') : asset('storage/placeholders/placeholder.jpg')}}" class="img-fluid rounded" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6><a href="">{{$comment->userComment->name}}</a> <small><i>{{ $comment->created_at->diffForHumans() }}</i></small></h6>
                                    <p>{{ $comment->body }}</p>
                                    <button class="btn btn-sm btn-light">Repondre</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        @if (!Cookie::get('user'))
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="mb-0">Laissez un Commentaire</h3>
                            </div>
                        @endif
                        <form method="POST" action="{{route('post.comment',$post)}}">
                            @csrf
                            <div class="row g-3 ">
                                @if (Cookie::get('user'))
                                    <div class="col-12 col-sm-12">
                                        <h4
                                                class=" alert alert-info text-uppercase"
                                                style="font-weight: 700!important;color:white;background-color: #4586ff!important">
                                            Commentez encore  {{ Cookie::get('user_name') }}!
                                        </h4>
                                    </div>
                                    <input type="hidden" name="name" value="{{ Cookie::get('user_name') }}">
                                    <input type="hidden"  name="email" value="{{ Cookie::get('user_email') }}">
                                @else
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control bg-white border-0" name="name" placeholder="Votre nom" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control bg-white border-0" name="email" placeholder="Votre email " style="height: 55px;">
                                    </div>
                                @endif
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" name="body"  rows="5"  placeholder="Saisissez votre Commentaire ici..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Commentez</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

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