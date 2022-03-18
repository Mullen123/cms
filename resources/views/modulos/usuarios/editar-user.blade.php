@extends('App')



@section('css')
<style>
  .alert {
    padding: 20px;
    background-color: #04AA6D;
    color: white;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
</style>


@endsection


@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class=" fas fa-solid fa-key"></i> Asignar un Rol</h1>
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

          @if(session('info'))
          <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Rol Agregado con éxito !!</strong>
          </div>
          @endif

          <div class="card card-info"  >
            <div class="card-header" style="padding-top: 52px;" >

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <h5>Nombre: </h5>

              <p class="form-control">{{$user->name}}</p>

              {!! Form::model($user , ['route' => ['users.update', $user] , 'method' => 'put']) !!}

              @foreach($roles as $role)

              <div>
                
                <label>
                  {!!Form::checkbox('roles[]',$role->id,null, ['class' => 'm-r-1'])!!}

                  {{$role->name}}
                </label>

              </div>

              @endforeach


              {!! Form::submit('Asignar Rol',['class' => 'btn btn-primary'])!!}



              {!! Form::close() !!}




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