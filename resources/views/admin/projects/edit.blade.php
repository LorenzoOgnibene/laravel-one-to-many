@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center p-5">
        <div class="col-6">
            @include('admin.partials.formEditCreation', ['method'=>'PUT', 'route'=>'admin.projects.update'])
        </div>
    </div>
</div>

@endsection