@extends('layouts.app2')

@section('css')
    
@endsection

@section('titulo')
    Organizações
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
    <form action="organizations" method="GET"> 
        <a href="{{ route('organizations.create') }}" type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Adicionar</a>                                                     
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
                <th>Organizações</th>                                                     
                <th style="width: 80px">Situação</th>                                                     
                <th style="width: 50px">Ação</th>
            </tr>
        </thead>
        <tbody>                       
            @if (count($organizations) > 0)
                @foreach($organizations as $organization)
                <tr>
                    <td>{{$organization->id}}</td>
                    <td>{{$organization->name}}</td>           
                    <td class="text-center">
                        @if ($organization->deleted_at === null)
                            <span class="label label-success">ATIVO</span>
                        @else
                            <span class="label label-danger">INATIVO</span>
                        @endif
                    </td>           
                    <td>                         
                        <a href="{{ route('organizations.show', $organization->id) }}" title="Exibir" type="button" class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></a>                       
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

    {{$organizations->links()}}   
@endsection

@section('js')
    <script>        
        
    </script>
    
@endsection
