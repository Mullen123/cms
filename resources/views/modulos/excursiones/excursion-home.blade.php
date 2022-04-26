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
					<h1 class="m-0"><i class="nav-icon fas fa-shuttle-van"></i> Excursiones</h1>
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
						<div class="card-header" >

							<!--<button type="button"class="btn btn-light" id="exportcsv">
								Csv
							</button>
							<button type="button" class="btn btn-light" >
								Pdf
							</button>-->

							<div class="card-tools">
								<button type="button"  class="btn btn-light" data-toggle="modal" data-target="#addexcursion">
									Agregar
								</button>

							</div>



						</div>

							<div class="card-body">
							<table id="excursion" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th width="10px">ID</th>
										<th>Titulo</th>
										<th>Descripción</th>
										<th>Categoría</th>
										<th>Portada</th>
										<th>Acciones</th>
									</tr>
								</thead>
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





<!-- Modal -->
<div class="modal fade" id="addexcursion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Excursión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formExcursion" enctype="multipart/form-data" name="formExcursion" >




        <h5>Título:</h5>
        <input type="text" id="title" name="title" class="form-control has-error">
        <span class="error"></span>

        <h5>Categoría:</h5>
       
           <select  name="id_category"class="form-control">
                  
                  <option value="">Seleccionar...</option>

                  @foreach($categories as $categorie)

                  <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                  

                  @endforeach

                </select> 
        <span class="error"></span>

        <h5>Descripción:</h5>
        <textarea id="description" name="description" class="form-control has-error">

        </textarea>


        <h5>Portada:</h5>

        <input type="file" id="portada" name="portada" class="form-control has-error" >
        <span class="error"></span>




        <br><br>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;

        <button  type="submit" class="btn btn-primary" id="btnAddSlide" value="Crear" style="background-color: rgb(3, 169, 244) !important">Crear</button>

      </form>
    </div>

  </div>
</div>
</div>











<!-- Modal edit excursion -->
<div class="modal fade" id="editexcursion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Excursión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formeditExcursion" enctype="multipart/form-data" name="formeditExcursion" >


       	<input type="hidden" name="excid" id="excid">

        <h5>Título:</h5>
        <input type="text" id="title2" name="title2" class="form-control has-error">
        <span class="error"></span>

        <h5>Categoría:</h5>
       
           <select  name="id_category2"class="form-control">
                  
                  <option value="">Seleccionar...</option>

                  @foreach($categories as $categorie)

                  <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                  

                  @endforeach

                </select> 
        <span class="error"></span>

        <h5>Descripción:</h5>
        <textarea id="description2" name="description2" class="form-control has-error">

        </textarea>


        <h5>Portada:</h5>

        <input type="file" id="portada2" name="portada2" class="form-control has-error" >
        <span class="error"></span>




        <br><br>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;

        <button  type="submit" class="btn btn-primary" id="btnAddSlide" value="Crear" style="background-color: rgb(3, 169, 244) !important">Crear</button>

      </form>
    </div>

  </div>
</div>
</div>

@endsection



@section('scripts')


@include('modulos.modulos-js.js')


