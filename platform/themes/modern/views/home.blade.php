@extends('theme::layouts.master')

@section('title', 'Trang chủ')

@section('content')

    @php
        $mainFeatured = $featuredPosts->first();
        $sideFeatured = $featuredPosts->skip(1)->take(4);
    @endphp

    {{-- HERO --}}
    @if ($sliders->count())
        <section class="hero-section mb-5">
            <div id="homeHeroCarousel" class="carousel slide hero-carousel card-soft" data-bs-ride="carousel"
                data-bs-interval="4000">
                <div class="carousel-indicators">
                    @foreach ($sliders as $slider)
                        <button type="button" data-bs-target="#homeHeroCarousel" data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
                            aria-label="Slide {{ $loop->iteration }}"></button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="hero-slide">
                                <img src="{{ asset($slider->image) }}" class="hero-image"
                                    alt="{{ $slider->title ?? 'Banner' }}">

                                <div class="hero-overlay">
                                    <div class="hero-content">
                                        <span class="hero-pill">University Modern Theme</span>
                                        <h2 class="hero-title">{{ $slider->title ?? 'Đại học Nha Trang' }}</h2>
                                        <p class="hero-text">
                                            {{ $slider->subtitle ?? 'Cổng thông tin hiện đại, rõ ràng, dễ đọc trên mọi thiết bị.' }}
                                        </p>

                                        <div class="d-flex gap-2 flex-wrap mt-4">
                                            <a href="{{ $slider->url ?: url('/') }}"
                                                class="btn btn-primary btn-modern btn-primary-modern">
                                                Khám phá
                                            </a>
                                            <a href="{{ url('/tuyen-sinh') }}" class="btn btn-modern btn-outline-modern">
                                                Tuyển sinh
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($sliders->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#homeHeroCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#homeHeroCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                @endif
            </div>
        </section>
    @endif

    {{-- STATS + QUICK LINKS --}}
    <section class="mb-5">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card-soft p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                        <div>
                            <h2 class="section-title mb-2">Điểm nhấn nổi bật</h2>
                            <p class="section-subtitle">Giao diện mới, nội dung vẫn lấy từ dữ liệu hiện tại của bạn.</p>
                        </div>
                        <span class="badge badge-soft rounded-pill px-3 py-2">Modern UI</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="mini-stat">
                                <div class="mini-stat-number">{{ $latestPosts->count() }}</div>
                                <div class="mini-stat-label">Tin mới nhất</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mini-stat">
                                <div class="mini-stat-number">{{ $categories->count() }}</div>
                                <div class="mini-stat-label">Chuyên mục</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mini-stat">
                                <div class="mini-stat-number">{{ $projects->count() }}</div>
                                <div class="mini-stat-label">Dự án</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mini-stat">
                                <div class="mini-stat-number">{{ $videos->count() }}</div>
                                <div class="mini-stat-label">Video</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                @if ($quickLinks->count())
                    <div class="card-soft p-4 h-100">
                        <h2 class="section-title mb-3">Quick links</h2>
                        <div class="quick-grid">
                            @foreach ($quickLinks as $item)
                                <a href="{{ $item->url ?: '#' }}" class="quick-card hover-lift">
                                    <div class="quick-icon">
                                        <i class="fa-solid fa-link"></i>
                                    </div>
                                    <div class="quick-title">{{ $item->title }}</div>
                                    @if ($item->subtitle)
                                        <div class="quick-subtitle clamp-2">{{ $item->subtitle }}</div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- FEATURED NEWS + ANNOUNCEMENTS --}}
    <section class="mb-5">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card-soft p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h2 class="section-title mb-1">Tin tức nổi bật</h2>
                            <p class="section-subtitle">Bài viết quan trọng nhất được đưa lên đầu.</p>
                        </div>
                        <a href="{{ url('/blog') }}" class="text-decoration-none fw-semibold"
                            style="color:var(--primary);">
                            Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                    @if ($mainFeatured)
                        <a href="{{ url('/blog/' . $mainFeatured->slug) }}" class="featured-main">
                            <img src="{{ asset($mainFeatured->image) }}" alt="{{ $mainFeatured->title }}"
                                class="featured-main-image">
                            <div class="featured-main-body">
                                <div class="featured-main-meta">
                                    <span class="badge badge-soft rounded-pill">Nổi bật</span>
                                    <span class="text-soft">{{ $mainFeatured->created_at->format('d/m/Y') }}</span>
                                </div>
                                <h3 class="featured-main-title clamp-2">{{ $mainFeatured->title }}</h3>
                                @if ($mainFeatured->excerpt ?? false)
                                    <p class="featured-main-text clamp-3">{{ $mainFeatured->excerpt }}</p>
                                @endif
                            </div>
                        </a>
                    @endif

                    @if ($sideFeatured->count())
                        <div class="row g-3 mt-1">
                            @foreach ($sideFeatured as $post)
                                <div class="col-md-6">
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="news-card hover-lift">
                                        <img src="{{ asset($post->image) }}" class="news-card-image"
                                            alt="{{ $post->title }}">
                                        <div class="news-card-body">
                                            <h6 class="news-card-title clamp-2">{{ $post->title }}</h6>
                                            <small class="text-soft">{{ $post->created_at->format('d/m/Y') }}</small>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-soft p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h2 class="section-title mb-1">Thông báo</h2>
                            <p class="section-subtitle">Tin nhắn, lịch và các thông báo mới.</p>
                        </div>
                        <a href="{{ route('announcements') }}" class="text-decoration-none fw-semibold"
                            style="color:var(--primary);">
                            Tất cả
                        </a>
                    </div>

                    <div class="announcement-list">
                        @forelse ($announcements as $item)
                            <a href="{{ route('announcements.show', $item->slug) }}" class="announcement-item">
                                <div class="announcement-dot"></div>
                                <div class="flex-grow-1">
                                    <div class="announcement-title clamp-2">{{ $item->title }}</div>
                                    <div class="announcement-date">{{ $item->created_at->format('d/m/Y') }}</div>
                                </div>
                                <i class="fa-solid fa-angle-right text-soft"></i>
                            </a>
                        @empty
                            <div class="text-soft">Chưa có thông báo.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LATEST POSTS --}}
    @if ($latestPosts->count())
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                <div>
                    <h2 class="section-title mb-1">Tin mới nhất</h2>
                    <p class="section-subtitle">Hiển thị theo dạng card hiện đại.</p>
                </div>
                <a href="{{ url('/blog') }}" class="text-decoration-none fw-semibold" style="color:var(--primary);">
                    Xem toàn bộ
                </a>
            </div>

            <div class="row g-4">
                @foreach ($latestPosts as $post)
                    <div class="col-md-6 col-lg-3">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="latest-card hover-lift">
                            <img src="{{ asset($post->image) }}" class="latest-card-image" alt="{{ $post->title }}">
                            <div class="latest-card-body">
                                <h6 class="latest-card-title clamp-3">{{ $post->title }}</h6>
                                <small class="text-soft">{{ $post->created_at->format('d/m/Y') }}</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- CATEGORIES --}}
    @if ($categories->count())
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                <div>
                    <h2 class="section-title mb-1">Chuyên mục</h2>
                    <p class="section-subtitle">Mỗi mục là một nhóm nội dung riêng.</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($categories as $category)
                    @php
                        $posts = $category->posts()->where('status', 1)->latest()->take(3)->get();
                        $main = $posts->first();
                    @endphp

                    @if ($main)
                        <div class="col-md-6 col-xl-3">
                            <div class="category-card card-soft h-100">
                                <div class="category-card-header">
                                    <a href="{{ route('blog.category', $category->slug) }}" class="category-name">
                                        {{ $category->name }}
                                    </a>
                                </div>

                                <a href="{{ url('/blog/' . $main->slug) }}" class="category-main">
                                    <img src="{{ asset($main->image) }}" class="category-main-image"
                                        alt="{{ $main->title }}">
                                    <h6 class="category-main-title clamp-3">{{ $main->title }}</h6>
                                </a>

                                <ul class="category-list">
                                    @foreach ($posts->skip(1) as $post)
                                        <li>
                                            <a href="{{ url('/blog/' . $post->slug) }}"
                                                class="clamp-2">{{ $post->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif

    {{-- ADMISSION --}}
    @if ($admissionSetting)
        <section class="admission-wrap mb-5">
            <div class="admission-bg" style="background-image:url('{{ asset($admissionSetting->background_image) }}');">
                <div class="admission-overlay">
                    <div class="container py-4 py-lg-5">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-8">
                                <div class="card-soft p-4 h-100 admission-inner">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                                        <div>
                                            <h2 class="section-title mb-1">{{ $admissionSetting->title }}</h2>
                                            <p class="section-subtitle">Khối nội dung tuyển sinh được sắp xếp gọn hơn.</p>
                                        </div>
                                        <a href="{{ $admissionSetting->banner_url ?: '#' }}"
                                            class="btn btn-modern btn-primary-modern">
                                            Xem banner
                                        </a>
                                    </div>

                                    <div class="row g-4 align-items-center">
                                        <div class="col-md-5">
                                            <a href="{{ $admissionSetting->banner_url ?: '#' }}">
                                                <img src="{{ asset($admissionSetting->banner_image) }}"
                                                    class="rounded-4 w-100 admission-banner-img" alt="Admission Banner">
                                            </a>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="admission-list">
                                                @foreach ($admissions as $item)
                                                    <a href="{{ $item->url ?: '#' }}" class="admission-item-modern">
                                                        <div class="admission-number">{{ $loop->iteration }}</div>
                                                        <div class="admission-content">
                                                            <h5>{{ $item->title }}</h5>
                                                            @if ($item->description)
                                                                <p class="mb-0">{!! nl2br(e($item->description)) !!}</p>
                                                            @endif
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card-soft h-100 p-3">
                                    <a href="{{ $admissionSetting->career_url ?: '#' }}">
                                        <img src="{{ asset($admissionSetting->career_image) }}"
                                            class="rounded-4 w-100 h-100 object-fit-cover" alt="Career">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- PROJECTS --}}
    @if ($projects->count())
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                <div>
                    <h2 class="section-title mb-1">Dự án quốc tế tiêu biểu</h2>
                    <p class="section-subtitle">Logo được trình bày theo carousel tự chạy.</p>
                </div>
            </div>

            <div class="card-soft p-4">
                <div class="owl-carousel project-carousel">
                    @foreach ($projects as $project)
                        <div class="project-item">
                            <div class="project-logo-box">
                                <img src="{{ $project->logo }}" alt="{{ $project->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- VIDEO --}}
    @if ($videos->count())
        @php
            $mainVideo = $videos->first();
        @endphp

        <section class="mb-5">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card-soft p-4 h-100">
                        <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                            <div>
                                <h2 class="section-title mb-1">Bản tin video</h2>
                                <p class="section-subtitle">Chuyển video bằng danh sách bên phải.</p>
                            </div>
                        </div>

                        <div class="video-frame-wrap">
                            <iframe id="mainVideoFrame" src="{{ $mainVideo->embed_url }}" allowfullscreen></iframe>
                            <div class="video-caption">
                                <span id="mainVideoTitle">{{ $mainVideo->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-soft p-4 h-100">
                        <h2 class="section-title mb-3">Danh sách video</h2>
                        <div class="video-list">
                            @foreach ($videos as $video)
                                <a href="javascript:void(0)"
                                    class="video-item changeVideo {{ $loop->first ? 'active' : '' }}"
                                    data-url="{{ $video->embed_url }}" data-title="{{ $video->title }}">
                                    <span class="video-bullet"></span>
                                    <span class="video-text clamp-2">{{ $video->title }}</span>
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-3 text-end">
                            <a href="https://www.youtube.com/" target="_blank" class="text-decoration-none fw-semibold"
                                style="color:var(--primary);">
                                Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- SHARING + NTU --}}
    <section class="mb-5">
        <div class="row g-4">
            <div class="col-lg-4">
                @if ($sharingPosts->count())
                    @php
                        $topPost = $sharingPosts->first();
                    @endphp

                    <div class="card-soft p-4 h-100">
                        <h2 class="section-title mb-3">{{ $sharingCategory->name }}</h2>

                        <a href="{{ url('/blog/' . $topPost->slug) }}" class="sharing-featured">
                            <img src="{{ asset($topPost->image) }}" alt="{{ $topPost->title }}"
                                class="rounded-4 w-100 mb-3">
                            <h6 class="clamp-2 mb-2 text-dark">{{ $topPost->title }}</h6>
                        </a>

                        <ul class="sharing-list">
                            @foreach ($sharingPosts->skip(1) as $post)
                                <li>
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="clamp-2">{{ $post->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-lg-8">
                @if ($ntuPosts->count())
                    <div class="card-soft p-4 h-100">
                        <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                            <div>
                                <h2 class="section-title mb-1">{{ $ntuCategory->name }}</h2>
                                <p class="section-subtitle">Trình bày dạng slider card đẹp, hiện đại.</p>
                            </div>
                        </div>

                        <div class="owl-carousel ntu-carousel">
                            @foreach ($ntuPosts as $post)
                                <div class="ntu-card">
                                    <a href="{{ url('/blog/' . $post->slug) }}" class="ntu-card-link">
                                        <div class="ntu-image-wrap">
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                            <div class="ntu-overlay">
                                                <span>Chi tiết <i class="fa-solid fa-arrow-right ms-1"></i></span>
                                            </div>
                                        </div>
                                        <h5 class="ntu-card-title clamp-2">{{ $post->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ABOUT LINKS --}}
    @if ($aboutLinks->count())
        <section class="mb-2">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                    <div>
                        <h2 class="section-title mb-1">Tìm hiểu về NTU</h2>
                        <p class="section-subtitle">Các liên kết điều hướng nhanh, gọn và dễ dùng.</p>
                    </div>
                </div>

                <div class="about-grid">
                    @foreach ($aboutLinks as $item)
                        <a href="{{ $item->url ?: '#' }}" class="about-item hover-lift">
                            <div class="about-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="about-text">{{ $item->title }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

@push('styles')
    <style>
        .hero-section .hero-carousel {
            overflow: hidden;
        }

        .hero-slide {
            position: relative;
            min-height: 520px;
        }

        .hero-image {
            width: 100%;
            height: 520px;
            object-fit: cover;
            display: block;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15, 23, 42, .78) 0%, rgba(15, 23, 42, .36) 55%, rgba(15, 23, 42, .12) 100%);
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 620px;
            padding: 36px;
            color: #fff;
        }

        .hero-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .18);
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .hero-title {
            font-size: clamp(32px, 5vw, 54px);
            line-height: 1.05;
            font-weight: 900;
            margin-bottom: 14px;
            letter-spacing: -.04em;
        }

        .hero-text {
            font-size: 17px;
            line-height: 1.7;
            color: rgba(255, 255, 255, .88);
            margin-bottom: 0;
        }

        .hero-carousel .carousel-indicators {
            margin-bottom: 1rem;
        }

        .hero-carousel .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #fff;
            opacity: .45;
        }

        .hero-carousel .carousel-indicators .active {
            opacity: 1;
        }

        .hero-carousel .carousel-control-prev,
        .hero-carousel .carousel-control-next {
            width: 9%;
        }

        .mini-stat {
            background: linear-gradient(180deg, #fff, #f8fbfc);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 18px;
            height: 100%;
        }

        .mini-stat-number {
            font-size: 30px;
            font-weight: 900;
            line-height: 1;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .mini-stat-label {
            color: var(--muted);
            font-weight: 600;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .quick-card {
            display: block;
            padding: 16px;
            background: linear-gradient(180deg, #fff, #f8fbfc);
            border-radius: 18px;
            border: 1px solid var(--line);
            color: #0f172a;
        }

        .quick-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: rgba(20, 184, 166, .12);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 12px;
        }

        .quick-title {
            font-weight: 800;
            margin-bottom: 4px;
        }

        .quick-subtitle {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .featured-main {
            display: block;
            color: inherit;
            border: 1px solid var(--line);
            border-radius: 24px;
            overflow: hidden;
            background: #fff;
        }

        .featured-main-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        .featured-main-body {
            padding: 18px;
        }

        .featured-main-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .featured-main-title {
            font-size: 24px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 10px;
            letter-spacing: -.02em;
        }

        .featured-main-text {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 0;
        }

        .news-card,
        .latest-card {
            display: block;
            color: inherit;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            overflow: hidden;
            height: 100%;
        }

        .news-card-image,
        .latest-card-image {
            width: 100%;
            height: 170px;
            object-fit: cover;
            display: block;
        }

        .news-card-body,
        .latest-card-body {
            padding: 14px;
        }

        .news-card-title,
        .latest-card-title {
            font-size: 15px;
            font-weight: 800;
            line-height: 1.45;
            margin-bottom: 8px;
        }

        .announcement-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .announcement-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: linear-gradient(180deg, #fff, #f8fbfc);
            color: inherit;
        }

        .announcement-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--accent);
            margin-top: 6px;
            flex-shrink: 0;
        }

        .announcement-title {
            font-weight: 700;
            line-height: 1.5;
            margin-bottom: 4px;
        }

        .announcement-date {
            font-size: 13px;
            color: var(--muted);
        }

        .category-card {
            display: flex;
            flex-direction: column;
        }

        .category-card-header {
            padding: 16px 16px 0;
        }

        .category-name {
            font-size: 18px;
            font-weight: 900;
            color: var(--dark);
        }

        .category-main {
            display: block;
            color: inherit;
            padding: 16px;
        }

        .category-main-image {
            width: 100%;
            height: 175px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 12px;
        }

        .category-main-title {
            font-size: 15px;
            font-weight: 800;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .category-list {
            margin: 0;
            padding: 0 16px 16px 34px;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list a {
            color: #334155;
            line-height: 1.5;
            font-size: 14px;
        }

        .category-list a:hover {
            color: var(--primary);
        }

        .admission-wrap .admission-bg {
            background-size: cover;
            background-position: center;
            border-radius: 28px;
            overflow: hidden;
        }

        .admission-overlay {
            background: rgba(255, 255, 255, .84);
        }

        .admission-inner {
            backdrop-filter: blur(10px);
        }

        .admission-banner-img {
            min-height: 100%;
            object-fit: cover;
        }

        .admission-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .admission-item-modern {
            display: flex;
            gap: 14px;
            color: inherit;
            padding: 14px;
            border-radius: 18px;
            border: 1px solid var(--line);
            background: #fff;
        }

        .admission-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(20, 184, 166, .12);
            color: var(--primary);
            font-weight: 900;
        }

        .admission-content h5 {
            margin-bottom: 6px;
            font-size: 16px;
            font-weight: 800;
        }

        .admission-content p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .project-item {
            padding: 8px;
        }

        .project-logo-box {
            height: 120px;
            border-radius: 18px;
            border: 1px solid var(--line);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
        }

        .project-logo-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .video-frame-wrap iframe {
            width: 100%;
            height: 360px;
            border: 0;
            border-radius: 20px;
            display: block;
        }

        .video-caption {
            margin-top: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: #fff;
            padding: 12px 16px;
            border-radius: 16px;
            font-weight: 700;
            overflow: hidden;
        }

        .video-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 440px;
            overflow-y: auto;
            padding-right: 4px;
        }

        .video-item {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            color: #0f172a;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: linear-gradient(180deg, #fff, #f8fbfc);
        }

        .video-item.active {
            border-color: rgba(20, 184, 166, .4);
            box-shadow: 0 10px 24px rgba(20, 184, 166, .12);
        }

        .video-bullet {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid #334155;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .video-item.active .video-bullet {
            background: var(--primary);
            border-color: var(--primary);
        }

        .video-text {
            font-size: 14px;
            line-height: 1.6;
            font-weight: 600;
        }

        .sharing-featured {
            display: block;
            color: inherit;
        }

        .sharing-list {
            margin: 0;
            padding-left: 18px;
        }

        .sharing-list li {
            margin-bottom: 10px;
        }

        .sharing-list a {
            color: #334155;
            line-height: 1.5;
            font-size: 14px;
        }

        .sharing-list a:hover {
            color: var(--primary);
        }

        .ntu-card-link {
            display: block;
            color: inherit;
        }

        .ntu-image-wrap {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .ntu-image-wrap img {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
            transition: transform .45s ease;
        }

        .ntu-card-link:hover .ntu-image-wrap img {
            transform: scale(1.06);
        }

        .ntu-overlay {
            position: absolute;
            inset: auto 0 0 0;
            padding: 16px;
            background: linear-gradient(transparent, rgba(15, 23, 42, .82));
            color: #fff;
            font-weight: 700;
            text-align: right;
        }

        .ntu-card-title {
            margin-top: 14px;
            font-size: 15px;
            font-weight: 800;
            line-height: 1.5;
            min-height: 48px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .about-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            border-radius: 18px;
            border: 1px solid var(--line);
            background: linear-gradient(180deg, #fff, #f8fbfc);
            color: inherit;
        }

        .about-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: rgba(15, 118, 110, .12);
            color: var(--primary);
            font-size: 18px;
        }

        .about-text {
            font-size: 15px;
            font-weight: 800;
            line-height: 1.45;
        }

        @media (max-width: 991px) {

            .hero-slide,
            .hero-image {
                min-height: 420px;
                height: 420px;
            }

            .hero-content {
                padding: 24px;
                max-width: 100%;
            }

            .about-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .video-frame-wrap iframe {
                height: 300px;
            }
        }

        @media (max-width: 767px) {
            .section-title {
                font-size: 22px;
            }

            .hero-slide,
            .hero-image {
                min-height: 360px;
                height: 360px;
            }

            .hero-title {
                font-size: 30px;
            }

            .quick-grid {
                grid-template-columns: 1fr;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .video-frame-wrap iframe {
                height: 240px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoItems = document.querySelectorAll('.changeVideo');
            const frame = document.getElementById('mainVideoFrame');
            const title = document.getElementById('mainVideoTitle');

            videoItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();

                    const url = this.dataset.url;
                    const videoTitle = this.dataset.title;

                    if (frame) frame.src = url;
                    if (title) title.textContent = videoTitle;

                    videoItems.forEach(v => v.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        $(document).ready(function() {
            $('.project-carousel').owlCarousel({
                loop: true,
                margin: 18,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2200,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    992: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });

            $('.ntu-carousel').owlCarousel({
                loop: true,
                margin: 18,
                nav: true,
                dots: false,
                autoplay: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {

            const hero = document.querySelector('#homeHeroCarousel');

            if (hero) {
                new bootstrap.Carousel(hero, {
                    interval: 4000,
                    ride: 'carousel',
                    pause: false,
                    wrap: true
                });
            }

        });
    </script>
@endpush
