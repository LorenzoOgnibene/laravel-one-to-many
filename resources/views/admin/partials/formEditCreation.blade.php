<form action="{{route($route, $project)}}" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method($method)


    <label for="title" class="form-label">Titolo</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title', $project->title)}}">
    @error('title')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
                
    <label for="description" class="form-label">Descrizione</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{old('description', $project->description)}}</textarea>
    @error('description')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
                
    <label for="image" class="form-label">Immagine</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{old('image', $project->image )}}">
    @error('image')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
            
    <label for="sale_date" class="form-label">data di uscita</label>
    <input type="text" class="form-control @error('creation_date') is-invalid @enderror" name="creation_date" value="{{old('creation_date', $project->creation_date)}}">
    @error('creation_date')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    <label for="image"  class="form-label">Carica un immagine dai tuoi file</label>
    <input type="file" name="image" id="" class="form-control mb-2">
    <button type="submit" class="btn btn-danger">Aggiungi</button>
</form>