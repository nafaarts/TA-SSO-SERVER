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
                        List of Applications
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success mb-3 p-2">
                                <small>{{ session('success') }}</small>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <form action="{{ route('applications.index') }}">
                                <input class="form-control form-control-sm bg-white" type="text" name="search"
                                    placeholder="Search.." value="{{ request('search') }}">
                            </form>

                            <a href="{{ route('applications.create') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-fw fa-add"></i> Add Application</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">
                                            <img src="data:image/png;base64,{{ $application->logo }}"
                                                alt="{{ $application->name }}" class="img-fluid"
                                                style="max-height: 40px;">
                                        </td>
                                        <td class="align-middle">
                                            <p class="m-0">{{ $application->name }}</p>
                                            <span
                                                class="alert-success text-success"><small>{{ $application->url }}</small></span>
                                        </td>
                                        <td class="align-middle">{{ $application->type }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('applications.edit', $application) }}"
                                                class="text-warning"><i class="fas fa-fw fa-edit"></i></a>
                                            <form action="{{ route('applications.destroy', $application) }}"
                                                method="POST" class="d-inline" onsubmit="return confirm('yakin dihapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger p-0 btn btn-sm"><i
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
