@extends('App')


@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fas fa-users-cog"></i>  Categorías</h1>
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

							@can('categorias.store')
							<div class="card-tools">
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#UserModal">
									Agregar
								</button>
							</div>

							@endcan

						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="usuarios" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th width="10px">ID</th>
										<th>Nombre</th>
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





<!--modal-->
<div class="modal" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Categoría</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form id="formCategorias">



					<h5>Nombre:</h5>
					<input type="text" id="name" name="name" class="form-control has-error">
					<span class="error"></span>
					<br><br>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;
					<button  type="submit" class="btn btn-primary" id="btnAddUser" value="Crear" style="background-color: rgb(3, 169, 244) !important">Crear</button>

				</form>

			</div>

		</div>
	</div>
</div>





<!--Editmodal-->
<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">



				<form action="{{ route('categorias.update') }}" method="post" id="formEditCategorias">
					@csrf

					<input  type="hidden" id= "cid" name="cid">

					<h5>Nombre:</h5>

					<input type="text" id="name2" name="name2" class="form-control has-error" placeholder="Ingrese la categoría">
					<span class="text-danger error-text name2_error"></span>

					<br><br>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;
					<button  type="submit" class="btn btn-primary" id="EditUser" value="Crear"  style="background-color: rgb(3, 169, 244) !important">Editar</button>

				</form>

			</div>

		</div>
	</div>
</div>



@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

	$( document ).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

 //metodo para mostrar usuarios
 $('#usuarios').DataTable({
 	"processing": true,
 	"serverSide": true,
 	"ajax": {
 		url: "{{ route('categorias.home') }}"
 	},

 	"columns": [

 	{data:'id'},
 	{data:'name'},
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



});/*termina document ready*/



	/*agrregar categoria*/
	$(document).on('click','#btnAddUser', function(e){

		e.preventDefault();

		if(validate.form()){


        //obtener los valores de los inputs
        var name = $('#name').val();
         //console.log(name);

         $.ajax({
         	type:'POST',
         	url: "{{route('categorias.store')}}",
         	data: {"name": name},
         	dataType:'json',
         	success: function(data){
         		if(data.status == 2){
         			$("#UserModal").modal('hide');  
         			$('body').removeClass('modal-open');
         			$(".modal-backdrop").remove();
         			document.getElementById("formCategorias").reset();
         			Swal.fire({
         				icon: 'error',
         				confirmButtonColor:'rgb(3, 169, 244)',
         				title: 'Oops...',
         				text: 'Categoría existente ingrese otra opcion!', 
         			})

         		}
         		if(data.status== 1){

              //ocultamos el modal
              $("#UserModal").modal('hide');  
              $('body').removeClass('modal-open');
              $(".modal-backdrop").remove();
              document.getElementById("formCategorias").reset();
              //recargas el datatable
              //$('#usuarios').DataTable().ajax.reload(null, false);
              $('#usuarios').DataTable().ajax.reload(null, false);
                //muestras la alerta de registro exitoso

                Swal.fire({
                	icon: 'success',
                	confirmButtonColor:'rgb(3, 169, 244)',
                	text: 'Categoría agregada con exito!', 
                })
              }
              if(data.status ==0)
              	console.log('error');

            }

        });//termina peticion ajax


       }



     });


	

	/*metodo para eliminar categorias*/


	$(document).on('click','#deleteUserBtn', function(e){
		var id = $(this).data('id');

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
		}).then((result) => {
        //si el ese wey dice que si lo borra
        if (result.value) {

          // entonces hacemos una peticion ajax
          $.ajax({

          	type:'POST',
          	url: "{{route('categorias.delete')}}",
          	data: {id:id},
          	dataType:'json',
          	success: function(data){
          		if(data.code == 1){
          			$('#usuarios').DataTable().ajax.reload(null, false);
          			Swal.fire({
          				icon: 'success',
          				confirmButtonColor: 'rgb(3, 169, 244)',
          				title: 'Borrado exitoso',
          				text: 'La categoría se elimino de forma exitosa!', 
          			})          		}else{
          				console.log('error');
          			}
          		}

         });//fin de la peticion ajax

        }//fin del if donde se valida si el usuario presiona el boton de eliminar o cancelar

     });//finaliza la promesa



	});


	$(document).on('click','#editUserBtn',function(){

		
		var id = $(this).data('id');
					//e.preventDefault();
					
					//console.log(id);
					

					$.post('<?= route("categorias.edit") ?>',{id:id}, function(data){
                         //alert(data.details.id);

                         $('#EditModal').find('input[name="cid"]').val(data.details.id);
                         $('#EditModal').find('input[name="name2"]').val(data.details.name);


                         $("#EditModal").modal('show');  

                       },'json');


				});




	$('#formEditCategorias').on('submit', function(e){
		e.preventDefault();


		if(validate2.form()){
			var form = this;
			$.ajax({
				url:$(form).attr('action'),
				method:$(form).attr('method'),
				data:new FormData(form),
				processData:false,
				dataType:'json',
				contentType:false,

				success: function(data){
					if(data.code == 1){
						$("#EditModal").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();

						$('#usuarios').DataTable().ajax.reload(null, false);
						Swal.fire({
							icon: 'success',
							confirmButtonColor:'rgb(3, 169, 244)',
							title: 'Actualización Exitosa',
							text: 'La categoria se actualizo con exito!', 
						})
					}else{
						$("#EditModal").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						Swal.fire({
							icon: 'error',
							confirmButtonColor:'rgb(3, 169, 244)',
							title: 'Oops...',
							text: 'Categoría existente ingrese otra opcion!', 
						})
					}
				}
			});

		}

	});


	/*validacion del formulario*/

	let validate = $('#formCategorias').validate({

		rules:{

			name:{
				required:true,
				maxlength: 100
			}

		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid')

		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid')
		},

		messages:{
			name: {
				required: "Campo requerido",
				maxlength: "Máximo 100 caracteres"

			}

		},

	});



	let validate2 = $('#formEditCategorias').validate({

		rules:{

			name2:{
				required:true,
				maxlength: 100
			}

		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid')

		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid')
		},

		messages:{
			name2: {
				required: "Campo requerido",
				maxlength: "Máximo 100 caracteres"

			}

		},

	});


	/*reseteo de modal*/
	$('#UserModal').on('shown.bs.modal', function (event) {
		validate.resetForm();
		document.getElementById("formCategorias").reset();

	})


</script>






@endsection
