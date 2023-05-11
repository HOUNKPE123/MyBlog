@extends('base')

@section('content')
    <div class='container'>
        <h1 class='text-center my-5'>Editer cet article</h1>
        <form method="POST" action="{{route('articles.update', $article->id)}}">
            @method('PUT')
            @csrf
            <div class="col-12">
                <div class="form-group">
                      <label for="">Titre</label>
                      <input type="text" value="{{$article->title}}" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titre de votre article">
                      @error('title')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                      </span>
                      @enderror
                </div>

                <div class="form-group">
                    <label for="">Sous-titre</label>
                    <input type="text" value="{{$article->subtitle}}" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Sous-titre de votre article">
                    <small class="form-text text-muted">Decrivez le contenu de votre article</small>
                    @error('subtitle')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
              </div>

              <div class="form-group">
                <label for="">Contenu</label>
                <textarea name="content"  class="form-control w-100 @error('content') is-invalid @enderror" placeholder="Sous-titre de votre article">
                    {{$article->content}}
                </textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                  <strong>{{$message}}</strong>
                </span>
                @enderror
          </div>
            </div>
            <div class="d-flex justify-content-center mb-5 my-3">
                <button class="btn btn-primary" type="submit">Modifier l'article</button>
            </div>
        </form>
        
    </div>
@endsection



