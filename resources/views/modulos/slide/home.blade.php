@extends('App')
<link rel="stylesheet" type="text/css" href="{{asset('css/styles/bootstrap-4.3.1.min.css')}}">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/styles/dataTables.bootstrap4.min.css')}}">

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
					<h1 class="m-0"><i class="nav-icon fas fa-image"></i> Slide</h1>
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
								<button type="button"  class="btn btn-light" data-toggle="modal" data-target="#exampleModal1">
  Agregar
</button>

							</div>



						</div>
						<!-- /.card-header -->
						

						<div class="card-body">
							<table id="slide" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th width="10px">ID</th>
										<th>Título</th>
										<th>Descripción</th>
										<th>Imagen</th>

										
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


@include('modulos.slide.create-slide')
@endsection

@section('scripts')


<script type="text/javascript" src="http://project-cms.test/js/extensiones/jquery-3.5.0.js"></script>



<script type="text/javascript" src="http://project-cms.test/js/extensiones/jquery.validate.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/additional-methods.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/popper.min.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="http://project-cms.test/js/extensiones/sweetalert2@11.js"></script>


<script type="text/javascript">

	$( document ).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

 //metodo para mostrar usuarios
 $('#slide').DataTable({
 	"processing": true,
 	"serverSide": true,
 	"ajax": {
 		url: "{{ route('slide.home') }}"
 	},

 	"columns": [

 	{data:'id'},
 	{data:'title'},
 	{data:'description'},
 	{data:'image',


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



});/*termina document ready*/






	$(document).on('submit','#formSlide', function(e){

		e.preventDefault();

		if(validate.form()){
			let formData = new FormData($('#formSlide')[0]); 


			$.ajax({

				type:'POST',
				url: "{{route('slide.store')}}",
				data: formData,
				contentType:false,
				processData:false,
				success: function(data){
					if(data.status == 2){
						$("#exampleModal1").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						document.getElementById("formSlide").reset();
						Swal.fire({
							icon: 'error',
							confirmButtonColor:'rgb(3, 169, 244)',
							title: 'Oops...',
							text: 'Slide existente ingrese otra opcion!', 
						})

					}
					if(data.status ==1){

						$("#exampleModal1").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						document.getElementById("formSlide").reset();
						$('#slide').DataTable().ajax.reload(null, false);
						Swal.fire({
							icon: 'success',
							confirmButtonColor:'rgb(3, 169, 244)',
							text: 'Slide agregado con exito!', 
						})

					}
					if(data.status ==0)
						console.log('error');


				}

         });//fin de la peticion ajax



		}



	});


	$(document).on('click','#deleteSlideBtn',function(e){

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
          	url: "{{route('slide.delete')}}",
          	data: {id:id},
          	dataType:'json',
          	success: function(data){
          		if(data.code == 1){
          			$('#slide').DataTable().ajax.reload(null, false);
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


      }

  });



/*metodo de edicion de slide*/



	});/*termina el metodo de borrado */



$(document).on('click','#editSlideBtn',function(){
		
		var id_slide = $(this).data('id');
					//e.preventDefault();
					
					//console.log(id);
			
					$.post('<?= route("edit") ?>',{id:slide_id}, function(data){
                         console.log(data.details.id);
                         
                       },'json');
				});





	/*validacion del formulario*/

	let validate = $('#formSlide').validate({

		rules:{

			title:{
				required:true,
				maxlength: 50
			},

			description:{
				required:true,
				maxlength: 200
			}, 

			image: {

				required:true,
				extension: "jpg|jpeg|png"

			},
			

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
				maxlength: "Máximo 200 caracteres"

			},

			image: {
				required: "Campo requerido",
				extension:"Por favor ingrese una extensión valida"

			},

		},

	});

	/*reseteo de modal*/
	$('#exampleModal1').on('shown.bs.modal', function (event) {
		validate.resetForm();
		document.getElementById("formSlide").reset();

	})

</script>



@endsection
