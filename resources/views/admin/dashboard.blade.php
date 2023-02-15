@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="card-text mt-3 pt-1 d-flex justify-content-between align-items-end border-top">
                        <p class="fs-5 mb-0">
                            Since you are logged, look for the projects index!
                        </p>
                        <button class="ms-auto btn btn-primary"><a class="text-white text-decoration-none" href="{{route('admin.projects.index')}}">Index</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
