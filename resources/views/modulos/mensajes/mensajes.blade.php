@extends('App')


@section('css')

@include('modulos.modulos-css.css')


@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fas fa-users-cog"></i> Mensajes</h1>
				</div><!-- /.col -->

			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">

				<div class="col-12">

					<div class="card card-info">
						<div class="card-header" style="padding: 32px;">


						</div>
						<!-- /.card-header -->
						<div class="card-body">
						       <table id="mensajes"  class="table table-striped" table-bordered responsive class="display" style="width:100%">
                        <thead>
                            <tr>
                             	  
                                <th >Nombre</th>
                                <th >E-mail</th>
                                 <th>Mensaje</th>
                                 <th>Fecha</th>
                                  <th>Leido</th>
                             

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($mensajes as $mensaje)

                          @if($mensaje -> leido == 'No')
                          <tr  class="table-danger">
                          

                          @else

                          <tr >
                          @endif

                        
                      
                            <td>{{$mensaje->name}}</td>
                            <td>{{$mensaje->email}}</td>
                             <td width="100%">{{$mensaje->message}}</td>
                               <td >{{$mensaje->created_at}}</td>
                                 <td >
                                 	<a type="button" href="{{route('mensajes.show',$mensaje-> id)}}"><i class="fa fa-book" aria-hidden="true"></i> Leer</a>

                                 </td>
                         

                        </tr>

                        @endforeach


                    </tbody>
                </table>

						</div>
						<!-- /.card-body -->
					</div>

				</div>

			</div>

			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection

@section('scripts')

@include('modulos.modulos-js.js')

<script type="text/javascript">
  $(document).ready(function() {


    /*----------------------------------------Datatable-------------------------------- */

   

    $('#mensajes').DataTable({
        "responsive": true,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });

} );



  /*-------------------------------------------------------------------------------- */

</script>


@endsection