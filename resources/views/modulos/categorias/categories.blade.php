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
					<h1 class="m-0"><i class="fas fa-users-cog"></i>  Categorías</h1>
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
							<div class="card-tools">
								<button type="button" class="btn btn-light"  data-toggle="modal" data-target="#exampleModal">
									Agregar
								</button>
							</div>

						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="categories" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th width="10px">ID</th>
										<th>Nombre</th>
										
										
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


<!--modal Agregar y Editar-->
@include('modulos.categorias.create-categories')

@include('modulos.categorias.edit-categories')

@endsection

@section('scripts')

@include('modulos.modulos-js.js')

@include('modulos.categorias.categories-functions')

@endsection