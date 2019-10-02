<div class="content-wrapper">

  <section class="content-header">

  </section>

  <section class="content">

    <div class="row">
      
      
    

        </div>
        <div class="col-lg-12">
           
          <?php

          if($_SESSION["perfil"] =="Usuario" || $_SESSION["perfil"] =="Empleado"){

             echo '<div class="box box-success">

             <div class="box-header">
             <center>

             <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

             </center>

             </div>

             </div>';

          }

          ?>

         </div>

          <?php

          if($_SESSION["perfil"] =="Usuario"){

               echo ' <div class="row-md-4" >
                    
                    <div class="col-md-6 col-xs-12">
                      
                        <div class="info-box">
              
                          <span class="info-box-icon bg-green"><i class="fa fa-map-marker"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Barrio El Calvario, Guastatoya</span>
                                 <span class="info-box-number">El Progreso, Guastatoya</span>
                            </div>
              
                        </div>
                        <div class="info-box">
              
                          <span class="info-box-icon bg-green"><i class="fa fa-phone"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Contáctanos</span>

                                 <span class="info-box-number">79451594</span>
                            </div>
              
                        </div>
                    </div>
                </div>

                <div class="row-sm-4">
                    
                    <div class="col-md-6 col-xs-12">
                      
                      <div class="info-box">
            
                        <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Envíanos tus comentarios</span>
                             <span class="info-box-number">
                               <a href="#" target="_blank">info@muniguastaoya.com</a>
                             </span>
                          </div>
            
                      </div>
                       <div class="info-box">
            
                        <span class="info-box-icon bg-green"><i class="fa fa-university" aria-hidden="true"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Alcalde Municipal 2016-2024</span>
                               <span class="info-box-number">Jorge Antonio Orellana Pinto</span>
                          </div>
            
                      </div>

                    </div>

                  </div>';
                }

                ?>
               </div>

            </section>
           
          </div>
        
