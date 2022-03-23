@extends('layouts.app2')

@section('css')
    
@endsection

@section('titulo')
    Usuários
@endsection

@section('subtitulo')
   
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
   
@endsection 

@section('content') 
    <form action="root" method="GET"> 
        <a href="{{ route('root.create') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Adicionar</a>                                                     
        {{csrf_field()}}
        <div class="input-group col-xs-3 pull-right" >   
            <input type="text" class="form-control" name="searchText" placeholder="Pesquisa" value="">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-fw fa-search"></i> Buscar</button>
            </span>
        </div>
    </form> 
    <table style="margin-top:10px;" class="table table-bordered">
        <thead>
            <tr>          
                <th style="width: 10px">Cód.</th>
                <th>Usuário Root</th>                                                                                                                         
                <th>Email</th>                                                                                                                         
                <th style="width: 90px">Ação</th>
            </tr>
        </thead>
        <tbody>                       
            @if (count($users) > 0)
                @foreach($users as $user)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('root.edit', $user->id) }}">{{$user->id}}</a>                       
                    </td>
                    <td>{{$user->name}}</td>                                       
                    <td>{{$user->email}}</td>                                       
                    <td>
                        <a href="{{route('root.edit', $user->id)}}" type="button" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pencil"></i></a>                         
                    
                        <button-delete                                                 
                            message="Deseja excluir o usuário {{$user->name}}?"                            
                            :redirect="'{{ Request::url() }}'"
                            :route="'{{ route('root.destroy', $user->id) }}'">
                        </button-delete>
                    </td>
                </tr>   
                @endforeach    
            @else
                <tr style="height:45px;">
                    <td></td>
                    <td></td>                    
                </tr>
            @endif           
        </tbody>
    </table>

    {{$users->links()}}   
@endsection

@section('js')
    <script>        
        
    </script>
    
@endsection
