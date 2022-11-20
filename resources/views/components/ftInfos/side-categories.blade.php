@props(['categories'])
<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Catégories</h3>
    </div>
    <div class="link-animated d-flex flex-column justify-content-start">
        @foreach($categories as $category)
            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('category.show',$category) }}">
                <i class="bi bi-arrow-right me-2"></i>
                {{ $category->name }}
                <span class="text-primary float-end">{{ $category->posts_count }}</span>
            </a>
        @endforeach
    </div>
</div>