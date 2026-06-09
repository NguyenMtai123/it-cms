@extends('base::layouts.master')

@section('title', 'Create Event')

@section('content')

<section class="content">
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="mb-0">Create Event</h3>
            <small class="text-muted">Tạo sự kiện mới cho hệ thống</small>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('events.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf

        <div class="row">

            {{-- LEFT --}}
            <div class="col-md-8">

                <div class="card card-outline card-primary">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Event Information
                        </h3>
                    </div>

                    <div class="card-body">

                        {{-- TITLE --}}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text"
                                   name="title"
                                   class="form-control form-control-lg"
                                   value="{{ old('title') }}"
                                   placeholder="Enter event title">
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Short description...">{{ old('description') }}</textarea>
                        </div>

                        {{-- CONTENT --}}
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content"
                                      class="form-control"
                                      rows="8"
                                      placeholder="Full event content...">{{ old('content') }}</textarea>
                        </div>

                        {{-- LOCATION --}}
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text"
                                   name="location"
                                   class="form-control"
                                   value="{{ old('location') }}"
                                   placeholder="Event location">
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">

                {{-- TIME --}}
                <div class="card card-outline card-info">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-calendar"></i> Schedule
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="datetime-local"
                                   name="start_date"
                                   class="form-control"
                                   value="{{ old('start_date') }}">
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="datetime-local"
                                   name="end_date"
                                   class="form-control"
                                   value="{{ old('end_date') }}">
                        </div>

                    </div>

                </div>

                {{-- PUBLISH --}}
                <div class="card card-outline card-success">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-toggle-on"></i> Publish
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Status</label>

                            <select name="status" class="form-control">
                                <option value="1" selected>Published</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>

                    </div>

                </div>

                {{-- ACTION --}}
                <div class="card">

                    <div class="card-body">

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> Save Event
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>
</section>

@endsection