<script type="text/javascript">
	

	$( document ).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});





		/*----------------------------------- Datatable ---------------------------------- */

		$('#excursion').DataTable({
			"processing": true,
			"serverSide": true,
			"responsive": true,
			"ajax": {
				url: "{{ route('excursiones.index') }}"
			},

			"columns": [

			{data:'id'},
			{data:'titulo'},
			{data:'description'},
			{data:'categoria.name'},
			{data:'portada',


			render: function( data, type, full, meta ) {
				return "<img src=\"/storage/" + data + "\" height=\"50\"/>";
			}
		},
		{
			data: 'action', 
			name: 'action', 
			orderable: true, 
			searchable: true
		},
		],    language: {
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

		/*-------------------------------------------------------------------------------- */

	});

	/*----------------------------- Metodo para agregar Excursion ------------------------ */
	
	$(document).on('submit','#formExcursion', function(e){

		e.preventDefault();

		if(validate.form()){
			let formData = new FormData($('#formExcursion')[0]); 

			$.ajax({

				type:'POST',
				url: "{{route('excursiones.store')}}",
				data: formData,
				contentType:false,
				processData:false,
				success: function(data){
					if(data.status == 2){
						$("#addexcursion").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						Swal.fire({
							icon: 'error',
							confirmButtonColor:'rgb(3, 169, 244)',
							title: 'Oops...',
							text: 'Excursión existente ingrese otra opcion!', 
						})

					}
				
					if(data.status ==1){

						$("#addexcursion").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
							document.getElementById("formExcursion").reset();
						$('#excursion').DataTable().ajax.reload(null, false);
						Swal.fire({
							icon: 'success',
							confirmButtonColor:'rgb(3, 169, 244)',
							text: 'Excursión agregada con exito!', 
						})

					}
					
				}

         });//fin de la peticion ajax

		}

	});

	/*-------------------------------------------------------------------------------- */






	/*----------------------------- Metodo para Editar Excursion ------------------------ */


	$(document).on('click','#editExcursionBtn',function(){

		var id_excursion = $(this).data('id');

		$.post('<?= route("excursiones.edit") ?>',{id:id_excursion}, function(data){
                       $('#editexcursion').find('input[name="excid"]').val(data.details.id);
                         $('#editexcursion').find('input[name="title2"]').val(data.details.titulo);
                         $("#editexcursion").modal('show');  
                    
                     },'json');
	});

	/*-------------------------------------------------------------------------------- */


	/*----------------------------- Metodo para actualizar Slide ------------------------ */

	$('#editexcursion').on('submit', function(e){
		e.preventDefault();

		if(validate2.form()){

			let formDataSlide = new FormData($('#formeditExcursion')[0]);

			$.ajax({

				type:'POST',
				url: "{{route('excursiones.update')}}",
				data: formDataSlide,
				contentType:false,
				processData:false,
				success: function(data){

					if(data.status == 2){
						$("#editexcursion").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						Swal.fire({
							icon: 'error',
							confirmButtonColor:'rgb(3, 169, 244)',
							title: 'Oops...',
							text: 'Excursion existente ingrese otra opcion!', 
						})
						

					}	if(data.status ==1){

						$("#editexcursion").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
							document.getElementById("formeditExcursion").reset();
						$('#excursion').DataTable().ajax.reload(null, false);
						Swal.fire({
							icon: 'success',
							confirmButtonColor:'rgb(3, 169, 244)',
							text: 'Excursión agregada con exito!', 
						})

					}
					if(data.status ==0)
						console.log('error');
				}

         });//fin de la peticion ajax

		}	
		
	});

	/*----------------------------------------------------------------------------------- */



/*----------------------------- Metodo para Eliminar Excursion ------------------------ */

	
	$(document).on('click','#deleteExcursionBtn',function(e){

		var id = $(this).data('id');
		e.preventDefault();

		swal.fire({
			icon:'question',
			title:'Estas Seguro?',
			html:'Deseas <b>Eliminar</b> a este usuario',
			showCancelButton:true,
			showCloseButton:true,
			cancelButtonText:'Cancelar',
			confirmButtonText:'Si, Eliminar',
			confirmButtonColor: '#17a2b8',
			cancelButtonColor:'#d33',
			confirmButtonColor:'#03A9F4',
			width:500,
			allowOutsideClick:false
		}).then((result) =>{
			/*si ela respuesta es positiva*/
			if(result.value){
          // entonces hacemos una peticion ajax
          $.ajax({

          	type:'POST',
          	url: "{{route('excursiones.delete')}}",
          	data: {id:id},
          	dataType:'json',
          	success: function(data){
          		if(data.code == 1){
          			$('#excursion').DataTable().ajax.reload(null, false);
          			Swal.fire({
          				icon: 'success',
          				confirmButtonColor: 'rgb(3, 169, 244)',
          				title: 'Borrado exitoso',
          				text: 'Excursion borrado de forma exitosa!', 
          			})          		}else{
          				console.log('error');
          			}
          		}

         });//fin de la peticion ajax
      }

  });

	});

	/*--------------------------------------------------------------------------------- */
	




	/*----------------------------- Validacion form Add Excursiones ------------------------ */

	let validate = $('#formExcursion').validate({

		rules:{

			title:{
				required:true,
				maxlength: 50
			},

			description:{
				required:true,
				minlength: 10,
				maxlength: 250,
			},
			portada: {

				required:true,
				extension: "jpg|jpeg|png"
			}

			
			
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid')

		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid')
		},

		messages:{
			title: {
				required: "Campo requerido",
				maxlength: "Máximo 50 caracteres"
			},
			description: {
				required: "Campo requerido",
				minlength: "Mínimo 10 caracteres",
				maxlength: "Máximo 250 caracteres",
			},
			portada: {
				required: "Campo requerido",
				extension:"Por favor ingrese una extensión valida"
			},



		},

	});

	/*------------------------------------------------------------------------------------ */



	/*----------------------------- Validacion form edit Excursiones ------------------------ */

	let validate2 = $('#formeditExcursion').validate({

		rules:{

			title2:{
				required:true,
				maxlength: 50
			},

			description2:{
				required:true,
				minlength: 10,
				maxlength: 250,
			},
			portada2: {

				required:true,
				extension: "jpg|jpeg|png"
			}

			
			
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid')

		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid')
		},

		messages:{
			title2: {
				required: "Campo requerido",
				maxlength: "Máximo 50 caracteres"
			},
			description2: {
				required: "Campo requerido",
				minlength: "Mínimo 10 caracteres",
				maxlength: "Máximo 250 caracteres",
			},
			portada2: {
				required: "Campo requerido",
				extension:"Por favor ingrese una extensión valida"
			},



		},

	});

	/*------------------------------------------------------------------------------------ */


		/*-------------------------Reseteo de modales al cerrarlos ------------------------ */

	$('#addexcursion').on('shown.bs.modal', function (event) {
		validate.resetForm();
		document.getElementById("formExcursion").reset();
	});

	$('#editexcursion').on('shown.bs.modal', function (event) {
		validate2.resetForm();

	});

	/*------------------------------------------------------------- ------------------------ */
</script>

@endsection
