@extends('theme::layouts.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="row">

        {{-- TIN TỨC --}}
        <div class="col-lg-9">

            <h2 class="home-title mb-4">
                Tin tức nổi bật
            </h2>

            <div class="row">

                {{-- BÀI CHÍNH --}}
                <div class="col-lg-7">

                    @php
                        $mainPost = $featuredPosts->first();
                    @endphp

                    @if ($mainPost)
                        <a href="{{ url('/blog/' . $mainPost->slug) }}" class="text-dark">

                            <img src="{{ asset('storage/' . $mainPost->image) }}" class="home-main-image">

                            <h3 class="home-main-title mt-3">
                                {{ $mainPost->title }}
                            </h3>

                        </a>
                    @endif

                </div>

                {{-- DANH SÁCH BÊN PHẢI --}}
                <div class="col-lg-5">

                    @foreach ($featuredPosts->skip(1) as $post)
                        <div class="small-news">

                            <img src="{{ asset('storage/' . $post->image) }}" class="small-news-image">

                            <a href="{{ url('/blog/' . $post->slug) }}" class="small-news-title">

                                {{ $post->title }}

                            </a>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

        {{-- THÔNG BÁO --}}
        <div class="col-lg-3">

            <div class="announcement-box">

                <h2 class="home-title mb-4">
                    Thông báo
                </h2>

                <div class="announcement-scroll">

                    @foreach ($announcements as $item)
                        <div class="announcement-item">

                            <a href="{{ route('announcements.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>

                            <div class="announcement-date">
                                [{{ $item->created_at->format('d/m/Y') }}]
                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="announcement-more">

                    <a href="{{ route('announcements') }}">
                        Xem tất cả →
                    </a>

                </div>

            </div>

        </div>

    </div>
    <hr class="my-5">

    <div class="row g-4">

        @foreach ($categories as $category)
            @php
                $posts = $category->posts()->where('status', 1)->latest()->take(2)->get();

                $main = $posts->first();
            @endphp

            @if ($main)
                <div class="col-lg-3 col-md-6">

                    <div class="category-news">

                        <h3 class="category-title">

                            <a href="{{ route('blog.category', $category->slug) }}" class="text-decoration-none">

                                <div style="color: #000">{{ $category->name }}</div>

                            </a>

                        </h3>

                        <a href="{{ url('/blog/' . $main->slug) }}" class="text-decoration-none text-dark">

                            <img src="{{ asset('storage/' . $main->image) }}" class="category-main-image">

                            <h5 class="category-main-title">
                                {{ $main->title }}
                            </h5>

                        </a>

                        <ul class="category-list">

                            @foreach ($posts->skip(1) as $post)
                                <li>

                                    <a href="{{ url('/blog/' . $post->slug) }}">

                                        {{ $post->title }}

                                    </a>

                                </li>
                            @endforeach

                        </ul>

                    </div>

                </div>
            @endif
        @endforeach

    </div>

    @if ($quickLinks->count())

        <div class="event-links mt-5 mb-3">

            <div class="row g-0">

                @foreach ($quickLinks as $item)
                    <div class="col-md-3">

                        <a href="{{ $item->url ?: '#' }}" class="event-item">

                            <h4 style="text-align: center;">
                                {{ $item->title }}
                            </h4>

                            <span style="text-align: center;">
                                {{ $item->subtitle }}
                            </span>

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    @endif
    @if ($admissionSetting)

        <section class="admission-section mt-5"
            style="
        background-image:url('{{ asset('storage/' . $admissionSetting->background_image) }}');
    ">

            <div class="admission-overlay">

                <div class="container">
                    <div class="admission-wrapper">

                        {{-- KHỐI TRÁI --}}
                        <div class="admission-left-column mb-4">

                            <h2 class="admission-title">
                                {{ $admissionSetting->title }}
                            </h2>

                            <div class="admission-left-content">

                                <div class="admission-left">

                                    <a href="{{ $admissionSetting->banner_url ?: '#' }}">

                                        <img src="{{ asset('storage/' . $admissionSetting->banner_image) }}"
                                            class="admission-banner">

                                    </a>

                                </div>

                                <div class="admission-center">

                                    @foreach ($admissions as $item)
                                        <a href="{{ $item->url ?: '#' }}" class="admission-item">

                                            <div class="admission-number">
                                                {{ $loop->iteration }}
                                            </div>

                                            <div class="admission-content">

                                                <h4>{{ $item->title }}</h4>

                                                @if ($item->description)
                                                    <p>
                                                        {!! nl2br(e($item->description)) !!}
                                                    </p>
                                                @endif

                                            </div>

                                        </a>
                                    @endforeach

                                </div>

                            </div>

                        </div>

                        {{-- KHỐI PHẢI --}}
                        <div class="admission-right">

                            <a href="{{ $admissionSetting->career_url ?: '#' }}">

                                <img src="{{ asset('storage/' . $admissionSetting->career_image) }}" class="career-image">

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    @endif

    {{-- DỰ ÁN QUỐC TẾ TIÊU BIỂU --}}
    @if ($projects->count())

        <section class="international-projects">

            <div class="container">

                <h2 class="international-title">
                    Dự án quốc tế tiêu biểu
                </h2>

                <div class="project-logo-wrapper">

                    @foreach ($projects as $project)
                        <div class="project-logo-item">

                            <img src="{{ asset('storage/' . $project->logo) }}" alt="{{ $project->name }}">

                        </div>
                    @endforeach

                </div>

            </div>

        </section>

    @endif
    @if ($videos->count())

        @php
            $mainVideo = $videos->first();
        @endphp

        <section class="video-center-section">

            <div class="container">

                <div class="row">

                    {{-- VIDEO CENTER --}}
                    <div class="col-lg-9">

                        <h2 class="video-center-title">
                            Bản tin Trường Đại học Nha Trang
                        </h2>

                        <div class="row">

                            {{-- VIDEO LỚN --}}
                            <div class="col-lg-7">

                                <div class="video-main">

                                    <iframe id="mainVideoFrame" src="{{ $mainVideo->embed_url }}" allowfullscreen>
                                    </iframe>

                                    <div class="video-caption-bar">

                                        <span id="mainVideoTitle">

                                            {{ $mainVideo->title }}

                                        </span>

                                    </div>

                                </div>

                            </div>

                            {{-- DANH SÁCH VIDEO --}}
                            <div class="col-lg-5">

                                <div class="video-list-wrapper">

                                    <div class="video-list">

                                        @foreach ($videos as $video)
                                            <a href="javascript:void(0)"
                                                class="video-item changeVideo {{ $loop->first ? 'active' : '' }}"
                                                data-url="{{ $video->embed_url }}" data-title="{{ $video->title }}">

                                                <span class="video-bullet"></span>

                                                {{ $video->title }}

                                            </a>
                                        @endforeach

                                    </div>

                                    <div class="video-all-link">

                                        <a href="https://www.youtube.com/@truongaihocnhatrang8073/videos">

                                            <i class="fas fa-arrow-right"></i>

                                            Tất cả video

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- GÓC NHÌN CHIA SẺ --}}
                    <div class="col-lg-3">

                        @if ($sharingPosts->count())

                            @php
                                $topPost = $sharingPosts->first();
                            @endphp

                            <div class="sharing-box">

                                <h3 class="sharing-title">

                                    {{ $sharingCategory->name }}

                                </h3>

                                <a href="{{ url('/blog/' . $topPost->slug) }}" class="sharing-featured">

                                    <img src="{{ asset('storage/' . $topPost->image) }}" alt="{{ $topPost->title }}">

                                    <h4>

                                        {{ $topPost->title }}

                                    </h4>

                                </a>

                                <ul class="sharing-list">

                                    @foreach ($sharingPosts->skip(1) as $post)
                                        <li>

                                            <a href="{{ url('/blog/' . $post->slug) }}">

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
    @if ($ntuPosts->count())

        <section class="ntu-section">

            <div class="container">

                <h2 class="ntu-title">

                    {{ $ntuCategory->name }}

                </h2>

                <div class="ntu-slider owl-carousel">

                    @foreach ($ntuPosts as $post)
                        <div class="ntu-card">

                            <a href="{{ url('/blog/' . $post->slug) }}">

                                <div class="ntu-image-wrap">

                                    <img src="{{ asset('storage/' . $post->image) }}">

                                    <div class="ntu-overlay">

                                        <span class="ntu-detail">
                                            ➜ Chi tiết
                                        </span>

                                    </div>

                                </div>

                                <h4 class="ntu-post-title">

                                    {{ $post->title }}

                                </h4>

                            </a>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>

    @endif
    @if ($aboutLinks->count())

        <section class="about-ntu-section">

            <div class="container">

                <h2 class="about-title">

                    Tìm hiểu về NTU

                </h2>

                <div class="about-grid">

                    @foreach ($aboutLinks as $item)
                        <a href="{{ $item->url ?: '#' }}" class="about-item">

                            <div class="about-icon">

                                <i class="{{ $item->icon }}"></i>

                            </div>

                            <span>

                                {{ $item->title }}

                            </span>

                        </a>
                    @endforeach

                </div>

            </div>

        </section>

    @endif
