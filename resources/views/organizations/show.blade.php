@extends('layouts.app')

@section('css')
    <style>
        .page-header { font-size: 18px; }
    </style> 
@endsection

@section('titulo')
    Organizações
@endsection

@section('subtitulo')
    Detalhes 
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
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-sm-12">                                
            <a href="{{route('organizations.edit', 1)}}" type="button" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pencil"></i> Editar</a>                                                                                                               
        </div>
    </div> 

    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3"> 
            <h3 style="margin-top:15px;" class="page-header">                
                Informações
            </h3>           
            <ul style="font-size:14px; line-height:25px;" class="list-unstyled">
                <li><strong>Cód.:</strong> {{ $organization->id }}</li>
                <li><strong>Nome:</strong> {{ $organization->name }}</li>                                                                                   
                <li><strong>Criado em:</strong> {{ $organization->created_at }}</li>                                                                                   
                <li><strong>Alterado em:</strong> {{ $organization->updated_at }}</li>

                @if ($organization->deleted_at === null)
                    <li><strong>Situação:</strong> <span class="label label-success">ATIVO</span></li>                
                @else
                    <li><strong>Situação:</strong> <span class="label label-danger">INATIVO</span></li>
                @endif                                                                                                                                                                      
            </ul>                                                                    
        </div>

        <div class="col-sm-9 col-md-9 col-lg-9">
            <div class="row">
                <div class="col-lg-12">                   
                    <h3 style="text-align:center; text-decoration: underline;">{{ $organization->name }}</h3>                       
                </div>
            </div>            
                                   
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="page-header" style="margin-top:15px;">                        
                        Usuários
                    </h6>
                    <a href="#" type="button" class="btn btn-primary btn-sm" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Adicionar</a>                      
                    <table class="table table-bordered">
                        <thead>
                            <tr>                               
                                <th style="width:50px;">Cód.</th>                               
                                <th>Usuário</th>                               
                                <th style="width: 90px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>                                                        
                            @if (count($users) > 0)
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>           
                                    <td>                         
                                        <a href="#" title="Exibir" type="button" class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></a>                       
                                    </td>
                                </tr>   
                                @endforeach    
                            @else
                                <tr style="height:45px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif                             
                        </tbody>
                    </table>
                </div>
            </div>                

        </div>
    </div>           
@endsection

@section('js')
        
@endsection
