@extends('layouts.app')

@section('content')
    @include('components.navbar')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-4">
                @include('components.personal-info')
            </div>
            <div class="col-md-8 pt-2">
                <small>Registered Application :</small>
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap" style="gap: 10px">
                    @foreach ($applications as $application)
                        <a href="{{ $application->url }}" target="_blank"
                            class="bg-white border rounded m-0 text-center p-2 text-decoration-none"
                            style="height: 130px; width: 130px; cursor: pointer">
                            @if ($application->logo == '' || $application->logo == null)
                                <div class="d-flex justify-content-center align-items-center"
                                    style="background: {{ random_color() }}; height: 100%; width: 100%; font-size: 40px; color: #fff;">
                                    {{ substr($application->name, 0, 2) }}
                                </div>
                            @else
                                <img src="data:image/png;base64,{{ $application->logo }}" alt="Logo" height="70px">
                                <small class="text-uppercase text-dark">{{ $application->name }}</small>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
