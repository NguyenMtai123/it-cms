@extends('base::layouts.master')

@section('title', 'Admission Settings')

@section('page-header')

    <h1>
        Admission Settings
    </h1>

@endsection

@section('content')
    <form action="{{ route('admission-settings.update') }}" method="POST">

        @csrf

        <div class="card">

            <div class="card-body">

                <div class="form-group">

                    <label>Title</label>

                    <input type="text" name="title" class="form-control" value="{{ $setting->title }}">

                </div>

                <div class="row">

                    {{-- Banner --}}
                    <div class="col-md-4">

                        <div class="card card-outline card-primary">

                            <div class="card-header">
                                <h3 class="card-title">
                                    Banner tuyển sinh
                                </h3>
                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Banner Image</label>

                                    <x-media-picker name="banner_image" :value="$setting->banner_image" />

                                </div>

                                <div class="form-group">

                                    <label>Banner URL</label>

                                    <input type="text" name="banner_url" class="form-control"
                                        value="{{ old('banner_url', $setting->banner_url) }}"
                                        placeholder="https://example.com">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Career --}}
                    <div class="col-md-4">

                        <div class="card card-outline card-success">

                            <div class="card-header">
                                <h3 class="card-title">
                                    Cẩm nang ngành nghề
                                </h3>
                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Career Image</label>

                                    <x-media-picker name="career_image" :value="$setting->career_image" />

                                </div>

                                <div class="form-group">

                                    <label>Career URL</label>

                                    <input type="text" name="career_url" class="form-control"
                                        value="{{ old('career_url', $setting->career_url) }}"
                                        placeholder="https://example.com">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Background --}}
                    <div class="col-md-4">

                        <div class="card card-outline card-warning">

                            <div class="card-header">
                                <h3 class="card-title">
                                    Background
                                </h3>
                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Background Image</label>

                                    <x-media-picker name="background_image" :value="$setting->background_image" />

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary">

                    Save

                </button>

            </div>

        </div>

    </form>

@endsection
