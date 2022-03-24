@extends('App')


@section('css')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>

	button{
		background-color:transparent !important;
		border: none !important;
		outline:none !important;
		margin-top: -7px;  
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
					<h1 class="m-0"><i class="fas fa-users-cog"></i>Listado de Roles</h1>
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
							<div class="card-tools">

								<a href="{{route('roles.create')}}" class="btn btn-light" style="color:black;">Agregar</a>
							</div>

						</div>
						<!-- /.card-header -->
						<div class="card-body">
							

							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										
										<th><th>

										</tr>
									</thead>
									<tbody>
										@foreach($roles as $rol)
										<tr>

											<td>{{$rol->id}}</td>
											<td>{{$rol->name}}</td>
											
											<td width="10px"> 
											<div>
												
											</div>    
												<a   class="btn-floating light-blue waves-effect waves-light"  href="{{route('roles.edit',$rol->id)}}"><i class="fas fa-pencil-alt" style="color:#00c851;"></i></a>
												  
											</td>
												<td width="10px"> 

													<form method="post" action="{{route('roles.destroy',$rol->id)}}">
														@csrf
														@method('delete')

														<button class="btn btn-danger" type="sumbit"> <i class="fa fa-trash"  style="color:red"></i></button>


													</form>

												</td>

											</tr>

											@endforeach

										</tbody>
									</table>

								</div>
								

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
<script type="text/javascript">
	
	$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


@endsection