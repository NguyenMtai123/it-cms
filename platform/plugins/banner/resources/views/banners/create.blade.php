@extends('base::layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                {{-- LEFT FORM --}}
                <div class="col-md-8">

                    <div class="card card-primary card-outline">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus-circle"></i> Thêm Banner mới
                            </h3>
                        </div>

                        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" class="form-control form-control-lg"
                                        placeholder="Nhập tiêu đề banner...">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" rows="3" class="form-control" placeholder="Nội dung mô tả ngắn..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Link (khi click)</label>
                                    <input type="text" name="link" class="form-control" placeholder="https://...">
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Thứ tự hiển thị</label>
                                        <input type="number" name="sort_order" value="0" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer d-flex justify-content-between">

                                <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>

                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Lưu Banner
                                </button>

                            </div>

                    </div>

                </div>

                {{-- RIGHT UPLOAD --}}
                <div class="col-md-4">

                    <div class="card card-outline card-info">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-image"></i> Ảnh Banner
                            </h3>
                        </div>

                        <div class="card-body text-center">

                            <x-media-picker name="image" :value="old('image')" />

                            <small class="text-muted d-block mt-2">
                                JPG, PNG - tối ưu 1920x600px
                            </small>

                        </div>

                    </div>

                </div>

            </div>

            </form>

        </div>
    </section>
@endsection
