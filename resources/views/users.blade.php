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
                        List of Users
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success mb-3 p-2">
                                <small>{{ session('success') }}</small>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <form action="{{ route('users.index') }}">
                                <input class="form-control form-control-sm bg-white" type="text" name="search"
                                    placeholder="Search.." value="{{ request('search') }}">
                            </form>

                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-fw fa-add"></i> Add User</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP/NIM</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle"><small>{{ $user->nomor_induk }}</small></td>
                                        <td class="align-middle"><small><strong>{{ $user->name }}</strong></small></td>
                                        <td class="align-middle">
                                            <small>
                                                @if ($user->is_active)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Disabled</span>
                                                @endif
                                            </small>
                                        </td>
                                        <td class="align-middle"><small>{{ $user->getRoles()->implode(', ') }}</small>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-sm p-0 text-warning">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('yakin dihapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger btn btn-sm p-0"><i
                                                        class="fas fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
