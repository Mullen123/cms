@extends('App')



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
						<div style="padding-top: 52px;" class="card-header" >
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>E-mail</th>
										<th><th>

										</tr>
									</thead>
									<tbody>
										@foreach($users as $user)
										<tr>

											<td>{{$user->id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td width="10px">     
												<a   class="btn-floating light-blue waves-effect waves-light"  href="{{route('users.edit',$user)}}"><i class="fas fa-pencil-alt" style="color:#00c851;"></i></a>

												</td>

												</tr>

												@endforeach

											</tbody>
										</table>


										


									</div>
									<!-- /.card-body -->
									<div class="card-footer pagination justify-content-end" >
										{{ $users->links() }}
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

