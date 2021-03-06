@extends('layouts.app')

@section('content')
@if (Session::has('msj-exitoso'))
<script>
    $(document).ready(function() toastr.success('El proyecto ha sido asignado con éxito.', 'Operación Completada');
    });
</script>
@endif
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Empleados</div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.employes') }}">Empleados</a></li>
                                <li class="breadcrumb-item">Detalle del Empleado</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row" style="display: flex; align-items: center;">
                                <div class="col-md-4">
                                    <img class="rounded-circle" src="{{ asset('/uploads/images/users/photos/'.$employe->photo) }}" alt="{{ $employe->fullname }}" height="100" width="100">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="card-title">{{ $employe->name }} {{ $employe->last_name }}</h3>
                                    {{ $employe->email }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0px 0px !important;">
                            {{-- Sección de Proyectos Asignados --}}
                            <div class="pl-2 pr-2">
                                <div class="project-detail-titles">Proyectos Asignados</div>
                                <div class="mt-1">
                                    @php $cont = 0; @endphp
                                    @foreach ($employe->projects as $project)
                                    <a href="">
                                        <div class="text-center text-white d-inline-block mr-1">
                                            <div class="project-circle" style="background-color: {{ $projectColors[$cont] }};">P{{ $project->id }}</div>
                                        </div>
                                    </a>
                                    @php
                                    if ($cont == 2){
                                    $cont = 0;
                                    }else{
                                    $cont++;
                                    }
                                    @endphp
                                    @endforeach
                                    <a href="#availableProjects" data-toggle="modal">
                                        <div class="text-center d-inline-block mr-1">
                                            <div class="project-circle project-circle-add"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            {{-- Sección de Fechas --}}
                            <div class="row mt-3 pl-2 pr-2">
                                <div class="col-2">
                                    <div class="project-detail-titles">Fecha de Nacimiento</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($employe->birthdate)) ? 'Dato no disponible' : date('d-m-Y', strtotime($employe->birthdate)) }}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="project-detail-titles">Fecha de Ingreso</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($employe->admission_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($employe->admission_date)) }}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="project-detail-titles">Próximas Vacaciones</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> 29/12/1992
                                    </div>
                                </div>
                            </div>

                            {{-- Sección de Skills --}}
                            <div class="mt-3 pl-2 pr-2">
                                <div class="project-detail-titles">Skills</div>
                                <div class="mt-1">
                                    @foreach ($employe->skills as $skill)
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">{{ $skill->skill }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Sección de Curriculum --}}
                            <div class="mt-3 pl-2 pr-2">
                                <div class="project-detail-titles">Curriculum Vitae</div>
                                <div class="mt-1">
                                    @if (!is_null($employe->curriculum))
                                    <a href="{{ asset('uploads/documents/curriculums/'.$employe->curriculum) }}" target="_blank" style="color: #3C3232 !important;"><img src="{{ asset('images/icons/arrow-down.png') }}" class="mr-1"> {{ $employe->curriculum }}</a>
                                    @else
                                    <img src="{{ asset('images/icons/arrow-down.png') }}" class="mr-1"> Archivo no disponible
                                    @endif
                                </div>
                            </div>

                            {{-- Sección de Sueldo --}}
                            <div class="row mt-3 pl-2 pr-2">
                                <div class="col-2">
                                    <div class="project-detail-titles">Precio por hora</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img src="{{ asset('images/icons/dollar.png') }}" class="mr-1"> {{ (is_null($employe->price_per_hour)) ? 'Dato no disponible' : $employe->price_per_hour.' USD' }}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="project-detail-titles">Cuenta Uphold</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img src="{{ asset('images/icons/uphold.png') }}" class="mr-1"> {{ (is_null($employe->uphold_account)) ? 'Dato no disponible' : $employe->uphold_account }}
                                    </div>
                                </div>
                            </div>
                            {{-- Sección de Facturas --}}
                            <div class="mt-3">
                                <hr>
                                <br>
                                <button type="button" class="btn btn-primary ml-2">Facturas</button>

                                <div class="table-responsive pt-2">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <th>FECHA</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>MONTO</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>05 May 2021</td>
                                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                                <td>640$</td>
                                            </tr>
                                            <tr>
                                                <td>05 May 2021</td>
                                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                                <td>640$</td>
                                            </tr>
                                            <tr>
                                                <td>05 May 2021</td>
                                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                                <td>640$</td>
                                            </tr>
                                            <tr>
                                                <td>05 May 2021</td>
                                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                                <td>640$</td>
                                            </tr>
                                            <tr>
                                                <td>05 May 2021</td>
                                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                                <td>640$</td>
                                            </tr>
                                            <tr>
                                                <td>05 May 2021</td>
                                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                                <td>640$</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="availableProjects" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel110">Proyectos Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.employes.assign-projects') }}" method="POST">
                @csrf
                <input type="hidden" name="employee_id" value="{{ $employe->id }}">
                <div class="modal-body">
                    <div class="row ml-2 mr-2">
                        @if ($availableProjects->count() > 0)
                        @foreach ($availableProjects as $availableProject)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <label class="form-check-label" for="project-{{ $availableProject->id }}">
                                <input type="checkbox" class="form-check-input" id="project-{{ $availableProject->id }}" value="{{ $availableProject->id }}" name="projects[]">
                                {{ $availableProject->name }}
                            </label>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12">
                            No hay proyectos disponibles para asignar...
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection