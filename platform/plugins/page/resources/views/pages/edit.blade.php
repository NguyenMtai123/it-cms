@extends('base::layouts.master')

@section('title', 'Edit Page')

@section('page-header')
    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Page</h1>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
@endsection

@section('content')

    <form method="POST" action="{{ route('pages.update', $page->id) }}">

        @csrf
        @method('PUT')

        <div class="row">

            {{-- LEFT CONTENT --}}
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            Page Content
                        </h3>
                    </div>

                    <div class="card-body">

                        {{-- TITLE --}}
                        <div class="form-group">
                            <label>Title</label>

                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $page->name) }}" placeholder="Enter page title">
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="form-group">
                            <label>Description</label>

                            <textarea rows="3" name="description" class="form-control" placeholder="Short description">{{ old('description', $page->description) }}</textarea>
                        </div>

                        {{-- CONTENT --}}
                        <div class="form-group">
                            <label>Content</label>

                            <x-editor name="content" :value="old('content', $page->content)" />
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="col-md-4">

                {{-- PUBLISH --}}
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">
                            Publish
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="form-check mb-2">

                            <input type="checkbox" class="form-check-input" name="status" value="1"
                                {{ old('status', $page->status) ? 'checked' : '' }}>

                            <label class="form-check-label">
                                Published
                            </label>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary btn-block">

                            Update Page

                        </button>

                    </div>

                </div>

                {{-- FEATURED IMAGE --}}
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            Featured Image
                        </h3>
                    </div>

                    <div class="card-body">

                        <x-media-picker name="image" :value="old('image', $page->image)" />

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
