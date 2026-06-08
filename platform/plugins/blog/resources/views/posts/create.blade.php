@extends('base::layouts.master')

@section('title', 'Create Post')

@section('page-header')
<div class="row">
    <div class="col-sm-6">
        <h1>Create Post</h1>
    </div>

    <div class="col-sm-6 text-right">
        <a href="{{ route('blog.posts.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>
</div>
@endsection

@section('content')

<form method="POST"
      action="{{ route('blog.posts.store') }}">
    @csrf

    <div class="row">

        {{-- LEFT --}}
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">
                        Post Content
                    </h3>
                </div>

                <div class="card-body">

                    {{-- TITLE --}}
                    <div class="form-group">
                        <label>Title</label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="Enter title">
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="form-group">
                        <label>Description</label>

                        <textarea
                            rows="3"
                            name="description"
                            class="form-control"
                            placeholder="Short description">{{ old('description') }}</textarea>
                    </div>

                    {{-- CONTENT --}}
                    <div class="form-group">
                        <label>Content</label>

                        <x-editor
                            name="content"
                            :value="old('content')" />
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
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="status"
                            value="1"
                            checked>

                        <label class="form-check-label">
                            Published
                        </label>
                    </div>

                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="is_featured"
                            value="1">

                        <label class="form-check-label">
                            Featured Post
                        </label>
                    </div>

                </div>

                <div class="card-footer">
                    <button
                        type="submit"
                        class="btn btn-primary btn-block">

                        Save Post

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

                    <x-media-picker
                        name="image"
                        :value="old('image')" />

                </div>

            </div>



        </div>

    </div>
            <div class="row">
                {{-- CATEGORIES --}}
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">
                                Categories
                            </h3>
                        </div>

                        <div class="card-body">

                            @foreach($categories as $category)

                                <div class="form-check">

                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="categories[]"
                                        value="{{ $category->id }}">

                                    <label class="form-check-label">
                                        {{ $category->name }}
                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>
                </div class="col-md-6">

                {{-- TAGS --}}
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">
                                Tags
                            </h3>
                        </div>

                        <div class="card-body">

                            @foreach($tags as $tag)

                                <div class="form-check">

                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="tags[]"
                                        value="{{ $tag->id }}">

                                    <label class="form-check-label">
                                        {{ $tag->name }}
                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>
                </div class="col-md-6">
            </div class="row">
</form>

@endsection
