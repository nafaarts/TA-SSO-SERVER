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
                        List of Roles
                    </div>
                    <div class="card-body" x-data="setEdit()">
                        @if (session('success'))
                            <div class="alert alert-success mb-3 p-2">
                                <small>{{ session('success') }}</small>
                            </div>
                        @endif
                        <form action="{{ route('roles.store') }}" method="POST" class="row mb-2 m-0" x-show="!edit">
                            @csrf
                            <div class="col-md-10 px-1">
                                <input class="form-control form-control-sm bg-white" type="text" name="name"
                                    placeholder="Role Name">
                            </div>
                            <div class="col-md-2 px-1">
                                <button class="btn btn-sm btn-primary w-100">Add Role</button>
                            </div>
                        </form>
                        <form x-bind:action="'roles/' + id" method="POST" class="row mb-2 m-0" x-show="edit">
                            @csrf
                            @method('PUT')
                            <div class="col-md-9 px-1">
                                <input class="form-control form-control-sm bg-white" type="text" name="name"
                                    placeholder="Role Name" x-model="name">
                            </div>
                            <div class="col-md-2 px-1">
                                <button class="btn btn-sm btn-warning w-100">Update Role</button>
                            </div>
                            <div class="col-md-1 px-1">
                                <a x-on:click="edit = !edit" class="btn btn-sm w-100 btn-danger">
                                    <b><i class="fas fa-fw fa-times"></i></b>
                                    {{-- Cancel --}}
                                </a>
                            </div>
                        </form>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="align-middle"><small>{{ $loop->iteration }}</small></td>
                                        <td class="align-middle">
                                            <small><strong>{{ $role->name }}</strong></small>
                                        </td>
                                        <td class="align-middle"><small>{{ $role->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td class="align-middle">
                                            <a class="text-warning btn btn-sm p-0"
                                                x-on:click="setForm('{{ $role->id }}', '{{ $role->name }}')"><i
                                                    class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setEdit() {
            return {
                id: '',
                name: '',
                edit: false,
                setForm(id, name) {
                    this.id = id;
                    this.name = name;
                    this.edit = !this.edit;
                }
            }
        }
    </script>
@endpush
