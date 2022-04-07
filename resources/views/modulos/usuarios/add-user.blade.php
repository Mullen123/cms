
<!-- Modal -->
<div class="modal fade" id="addusr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="Addusrform">


         <h5>Nombre:</h5>
         <input type="text" id ="name" name="name" class="form-control">
             <span class="error"></span>

         <h5>Email:</h5>
         <input type="text"  id = "email" name="email" class="form-control ">
          <span class="error"></span>


         <h5>Contraseña:</h5>
         <input type="password"  id =  "password"  name="password" class="form-control ">
         <span class="error"></span>


         <h5>Confirmar contraseña:</h5>
         <input type="password"  id = "password_confirmation"  name="password_confirmation" class="form-control">
         <br>


         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;
         <button  type="submit" class="btn btn-primary" id="btnAddusr" value="Crear" style="background-color: rgb(3, 169, 244) !important">Crear</button>

       </form>
     </div>

   </div>
 </div>
</div>


