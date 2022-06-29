@extends('layouts.app')

@section('content')
    @include('components.navbar')
    <div class="container py-3">
        <div class="row">
            <div class="col-12 col-md-4">
                @include('components.personal-info')
            </div>
            <div class="col-12 col-md-8">
                <div class="card border-0">
                    <div class="card-header bg-white">
                        Add Application
                    </div>
                    <div class="card-body">
                        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="url">URL</label>
                                <input type="text" class="form-control form-control-sm" id="url" name="url">
                                @error('url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">Type</label>
                                <div class="d-flex" style="gap: 20px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="web"
                                            value="web" checked>
                                        <label class="form-check-label" for="web">
                                            Web Application
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="mobile"
                                            value="mobile">
                                        <label class="form-check-label" for="mobile">
                                            Mobile Application
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="logo">Logo / Icon</label>
                                <input type="file" class="form-control form-control-sm" id="logo" name="logo">
                                @error('logo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <div class="d-flex" style="gap: 5px">
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Add Application</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
