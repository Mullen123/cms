
<script type="text/javascript">

	$( document ).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});




		/*----------------------------------- Datatable ---------------------------------- */

		$('#slide').DataTable({
			"processing": true,
			"serverSide": true,
			"responsive": true,
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

		/*-------------------------------------------------------------------------------- */

	});/*termina document ready*/






	/*----------------------------- Metodo para agregar Slide ------------------------ */
	
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

	/*-------------------------------------------------------------------------------- */




	/*----------------------------- Metodo para Editar Slide ------------------------ */


	$(document).on('click','#editSlideBtn',function(){

		var slide_id = $(this).data('id');

		$.post('<?= route("edit") ?>',{id:slide_id}, function(data){
                         //console.log(data.details.title);
                         $('#exampleModal3').find('input[name="slid"]').val(data.details.id);
                         $('#exampleModal3').find('input[name="title2"]').val(data.details.title);
                         $('#exampleModal3').find('input[name="description2"]').val(data.details.description);
                         $("#exampleModal3").modal('show');  
                     },'json');
	});

	/*-------------------------------------------------------------------------------- */




	/*----------------------------- Metodo para actualizar Slide ------------------------ */

	$('#exampleModal3').on('submit', function(e){
		e.preventDefault();

		if(validate2.form()){

			let formDataSlide = new FormData($('#Edtslide')[0]);

			$.ajax({

				type:'POST',
				url: "{{route('slide.update')}}",
				data: formDataSlide,
				contentType:false,
				processData:false,
				success: function(data){

					if(data.status == 2){
						$("#exampleModal3").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						document.getElementById("Edtslide").reset();
						Swal.fire({
							icon: 'error',
							confirmButtonColor:'rgb(3, 169, 244)',
							title: 'Oops...',
							text: 'Slide existente ingrese otra opcion!', 
						})
						

					}	if(data.status ==1){

						$("#exampleModal3").modal('hide');  
						$('body').removeClass('modal-open');
						$(".modal-backdrop").remove();
						document.getElementById("Edtslide").reset();
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

	/*----------------------------------------------------------------------------------- */



	/*----------------------------- Metodo para eliminar Slide ------------------------ */

	
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
          				text: 'Slide borrado de forma exitosa!', 
          			})          		}else{
          				console.log('error');
          			}
          		}

         });//fin de la peticion ajax
      }

  });

	});

	/*--------------------------------------------------------------------------------- */
	


	/*--------------------------- Validacion form  agregar Slide------------------------ */



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



	/*------------------------------------------------------------------------------------- */


	

	/*----------------------------- Validacion form  editar Slide ------------------------ */

	let validate2 = $('#Edtslide').validate({

		rules:{

			title2:{
				required:true,
				maxlength: 50
			},

			description2:{
				required:true,
				maxlength: 200
			}, 

			image2: {

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
			title2: {
				required: "Campo requerido",
				maxlength: "Máximo 50 caracteres"
			},

			description2: {
				required: "Campo requerido",
				maxlength: "Máximo 200 caracteres"
			},

			image2: {
				required: "Campo requerido",
				extension:"Por favor ingrese una extensión valida"
			},

		},

	});

	/*------------------------------------------------------------------------------------ */



	/*-------------------------Reseteo de modales al cerrarlos ------------------------ */

	$('#exampleModal1').on('shown.bs.modal', function (event) {
		validate.resetForm();
		document.getElementById("formSlide").reset();
	});

	$('#exampleModal3').on('shown.bs.modal', function (event) {
		validate2.resetForm();

	});

	/*------------------------------------------------------------- ------------------------ */
</script>


