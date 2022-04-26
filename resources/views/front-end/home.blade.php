@extends('welcome')

@section('css')

<style>
/* CSS */
.button-85 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
);
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
}
50% {
    background-position: 400% 0;
}
100% {
    background-position: 0 0;
}
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
}


/*alert*/



.alert {
  padding: 20px;
  background-color: #04A9A9;
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
</style>







@endsection

@section('content')
<div class="row">

    <div id="slide" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <ul>

           @foreach($slides as $slide)
           <li>


            <img src="storage/{{$slide->image}}">


            <div class="slideCaption">
                <h3>{{$slide->title}}</h3>
                <p>{{$slide->description}}</p>
            </div>
        </li>



        @endforeach

    </ul>


    <div id="slideIzq"><span class="fa fa-chevron-left"></span></div>
    <div id="slideDer"><span class="fa fa-chevron-right"></span></div>

</div>

</div>


<div class="row" id="top">

    <h1 class="text-center text-info" style="color: #037878 !important; font-family: 'Brush Script MT', cursive;"><b>CATEGORÍAS</b></h1>

    @foreach($categorias as $categoria)

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">

       <a href="#" style="color: black;">

        <h3>{{$categoria->name}}</h3>

    </a> 

</div>

@endforeach


</div>


<div class="row" id="articulos">

    <hr>

    <h1 class="text-center text-info" style= "color: #037878 !important; font-family: 'Brush Script MT', cursive;"><b>EXCURSIONES</b></h1>

    <hr>

    <ul>

        @foreach($excursiones as $excursion)
        <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

          <img src="storage/{{$excursion->portada}}" class="img-thumbnail">
          <h1>{{$excursion->titulo}}</h1>
          <p>{{$excursion->description}}</p>
          <a href="#">
            <button class="button-85" role="button">Leer Más</button>
        </a>

        <hr>

    </li>

    @endforeach

</ul>



</div>

<div class="row">

    <center><a href="#" style=" color: rgb(1,184,154) !important; "><button class="btn btn-primary btn-lg" >Ver Todas las Excursiones</button></a></center>

</div>



<footer class="row" id="contactenos">

    <hr>

    <h1 class="text-center text-info" style=" color:#037878 !important; font-family: 'Brush Script MT', cursive;"><b>CONTÁCTENOS</b></h1>

    <hr>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


        <iframe src="https://www.google.com/maps/d/embed?mid=1e2dR1URL0I_LwjmNHrPz35ZBHl56iv1V&ehbc=2E312F" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>




        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

            <h4 class="blockquote-reverse text-primary">
                <ul>
                  <li><span class="glyphicon glyphicon-phone"></span>  (57)(4) 234 56 43</li>
                  <li><span class="glyphicon glyphicon-map-marker"></span>  Calle San Francisco - 45 La Paz.Méx.</li>
                  <li><span class="glyphicon glyphicon-map-marker"></span>  Calle Ig.Zaragoza - 84 Cdmx</li>
                  <li><span class="glyphicon glyphicon-envelope"></span>  Prueba@correo.com</li>    
              </ul>      
          </h4>

      </div>

  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >


    <div class="alert" id="succes_message"  style="display: none">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>ÉXITO!</strong> Tu mensaje fue enviado correctamente.
</div>
    <ol>
        <li>
            <a href="http://www.facebook.com" target="_blank">
                <i class="fa fa-facebook" style="font-size:24px;"></i>  
            </a>
        </li>

        <li>
            <a href="http://www.youtube.com" target="_blank">  
                <i class="fa fa-youtube" style="font-size:24px;"></i>  
            </a>
        </li>

        <li>
            <a href="http://www.vimeo.com" target="_blank">
                <i class="fa fa-vimeo" style="font-size:24px;"></i>  
            </a>
        </li>
    </ol>





    <form  id="messageForm" name ="messageForm" >



        <input type="text" id="name" name="name" class="form-control"  placeholder="Nombre">
        <span class="error"></span>

        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
          <span class="error"></span>

        <textarea name="message" id="message" cols="30" rows="10" placeholder="Contenido del Mensaje" class="form-control"></textarea><br>
        <span class="error"></span>


        <button  type="submit" class="btn btn-primary" id="btnsendMessage" value="Crear" style="background-color: #fff !important; color:black">Crear</button>

    </form>


</div>

</footer>


@endsection



@section('scripts')

<script type="text/javascript" src="http://project-cms.test/js/complementos/jquery-3.5.1.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/complementos/jquery.validate.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/complementos/additional-methods.js"></script>
<script type="text/javascript" src="http://project-cms.test/js/complementos/sweetalert2@11.js"></script>



<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


});

    $(document).on('click','#btnsendMessage', function(e){

        e.preventDefault();
        if(validate.form()){

            let name = $('#name').val();
            let email = $('#email').val();
            let message = $('#message').val();


            $.ajax({

            type:'POST',
            url: "http://project-cms.test/api/mensajes",
            data: {
                name:name,
                email:email,
                message:message
        },
            dataType:'json',
            success: function(data){
                document.getElementById('messageForm').reset();
                 $("#succes_message").show();//.css("display", "");  
        
            }

         });//fin de la peticion ajax


        }





    });



    /*-----------------------Validacion formulario de mensaje--------------------*/

    let validate = $('#messageForm').validate({
        rules:{
            name:{
                required:true,
                maxlength: 2
            },

        email:{
            required:true,
            email:true
        },
            message:{
                required:true,
                   minlength: 10,
                   maxlength: 100
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid')
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid')
        },
        messages:{
            name: {
                required: "Campo requerido",
                maxlength: "Máximo 2 carácteres"
            },
              email:{
            required:"Campo requerido",
            email: "Ingrese  un email válido"
        },
             message: {
                required: "Campo requerido",
                 minlength: "Mínimo 10 carácteres",
                 maxlength: "Máximo 100 carácteres"
             
            },

        },
    });

    /*---------------------------------------------------------------------------------*/




</script>

<script type="text/javascript">
  var animateButton = function(e) {

      e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
},700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}  




</script>

@endsection