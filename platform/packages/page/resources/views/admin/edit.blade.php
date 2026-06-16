@extends('base::layouts.master')

@section('title', 'Edit Page')

@section('page-header')
    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Page</h1>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection

@section('content')

    <form action="{{ route('pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Page Content</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $page->title) }}">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ old('slug', $page->slug) }}">
                        </div>
                        <div class="form-group">

                            <label>Parent Page</label>

                            <select name="parent_id" class="form-control">

                                <option value="">
                                    -- Trang gốc --
                                </option>

                                @foreach ($pages as $parent)
                                    <option value="{{ $parent->id }}"
                                        {{ $page->parent_id == $parent->id ? 'selected' : '' }}>

                                        {{ $parent->title }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Excerpt</label>
                            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $page->excerpt) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <x-editor name="content" :value="old('content', $page->content)" />
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
                            <input type="checkbox" name="status" value="1" class="form-check-input"
                                {{ $page->status ? 'checked' : '' }}>
                            <label class="form-check-label">Published</label>
                        </div>

                        <div class="form-group">
                            <label>Published At</label>
                            <input type="datetime-local" name="published_at" class="form-control"
                                value="{{ $page->published_at ? \Carbon\Carbon::parse($page->published_at)->format('Y-m-d\TH:i') : '' }}">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary btn-block">
                            Update Page
                        </button>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Featured Image</h3>
                    </div>
                    <div class="card-body">
                        <x-media-picker name="image" :value="$page->image" />
                        <hr>

                        <label>
                            Tài liệu đính kèm
                        </label>

                        <x-media-picker name="file" :value="$page->file" />
                    </div>
                </div>

            </div>

        </div>

    </form>

@endsection
