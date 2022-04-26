<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="{{ route('categorias.update') }}" method="post" id="formEditCategorias">
					@csrf

					<input  type="hidden" id= "cid" name="cid">

					<h5>Nombre:</h5>

					<input type="text" id="name2" name="name2" class="form-control">
					<span class="text-danger error-text name2_error"></span>

					<br><br>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;
					<button  type="submit" class="btn btn-primary" id="EditCategory" value="Crear"  style="background-color: rgb(3, 169, 244) !important">Editar</button>

				</form>

			</div>

		</div>
	</div>
</div>
