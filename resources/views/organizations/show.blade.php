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
            <a href="{{route('organizations.edit', $organization->id)}}" type="button" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pencil"></i> Editar</a>                                                                                                               
            @if ($organization->deleted_at === null)
                <button-delete                                                 
                    message="Deseja desativar esta organização?"
                    text="Excluir"
                    :redirect="'{{ Request::url() }}'"
                    :route="'{{ route('organizations.index') }}' + '/{{ $organization->id }}'">
                </button-delete>
            @else
                <button-reactivate                                                 
                    message="Deseja reativar esta organização?"
                    text="Reativar"
                    :redirect="'{{ Request::url() }}'"
                    :route="'{{ route('organizations.index') . '/' . $organization->id . '/reactivate'}}'">
                </button-reactivate> 
            @endif
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
                    <button-user 
                        text="Adicionar"                                                                                                                                                                                            
                        :redirect="'{{ Request::url() }}'"                        
                        :route="'{{ route('organizations.adduser', $organization->id) }}'">
                    </button-user> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>                               
                                <th style="width:50px;">Cód.</th>                               
                                <th>Usuário</th>                               
                                <th>Grupo</th>                               
                                <th style="width: 90px">Ação</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @if (count($users) > 0)
                                @foreach ($users as $user)                                                       
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {{ $user->group->name }}
                                        </td>  
                                        <td>
                                            <button-user                                                 
                                                :obj="{{$user}}"                                                                                                                                                
                                                :redirect="'{{ Request::url() }}'"
                                                :route="'{{ route('users.update', $user->id)}}'">
                                            </button-user>                                        
                                            <button-delete                                                 
                                                message="Deseja desativar este usuário?"                                                
                                                :redirect="'{{ Request::url() }}'"
                                                :route="'{{ route('users.destroy', $user->id) }}'">
                                            </button-delete>
                                        </td>
                                    </tr>  
                                @endforeach   
                            @else
                                <tr style="height:35px;">
                                    <td></td>
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
