@extends('base::layouts.master')

@section('title', 'Create Announcement')

@section('page-header')

    <div class="d-flex justify-content-between">

        <h1>Create Announcement</h1>

        <a href="{{ route('announcements.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

@endsection

@section('content')

    <form action="{{ route('announcements.store') }}" method="POST">

        @csrf

        <div class="row">

            {{-- CONTENT --}}
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            Announcement Content
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Title</label>

                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                        </div>

                        <div class="form-group">

                            <label>Summary</label>

                            <textarea name="summary" rows="3" class="form-control">{{ old('summary') }}</textarea>

                        </div>

                        <div class="form-group">

                            <label>Content</label>

                            <x-editor name="content" :value="old('content')" />

                        </div>

                    </div>

                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-md-4">

                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">
                            Publish
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Publish At</label>

                            <input type="datetime-local" name="publish_at" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Expired At</label>

                            <input type="datetime-local" name="expired_at" class="form-control">

                        </div>

                        <div class="form-check">

                            <input type="checkbox" name="is_active" value="1" checked class="form-check-input">

                            <label class="form-check-label">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button class="btn btn-primary btn-block">

                            Save Announcement

                        </button>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            File đính kèm
                        </h3>

                    </div>

                    <div class="card-body">

                        <x-media-picker name="attachment" :value="old('attachment')" />

                        <small class="text-muted">

                            PDF, Word, Excel, ZIP hoặc hình ảnh

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
