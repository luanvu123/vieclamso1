 @extends('layout')
 @section('content')
     <div id="page-blog">
         <section id="page-blog-header" class="page-blog-header header-detail">
             <div class="page-blog-header_container container">
                 <h1 class="title">
                     {{ $genrePost->title }}
                 </h1>
                 <p class="description">
                     Nơi cập nhật thông tin mới nhất giúp bạn trang bị các kỹ năng, kinh nghiệm cần thiết để tìm được
                     công việc phù hợp với bản thân.
                 </p>
             </div>
         </section>
         <div class="sticky-nav-blog">
             <section id="navigation-blog" class="navigation-blog">
                 <div id="navigation-blog-slide">

                     @foreach ($genrepost_layout as $genrepost)
                         <a href="{{ route('genrepost.showPost', ['slug' => $genrepost->slug]) }}" target="_blank"
                             class="navigation-blog_item">
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
             <div id="breadcrumb" class="breadcrumb">
                 <ul class="nav d-flex">
                     <li class="nav-item">
                         <a class href="{{route('/')}}">Trang chủ</a>
                     </li>
                     <li class="nav-item">
                         <a class href="">Cẩm nang nghề nghiệp</a>
                     </li>
                     <li class>{{ $genrePost->title }}</li>
                 </ul>
             </div>
              <section id="featured-article" class="featured-article">
        <h2 class="featured-article_title">
            Bài viết nổi bật
        </h2>
        <div class="list-articles">
            @foreach ($featuredPosts as $post)
                <div class="list-articles_item">
                    <div class="list-articles_item-thumbnail">
                        <a href="{{ $post->website }}" target="_blank">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="list-articles_item-detail">
                        <div class="content">
                            <p class="category-name">
                                {{ $genrePost->title }}
                            </p>
                            <div class="content_title">
                                <h3 class="title">
                                    <a href="{{ $post->website }}" target="_blank" data-toggle="tooltip" data-container="body" data-placement="top" title="{{ $post->title }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                            </div>
                            <p class="created_at">
                                <span>Vieclamso1</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                    <circle cx="2" cy="2" r="2" fill="#B3B8BD"></circle>
                                </svg>
                                <span>{{ $post->created_at->format('d/m/Y') }}</span>
                            </p>
                            <div class="description">
                                {{ $post->detail }}
                            </div>
                        </div>
                        <div class="see-more">
                            <a href="{{ $post->website }}" target="_blank">
                                Xem thêm
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
         </div>
          <div class="list-post">
        <div class="container">
            <h2 class="list-post__header">
                Danh sách bài viết
            </h2>
            <div class="list-post__content">
                @foreach ($genrePost->posts as $post)
                    <div class="list-post__content--item item">
                        <div class="item__image">
                            <a href="{{ $post->website }}" target="_blank">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="content">
                            <div class="item__content--desc">
                                {{ $genrePost->title }}
                            </div>
                            <h3 class="item__content--title">
                                <a target="_blank" href="{{ $post->website }}" data-toggle="tooltip" data-placement="top" title="{{ $post->title }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <div class="item__content--time">
                               Vieclamso1
                                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                    <circle cx="2" cy="2" r="2" fill="#B3B8BD"></circle>
                                </svg>
                                {{ $post->created_at->format('d/m/Y') }}
                            </div>
                            <div class="description">
                                {{ $post->detail }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
         <div class="container-banner">
             <div class="banner-mbti container">
                 <a href="#" target="_blank">
                     <img src="../../cdn-new.topcv.vn/unsafe/1100x/https_/static.topcv.vn/v4/image/blog/banner_mbti.png"
                         alt="banner_mbti">
                 </a>
             </div>
         </div>
     </div>
 @endsection
