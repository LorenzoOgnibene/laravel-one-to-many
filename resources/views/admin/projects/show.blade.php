@extends('layouts.admin')

@section('content')    

<div class="container p-5">
    <div class="card m-auto text-center" style="width: 45rem;">
        <img src="{{$project->image}}" class="card-img-top" alt="...">
        <img src="{{asset('storage/' . $project->image)}}" alt="">
        <div class="card-body">
            <h2 class="card-title">{{$project->title}}</h2>
            <p class="card-text">{{$project->description}}</p>
            <h6 class="card-subtitle mb-2 text-muted">{{$project->creation_date}}</h6>
        </div>
        <div class="button-group mb-4">
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-info">Edit</a>
            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline delete-record">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection

@section('script')
  @vite('resources/js/detroyConfirm.js')
@endsection