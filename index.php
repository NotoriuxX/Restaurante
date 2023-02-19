<?php include 'templates/cabecera2.php'; ?>
    <div class="sub_body">
      <div class="d-flex bd-highlight mb-3">
        <div class=" bd-highlight" id="p1">
            <div class="txt__menu">
                <h1  class="txt">Comida Casera</h1>
                <h1>Saludable y<span style="color : #2A9D8F">&nbsp;Gourmet</span>.</h1>
                
              </div>
              <div class="buttom_pag1">
                <a href="Tienda.php"><button type="button" class="btn btn-warning" >Ver Menu</button></a>
                <a  href=#fecha><button type="button" class="btn btn-light" href=#fecha>Local Cerca</button></a>
              </div>
              <div>
              
            </div> 
        </div>
      
    
    <div class="p-2 bd-highlight" id="p2">
        <div class="conteiner-slider">
            <div class="slider" id="slider">
                <div class="slider__section"><img src="IMG/platos.jpg"/ alt="" class="slider__img"/></div>    
                <div class="slider__section"><img src="IMG/platos2.jpg"/ alt="" class="slider__img"/></div>
                <div class="slider__section"><img src="IMG/pasta.png"/ alt="" class="slider__img"/></div>

           <!-- </div>   
                    <div class="slider__btn" id="slider__btn__right">></div>
                 <div class="slider__btn " id="slider__btn__left"><</div>
            </div>-->
    </div>  
   </div>
  </div>
   <!-------Especialidades----------->

   <div class="font2">
      <div class="text-center">
        <p class="center">Especialidades</p>
        <p class="txt_sub1">de la casa</p>
      </div>

      <div class="Especialidad_parte1">

        <div class="Especialidad_parte2_sub1"> 
          <p class="txt_sub1">Postres</p>
          <hr>
          <p class="txt_sub2">Yogurt Griego Con Semillas y Fresas</p>
          <hr>
          <p class="txt_sub3">Postre de yogurt con mermeladas y avanas con fresas seleccionadas</p>
          <p class="txt_sub4">$ 3900</p>
        </div>
        <div>
          <div class=""><img src="IMG/Postre_franbueza.png" alt="" class="slider__img"/></div> 
        </div>

      </div>
      <!--parte 2-->

      <div class="Especialidad_parte1">
        <div>
          <div class=""><img src="IMG/garbanzos.png" alt="" class="slider__img"/></div> 
        </div>

        <div class="Especialidad_parte2_sub1"> 
          <p class="txt_sub1">almuezos</p>
          <hr>
          <p class="txt_sub2">Garvanzos con nueces</p>
          <hr>
          <p class="txt_sub3">Equicita sopa de garvanzos con nueces elavorada especialmenta para todos los que tengas un paladar fino</p>
          <p class="txt_sub4">$ 9900</p>
        </div>
        
        

      </div>

   </div>
   <!--Nuestra Concina-->
   <div>

    <div class="text-center">
      <p class="txt_sub1_1" style="margin-bottom: 0px;">Expertos</p>
      <p class="center">Nuestra Cocina</p>
    </div>

    <div class="div_chef">
      <div>
        <img src="IMG/chef_1.png" alt="" class="img_chef"/> 
        <div class="cuadro_chef"><p class="nom_chef">Rodrigo ruso</p><p class="des_chef">chef</p> 
          <p class="icons_chef"><i class="bi bi-facebook"></i> <i class="bi bi-instagram"></i> <i class="bi bi-twitter"></i></p></div></div>
      <div><img src="IMG/chef_2.png" alt="" class="img_chef"/>
        <div class="cuadro_chef"><p class="nom_chef">Maria Olivos</p><p class="des_chef">chef</p> 
          <p class="icons_chef"><i class="bi bi-facebook"></i> <i class="bi bi-instagram"></i> <i class="bi bi-twitter"></i></p></div></div>
      
      <div><img src="IMG/chef_3.png" alt="" class="img_chef"/>
        <div class="cuadro_chef"><p class="nom_chef">Fabiano Caruana</p><p class="des_chef">fundador</p>
           <p class="icons_chef"><i class="bi bi-facebook"></i> <i class="bi bi-instagram"></i> <i class="bi bi-twitter"></i></p></div></div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-lg-12"><img src="IMG/fondo.png" alt="" class="img-fluid"/> </div>
    <div class="form_fondo">
      <form class="form_1" action="php/sp_reservas.php" method="POST"  enctype="multipart/form-data">
        <div class="text-center">
        <p class="center_1">Reservación</p>
        <p class="txt_sub1">Te Esperamos</p>
        </div>
        <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre"required maxlength="20"/>
        <input class="form-control"  id="email" type="text" name="email" placeholder="Email" required maxlength="50"/>
        <input class="form-control"  id="telefono" type="text" name="telefono" placeholder="Telefono"required  maxlength="20"/>
        <div class="div12"><input class="form-control"  id="fecha" type="text" name="fecha" placeholder="Fecha" required  maxlength="5"/>
        <input class="form-control"  style="margin-right: 10px;" id="hora" type="text" name="hora" placeholder="Hora" required  maxlength="5"/></div>
        <input class="form-control"  id="cantidad_de_personas" type="text" name="cantidad_de_Personas" placeholder="Cantidad de Personas" required  maxlength="20"/>
        <textarea class="form-control"  id="mensajes" type="text" name="mensajes" placeholder="Mensajes"required  maxlength="149" ></textarea>
        <button rows="10" cols="40" class="btn btn-success" id="btn_4">Encargar</button>
       
      </form>
    </div>
  </div>
  <footer class="container_1" >
    <div class = "row" >
    <div class="col-4">
      <div><img src="IMG/logo1.png"  alt="logo" class="img_logo"/></div>
      <div class=""><p>Este es un simple texto de relleno solo esta para rellenar, y mostrar el lugar donde iria un texto real de la pagina cuando este hecha en su totalidad</p></div>
      <div><p>2009 - 2022</div>
      <div>
        <i class="bi bi-instagram" id="redes"></i><i class="bi bi-whatsapp"  id="redes"></i><i class="bi bi-facebook"  id="redes"></i><i class="bi bi-twitter"  id="redes"></i>
      </div>
    </div>
    <div class="col-4" id="comunicacion" >
      <div class="txt_sub2"><p>Horario</p></div>
      <hr class="hr">
      <div class="horario" >
        <p>Lunes</p><p>9:00-21:00</p>
        <p>Martes</p><p>9:00-21:00</p>
        <p>Miercoles</p><p>9:00-21:00</p>
        <p>Jueves</p><p>9:00-21:00</p>
        <p>Viernes</p><p>9:00-21:00</p>
        <p>Sabado</p><p>9:00-21:00</p>
        <p>Domingo</p><p>9:00-21:00</p>
      </div>
      <div class="txt_sub2"><p>Telefono</p></div>
      <hr class="hr">
      <div class="footer_num" ><i class="bi bi-telephone"></i> <p>+56 02 7608573</p></div>
    </div>
    <div class="col-4">
      <div class="txt_sub2"><p>Direccon</p></div>
      <hr class="hr">
      <div class="footer_ubi"><i class="bi bi-geo-alt-fill" style="color: with ;"></i>
      <div class="footer_ubicacion"><p>C. Cuevas 300</p> <p>Rancagua, centro</p> </div>
    </div>
      <div><img src="IMG/maps.png"  alt="logo" class="img_maps"/></div>
    </div>
    </div>
    <div class="footer_sub" id=»fecha»><p>2022-Diseñado por LingÛini</p></div>
  </div>
  </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script> 
  </body>
</html>
