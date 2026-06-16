{{-- @php
    $footerSetting = $footerSetting
        ?? \Platform\Plugins\Footer\Models\FooterSetting::first();
@endphp
@php
    $organizationLinks = $organizationLinks
        ?? \Platform\Plugins\Footer\Models\FooterLink::where('group', 'organization')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

    $quickFooterLinks = $quickFooterLinks
        ?? \Platform\Plugins\Footer\Models\FooterLink::where('group', 'quick')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();
@endphp --}}
@if($footerSetting)

<footer class="ntu-footer">

    <div class="container">

        <div class="row">

            {{-- THÔNG TIN --}}
            <div class="col-lg-5">

                <div class="footer-brand">

                    @if($footerSetting->logo)

                        <img
                            src="{{ asset($footerSetting->logo) }}"
                            class="footer-logo">

                    @endif

                    <div>

                        <h3>

                            {{ $footerSetting->name }}

                        </h3>

                        <div class="footer-rector">

                            Hiệu trưởng:
                            {{ $footerSetting->rector }}

                        </div>

                    </div>

                </div>

                <div class="footer-contact">

                    <div>

                        <i class="fas fa-location-dot"></i>

                        {{ $footerSetting->address }}

                    </div>

                    <div>

                        <i class="fas fa-phone"></i>

                        {{ $footerSetting->phone }}

                    </div>

                    <div>

                        <i class="fas fa-envelope"></i>

                        {{ $footerSetting->email }}

                    </div>

                    <div>

                        <i class="fas fa-globe"></i>

                        {{ $footerSetting->website }}

                    </div>

                </div>

            </div>

            {{-- CƠ CẤU --}}
            <div class="col-lg-3">

                <h4 class="footer-heading">

                    Cơ cấu tổ chức

                </h4>

                <ul class="footer-menu">

                    @foreach($organizationLinks as $item)

                        <li>

                            <a href="{{ $item->url }}">

                                {{ $item->title }}

                            </a>

                        </li>

                    @endforeach

                </ul>

            </div>

            {{-- LIÊN KẾT NHANH --}}
            <div class="col-lg-4">

                <h4 class="footer-heading">

                    Liên kết nhanh

                </h4>

                <ul class="footer-menu">

                    @foreach($quickFooterLinks as $item)

                        <li>

                            <a href="{{ $item->url }}">

                                {{ $item->title }}

                            </a>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    © {{ date('Y') }}
                    {{ $footerSetting->name }}

                </div>

                <div class="col-md-6 text-md-end">

                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-youtube"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-tiktok"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>

@endif
<style>
    .ntu-footer {

    background:
        linear-gradient(
            135deg,
            #004a99 0%,
            #0066cc 100%
        );

    color: #fff;

    margin-top: 0px;
}

.ntu-footer .container {

    padding-top: 15px;
    padding-bottom: 15px;
}

.footer-brand {

    display: flex;
    gap: 20px;

    align-items: center;

    margin-bottom: 25px;
}

.footer-logo {

    width: 90px;
    height: 90px;

    object-fit: contain;

    background: #fff;

    border-radius: 50%;

    padding: 8px;
}

.footer-brand h3 {

    font-size: 20px;
    font-weight: 700;

    margin-bottom: 10px;
}

.footer-rector {

    opacity: .85;
}

.footer-contact div {

    margin-bottom: 12px;

    display: flex;

    align-items: center;

    gap: 10px;
}

.footer-contact i {

    width: 20px;

    color: #ffd34d;
}

.footer-heading {

    font-size: 20px;

    margin-bottom: 20px;

    position: relative;

    padding-bottom: 12px;
}

.footer-heading::after {

    content: "";

    width: 50px;
    height: 3px;

    background: #ffd34d;

    position: absolute;

    left: 0;
    bottom: 0;
}

.footer-menu {

    list-style: none;

    padding: 0;
    margin: 0;
}

.footer-menu li {

    margin-bottom: 10px;
}

.footer-menu a {

    color: rgba(255,255,255,.9);

    transition: .3s;
}

.footer-menu a:hover {

    color: #ffd34d;

    padding-left: 6px;
}

.footer-bottom {

    background: rgba(0,0,0,.15);

    padding: 5px 0;
}

.footer-bottom a {

    color: #fff;

    margin-left: 15px;

    font-size: 20px;

    transition: .3s;
}

.footer-bottom a:hover {

    color: #ffd34d;
}
</style>
