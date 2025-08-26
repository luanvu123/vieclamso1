@extends('layout')

@section('title', $post->title)

@section('meta')
<meta name="description" content="{{ $post->detail }}">
<meta property="og:title" content="{{ $post->title }}">
<meta property="og:description" content="{{ $post->detail }}">
@if($post->image)
<meta property="og:image" content="{{ $post->image_url }}">
@endif
<meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div id="page-blog-detail">
    <!-- Header -->
    <section id="page-blog-header" class="page-blog-header header-detail">
        <div class="page-blog-header_container container">
            <h1 class="title">{{ $post->title }}</h1>
            <div class="post-meta">
                <div class="post-author">
                    <span class="author-name">{{ $post->user->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                        <circle cx="2" cy="2" r="2" fill="#B3B8BD"></circle>
                    </svg>
                    <span class="post-date">{{ $post->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="post-category">
                    <span class="category-tag">{{ $genrePost->title }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Sticky Navigation -->
    <div class="sticky-nav-blog">
        <section id="navigation-blog" class="navigation-blog">
            <div id="navigation-blog-slide">
                @foreach ($genrepost_layout as $genrepost)
                    <a href="{{ route('genrepost.showPost', ['slug' => $genrepost->slug]) }}"
                       class="navigation-blog_item {{ $genrepost->id === $genrePost->id ? 'active' : '' }}">
                        {{ $genrepost->title }}
                    </a>
                @endforeach
            </div>
            <div class="action prev">
                <button class="btn btn-prev btn-navigation">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
            </div>
            <div class="action next">
                <button class="btn btn-next btn-navigation">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </section>
    </div>

    <div class="container">
        <!-- Breadcrumb -->
        <div id="breadcrumb" class="breadcrumb">
            <ul class="nav d-flex">
                <li class="nav-item">
                    <a href="{{ route('/') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a href="#">Cẩm nang nghề nghiệp</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('genrepost.showPost', ['slug' => $genrePost->slug]) }}">{{ $genrePost->title }}</a>
                </li>
                <li class="active">{{ Str::limit($post->title, 50) }}</li>
            </ul>
        </div>

        <!-- Post Content -->
        <article class="post-detail">
            <div class="post-detail__content">
                <!-- Featured Image -->
                @if($post->image)
                <div class="post-featured-image">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="img-responsive">
                </div>
                @endif

                <!-- Post Summary -->
                @if($post->detail)
                <div class="post-summary">
                    <p class="summary-text">{{ $post->detail }}</p>
                </div>
                @endif

                <!-- Post Content -->
                <div class="post-content">
                    {!! $post->content !!}
                </div>

                <!-- Post Footer -->
                <div class="post-footer">
                    <div class="post-tags">
                        <span class="tag-label">Thể loại:</span>
                        <span class="tag-item">{{ $genrePost->title }}</span>
                    </div>

                    @if($post->website)
                    <div class="post-source">
                        <strong>Nguồn:</strong>
                        <a href="{{ $post->website }}" target="_blank" rel="noopener">
                            {{ $post->website }}
                            <i class="fa-solid fa-external-link"></i>
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Social Share -->
                <div class="social-share">
                    <h4>Chia sẻ bài viết</h4>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                           target="_blank" class="share-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                           target="_blank" class="share-btn twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                           target="_blank" class="share-btn linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
        <section class="related-posts">
            <h2 class="section-title">Bài viết liên quan</h2>
            <div class="related-posts__grid">
                @foreach ($relatedPosts as $relatedPost)
                <div class="related-post-item">
                    <div class="related-post-item__image">
                        <a href="{{ route('post.detail', ['slug' => $genrePost->slug, 'id' => $relatedPost->id]) }}">
                            @if($relatedPost->image)
                                <img src="{{ $relatedPost->image_url }}" alt="{{ $relatedPost->title }}">
                            @else
                                <div class="no-image">{{ Str::limit($relatedPost->title, 2) }}</div>
                            @endif
                        </a>
                    </div>
                    <div class="related-post-item__content">
                        <h3 class="related-post-title">
                            <a href="{{ route('post.detail', ['slug' => $genrePost->slug, 'id' => $relatedPost->id]) }}">
                                {{ $relatedPost->title }}
                            </a>
                        </h3>
                        <div class="related-post-meta">
                            <span>{{ $relatedPost->created_at->format('d/m/Y') }}</span>
                        </div>
                        <p class="related-post-excerpt">
                            {{ Str::limit($relatedPost->detail, 100) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Featured Posts -->
        @if($featuredPosts->count() > 0)
        <section class="featured-posts">
            <h2 class="section-title">Bài viết nổi bật</h2>
            <div class="featured-posts__list">
                @foreach ($featuredPosts as $featuredPost)
                <div class="featured-post-item">
                    <div class="featured-post-item__image">
                        <a href="{{ route('post.detail', ['slug' => $genrePost->slug, 'id' => $featuredPost->id]) }}">
                            @if($featuredPost->image)
                                <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}">
                            @else
                                <div class="no-image">{{ Str::limit($featuredPost->title, 2) }}</div>
                            @endif
                        </a>
                    </div>
                    <div class="featured-post-item__content">
                        <div class="featured-post-category">
                            {{ $genrePost->title }}
                        </div>
                        <h3 class="featured-post-title">
                            <a href="{{ route('post.detail', ['slug' => $genrePost->slug, 'id' => $featuredPost->id]) }}">
                                {{ $featuredPost->title }}
                            </a>
                        </h3>
                        <div class="featured-post-meta">
                            <span>Vieclamso1</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle cx="2" cy="2" r="2" fill="#B3B8BD"></circle>
                            </svg>
                            <span>{{ $featuredPost->created_at->format('d/m/Y') }}</span>
                        </div>
                        <p class="featured-post-description">
                            {{ $featuredPost->detail }}
                        </p>
                        <div class="see-more">
                            <a href="{{ route('post.detail', ['slug' => $genrePost->slug, 'id' => $featuredPost->id]) }}">
                                Xem thêm
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>

    <!-- Banner MBTI -->
    <div class="container-banner">
        <div class="banner-mbti container">
            <a href="#" target="_blank">
                <img src="{{ asset('cdn-new.topcv.vn/unsafe/1100x/https_/static.topcv.vn/v4/image/blog/banner_mbti.png') }}"
                     alt="banner_mbti">
            </a>
        </div>
    </div>
</div>

<style>
/* Custom styles for blog detail */
.post-detail__content {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin: 30px 0;
}

.post-featured-image {
    text-align: center;
    margin-bottom: 30px;
}

.post-featured-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.post-summary {
    background: #f8f9fa;
    padding: 20px;
    border-left: 4px solid #007bff;
    margin-bottom: 30px;
    border-radius: 4px;
}

.summary-text {
    font-size: 16px;
    line-height: 1.6;
    color: #6c757d;
    margin: 0;
    font-style: italic;
}

.post-content {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
    margin-bottom: 40px;
}

.post-content h1, .post-content h2, .post-content h3,
.post-content h4, .post-content h5, .post-content h6 {
    margin-top: 30px;
    margin-bottom: 15px;
    color: #2c3e50;
}

.post-content p {
    margin-bottom: 15px;
}

.post-content img {
    max-width: 100%;
    height: auto;
    margin: 20px 0;
    border-radius: 4px;
}

.post-footer {
    border-top: 1px solid #eee;
    padding-top: 20px;
    margin-bottom: 30px;
}

.post-tags, .post-source {
    margin-bottom: 15px;
}

.tag-item {
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 14px;
}

.social-share {
    text-align: center;
    padding: 20px 0;
    border-top: 1px solid #eee;
}

.share-buttons {
    margin-top: 15px;
}

.share-btn {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    margin: 0 5px;
    border-radius: 50%;
    color: white;
    text-decoration: none;
}

.share-btn.facebook { background: #3b5998; }
.share-btn.twitter { background: #1da1f2; }
.share-btn.linkedin { background: #0077b5; }

.related-posts, .featured-posts {
    margin: 40px 0;
}

.related-posts__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.related-post-item, .featured-post-item {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.related-post-item:hover, .featured-post-item:hover {
    transform: translateY(-5px);
}

.related-post-item__image, .featured-post-item__image {
    height: 150px;
    overflow: hidden;
}

.related-post-item__image img, .featured-post-item__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #007bff, #6c757d);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 48px;
    font-weight: bold;
}

.related-post-item__content, .featured-post-item__content {
    padding: 20px;
}

.related-post-title, .featured-post-title {
    font-size: 16px;
    margin: 0 0 10px 0;
    line-height: 1.4;
}

.related-post-title a, .featured-post-title a {
    color: #333;
    text-decoration: none;
}

.related-post-title a:hover, .featured-post-title a:hover {
    color: #007bff;
}

.related-post-meta, .featured-post-meta {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 10px;
}

.post-meta {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.post-author {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #6c757d;
}

.category-tag {
    background: #28a745;
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
}

@media (max-width: 768px) {
    .post-detail__content {
        padding: 20px 15px;
    }

    .related-posts__grid {
        grid-template-columns: 1fr;
    }

    .post-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>
@endsection
