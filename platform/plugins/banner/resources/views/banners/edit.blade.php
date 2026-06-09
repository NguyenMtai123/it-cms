@extends('base::layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                {{-- LEFT --}}
                <div class="col-md-8">

                    <div class="card card-warning card-outline">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i> Chỉnh sửa Banner
                            </h3>
                        </div>


                        <form action="{{ route('admin.banner.update', ['banner' => $banner->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" value="{{ $banner->title }}"
                                        class="form-control form-control-lg">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" rows="3" class="form-control">{{ $banner->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="link" value="{{ $banner->link }}" class="form-control">
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Thứ tự</label>
                                        <input type="number" name="sort_order" value="{{ $banner->sort_order }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control">

                                            <option value="1" {{ $banner->status ? 'selected' : '' }}>
                                                Hiển thị
                                            </option>

                                            <option value="0" {{ !$banner->status ? 'selected' : '' }}>
                                                Ẩn
                                            </option>

                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer d-flex justify-content-between">

                                <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">
                                    Quay lại
                                </a>

                                <button class="btn btn-warning">
                                    Cập nhật
                                </button>

                            </div>

                    </div>

                </div>

                {{-- RIGHT PREVIEW --}}
                <div class="col-md-4">

                    <div class="card card-outline card-info">

                        <div class="card-header">
                            <h3 class="card-title">Ảnh hiện tại</h3>
                        </div>

                        <div class="card-body text-center">

                            <label>Đổi ảnh mới</label>

                            <x-media-picker name="image" :value="old('image', $banner->image)" />

                        </div>

                    </div>

                </div>

            </div>

            </form>

        </div>
    </section>
@endsection
