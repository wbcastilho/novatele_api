@extends('layouts.app3')

@section('css')
    
@endsection

@section('titulo')
    Dashboard
@endsection

@section('subtitulo')
    Usuários
@endsection

@section('breadcrumb')          
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
  </ol>  
@endsection


@section('voltar')
   
@endsection 

@section('content') 
    
  <div class="row">
    <div class="col-lg-3 col-xs-6">     
      <div class="small-box bg-red">
        <div class="inner">
          <h3>10</h3>
          <p>NOTIFICAÇÕES</p>
        </div>
        <div class="icon">
          <i class="fa fa-bell-o"></i>
        </div>
        <a href="#" class="small-box-footer">
          Visualizar <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  
    <div class="col-lg-3 col-xs-6">     
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>5</h3>
          <p>PENDÊNCIAS</p>
        </div>
        <div class="icon">
          <i class="fa fa-flag-o"></i>
        </div>
        <a href="#" class="small-box-footer">
          Visualizar <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>      
   
    <div class="col-lg-3 col-xs-6">      
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>4</h3>
          <p>AVISOS</p>
        </div>
        <div class="icon">
          <i class="fa fa-bullhorn"></i>
        </div>
        <a href="#" class="small-box-footer">
          Visualizar <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">     
      <div class="small-box bg-green">
        <div class="inner">
          <h3>2</h3>
          <p>TAREFAS</p>
        </div>
        <div class="icon">
          <i class="fa fa-tasks"></i>
        </div>
        <a href="#" class="small-box-footer">
          Visualizar <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  
  </div>
@endsection

@section('js')
    
    
@endsection
