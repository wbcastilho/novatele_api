<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Novatele</title>
       
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">  
        @yield('css')     
    </head>
    <body class="hold-transition skin-purple-light sidebar-mini">       
      <div id="app" class="wrapper">
        
          <!-- TOPO Navegação -->
          @include('layouts._nave')  
      
          <!-- MENU lateral -->
          @include('layouts._sidebar') 
          
          <div class="content-wrapper">        
            <section class="content-header">
                <h1>@yield('titulo')</h1>
                @yield('breadcrumb')                                          
            </section>
           
            <section class="content">                                  
              <div class="box">                  
                  <div class="box-body">                    
                    @yield('content') 
                  </div>                
                  <!--<div class="box-footer">
                      Footer
                  </div>-->
              </div>
          </section>
        </div> 
        
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>     
      </div>            
    
      <script src="{{asset('js/app.js')}}"></script>               
     
      @yield('js')   

    </body>
</html>
