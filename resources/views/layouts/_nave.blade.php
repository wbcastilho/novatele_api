<header class="main-header">    
    <a href="#" class="logo">     
      <span class="logo-mini">
      NT
      </span>     
      <span class="logo-lg">
        NovaTele API
      </span>
    </a>
   
    <nav class="navbar navbar-static-top">     
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">                                                       
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-fw fa-user"></i>            
              <span class="hidden-xs">Welber</span>
            </a> 
            <ul class="dropdown-menu">            
              <li class="user-header">                
                <p>
                  Welber
                  <small>Root</small>                 
                </p>                          
              </li>                          
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sair</a>                  
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                   </form>
                </div>
              </li>
            </ul>           
          </li>  
                         
        </ul>
      </div>     
    </nav>
  </header>