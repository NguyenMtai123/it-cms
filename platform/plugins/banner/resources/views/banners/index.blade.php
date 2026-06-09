@extends('base::layouts.master')

@section('content')
    <section class="content">

        <div class="container-fluid">

            {{-- HEADER --}}
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h3 class="mb-0">Quản lý Banner</h3>
                    <small class="text-muted">Danh sách banner hiển thị trang chủ</small>
                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">

                        <i class="fas fa-plus"></i> Thêm Banner
                    </a>
                </div>
            </div>

            {{-- STATS --}}
            <div class="row">

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $banners->count() }}</h3>
                            <p>Tổng Banner</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-images"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $banners->where('status', 1)->count() }}</h3>
                            <p>Đang hiển thị</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $banners->where('status', 0)->count() }}</h3>
                            <p>Đã ẩn</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-eye-slash"></i>
                        </div>
                    </div>
                </div>

            </div>

            {{-- CARD TABLE --}}
            <div class="card card-outline card-primary">

                <div class="card-header">

                    <h3 class="card-title">Danh sách Banner</h3>

                    <div class="card-tools">
                        <input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm...">
                    </div>

                </div>

                <div class="card-body p-0">

                    <table class="table table-hover table-striped mb-0">

                        <thead class="thead-dark">
                            <tr>
                                <th width="50">#</th>
                                <th width="160">Ảnh</th>
                                <th>Thông tin</th>
                                <th>Link</th>
                                <th>Trạng thái</th>
                                <th width="120" class="text-center">Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($banners as $banner)
                                <tr>

                                    <td>{{ $banner->id }}</td>

                                    {{-- IMAGE --}}
                                    <td>
                                        <img src="{{ asset( $banner->image) }}"
                                            style="width:140px;height:70px;object-fit:cover;border-radius:6px;">
                                    </td>

                                    {{-- INFO --}}
                                    <td>
                                        <strong>{{ $banner->title }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            {{ $banner->description ?? 'Không có mô tả' }}
                                        </small>
                                    </td>

                                    {{-- LINK --}}
                                    <td>
                                        @if ($banner->link)
                                            <a href="{{ $banner->link }}" target="_blank">
                                                {{ \Illuminate\Support\Str::limit($banner->link, 30) }}
                                            </a>
                                        @else
                                            <span class="text-muted">---</span>
                                        @endif
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        @if ($banner->status)
                                            <span class="badge badge-success">
                                                Hiển thị
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Ẩn
                                            </span>
                                        @endif
                                    </td>

                                    {{-- ACTIONS --}}
                                    <td class="text-center">

                                        <div class="btn-group">

                                            <div class="p-2">
                                                <a href="{{ route('admin.banner.edit', $banner) }}"
                                                    class="btn btn-warning btn-sm">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                            </div>

                                            <div class="p-2">
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $banner->id }}">

                                                    <i class="fas fa-trash"></i>

                                                </button>
                                            </div>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-5">

                                        <i class="fas fa-images fa-3x text-muted"></i>

                                        <p class="mt-2">Chưa có banner nào</p>

                                        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">

                                            Tạo banner đầu tiên

                                        </a>

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                    @foreach ($banners as $banner)
                        <div class="modal fade" id="deleteModal{{ $banner->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    {{-- HEADER --}}
                                    <div class="modal-header bg-danger text-white">

                                        <h5 class="modal-title">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            Xác nhận xóa
                                        </h5>

                                        <button type="button" class="close text-white" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>

                                    </div>

                                    {{-- BODY --}}
                                    <div class="modal-body text-center">

                                        <i class="fas fa-trash fa-3x text-danger mb-3"></i>

                                        <p>Bạn có chắc muốn xóa banner này không?</p>

                                        <h5 class="text-primary">
                                            {{ $banner->title }}
                                        </h5>

                                        <small class="text-muted">
                                            Hành động này không thể hoàn tác
                                        </small>

                                    </div>

                                    {{-- FOOTER --}}
                                    <div class="modal-footer justify-content-between">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                                            Hủy bỏ

                                        </button>

                                        <form action="{{ route('admin.banner.destroy', $banner) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger">

                                                <i class="fas fa-trash"></i> Xóa ngay

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </section>
@endsection