@endsection

@push('styles')
    <style>
        .home-title {
            font-size: 25px;
            font-weight: 500;
        }

        .home-main-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 6px;
        }

        .home-main-title {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.4;
        }

        .small-news {
            display: flex;
            gap: 15px;
            margin-bottom: 18px;
        }

        .small-news-image {
            width: 100px;
            height: 70px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .small-news-title {
            color: #222;
            font-size: 14px;
            line-height: 1.5;
        }

        .small-news-title:hover {
            color: #0d6efd;
        }

        .announcement-box {
            background: #fff;
            padding: 20px;
        }

        .announcement-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .announcement-item a {
            color: #333;
            line-height: 1.5;
            font-size: 14px;
        }

        .announcement-date {
            font-size: 13px;
            color: #e53935;
            margin-top: 8px;
        }

        .latest-post-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .category-title {
            font-size: 20px;
            color: #000 !important;
            font-weight: 400;
            margin-bottom: 20px;
        }

        .category-main-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 2px;
            margin-bottom: 15px;
        }

        .category-main-title {
            font-size: 15px;
            line-height: 1.4;
            color: #333;
            margin-bottom: 15px;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .category-list {
            padding-left: 20px;
            margin: 0;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list a {
            color: #666;
            text-decoration: none;
            line-height: 1.6;
            font-size: 13px;
        }

        .category-list a:hover {
            color: #0d6efd;
        }

        .admission-section {
            position: relative;

            background-size: cover;
            background-position: center;

            width: 100vw;

            margin-left: calc(50% - 50vw);
            margin-right: calc(50% - 50vw);
        }

        .admission-overlay {
            background: rgba(255, 255, 255, .88);
            padding: 0px 0;
        }

        .admission-title {
            font-size: 24px;
            font-weight: 400;
            color: #333;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .admission-wrapper {
            display: flex;
            gap: 10px;
            align-items: stretch;
        }

        .admission-left-column {
            width: 75%;
            display: flex;
            flex-direction: column;
        }

        /* Banner */

        .admission-left {
            width: 50%;
        }

        .admission-left a {
            display: block;
            height: 100%;
        }

        .admission-left img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Danh sách */

        .admission-center {
            width: 50%;
            padding-left: 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .admission-right {
            width: 25%;

            display: flex;
        }

        .admission-right a {
            display: block;
            width: 100%;
        }

        .admission-right img {
            width: 100%;
            height: 100%;

            display: block;
            object-fit: cover;
        }

        /* -----------------------------------------------------
                                                                                               ITEM
                                                                                            ----------------------------------------------------- */

        .admission-item {
            display: flex;
            gap: 15px;
            text-decoration: none;

            margin-bottom: 15px;
        }

        .admission-item:last-child {
            margin-bottom: 0;
        }

        .admission-number {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            border: 2px solid #d89000;

            color: #333;

            font-size: 34px;
            font-weight: 300;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .admission-left-content {
            flex: 1;

            display: flex;
        }

        .admission-item h4 {
            font-size: 20px;

            color: #444;

            line-height: 1.3;

            margin-bottom: 8px;

            text-transform: uppercase;
        }

        .admission-item p {
            margin: 0;

            font-size: 14px;

            line-height: 1.6;

            color: #555;
        }


        @media (max-width: 991px) {

            .admission-wrapper {
                flex-direction: column;
            }

            .admission-left-column {
                width: 100%;
                flex-direction: column;
            }

            .admission-left,
            .admission-center,
            .admission-right {
                width: 100%;
            }

            .admission-center {
                padding: 25px 0;
            }

            .admission-right {
                margin-top: 20px;
            }
        }

        .event-links {
            /* border-radius: 8px; */
            overflow: hidden;
        }

        .event-item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            min-height: 130px;
            padding: 15px;
            text-align: center;
            background: #fff;
            color: #222;
            border: 1px solid #e5e7eb;
            transition: all .3s ease;
        }

        .event-item h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .event-item span {
            font-size: 15px;
            line-height: 1.5;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .event-item:hover {
            background: #f28c28;
            color: #fff;

            text-decoration: none;

            transform: translateY(-1px);
        }

        .event-item:hover h4,
        .event-item:hover span {
            color: #fff;
        }

        /* ==========================================
                                                                           DỰ ÁN QUỐC TẾ TIÊU BIỂU
                                                                        ========================================== */

        .international-projects {
            padding: 50px 0;

            background: #f5f5f5;
            /* hoặc màu bạn muốn */

            width: 100vw;

            margin-left: calc(50% - 50vw);
            margin-right: calc(50% - 50vw);
        }

        .international-title {
            font-size: 22px;
            font-weight: 400;
            color: #333;
            margin-bottom: 35px;
        }

        /* 8 logo trên 1 hàng */

        .project-logo-wrapper {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 18px;
        }

        .project-logo-item {
            height: 135px;

            background: #fff;

            border: 1px solid #ececec;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 10px;

            transition: all .3s ease;
        }

        .project-logo-item:hover {
            border-color: #d9d9d9;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
        }

        .project-logo-item img {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }

        /* ===========================
                                                                           RESPONSIVE
                                                                        =========================== */

        @media (max-width: 1400px) {

            .project-logo-wrapper {
                grid-template-columns: repeat(6, 1fr);
            }

        }

        @media (max-width: 992px) {

            .project-logo-wrapper {
                grid-template-columns: repeat(4, 1fr);
            }

            .project-logo-item {
                height: 120px;
            }

        }

        @media (max-width: 768px) {

            .project-logo-wrapper {
                grid-template-columns: repeat(3, 1fr);
            }

            .international-title {
                font-size: 30px;
            }

        }

        @media (max-width: 576px) {

            .project-logo-wrapper {
                grid-template-columns: repeat(2, 1fr);
            }

            .project-logo-item {
                height: 100px;
            }

        }

        /* ==========================
                                                           VIDEO CENTER
                                                        ========================== */

        .video-main {
            position: relative;
        }

        .video-main iframe {
            width: 100%;
            height: 280px;
            border: none;
            display: block;
        }

        .video-center-title {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 400;
        }

        .video-caption-bar {
            background: #e79a18;
            color: #fff;

            height: 42px;

            display: flex;
            align-items: center;

            padding: 0 15px;

            font-size: 16px;
            font-weight: 500;

            overflow: hidden;
        }

        .video-caption-bar span {
            white-space: nowrap;
            animation: marquee 15s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .video-list-wrapper {
            height: 350px;
            display: flex;
            flex-direction: column;
        }

        .video-list {
            flex: 1;

            overflow-y: auto;

            padding-right: 10px;
        }

        .video-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            padding: 9px 0;

            color: #333;

            text-decoration: none;

            border-bottom: 1px solid #eee;

            font-size: 15px;

            line-height: 1.5;
        }

        .video-item:hover {
            color: #d32f2f;
        }

        .video-item.active {
            color: #d32f2f;
        }

        .video-bullet {
            width: 14px;
            height: 14px;

            border: 2px solid #444;

            border-radius: 50%;

            margin-top: 4px;

            flex-shrink: 0;
        }

        .video-item.active .video-bullet {
            border-color: #e53935;
            background: #e53935;
        }

        .video-all-link {
            padding-top: 12px;

            text-align: right;

            border-top: 1px solid #eee;
        }

        .video-all-link a {
            color: #333;
            text-decoration: none;
            font-size: 15px;
        }

        .video-all-link a:hover {
            color: #e53935;
        }

        /* ==================================
                                                   NTU GÓC NHÌN CHIA SẺ
                                                ================================== */

        .sharing-box {
            background: #fffffc;

            padding: 15px;

            height: 100%;

            border: 1px solid #e9e9e9;

            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
        }

        .sharing-title {
            font-size: 20px;
            font-weight: 400;
            color: #555;
            margin-bottom: 20px;
        }

        .sharing-featured {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .sharing-featured img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .sharing-featured h4 {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .sharing-list {
            margin: 0;
            padding-left: 20px;
        }

        .sharing-list li {
            margin-bottom: 5px;
        }

        .sharing-list a {
            color: #666;
            text-decoration: none;
            line-height: 1.3;
            font-size: 13px;
        }

        .sharing-list a:hover {
            color: #0d6efd;
        }

        /* ==================================
                                           NTU TRONG TÔI
                                        ================================== */

        .ntu-section {
            background: #f3f3f3;
            padding: 50px 0;
        }

        .ntu-title {
            text-align: center;
            font-size: 32px;
            font-weight: 300;
            margin-bottom: 50px;
            color: #444;
        }

        .ntu-card a {
            text-decoration: none;
        }

        .ntu-image-wrap {
            position: relative;
            overflow: hidden;
            border-radius: 4px;
        }

        .ntu-image-wrap img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .ntu-overlay {

            position: absolute;

            left: 0;
            right: 0;
            bottom: 0;

            padding: 15px;

            background: linear-gradient(transparent,
                    rgba(0, 0, 0, .7));

            text-align: right;
        }

        .ntu-detail {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
        }

        .ntu-post-title {

            margin-top: 15px;

            font-size: 15px;

            line-height: 1.4;

            color: #333;

            min-height: 75px;
        }

        .ntu-slider {
            position: relative;
        }

        .ntu-slider .owl-nav {
            display: block !important;
        }

        .ntu-slider .owl-prev,
        .ntu-slider .owl-next {

            position: absolute;
            top: 38%;

            width: 58px;
            height: 58px;

            border-radius: 50% !important;

            background: #fff !important;
            color: #444 !important;

            border: none !important;

            display: flex !important;
            align-items: center;
            justify-content: center;

            box-shadow: 0 4px 15px rgba(0, 0, 0, .15);

            transition: all .3s ease;

            margin: 0 !important;
        }

        .ntu-slider .owl-prev {
            left: -40px;
        }

        .ntu-slider .owl-next {
            right: -40px;
        }

        .ntu-slider .owl-prev i,
        .ntu-slider .owl-next i {

            font-size: 22px;

            transition: all .3s ease;
        }

        .ntu-slider .owl-prev:hover,
        .ntu-slider .owl-next:hover {

            background: #c70000 !important;

            transform: scale(1.08);
        }

        .ntu-slider .owl-prev:hover i,
        .ntu-slider .owl-next:hover i {

            color: #fff !important;
        }

        /* =================================
                               TÌM HIỂU VỀ NTU
                            ================================= */

        .about-ntu-section {

            background: #d89018;

            width: 100vw;

            margin-left: calc(50% - 50vw);
            margin-right: calc(50% - 50vw);

            padding: 20px 0;
        }

        .about-title {

            text-align: center;

            color: #fff;

            font-size: 24px;
            font-weight: 400;

            margin-bottom: 10px;
        }

        .about-grid {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px 40px;
        }

        .about-item {

            display: flex;

            align-items: center;

            gap: 10px;

            color: #fff;

            text-decoration: none;

            transition: .25s ease;
        }

        .about-item:hover {

            color: #fff;

            transform: translateX(6px);
        }

        .about-icon {

            width: 40px;
            height: 40px;

            flex-shrink: 0;

            border: 1px solid rgba(255, 255, 255, .7);

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }

        .about-item span {

            font-size: 15px;
            font-weight: 400;
            line-height: 1.4;
        }

        /* Tablet */

        @media (max-width: 992px) {

            .about-grid {

                grid-template-columns: repeat(2, 1fr);
            }

        }

        /* Mobile */

        @media (max-width: 768px) {

            .about-grid {

                grid-template-columns: 1fr;
            }

            .about-title {

                font-size: 20px;
            }

            .about-item span {

                font-size: 15px;
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

                    frame.src = url;

                    title.textContent = videoTitle;

                    videoItems.forEach(v => {
                        v.classList.remove('active');
                    });

                    this.classList.add('active');

                });

            });

        });
        $(document).ready(function() {

            $('.ntu-slider').owlCarousel({

                loop: true,
                margin: 30,
                nav: true,
                dots: false,

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

        });
    </script>
@endpush
