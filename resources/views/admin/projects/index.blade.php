@extends('layouts.app')

@section("content")
    <nav class="navbar navbar-light bg-light flex-column rounded-3 shadow-sm align-items-center">
        <div class="d-flex align-items-end py-3">
            <div class="fs-5 pe-3">Want to create a new <strong>project?</strong> Just click this button!!</div>
            <button class="btn btn-primary btn-sm">
                <a href="{{route('admin.projects.create')}}" 
                class="text-white text-decoration-none"><i class="fa-solid fa-plus"></i></a> 
            </button>
        </div>
        <div class="d-flex align-items-end py-3">
            <div class="fs-5 pe-3">Want to create a new <strong>type?</strong> Just click this button!!</div>
            <button class="btn btn-primary btn-sm">
                <a href="{{route('admin.types.create')}}" 
                class="text-white text-decoration-none"><i class="fa-solid fa-plus"></i></a> 
            </button>
        </div>
        
    </nav>
    <div class="table-container mt-3 bg-white rounded-3 shadow-md p-5">
        <div class="rounded-3 overflow-hidden shadow">
            <table class="table table-striped table-dark rounded-3 mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Technologies</th>
                        <th scope="col">Git_link</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                @foreach ($projects as $project)
                    <tr>
                        <th>{{$project->name}}</th>
                        <td>{{$project->description}}</td>
                        <td>
                            <div class="font-weight-bold">{{$project->type?->name}}</div>
                            <p><small>{{$project->type?->description}}</small></p>
                        </td>
                        <td>
                            <div class="font-weitgh-bold">{{$project->technologies?->implode('name', ' ')}}</div>
                        </td>
                        <td>
                            <button class="btn btn-dark rounded-circle"><a href="{{$project->git_link}}" class="text-white"><i class="fa-brands fa-github"></i></a></button>
                        </td>
                        <td class="w-25"><img src="{{ asset('storage/' . $project->cover_img) }}" alt="" class="w-50 rounded-2"></td>
                        <td class="text-nowrap">
                            <button class="btn btn-success btn-sm me-2">
                                <a href="{{route('admin.projects.edit', $project->id)}}"><i class="fas fa-pencil text-white"></i></a>
                            </button>
                            <button class="btn btn-info btn-sm me-2">
                                <a href="{{route('admin.projects.show', $project->id)}}"><i class="fas fa-eye"></i></a>
                            </button>
                            <form class="delete-form d-inline-block" action="{{route("admin.projects.destroy", $project->id)}}" method="POST">
                                @csrf()
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection