@extends('theme::layouts.master')

@section('content')

<div class="page-breadcrumb">

    <div class="container">

        <span class="active">
            Thông báo
        </span>

    </div>

</div>

<div class="container announcement-page">

    <h1 class="announcement-page-title">
        Thông báo
    </h1>

    <div class="announcement-list">

        @foreach($announcements as $item)

            <div class="announcement-row">

                <a href="{{ url('announcements/'.$item->slug) }}"
                   class="announcement-link">

                    <span class="announcement-arrow">
                        ▶
                    </span>

                    <span class="announcement-text">
                        {{ $item->title }}
                    </span>

                    <span class="announcement-date">
                        [{{ \Carbon\Carbon::parse($item->publish_at)->format('d/m/Y') }}]
                    </span>

                </a>

            </div>

        @endforeach

    </div>

    <div class="announcement-pagination">

        {{ $announcements->links() }}

    </div>

</div>

@endsection
<style>
    /* ==========================
   BREADCRUMB
========================== */

.page-breadcrumb{
    border-bottom:1px solid #ececec;
    padding:12px 0;
    margin-bottom:40px;
}

.page-breadcrumb .active{
    color:#ff5a5f;
    font-size:14px;
}

/* ==========================
   TITLE
========================== */

.announcement-page-title{
    font-size:22px;
    font-weight:400;
    color:#222;
    margin-bottom:30px;
}

/* ==========================
   LIST
========================== */

.announcement-list{
    border-top:1px solid #eee;
}

.announcement-row{
    border-bottom:1px solid #eee;
}

.announcement-link{

    display:flex;
    align-items:center;

    gap:10px;

    padding:18px 12px;

    text-decoration:none;

    color:#333;

    font-size:14px;

    transition:.25s;
}

.announcement-link:hover{
    color:#d62828;
}

.announcement-arrow{
    font-size:10px;
    color:#444;
    flex-shrink:0;
}

.announcement-text{
    flex:1;
    line-height:1.6;
}

.announcement-date{
    color:#ff5a5f;
    white-space:nowrap;
    font-size:13px;
}

/* ==========================
   PAGINATION
========================== */

.announcement-pagination{
    margin-top:40px;
}

.announcement-pagination .pagination{
    justify-content:center;
}

.announcement-pagination .page-link{

    width:48px;
    height:48px;

    border-radius:50% !important;

    display:flex;
    align-items:center;
    justify-content:center;

    margin:0 4px;

    border:1px solid #e4e4e4;

    color:#555;
}

.announcement-pagination .active .page-link{

    background:#ff5a5f;
    border-color:#ff5a5f;

    color:#fff;
}
</style>
