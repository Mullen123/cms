<!--modal-->
<div class="modal" id="SlideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Slide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				

				<form id="formSlide" enctype="multipart/form-data" name="formSlide" >


					

					<h5>Título:</h5>
					<input type="text" id="title" name="title" class="form-control has-error">
					<span class="error"></span>

					<h5>Descripción:</h5>
					<input type="text" id="description" name="description" class="form-control has-error">
					<span class="error"></span>

					<h5>Imagen:</h5>
					<input type="file" id="image" name="image" class="form-control has-error" >
					<span class="error"></span>


					<br><br>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;

					<button  type="submit" class="btn btn-primary" id="btnAddSlide" value="Crear" style="background-color: rgb(3, 169, 244) !important">Crear</button>

				</form>
				
			</div>

		</div>
	</div>
</div>

