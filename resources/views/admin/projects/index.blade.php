@extends('layouts.admin')

@section('content')
<div class="container p-5">
  <div class="button-wrapper mb-2 ">
    <a href="{{route('admin.projects.create')}}" class="btn btn-outline-warning fw-bold">Add Project</a>
  </div>
  {{-- HEADER OF TABLE WRAPPER --}}
  <div class="top-bar">
    <h5>Projects List</h2>
  </div>
  {{-- TABLE WRAPPER --}}
  <div class="table-wrapper">
    {{-- TABLE --}}
     <table class="table table-light table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Titolo</th>
            <th scope="col">data di creazione</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($projects as $project)
        <tr>
          <td scope="row">{{$project->id}}</td>
          <td scope="row">{{$project->title}}</td>
          <td scope="row">{{$project->creation_date}}</td>
          <td scope="row">
            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-outline-dark">Show</a>
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-outline-success">Edit</a>
            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline delete-record">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" data-id="{{ $project->id }}">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    
    <div class="">
        {{ $projects->links() }}
    </div>
  @include('sweetalert::alert')
</div>
@endsection

@section('script')
  @vite('resources/js/detroyConfirm.js')
@endsection