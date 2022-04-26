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
                    <h1 class="m-0"><i class="fas fa-users"></i> Usuarios</h1>
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

                    <div  class="card card-info">
                        <div  class="card-header" >

                            
                            <a  type = "button"  class="btn btn-light" href="{{route('usersCsv')}}" style="color:black"> Csv</a>
                            <div class="card-tools">
                                <button type="button"  class="btn btn-light"  data-toggle="modal" data-target="#addusr">
                                  Agregar
                              </button>

                          </div>

                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                       <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>


                                <a   class="btn-floating light-blue waves-effect waves-light"  href="{{route('users.edit',$user)}}"><i class="fas fa-eye" style="color:#054549;"></i></a>

                                <a   class="btn-floating light-blue waves-effect waves-light delete"   id="{{$user->id}}" onclick="deleteUser(this.id)"><i class="fa fa-trash" style="color:#ff3547;"></i></a>

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
@include('modulos.usuarios.add-user')

@section('scripts')


@include('modulos.modulos-js.js')





<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*----------------------------------------Datatable-------------------------------- */

   
    $('#example').DataTable({
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

<script type="text/javascript">


    /*----------------------------- Metodo para agregar Usuario------------------------ */

    $(document).on('click','#btnAddusr',function(e){

        e.preventDefault();

        if(validate.form()){

         var name = $("#name").val();
         var email = $("#email").val();
         var password = $("#password").val();
         var password_confirmation = $("#password_confirmation").val();


         $.ajax({

            type:"POST",
            url: "{{ route('users.store') }}",
            data: { name:name ,email:email, password:password, password_confirmation:password_confirmation },
            dataType: 'json',
            success: function(data){

                if(data.status == 2){
                    $("#addusr").modal('hide');  
                    $('body').removeClass('modal-open');
                    $(".modal-backdrop").remove();
                    document.getElementById("Addusrform").reset();
                    Swal.fire({
                        icon: 'error',
                        confirmButtonColor:'rgb(3, 169, 244)',
                        title: 'Oops...',
                        text: 'Usuario existente ingrese otra opcion!', 
                    })
                }
                if(data.status == 1){
              //ocultamos el modal
              $("#addusr").modal('hide');  
              $('body').removeClass('modal-open');
              $(".modal-backdrop").remove();
              document.getElementById("Addusrform").reset();
              //recargas el datatable
              //$('#example').DataTable().ajax.reload(null, false);

                //muestras la alerta de registro exitoso
                Swal.fire({
                    icon: 'success',
                    confirmButtonColor:'rgb(3, 169, 244)',
                    text: 'Usuario agregada con exito!', 
                });
                
                setTimeout('document.location.reload()',200);
            }

            if(data.status ==0)

                console.log('error');
        }
    });

     }

 });

    /*-------------------------------------------------------------------------------- */


    /*----------------------------- Metodo para Eliminar Usuario------------------------ */

    function deleteUser(id){


     var user_id = id;

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
            url: "{{route('users.delete')}}",
            data: {id:user_id},
            dataType:'json',
            success: function(data){
                if(data.code == 1){

                    Swal.fire({
                        icon: 'success',
                        confirmButtonColor: 'rgb(3, 169, 244)',
                        title: 'Borrado exitoso',
                        text: 'Usuario borrado de forma exitosa!', 
                    })               
                    setTimeout('document.location.reload()',2000);
                }else{
                    console.log('error');
                }
            }

         });//fin de la peticion ajax
      }

  });

}


/*-------------------------------------------------------------------------------- */




/*-----------------------------Validacion form Agregar usuario------------------------ */

let validate = $('#Addusrform').validate({

    rules:{

        name:{
            required:true,
            maxlength: 50
        },

        email:{
            required:true,
            email:true
        },
        password:{
            required:true,

            minlength: 5,
            maxlength: 12
        },
        password_confirmation: {
            required: true,

            equalTo: "#password"
        },


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
            maxlength: "Máximo 50 caracteres"
        },

        email:{
            required:"Campo requerido",
            email: "ingrese un email valido"
        },
        password:{
            required:"Campo requerido",
            minlength: "Mínimo 5 caracteres",
            maxlength: "Máximo 12 caracteres"

        },
        password_confirmation:{
         required:"Campo requerido",
         equalTo:"Favor de ingresar la misma contraseña"

     }


 },

});

/*------------------------------------------------------------------------------------- */







/*------------------------------Resesteo de Modal-------------------------------------- */

$('#addusr').on('shown.bs.modal', function (event) {
    validate.resetForm();
    document.getElementById("Addusrform").reset();
})

/*------------------------------------------------------------------------------------- */
</script>



@endsection