@extends('layouts.app')

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <!--<h2 class="content-header-title float-left mb-0">Hosting</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('hosting') }}">Hosting</a>
                                </li>
                            </ol>
                        </div>-->
                    </div>
                </div>
            </div>

        </div>

        <div class="content-body">
            





            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Hosting</h3>
                            @if (Auth::user()->profile_id == 1)
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Agregar Nuevo</a>
                                @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-gris">
                                        <tr>
                                            <th>DOMINIO</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>FECHA DE RENOVACION</th>
                                            <th>AÑOS</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>

                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>03/09/22</td>
                                            <td>1</td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""><img class="ml-1" src="{{asset('images/icons/Group.png')}}" alt=""></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="card-body" id="div-bottom-project">




                                    <div class="pl-2 pr-3 float-right">
                                        <div class="mt-1">

                                            <div class="text-center text-white d-inline-block mr-1">
                                                <div class="project-circle" id="div-bottom-background"><i class="fas fa-angle-left"></i></div>
                                            </div>


                                            <div class="text-center d-inline-block">
                                                <div class="project-circle" id="div-bottom-background2">
                                                    <h5 class="text-white">1</h5>
                                                </div>
                                            </div>

                                            <div class="text-center d-inline-block mr-1">
                                                <div class="project-circle" id="div-bottom-background">
                                                    <h5>2</h5>
                                                </div>
                                            </div>


                                            <div class="text-center text-white d-inline-block mr-1">
                                                <div class="project-circle" id="div-bottom-background"><i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            
            
            
            
            
            
            
            
            
          <!--  <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Tabla de Hosting</h3>
                             <a href="{{ route('hosting-create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Hosting</a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Avatar</th>
                                            <th>Cliente</th>
                                            <th>URL</th>
                                            <th>Fecha de creación</th>
                                            <th>Fecha de vencimiento</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        @foreach ($hosting as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>

                                            @if(!$item->getMedia('photo')->isEmpty())
                                            <th><img class="rounded-circle" width="50px" height="50px" src="{{ $item->photoUrl }}" /></th>
                                            @else
                                            <th><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft/valdusoft.png') }}" /></th>
                                            @endif
                                            <td>{{ $item->client }}</td>
                                            <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                                            <td>{{ $item->create_date }}</td>
                                            <td>{{ $item->due_date }}</td>

                                            <td>
                                                   <a href="{{ route('hosting-edit', $item->id) }}" class="btn btn-sm btn-primary mb-1"><i class="feather icon-edit"></i>Editar</a>
                                                   <form action="{{ route('hosting-delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                   <button type="submit" class="btn btn-sm btn-danger"><i class="feather icon-trash"></i>Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>


    </div>
</div>
@endsection
