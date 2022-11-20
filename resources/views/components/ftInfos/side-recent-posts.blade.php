@props(['recent_posts'])
<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Articles Récents</h3>
    </div>
    @foreach($recent_posts as $latest_post)
        <div class="d-flex rounded overflow-hidden mb-3">
            <img class="img-fluid" src="{{ $latest_post->image ? asset('storage/'.$latest_post->image->path.'') : 'https://via.placeholder.com/600x400?text=mbayo-ft.com' }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
            <a href="{{ route('post.show',$latest_post) }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                {{ \Str::limit($latest_post->title,45) }}
            </a>
        </div>
    @endforeach
</div>