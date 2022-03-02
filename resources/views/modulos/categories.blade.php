@extends('App')




@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Categorías</h1>
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
						<div class="card-header">

							<div class="card-tools">
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#UserModal">
									Agregar
								</button>
							</div>

						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Id</th>
										<th>Categoría</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categorias as $categoria)
									<tr>
										<td>{{$categoria->id}}</td>
										<td>{{$categoria->name}}</td>
										<td>

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
					<button  type="submit" class="btn btn-primary" id="btnAddUser" value="Crear">Crear</button>

				</form>

			</div>

		</div>
	</div>
</div>



@endsection

@section('scripts')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script scr="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

	$( document ).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});


		/*agrregar usuario*/
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

            	if(data.status == 0){
            		console.log('error');

            	
            	}else{

              //ocultamos el modal
              $("#UserModal").modal('hide');  
              $('body').removeClass('modal-open');
              $(".modal-backdrop").remove();
              document.getElementById("formCategorias").reset();
              //recargas el datatable
              //$('#usuarios').DataTable().ajax.reload(null, false);

                //muestras la alerta de registro exitoso
                Swal.fire(
                	'Registro exitoso!',
                	'El usuario fue creado correctamente!',
                	'success'
                	)

            }

        }

    });//termina peticion ajax


}



     });


	});/*termina document ready*/

	/*validacion del formulario*/

	let validate = $('#formCategorias').validate({

		rules:{

			name:{
				required:true,
				 maxlength: 2
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
				 maxlength: "Máximo dos caracteres"

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
