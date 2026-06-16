@extends('base::layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">
                    Create Menu
                </h3>
            </div>

            <form method="POST" action="{{ route('menus.store') }}">

                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Menu Name</label>

                        <input type="text" name="name" class="form-control" placeholder="Main Menu">
                    </div>

                    <div class="form-group">
                        <label>Location</label>

                        <select name="location" class="form-control">

                            <option value="topbar">
                                Top Header
                            </option>

                            <option value="header">
                                Header
                            </option>

                            <option value="navbar">
                                Navbar
                            </option>

                            <option value="footer">
                                Footer
                            </option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">

                    <button class="btn btn-primary">
                        Save Menu
                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
