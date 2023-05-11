@extends('base')

@section('content')     

<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
  <h1 class="display-3 text-center">
   Bienvenue sur notre blog  
  </h1>  
    <div class="display-3 text-center my-5">
      <a class="btn btn-primary" href="{{route('articles')}}">         
            Voir tous nos articles          
      </a>
   </div>
  </div>
@endsection