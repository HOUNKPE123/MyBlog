@extends('base')

@section('content')
    <div class='container'>
        

        <h1 class='text-center my-5'>Articles</h1>
        <div class="d-flex justify-content-center">
           <a class="btn btn-info my-3" href="{{route('articles.create')}}"><i class="fas fa-plus mx-2"></i>Ajuter un nouvel articles</a>
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th class='table-active'>ID</th>
                <th >Titre</th>
                <th> creé le </th>
                <th class='text-center'> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
              <tr>
                <th >{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->dateFormatted()}}</td>
                <td class="d-flex">
                  <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning mx-3">Editer</a>
                  <form action="{{route('articles.delete',$article->id)}}" method="POST">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('modal-open-{{$article->id}}').style.display='block'">Supprimer</button>

                    @csrf
                    @method("DELETE") <!---surchage de la methode post ---->                   
                    <div class="modal" id="modal-open-{{$article->id}}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">La suppression d'un element est definitive</font></font></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer" onclick="document.getElementById('modal-open-{{$article->id}}').style.display='none'>
                              <span aria-hidden="true"></span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ete-vous sur de vouloir supprimer cet article?</font></font></p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" onclick="document.getElementById('modal-open-{{$article->id}}').style.display='none'">Annuler</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                </td>
              </tr>
              @endforeach           
            </tbody>
          </table>
          <div class="d-flex justify-content-center mt-5">
            {{$articles->links('/vendor.pagination.custom')}}
        </div>
    </div>
@endsection