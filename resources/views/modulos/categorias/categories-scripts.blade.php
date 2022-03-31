
<script type="text/javascript" src="http://project-cms.test/js/extensiones/jquery.validate.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/additional-methods.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/popper.min.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/extensiones/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="http://project-cms.test/js/extensiones/sweetalert2@11.js"></script>


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

		//console.log('le diste');
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
         			$("#exampleModal").modal('hide');  
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
              $("#exampleModal").modal('hide');  
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
	$('#exampleModal').on('shown.bs.modal', function (event) {
		validate.resetForm();
		document.getElementById("formCategorias").reset();
	})
</script>

