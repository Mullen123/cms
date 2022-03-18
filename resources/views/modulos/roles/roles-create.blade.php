@extends('App')




@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class=" fas fa-solid fa-key"></i> Crear Rol</h1>
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

      

          <div class="card card-info"  >
            <div class="card-header" style="padding-top: 52px;" >

            </div>
            <!-- /.card-header -->
            <div class="card-body">
        
           <form method="post"  action="{{route('roles.store')}}" novalidate>
                
                @csrf



          <h5>Nombre:</h5>
          <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese nombre del rol"><br>

            <button  type="submit" class="btn btn-primary" id="btnAddUser" value="Crear" style="background-color: rgb(3, 169, 244) !important">Crear Rol</button>

          <br>

          <h2>Listado de permisos</h2>
          
            @foreach($permissions as $p)

          <div class="form-check">
        


             <input type="checkbox" name="permisos[]" value="{{$p->id}}"> <label>{{$p->description}}</label>
          </div>



          @endforeach



          <br><br>
       
        
        </form>


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