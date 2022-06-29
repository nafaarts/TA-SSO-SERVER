@extends('layouts.app')

@section('content')
    @include('components.navbar')
    <div class="container py-3">
        <div class="row">
            <div class="col-12 col-md-4">
                @include('components.personal-info')
            </div>
            <div class="col-12 col-md-8">
                <div id="clients"></div>
                {{-- <div class="card border-0">
                    <div class="card-header bg-white">
                        List of Clients
                    </div>
                    <form action="/oauth/clients" method="POST" class="row px-3 mt-3 m-0">
                        @csrf
                        <div class="col-md-5 px-1">
                            <input class="form-control form-control-sm bg-white" type="text" name="name"
                                placeholder="Client Name">
                        </div>
                        <div class="col-md-5 px-1">
                            <input class="form-control form-control-sm bg-white" type="text" name="redirect"
                                placeholder="Redirect">
                        </div>
                        <div class="col-md-2 px-1">
                            <button class="btn btn-sm btn-primary w-100">Add Client</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Callback</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="align-middle">{{ $client->id }}</td>
                                        <td class="align-middle">
                                            <p class="m-0">{{ $client->name }}</p>
                                            <span
                                                class="alert-danger text-danger"><small>{{ $client->secret }}</small></span>
                                        </td>
                                        <td class="align-middle">{{ $client->redirect }}</td>
                                        <td class="align-middle">
                                            <a class="text-danger"><i class="fas fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
