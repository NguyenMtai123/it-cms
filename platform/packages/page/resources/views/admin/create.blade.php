@extends('base::layouts.master')

@section('title', 'Create Page')

@section('page-header')
    <div class="row">
        <div class="col-sm-6">
            <h1>Create Page</h1>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
@endsection

@section('content')

    <form action="{{ route('pages.store') }}" method="POST">
        @csrf

        <div class="row">

            {{-- LEFT --}}
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Page Content</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ old('slug') }}">
                            <small class="text-muted">Leave empty to auto generate from title</small>
                        </div>
                        <div class="form-group">

                            <label>Parent Page</label>

                            <select name="parent_id" class="form-control">

                                <option value="">
                                    -- Trang gốc --
                                </option>

                                @foreach ($pages as $parent)
                                    <option value="{{ $parent->id }}">
                                        {{ $parent->title }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Excerpt</label>
                            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <x-editor name="content" :value="old('content')" />
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">

                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Publish</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-check mb-2">
                            <input type="checkbox" name="status" value="1" class="form-check-input" checked>
                            <label class="form-check-label">Published</label>
                        </div>

                        <div class="form-group">
                            <label>Published At</label>
                            <input type="datetime-local" name="published_at" class="form-control">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary btn-block">
                            Save Page
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
                <div class="card mt-3">

                    <div class="card-header">
                        <h3 class="card-title">
                            Tài liệu đính kèm
                        </h3>
                    </div>

                    <div class="card-body">

                        <x-media-picker name="file" :value="old('file')" />

                    </div>

                </div>

            </div>

        </div>

    </form>

    {{-- <script>
document.getElementById('title').addEventListener('input', function () {
    const slugInput = document.getElementById('slug');
    if (!slugInput.value) {
        slugInput.value = this.value
            .toLowerCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .replace(/[^a-z0-9\s-]/g, "")
            .trim()
            .replace(/\s+/g, '-');
    }
});
</script> --}}

@endsection
