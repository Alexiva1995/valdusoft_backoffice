@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')
<style>
.morris-hover{position:absolute;z-index:1000}.morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255,255,255,0.8);border:solid 2px rgba(230,230,230,0.8);font-family:sans-serif;font-size:12px;text-align:center}.morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0}
.morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0}
</style>
@endpush

@push('custom_js')

<script type="text/javascript">
//con la directiva json se obtiene los valores del la funcion
//  index() especificamente la variable $ingresosEgresos
// y se asing a la constante en javascript ingresosEgresos

    const ingresosEgresos = @json($ingresosEgresos);
    let empleado = [], cliente = [];

/*la funcion filtro se encarga de obtener los valores del objeto ingresosEgresos
 y con el for y el if filtra y separa los pagos (cliente) y los egresos(pagos de empleados)
deacuerto al valor que tenda en la propiedad ['type'] */

    function filtro(){
        let E = 0, C = 0;

     for(let i=0; i<ingresosEgresos.length; i++ ){

        if(ingresosEgresos[i].type === 'E'){
           empleado[E++] =  ingresosEgresos[i]
            }else{
             cliente[C++] = ingresosEgresos[i]
            }

    }
}

//la grafica de aca se genera con la libreria morris.js
// falta asignar los valores ya obtenidos de empleados y cliente a la grafica


    new Morris.Line({

            // ID of the element in which to draw the chart.
            element: 'grafica',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
              { year: '2021-01', value: 20 ,value2: 20  },
              { year: '2021-02', value: 10 ,value2: 10 },
              { year: '2021-03', value: 5 ,value2: 10 },
              { year: '2021-04', value: 5 ,value2: 5 },
              { year: '2021-05', value: 20 ,value2: 10 },

            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value', 'value2'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Costos', 'Ganancias'],
            resize: true,
            lineColors:['#C14D9F' , '#5900FE']
          });

</script>
@endpush

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-5">

                        <div class="card">
                            <div class="card-content p-1">
                                <div class="card-body">
                                    <img src="{{ asset('images/svg/ilustracion_clientes.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                    <h4 class="pt-2">Consulta todos los clientes</h4>
                                    <a href="{{ route('admin.clients.list') }}" class="btn btn-client mt-1"><b>Ver clientes</b></a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content p-1">
                                <div class="card-body">
                                    <img src="{{ asset('images/svg/ilustracion_nomina.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                    <h4 class="pt-2">Consulta y paga la nomina</h4>
                                    <a href="{{ route('admin.payrolls.list') }}" class="btn btn-primary mt-1"><b>Ver nómina</b></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-7">
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                            <tr>
                                                <td>
                                                    @if (!is_null($item->photo))
                                                    <img class="rounded-circle" width="32px" height="32px" src="{{ $item->photo }}" />
                                                    @else
                                                    <img class="rorounded-circleund" width="32px" height="32px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }} {{ $item->last_name }}</td>
                                                <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                                <td><a href="https://api.whatsapp.com/send?phone={{ $item->phone }}" Target="_blank">{{ $item->phone }}</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="chart">
                    <div class="card p-1">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Costos vs Ganancias</h3>
                        </div>
                           <div class="card-content">
                            <div id="grafica"></div>
                            <div id="timeline-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Listado de Hosting</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive pt-2">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>AVATAR</th>
                                                <th>CLIENTE</th>
                                                <th>URL</th>
                                                <th>FECHA DE CREACIÓN</th>
                                                <th>FECHA DE VENCIMIENTO</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>

@endsection
