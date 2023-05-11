    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            <i class="fa-solid fa-house"></i>
            Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('articles')}}">Articles</a>
            </li>
            
            </ul>        
            
            <ul class="navbar-nav ml-auto ">
                @if(Auth::user())
                     @if(Auth::user()->role =='ADMIN')
                        <li class="nav-item ">
                            <a class="nav-link " href="{{route('articles.index')}}">Espace admin</a>
                        </li>
                     @endif

                    <li class="nav-item ">
                        <form method='POST' action="/logout">
                            @csrf
                           <button type="submit" class="btn">Deconnexion</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ">
                        <a class="nav-link " href="/login">Connexion</a>
                    </li>
                @endif               
            </ul>  
        </div>
        </div>
    </nav>
