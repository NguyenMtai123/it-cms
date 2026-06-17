@extends('theme::layouts.master')

@section('title', 'Trang chủ')

@section('content')
    @php
        $mainFeatured = $featuredPosts->first();
        $featuredSide = $featuredPosts->skip(1);
    @endphp

    {{-- HERO --}}
    <section class="hero-section">
        <div class="container container-wide">
            <div class="hero-shell">
                @if ($sliders->count())
                    <div id="homeHeroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel"
                        data-bs-interval="4000" data-bs-pause="false">
                        <div class="carousel-inner">
                            @foreach ($sliders as $slider)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="hero-slide">
                                        <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"
                                            class="hero-image">
                                        <div class="hero-overlay"></div>
                                        <div class="hero-content">
                                            <span class="badge-soft mb-3">
                                                <i class="bi bi-stars"></i> Nổi bật
                                            </span>

                                            <h1 class="hero-title">
                                                {{ $slider->title ?? setting('site_title', 'IT CMS') }}
                                            </h1>

                                            @if (!empty($slider->subtitle))
                                                <p class="hero-desc">
                                                    {{ $slider->subtitle }}
                                                </p>
                                            @else
                                                <p class="hero-desc">
                                                    Cập nhật tin tức, tuyển sinh, hoạt động và các dự án nổi bật của nhà
                                                    trường.
                                                </p>
                                            @endif

                                            <div class="hero-actions">
                                                <a href="{{ $slider->url ?: url('/blog') }}" class="btn btn-theme">
                                                    <i class="bi bi-arrow-right-circle me-1"></i> Khám phá
                                                </a>
                                                @if (plugin_active('announcement'))
                                                    <a href="{{ route('announcements') }}" class="btn btn-theme-outline">
                                                        <i class="bi bi-megaphone me-1"></i> Thông báo
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($sliders->count() > 1)
                            <button class="carousel-control-prev hero-control" type="button"
                                data-bs-target="#homeHeroCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next hero-control" type="button"
                                data-bs-target="#homeHeroCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        @endif
                    </div>
                @else
                    <div class="hero-fallback">
                        <div class="hero-overlay"></div>
                        <div class="hero-content">
                            <span class="badge-soft mb-3">
                                <i class="bi bi-stars"></i> Welcome
                            </span>

                            <h1 class="hero-title">
                                {{ setting('site_title', 'IT CMS') }}
                            </h1>

                            <p class="hero-desc">
                                Cổng thông tin hiện đại, nơi hội tụ tin tức, học thuật, tuyển sinh và hoạt động cộng đồng.
                            </p>

                            <div class="hero-actions">
                                <a href="{{ url('/blog') }}" class="btn btn-theme">
                                    <i class="bi bi-journal-text me-1"></i> Xem tin tức
                                </a>
                                @if(plugin_active('announcement'))

                                <a href="{{ route('announcements') }}" class="btn btn-theme-outline">
                                    <i class="bi bi-bell me-1"></i> Thông báo
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <div class="hero-stats mt-4">
                    <div class="row g-3">
                        <div class="col-6 col-lg-3">
                            <div class="stat-card">
                                <div class="stat-value">{{ max(1, $featuredPosts->count()) }}</div>
                                <div class="stat-label">Tin nổi bật</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="stat-card">
                                <div class="stat-value">{{ max(1, $categories->count()) }}</div>
                                <div class="stat-label">Chuyên mục</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="stat-card">
                                <div class="stat-value">{{ max(1, $projects->count()) }}</div>
                                <div class="stat-label">Dự án quốc tế</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="stat-card">
                                <div class="stat-value">{{ max(1, $videos->count()) }}</div>
                                <div class="stat-label">Video mới</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK LINKS --}}
    @if ($quickLinks->count())
        <section class="py-3 py-lg-4">
            <div class="container container-wide">
                <div class="section-head mb-3 mb-lg-4">
                    <span class="badge-soft mb-2">
                        <i class="bi bi-lightning-charge-fill"></i> Truy cập nhanh
                    </span>
                    <h2 class="section-title mb-2">Lối tắt tiện ích</h2>
                    <p class="section-subtitle">Các mục truy cập thường dùng được đặt ở vị trí nổi bật.</p>
                </div>

                <div class="row g-3 g-lg-4">
                    @foreach ($quickLinks as $item)
                        <div class="col-6 col-lg-3">
                            <a href="{{ $item->url ?: '#' }}" class="quick-card">
                                <div class="quick-icon">
                                    <i class="bi bi-grid-1x2-fill"></i>
                                </div>
                                <div class="quick-title">{{ $item->title }}</div>
                                @if ($item->subtitle)
                                    <div class="quick-subtitle">{{ $item->subtitle }}</div>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- FEATURED NEWS + ANNOUNCEMENTS --}}
    <section class="py-4 py-lg-5">
        <div class="container container-wide">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="section-head mb-3 mb-lg-4">
                        <span class="badge-soft mb-2">
                            <i class="bi bi-fire"></i> Tin nổi bật
                        </span>
                        <h2 class="section-title mb-2">Bản tin tiêu điểm</h2>
                        <p class="section-subtitle">Bài viết quan trọng được đặt ở vị trí ưu tiên.</p>
                    </div>

                    @if ($mainFeatured)
                        <div class="feature-card p-0 overflow-hidden">
                            <a href="{{ url('/blog/' . $mainFeatured->slug) }}" class="feature-main">
                                <div class="feature-image-wrap">
                                    <img src="{{ asset('storage/' . $mainFeatured->image) }}"
                                        alt="{{ $mainFeatured->title }}" class="feature-image">
                                    <div class="feature-gradient"></div>
                                </div>

                                <div class="feature-main-content">
                                    <span class="badge-soft mb-3">
                                        <i class="bi bi-clock"></i> Mới nhất
                                    </span>

                                    <h3 class="feature-main-title">
                                        {{ $mainFeatured->title }}
                                    </h3>

                                    @if ($mainFeatured->excerpt ?? false)
                                        <p class="feature-main-excerpt clamp-3">
                                            {{ $mainFeatured->excerpt }}
                                        </p>
                                    @else
                                        <p class="feature-main-excerpt clamp-3">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($mainFeatured->content ?? ''), 220) }}
                                        </p>
                                    @endif

                                    <div class="feature-meta">
                                        <span><i class="bi bi-calendar3 me-1"></i>
                                            {{ $mainFeatured->created_at->format('d/m/Y') }}</span>
                                        <span><i class="bi bi-arrow-right-circle me-1"></i> Đọc tiếp</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="row g-3 mt-1">
                        @foreach ($featuredSide as $post)
                            <div class="col-md-6">
                                <a href="{{ url('/blog/' . $post->slug) }}" class="news-card h-100">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="news-thumb">
                                    <div class="news-body">
                                        <div class="news-date">
                                            <i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('d/m/Y') }}
                                        </div>
                                        <h5 class="news-title clamp-2">{{ $post->title }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if(plugin_active('announcement'))

                <div class="col-lg-4">
                    <div class="section-head mb-3 mb-lg-4">
                        <span class="badge-soft mb-2">
                            <i class="bi bi-megaphone-fill"></i> Thông báo
                        </span>
                        <h2 class="section-title mb-2">Cập nhật nhanh</h2>
                        <p class="section-subtitle">Danh sách thông báo mới nhất.</p>
                    </div>

                    <div class="announcement-card p-4">
                        <div class="announcement-list">
                            @forelse ($announcements as $item)
                                <a href="{{ route('announcements.show', $item->slug) }}" class="announcement-item">
                                    <div class="announcement-dot"></div>
                                    <div class="announcement-content">
                                        <div class="announcement-title clamp-2">{{ $item->title }}</div>
                                        <div class="announcement-date">{{ $item->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-soft">Chưa có thông báo nào.</div>
                            @endforelse
                        </div>

                        <div class="mt-3 pt-3 border-top">
                            <a href="{{ route('announcements') }}" class="more-link">
                                Xem tất cả <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- LATEST POSTS --}}
    @if ($latestPosts->count())
        <section class="py-4 py-lg-5">
            <div class="container container-wide">
                <div class="section-head mb-3 mb-lg-4">
                    <span class="badge-soft mb-2">
                        <i class="bi bi-journal-richtext"></i> Bài viết mới
                    </span>
                    <h2 class="section-title mb-2">Tin mới nhất</h2>
                    <p class="section-subtitle">Các bài viết được đăng gần đây nhất.</p>
                </div>

                <div class="row g-3 g-lg-4">
                    @foreach ($latestPosts as $post)
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ url('/blog/' . $post->slug) }}" class="story-card h-100">
                                <div class="story-image-wrap">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="story-image">
                                </div>
                                <div class="story-body">
                                    <div class="story-date">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('d/m/Y') }}
                                    </div>
                                    <h5 class="story-title clamp-3">{{ $post->title }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CATEGORIES --}}
    @if ($categories->count())
        <section class="py-4 py-lg-5">
            <div class="container container-wide">
                <div class="section-head mb-3 mb-lg-4">
                    <span class="badge-soft mb-2">
                        <i class="bi bi-folder2-open"></i> Chuyên mục
                    </span>
                    <h2 class="section-title mb-2">Tin theo chuyên mục</h2>
                    <p class="section-subtitle">Mỗi khối là một chuyên mục chính đang hoạt động.</p>
                </div>

                <div class="row g-4">
                    @foreach ($categories as $category)
                        @php
                            $posts = $category->posts()->where('status', 1)->latest()->take(4)->get();
                            $main = $posts->first();
                        @endphp

                        @if ($main)
                            <div class="col-lg-3 col-md-6">
                                <div class="category-card h-100">
                                    <div class="category-head">
                                        <a href="{{ route('blog.category', $category->slug) }}" class="category-name">
                                            {{ $category->name }}
                                        </a>
                                    </div>

                                    <a href="{{ url('/blog/' . $main->slug) }}" class="category-main">
                                        <img src="{{ asset('storage/' . $main->image) }}" alt="{{ $main->title }}"
                                            class="category-image">
                                        <h5 class="category-title clamp-2">{{ $main->title }}</h5>
                                    </a>

                                    @if ($posts->count() > 1)
                                        <ul class="category-list">
                                            @foreach ($posts->skip(1) as $post)
                                                <li>
                                                    <a href="{{ url('/blog/' . $post->slug) }}" class="clamp-2">
                                                        {{ $post->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ADMISSION --}}
    @if ($admissionSetting)
        <section class="py-4 py-lg-5" id="admission">
            <div class="container container-wide">
                <div class="admission-card overflow-hidden">
                    <div class="admission-hero"
                        style="background-image:url('{{ asset('storage/' . $admissionSetting->background_image) }}');">
                        <div class="admission-overlay"></div>

                        <div class="position-relative">
                            <div class="section-head mb-4">
                                <span class="badge-soft mb-2">
                                    <i class="bi bi-mortarboard-fill"></i> Tuyển sinh
                                </span>
                                <h2 class="section-title mb-2">{{ $admissionSetting->title }}</h2>
                                <p class="section-subtitle">
                                    Thông tin tổng hợp về tuyển sinh, học bổng, lộ trình và định hướng ngành học.
                                </p>
                            </div>

                            <div class="row g-4 align-items-stretch">
                                <div class="col-lg-4">
                                    <a href="{{ $admissionSetting->banner_url ?: '#' }}" class="admission-banner-card">
                                        <img src="{{ asset('storage/' . $admissionSetting->banner_image) }}"
                                            alt="Admission Banner" class="admission-banner-img">
                                    </a>
                                </div>

                                <div class="col-lg-5">
                                    <div class="admission-list">
                                        @foreach ($admissions as $item)
                                            <a href="{{ $item->url ?: '#' }}" class="admission-item">
                                                <div class="admission-number">{{ $loop->iteration }}</div>
                                                <div class="admission-content">
                                                    <h4>{{ $item->title }}</h4>
                                                    @if ($item->description)
                                                        <p>{!! nl2br(e($item->description)) !!}</p>
                                                    @endif
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <a href="{{ $admissionSetting->career_url ?: '#' }}" class="admission-career-card">
                                        <img src="{{ asset('storage/' . $admissionSetting->career_image) }}"
                                            alt="Career" class="admission-career-img">
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
        <section class="py-4 py-lg-5" id="projects">
            <div class="container container-wide">
                <div class="section-head mb-3 mb-lg-4">
                    <span class="badge-soft mb-2">
                        <i class="bi bi-globe2"></i> Hợp tác quốc tế
                    </span>
                    <h2 class="section-title mb-2">Dự án quốc tế tiêu biểu</h2>
                    <p class="section-subtitle">Logo đối tác và dự án được trình bày dạng carousel tự chạy.</p>
                </div>

                <div class="project-carousel owl-carousel">
                    @foreach ($projects as $project)
                        <div class="project-item">
                            <div class="project-box">
                                <img src="{{ asset('storage/' . $project->logo) }}" alt="{{ $project->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- VIDEO + SHARING --}}
    @if ($videos->count())
        @php
            $mainVideo = $videos->first();
        @endphp

        <section class="py-4 py-lg-5" id="videos">
            <div class="container container-wide">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="section-head mb-3 mb-lg-4">
                            <span class="badge-soft mb-2">
                                <i class="bi bi-play-btn-fill"></i> Video
                            </span>
                            <h2 class="section-title mb-2">Bản tin video</h2>
                            <p class="section-subtitle">Chọn một video để xem ngay bên dưới.</p>
                        </div>

                        <div class="video-panel p-3 p-lg-4">
                            <div class="row g-4">
                                <div class="col-lg-7">
                                    <div class="video-main">
                                        <iframe id="mainVideoFrame" src="{{ $mainVideo->embed_url }}"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="video-caption mt-3">
                                        <span id="mainVideoTitle">{{ $mainVideo->title }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="video-list-wrap">
                                        <div class="video-list">
                                            @foreach ($videos as $video)
                                                <a href="#"
                                                    class="video-item changeVideo {{ $loop->first ? 'active' : '' }}"
                                                    data-url="{{ $video->embed_url }}" data-title="{{ $video->title }}">
                                                    <span class="video-bullet"></span>
                                                    <span class="video-text clamp-2">{{ $video->title }}</span>
                                                </a>
                                            @endforeach
                                        </div>

                                        <div class="video-all-link">
                                            <a href="https://www.youtube.com/@truongaihocnhatrang8073/videos"
                                                target="_blank" rel="noopener">
                                                Tất cả video <i class="bi bi-box-arrow-up-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        @if ($sharingPosts->count())
                            @php
                                $topPost = $sharingPosts->first();
                            @endphp

                            <div class="section-head mb-3 mb-lg-4">
                                <span class="badge-soft mb-2">
                                    <i class="bi bi-chat-heart-fill"></i> Chia sẻ
                                </span>
                                <h2 class="section-title mb-2">{{ $sharingCategory->name }}</h2>
                                <p class="section-subtitle">Góc nhìn, chia sẻ và cảm nhận từ cộng đồng.</p>
                            </div>

                            <div class="sharing-card p-4">
                                <a href="{{ url('/blog/' . $topPost->slug) }}" class="sharing-featured">
                                    <img src="{{ asset('storage/' . $topPost->image) }}" alt="{{ $topPost->title }}">
                                    <h4 class="clamp-3">{{ $topPost->title }}</h4>
                                </a>

                                <ul class="sharing-list">
                                    @foreach ($sharingPosts->skip(1) as $post)
                                        <li>
                                            <a href="{{ url('/blog/' . $post->slug) }}" class="clamp-2">
                                                {{ $post->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- NTU STYLE STORIES --}}
    @if ($ntuPosts->count())
        <section class="py-4 py-lg-5">
            <div class="container container-wide">
                <div class="section-head mb-3 mb-lg-4">
                    <span class="badge-soft mb-2">
                        <i class="bi bi-stars"></i> NTU trong tôi
                    </span>
                    <h2 class="section-title mb-2">{{ $ntuCategory->name }}</h2>
                    <p class="section-subtitle">Bộ sưu tập bài viết hiển thị dạng slider hiện đại.</p>
                </div>

                <div class="ntu-slider owl-carousel">
                    @foreach ($ntuPosts as $post)
                        <div class="ntu-card">
                            <a href="{{ url('/blog/' . $post->slug) }}" class="ntu-link">
                                <div class="ntu-image-wrap">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                    <div class="ntu-overlay">
                                        <span>➜ Chi tiết</span>
                                    </div>
                                </div>
                                <div class="ntu-body">
                                    <h4 class="ntu-title clamp-3">{{ $post->title }}</h4>
                                    <div class="ntu-date">{{ $post->created_at->format('d/m/Y') }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ABOUT --}}
    @if ($aboutLinks->count())
        <section class="py-4 py-lg-5">
            <div class="container container-wide">
                <div class="about-card p-4 p-lg-5">
                    <div class="section-head mb-4">
                        <span class="badge-soft mb-2">
                            <i class="bi bi-info-circle-fill"></i> Khám phá
                        </span>
                        <h2 class="section-title mb-2">Tìm hiểu về NTU</h2>
                        <p class="section-subtitle">Các liên kết quan trọng dành cho người truy cập.</p>
                    </div>

                    <div class="row g-3 g-lg-4">
                        @foreach ($aboutLinks as $item)
                            <div class="col-6 col-md-4 col-lg-3">
                                <a href="{{ $item->url ?: '#' }}" class="about-link">
                                    <div class="about-icon">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <div class="about-text">{{ $item->title }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('styles')
    <style>
        .hero-section {
            padding-top: 10px;
        }

        .hero-shell {
            border-radius: 5px;
            overflow: hidden;
        }

        .hero-carousel,
        .hero-fallback {
            position: relative;
            border-radius: 5px;
            overflow: hidden;
            min-height: 400px;
            /* background: linear-gradient(135deg, #0f172a 0%, #134e4a 45%, #0f766e 100%); */
            box-shadow: var(--shadow);
        }

        .hero-slide {
            position: relative;
            min-height: 400px;
            background-size: cover;
            background-position: center;
        }

        .hero-fallback {
            display: flex;
            align-items: center;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            /* background:
                        linear-gradient(90deg, rgba(15, 23, 42, .86) 0%, rgba(15, 23, 42, .48) 48%, rgba(15, 23, 42, .12) 100%),
                        linear-gradient(180deg, rgba(15, 23, 42, .24) 0%, rgba(15, 23, 42, .62) 100%); */
        }

        .hero-content {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 760px;
            padding: 42px;
            color: #fff;
        }

        .hero-title {
            font-size: clamp(34px, 5vw, 68px);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -.04em;
            margin-bottom: 16px;
        }

        .hero-desc {
            font-size: 18px;
            line-height: 1.8;
            max-width: 680px;
            color: rgba(255, 255, 255, .88);
            margin-bottom: 22px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-control {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            background: rgba(255, 255, 255, .16);
            opacity: 1;
            backdrop-filter: blur(10px);
        }

        .hero-control:hover {
            background: rgba(255, 255, 255, .25);
        }

        .hero-control .carousel-control-prev-icon,
        .hero-control .carousel-control-next-icon {
            width: 18px;
            height: 18px;
        }

        .hero-stats {
            position: relative;
            z-index: 3;
            margin-top: -42px;
            padding: 0 16px 16px;
        }


        .stat-card {
            background: rgba(255, 255, 255, .88);
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 24px;
            padding: 20px 18px;
            text-align: center;
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 900;
            color: var(--dark);
            line-height: 1.1;
        }

        .stat-label {
            color: var(--muted);
            font-size: 14px;
            margin-top: 6px;
            font-weight: 600;
        }

        .quick-card {
            display: block;
            height: 100%;
            padding: 22px 18px;
            border-radius: 24px;
            background: #fff;
            border: 1px solid rgba(229, 231, 235, .9);
            box-shadow: var(--shadow);
            color: var(--dark);
            text-align: center;
            transition: .25s ease;
        }

        .quick-card:hover {
            transform: translateY(-6px);
            color: var(--primary);
            box-shadow: var(--shadow-hover);
        }

        .quick-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary);
            background: rgba(15, 118, 110, .10);
        }

        .quick-title {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .quick-subtitle {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .feature-card {
            overflow: hidden;
        }

        .feature-main {
            display: block;
            color: inherit;
        }

        .feature-image-wrap {
            position: relative;
            height: 420px;
            /* Đổi min-height thành height cố định để kiểm soát khung hình */
            overflow: hidden;
            background-color: #f0f0f0;
            /* Thêm màu nền để lấp khoảng trống thừa nếu có */
        }

        .feature-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Sửa ở đây: Ảnh tự thu nhỏ vừa khít, không bị mất góc */
            display: block;
            transition: transform .5s ease;
        }

        .feature-main:hover .feature-image {
            transform: scale(1.05);
        }


        .feature-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, .05) 0%, rgba(15, 23, 42, .45) 100%);
        }

        .feature-main-content {
            padding: 22px;
        }

        .feature-main-title {
            font-size: 28px;
            font-weight: 900;
            line-height: 1.25;
            color: var(--dark);
            margin-bottom: 14px;
            letter-spacing: -.03em;
        }

        .feature-main-excerpt {
            color: var(--muted);
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 14px;
        }

        .feature-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
        }

        .news-card {
            display: block;
            overflow: hidden;
            color: inherit;
            transition: .25s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            color: inherit;
        }

        .news-thumb {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .news-body {
            padding: 16px;
        }

        .news-date {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .news-title {
            font-size: 16px;
            line-height: 1.6;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0;
        }

        .announcement-card {
            height: 90%;
        }

        .announcement-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .announcement-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: inherit;
        }

        .announcement-item:hover .announcement-title {
            color: var(--primary);
        }

        .announcement-dot {
            width: 10px;
            height: 10px;
            margin-top: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            flex-shrink: 0;
        }

        .announcement-title {
            color: var(--dark);
            font-weight: 700;
            line-height: 1.55;
            margin-bottom: 5px;
            transition: .2s ease;
        }

        .announcement-date {
            color: #64748b;
            font-size: 13px;
        }

        .more-link {
            color: var(--primary);
            font-weight: 800;
        }

        .story-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
            color: inherit;
            transition: .25s ease;
        }

        .story-card:hover {
            transform: translateY(-5px);
            color: inherit;
        }

        .story-image-wrap {
            overflow: hidden;
        }

        .story-image {
            width: 100%;
            height: 205px;
            object-fit: cover;
            transition: transform .5s ease;
        }

        .story-card:hover .story-image {
            transform: scale(1.06);
        }

        .story-body {
            padding: 16px;
        }

        .story-date {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .story-title {
            font-size: 16px;
            line-height: 1.6;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0;
        }

        .category-card {
            padding: 18px;
            border: 1px solid rgba(229, 231, 235, .9);
            background: rgba(255, 255, 255, .95);
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        .category-head {
            margin-bottom: 14px;
        }

        .category-name {
            display: inline-block;
            color: var(--dark);
            font-size: 18px;
            font-weight: 900;
            letter-spacing: -.02em;
            position: relative;
        }

        .category-name::after {
            content: "";
            display: block;
            width: 56px;
            height: 3px;
            border-radius: 99px;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            margin-top: 8px;
        }

        .category-main {
            color: inherit;
            display: block;
        }

        .category-image {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 12px;
        }

        .category-title {
            color: var(--dark);
            font-size: 16px;
            line-height: 1.55;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .category-list {
            margin: 0;
            padding-left: 18px;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list a {
            color: #475569;
            line-height: 1.6;
            font-size: 14px;
            transition: .2s ease;
        }

        .category-list a:hover {
            color: var(--primary);
        }

        .admission-hero {
            position: relative;
            background-size: cover;
            background-position: center;
            padding: 28px;
        }

        .admission-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, .82), rgba(255, 255, 255, .92));
        }

        .admission-banner-card,
        .admission-career-card {
            display: block;
            height: 100%;
            overflow: hidden;
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        .admission-banner-img,
        .admission-career-img {
            width: 100%;
            height: 100%;
            min-height: 280px;
            object-fit: cover;
            display: block;
        }

        .admission-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            height: 100%;
        }

        .admission-item {
            display: flex;
            gap: 14px;
            padding: 16px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(229, 231, 235, .9);
            color: inherit;
            box-shadow: 0 8px 22px rgba(15, 23, 42, .05);
        }

        .admission-item:hover {
            border-color: rgba(15, 118, 110, .20);
        }

        .admission-number {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: #fff;
            font-size: 18px;
            font-weight: 900;
            box-shadow: 0 10px 20px rgba(15, 118, 110, .16);
        }

        .admission-content h4 {
            font-size: 16px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .admission-content p {
            margin-bottom: 0;
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
        }

        .project-carousel .owl-stage {
            display: flex;
            align-items: stretch;
        }

        .project-item {
            height: 100%;
            padding: 6px;
        }

        .project-box {
            height: 120px;
            border-radius: 22px;
            background: #fff;
            border: 1px solid rgba(229, 231, 235, .9);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px;
            overflow: hidden;
            transition: .25s ease;
        }

        .project-box:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .project-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .video-panel {
            overflow: hidden;
        }

        .video-main iframe {
            width: 100%;
            height: 360px;
            border: 0;
            border-radius: 20px;
            display: block;
        }

        .video-caption {
            background: linear-gradient(135deg, var(--accent), #f97316);
            color: #fff;
            border-radius: 16px;
            padding: 12px 16px;
            font-weight: 800;
            line-height: 1.5;
        }

        .video-list-wrap {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .video-list {
            flex: 1;
            overflow-y: auto;
            padding-right: 6px;
        }

        .video-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(229, 231, 235, .9);
            color: #334155;
            transition: .2s ease;
        }

        .video-item:hover,
        .video-item.active {
            color: var(--primary);
        }

        .video-bullet {
            width: 14px;
            height: 14px;
            margin-top: 4px;
            border: 2px solid #64748b;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .video-item.active .video-bullet {
            border-color: var(--primary);
            background: var(--primary);
        }

        .video-text {
            font-size: 15px;
            line-height: 1.6;
            font-weight: 700;
        }

        .video-all-link {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid rgba(229, 231, 235, .9);
            text-align: right;
        }

        .video-all-link a {
            color: var(--primary);
            font-weight: 800;
        }

        .sharing-card {
            height: 100%;
        }

        .sharing-featured {
            display: block;
            color: inherit;
        }

        .sharing-featured img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 12px;
        }

        .sharing-featured h4 {
            font-size: 16px;
            line-height: 1.6;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 14px;
        }

        .sharing-list {
            margin: 0;
            padding-left: 18px;
        }

        .sharing-list li {
            margin-bottom: 10px;
        }

        .sharing-list a {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
            transition: .2s ease;
        }

        .sharing-list a:hover {
            color: var(--primary);
        }

        .ntu-card {
            padding: 6px;
        }

        .ntu-link {
            display: block;
            color: inherit;
            border-radius: 22px;
            overflow: hidden;
            background: #fff;
            border: 1px solid rgba(229, 231, 235, .9);
            box-shadow: var(--shadow);
            transition: .25s ease;
        }

        .ntu-link:hover {
            transform: translateY(-5px);
            color: inherit;
            box-shadow: var(--shadow-hover);
        }

        .ntu-image-wrap {
            position: relative;
            overflow: hidden;
        }

        .ntu-image-wrap img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            transition: transform .5s ease;
        }

        .ntu-link:hover .ntu-image-wrap img {
            transform: scale(1.07);
        }

        .ntu-overlay {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 18px;
            background: linear-gradient(180deg, transparent, rgba(15, 23, 42, .78));
            color: #fff;
            text-align: right;
            font-weight: 800;
        }

        .ntu-body {
            padding: 16px;
        }

        .ntu-title {
            color: var(--dark);
            font-size: 15px;
            line-height: 1.6;
            font-weight: 800;
            margin-bottom: 8px;
            min-height: 72px;
        }

        .ntu-date {
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
        }

        .about-card {
            background: linear-gradient(135deg, rgba(15, 118, 110, .05), rgba(20, 184, 166, .08), rgba(255, 255, 255, .98));
        }

        .about-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 18px;
            border-radius: 18px;
            color: inherit;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .8);
            transition: .25s ease;
            height: 100%;
        }

        .about-link:hover {
            transform: translateY(-4px);
            color: var(--primary);
            box-shadow: var(--shadow);
        }

        .about-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
            background: rgba(15, 118, 110, .10);
            color: var(--primary);
        }

        .about-text {
            font-size: 15px;
            line-height: 1.45;
            font-weight: 800;
        }

        @media (max-width: 991px) {

            .hero-carousel,
            .hero-fallback,
            .hero-slide {
                min-height: 560px;
            }

            .hero-content {
                padding: 28px;
                max-width: 100%;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-desc {
                font-size: 16px;
            }

            .feature-image-wrap,
            .feature-image {
                min-height: 280px;
            }

            .video-main iframe {
                height: 260px;
            }
        }

        @media (max-width: 767px) {

            .hero-carousel,
            .hero-fallback,
            .hero-slide {
                min-height: 620px;
            }

            .hero-stats {
                margin-top: -18px;
                padding-left: 0;
                padding-right: 0;
            }

            .section-title {
                font-size: 24px;
            }

            .feature-main-title {
                font-size: 22px;
            }

            .admission-hero {
                padding: 18px;
            }

            .project-box {
                height: 100px;
            }

            .video-main iframe {
                height: 220px;
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

                    if (frame) {
                        frame.src = url;
                    }
                    if (title) {
                        title.textContent = videoTitle;
                    }

                    videoItems.forEach(v => v.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            if ($('.project-carousel').length) {
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
                        768: {
                            items: 4
                        },
                        992: {
                            items: 5
                        },
                        1200: {
                            items: 6
                        }
                    }
                });
            }

            if ($('.ntu-slider').length) {
                $('.ntu-slider').owlCarousel({
                    loop: true,
                    margin: 22,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 2500,
                    autoplayHoverPause: true,
                    navText: [
                        '<i class="bi bi-chevron-left"></i>',
                        '<i class="bi bi-chevron-right"></i>'
                    ],
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1200: {
                            items: 4
                        }
                    }
                });
            }
        });
        document.addEventListener('DOMContentLoaded', function() {

            const heroCarousel = document.querySelector('#homeHeroCarousel');

            if (heroCarousel) {
                new bootstrap.Carousel(heroCarousel, {
                    interval: 4000,
                    ride: 'carousel',
                    pause: false,
                    wrap: true
                });
            }

        });
    </script>
@endpush
