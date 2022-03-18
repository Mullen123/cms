@extends('App')


@section('css')




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
												<a   class="btn-floating light-blue waves-effect waves-light"  href=""><i class="fas fa-pencil-alt" style="color:#00c851;"></i></a></td>
												<td width="10px">  




													<form method="post" action="">
														@csrf
														@method('delete')
														<a   class="btn-floating light-blue waves-effect waves-light"  href=""><i class="fas fa-trash" style="color:red;"></i></a>

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






		@endsection
