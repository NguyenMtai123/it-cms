@extends('base::layouts.master')

@section('title', 'Edit Announcement')

@section('page-header')

    <div class="d-flex justify-content-between">

        <h1>Edit Announcement</h1>

        <a href="{{ route('announcements.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

@endsection
@section('content')

    <form action="{{ route('announcements.update', $announcement->id) }}" method="POST">

        @csrf
        @method('PUT')

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

                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $announcement->title) }}">

                        </div>

                        <div class="form-group">

                            <label>Summary</label>

                            <textarea name="summary" rows="3" class="form-control">{{ old('summary', $announcement->summary) }}</textarea>

                        </div>

                        <div class="form-group">

                            <label>Content</label>

                            <x-editor name="content" :value="old('content', $announcement->content)" />

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

                            <input type="datetime-local" name="publish_at" class="form-control"
                                value="{{ optional($announcement->publish_at)->format('Y-m-d\TH:i') }}">

                        </div>

                        <div class="form-group">

                            <label>Expired At</label>

                            <input type="datetime-local" name="expired_at" class="form-control"
                                value="{{ optional($announcement->expired_at)->format('Y-m-d\TH:i') }}">

                        </div>

                        <div class="form-check">

                            <input type="checkbox" name="is_active" value="1"
                                @if ($announcement->is_active) checked @endif class="form-check-input">

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

                        <x-media-picker name="attachment" :value="old('attachment', $announcement->attachment)" />

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
