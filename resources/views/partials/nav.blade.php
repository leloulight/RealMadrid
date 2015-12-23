<nav class="navbar navbar-default navigacija" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

       <!-- <div class="logo">
        <a class="" href="/">
        	<img src="/images/images/Real-Madrid.png" title="Real Madrid C.F. Lietuvos fanų bendruomenė" >
        </a>
        </div>
        -->

    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav main-nav navbar-nav">
            <li><a href="/">Pradinis</a></li>
           
            <li class="dropdown menu-open">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Naujienos <b class="caret"></b></a>
                <ul class="dropdown-menu main-drop">
                    <li><a href="/naujienos/visos">Visos</a></li>
                    @foreach($categoryPosts as $category)
                    <li><a href="/kategorija/{!! $category->slug !!}">{!! $category->title !!}</a></li>   
                    @endforeach           
                </ul>
            </li>

            <li class="dropdown menu-open">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Real Madrid C.F. <b class="caret"></b></a>
                <ul class="dropdown-menu main-drop">
                    <li><a href="/santiago-bernabeu">Santiago Bernabeu stadionas</a></li>              
                </ul>
            </li>

             <li class="dropdown menu-open">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sudėtis <b class="caret"></b></a>
                <ul class="dropdown-menu main-drop">
                    @foreach($seasons as $season)
                    <li><a href="/sudetis/{!! $season->slug !!}">{!! $season->title !!}</a></li>  
                    @endforeach            
                </ul>
            </li>

            <li class="dropdown menu-open">
                <a href="#" class="dropdown-toggle " data-toggle="dropdown">Perėjimai <b class="caret"></b></a>
                <ul class="dropdown-menu main-drop">
                    <li><a href="#">Kategorijos</a></li>              
                </ul>
            </li>

             <li><a href="#">Apie mus</a></li>

            <!-- <li><a href="/forumas">Forumas</a></li> -->

    <li class="dropdown menu-open">
        <div class="col-sm-12 col-md-12">
        <form action="/paieska" method="POST" autocomplete="off" class="navbar-form" role="search" id="searchForm">
            {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ieškoti" name="search" id="search-input">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                
            </form>

            <div id="search-results"></div>
        </div> 

            </li>

         <li class="dropdown user-menu">
        <div class="login-form ">
        @if(Auth::check())
            @if(Auth::user()->avatar != NULL)
            <img class="pull-left" src="/{!! Auth::user()->avatar_path !!}{!! Auth::user()->avatar !!}" style="margin: 8px 10px 0 0;"> 
            @else
            <img class="pull-left" src="/images/users/default.png" style="margin: 8px 10px 0 0;">
            @endif
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {!! Auth::user()->name !!} {!! Auth::user()->lastname !!} <b class="caret"></b></a>
             <ul class="dropdown-menu" style="right: 0;">
              @if(Auth::user()->role->title == "Administratorius")
                <li><a href="/dashboard"><i class="fa fa-tachometer"></i> Valdymo pultas</a></li>
                <li><a href="/vartotojas/{!! Auth::user()->id !!}/redaguoti"><i class="fa fa-pencil-square-o"></i> Redaguoti profilį</a></li>    
                <li><a href="/auth/logout"><i class="fa fa-sign-out" title="Atsijungti"></i>Atsijungti</a></li> 
                @else
                <li><a href="/vartotojas/{!! Auth::user()->id !!}/redaguoti"><i class="fa fa-pencil-square-o"></i> Redaguoti profilį</a></li>    
                <li><a href="/auth/logout"><i class="fa fa-sign-out" title="Atsijungti"></i>Atsijungti</a></li> 
               @endif
              </ul>
        @else
            <span class="login-links">
            <i class="glyphicon glyphicon-user color_white"></i> <a href="/auth/login">Prisijungti</a><span class="color_white"> / </span><a href="/auth/register">Registruotis</a>
            </span> 
        @endif    
        </div>  
            </li>

        </ul>
    </div>
</nav>