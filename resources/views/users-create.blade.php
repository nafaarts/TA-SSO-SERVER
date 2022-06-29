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
                        Add Users
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nomor_induk">NIM / NIP</label>
                                <input type="number" class="form-control form-control-sm" id="nomor_induk"
                                    name="nomor_induk">
                                @error('nomor_induk')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email"
                                    autocomplete="off">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-sm" id="password" name="password"
                                    autocomplete="off">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="role">Role User</label>
                                <select class="custom-select form-control form-control-sm" multiple name="roles[]">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex" style="gap: 20px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_admin"
                                            name="is_admin">
                                        <label class="form-check-label" for="is_admin">
                                            Is Admin ?
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_active"
                                            name="is_active">
                                        <label class="form-check-label" for="is_active">
                                            Is Active ?
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex" style="gap: 5px">
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
