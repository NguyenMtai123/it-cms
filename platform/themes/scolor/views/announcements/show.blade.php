@extends('theme::layouts.master')

@section('content')

<div class="page-breadcrumb">

    <div class="container">

        <a href="{{ url('/') }}">
            Trang chủ
        </a>

        <span>/</span>

        <a href="{{ route('announcements') }}">
            Thông báo
        </a>

        <span>/</span>

        <span class="active">

            {{ $announcement->title }}

        </span>

    </div>

</div>

<div class="container">

    <div class="announcement-detail">

        <h1 class="announcement-title">

            {{ $announcement->title }}

        </h1>

        <div class="announcement-meta">

            <i class="far fa-calendar-alt"></i>

            {{ optional($announcement->publish_at)->format('d/m/Y') }}

        </div>

        <div class="announcement-content">

            {!! $announcement->content !!}

        </div>

        @if ($announcement->attachment)

            <div class="attachment-box">

                <h5>

                    <i class="fas fa-paperclip"></i>

                    File đính kèm

                </h5>

                @php
                    $file = asset($announcement->attachment);
                    $ext = strtolower(pathinfo($announcement->attachment, PATHINFO_EXTENSION));
                @endphp

                @if ($ext === 'pdf')

                    <div class="pdf-viewer">

                        <iframe
                            src="{{ $file }}"
                            width="100%"
                            height="900">
                        </iframe>

                    </div>

                @else

                    <a href="{{ $file }}"
                       target="_blank"
                       class="btn btn-danger">

                        <i class="fas fa-download"></i>

                        Tải xuống

                    </a>

                @endif

            </div>

        @endif

    </div>

</div>

@endsection
<style>
.page-breadcrumb{
    background:#fafafa;
    border-bottom:1px solid #ececec;
    padding:12px 0;
    margin-bottom:25px;
}

.page-breadcrumb a{
    color:#666;
    text-decoration:none;
    font-size:13px;
}

.page-breadcrumb span{
    margin:0 8px;
    color:#999;
    font-size:13px;
}

.page-breadcrumb .active{
    color:#d32f2f;
}

.announcement-detail{
    background:#fff;
    padding:30px;
    margin-bottom:40px;
}

.announcement-title{
    font-size:32px;
    font-weight:600;
    line-height:1.4;
    color:#222;
    margin-bottom:15px;
}

.announcement-meta{
    color:#888;
    font-size:13px;
    margin-bottom:25px;
    padding-bottom:15px;
    border-bottom:1px solid #eee;
}

.announcement-content{
    color:#333;
}

/* ÉP NHỎ TOÀN BỘ NỘI DUNG */

.announcement-content,
.announcement-content p,
.announcement-content div,
.announcement-content span,
.announcement-content li,
.announcement-content td,
.announcement-content th{
    font-size:15px !important;
    line-height:1.8 !important;
}

.announcement-content h1{
    font-size:24px !important;
}

.announcement-content h2{
    font-size:22px !important;
}

.announcement-content h3{
    font-size:20px !important;
}

.announcement-content h4{
    font-size:18px !important;
}

.announcement-content img{
    max-width:100%;
    height:auto;
}

.announcement-content table{
    width:100%;
    margin:15px 0;
}

.announcement-content iframe{
    max-width:100%;
}

.attachment-box{
    margin-top:40px;
    padding-top:20px;
    border-top:1px solid #eee;
}

.pdf-viewer{
    border:1px solid #ddd;
    margin-top:15px;
}
</style>
