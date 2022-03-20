@extends('layouts.app')

@section('css')
    
@endsection

@section('titulo')
    Organizações
@endsection

@section('subtitulo')
   Formulário <small>(Adicionar)</small>
@endsection

@section('breadcrumb')          
   <ol class="breadcrumb">
    @if(isset($breadcrumbs))
        @foreach($breadcrumbs as $breadcrumb)
            @if($breadcrumb['url'])
                <li><a href="{{$breadcrumb['url']}}"> {{$breadcrumb['titulo']}}</a></li>     
            @else
                <li class="active"> {{$breadcrumb['titulo']}}</li>
            @endif
        @endforeach
    @else

    @endif   
  </ol> 
@endsection

@section('voltar')
    <a href="{{ URL::previous() }}" class="btn btn-box-tool">
        <i class="fa fa-reply"></i> Voltar
    </a>  
@endsection 

@section('content')         
    <form-organization 
        :route="'{{route('organizations.store')}}'" 
        :redirect="'{{route('organizations.index')}}'">                              
    </form-organization>                                 
@endsection

@section('js')
    <script>
               
    </script>    
@endsection
