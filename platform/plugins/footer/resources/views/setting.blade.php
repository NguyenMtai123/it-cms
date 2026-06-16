@extends('base::layouts.master')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('footer-setting.save') }}" method="POST">

            @csrf

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        Thông tin trường

                    </h3>

                    <div class="card-tools">

                        <button class="btn btn-primary">

                            <i class="fas fa-save"></i>

                            Lưu

                        </button>

                    </div>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Tên trường</label>

                                <input type="text" name="name" value="{{ $setting->name ?? '' }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Hiệu trưởng</label>

                                <input type="text" name="rector" value="{{ $setting->rector ?? '' }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Mô tả</label>

                        <textarea name="description" rows="6" class="form-control">{{ $setting->description ?? '' }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Địa chỉ</label>

                                <input type="text" name="address" value="{{ $setting->address ?? '' }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Điện thoại</label>

                                <input type="text" name="phone" value="{{ $setting->phone ?? '' }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Email</label>

                                <input type="text" name="email" value="{{ $setting->email ?? '' }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Website</label>

                                <input type="text" name="website" value="{{ $setting->website ?? '' }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">
                                Logo trường
                            </h3>
                        </div>

                        <div class="card-body">

                            <x-media-picker name="logo" :value="$setting->logo ?? ''" />

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>
@endsection
