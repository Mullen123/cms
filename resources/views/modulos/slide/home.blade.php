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
					<h1 class="m-0"><i class="nav-icon fas fa-image"></i> Slide</h1>
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

							<!--<button type="button"class="btn btn-light" id="exportcsv">
								Csv
							</button>
							<button type="button" class="btn btn-light" >
								Pdf
							</button>-->

							<div class="card-tools">
								<button type="button"  class="btn btn-light" data-toggle="modal" data-target="#exampleModal1">
									Agregar
								</button>

							</div>



						</div>
						<!-- /.card-header -->
						

						<div class="card-body">
							<table id="slide" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th width="10px">ID</th>
										<th>Título</th>
										<th>Descripción</th>
										<th>Imagen</th>
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


@include('modulos.slide.create-slide')

@include('modulos.slide.slide-edit')
@endsection

@section('scripts')

@include('modulos.modulos-js.js')

@include('modulos.slide.slide-functions')

@endsection
