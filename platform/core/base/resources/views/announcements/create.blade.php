@extends('base::layouts.master')

@section('title', 'Create Announcement')

@section('page-header')
    <div class="row">
        <div class="col-sm-6">
            <h1>Create Announcement</h1>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('announcements.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
@endsection

@section('content')

    <form method="POST" action="{{ route('announcements.store') }}">
        @csrf

        <div class="row">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Announcement Content</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Announcement title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="3" name="description" class="form-control" placeholder="Short summary">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <x-editor name="content" :value="old('content')" />
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Publish</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" name="status" value="1" checked>
                            <label class="form-check-label">Published</label>
                        </div>

                        <div class="form-group mt-3">
                            <label>Published At</label>
                            <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at') }}">
                            <small class="text-muted">
                                Nếu để trống, hệ thống sẽ tự lấy thời gian hiện tại khi bạn bật Published.
                            </small>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            Send / Save Announcement
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Featured Image</h3>
                    </div>

                    <div class="card-body">
                        <x-media-picker name="image" :value="old('image')" />
                    </div>
                </div>

            </div>

        </div>
    </form>

@endsection
