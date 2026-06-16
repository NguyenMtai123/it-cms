@extends('base::layouts.master')

@section('title', 'Edit Project')

@section('page-header')

    <div class="row">

        <div class="col-sm-6">
            <h1>Edit Project</h1>
        </div>

        <div class="col-sm-6 text-right">

            <a href="{{ route('projects.index') }}" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Back

            </a>

        </div>

    </div>

@endsection

@section('content')

    <form action="{{ route('projects.update', $item->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            {{-- LEFT --}}

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            Project Information
                        </h3>

                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Name</label>

                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $item->name) }}">

                        </div>

                        <div class="form-group">

                            <label>URL</label>

                            <input type="url" name="url" class="form-control" value="{{ old('url', $item->url) }}"
                                placeholder="https://example.com">

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}

            <div class="col-md-4">

                {{-- Publish --}}

                <div class="card card-primary">

                    <div class="card-header">

                        <h3 class="card-title">

                            Publish

                        </h3>

                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Sort Order</label>

                            <input type="number" name="sort_order" class="form-control"
                                value="{{ old('sort_order', $item->sort_order) }}">

                        </div>

                        <div class="form-check">

                            <input type="checkbox" name="status" value="1" class="form-check-input"
                                {{ $item->status ? 'checked' : '' }}>

                            <label class="form-check-label">

                                Active

                            </label>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button class="btn btn-primary btn-block">

                            <i class="fas fa-save"></i>

                            Update Project

                        </button>

                    </div>

                </div>

                {{-- Logo --}}

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            Project Logo

                        </h3>

                    </div>

                    <div class="card-body">

                        <x-media-picker name="logo" :value="$item->logo" />

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
