@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="card mb-3">
            <div class="d-flex g-0">
                <div class="flex-grow-1">
                    <img src="{{ asset('storage/' . $project->cover_img) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="flex-grow-1">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <p class="card-text">{{$project->description}}</p>
                        <h6>{{$project->technologies?->implode('name', ' ')}}</h6>
                        <div class="d-flex justify-content-between">
                            <div class="rounded-circle overflow-hidden">
                                <button class="btn btn-dark fs-4">
                                    <a href="{{$project->git_link}}" class="text-white text-decoration-none"><i class="fa-brands fa-github"></i></a>
                                </button>
                            </div>
                            <div class="rounded-circle overflow-hidden">
                                <button class="btn btn-success fs-4">
                                    <a href="{{route('admin.projects.edit', $project->id)}}" class="text-white text-decoration-none"><i class="fas fa-pencil"></i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-3 shadow d-flex align-items-center justify-content-between p-3">
            <div>
                <p class="p-3 fs-5 mb-0">
                    Click to come back to Index
                </p>
            </div>
            <button class="ms-auto btn btn-primary btn-lg"><a class="text-white text-decoration-none" href="{{route('admin.projects.index')}}">Index</a></button>
        </div>
    </div>

    

@endsection