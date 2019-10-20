<div class="content-wrapper">

  <section class="content-header">

  </section>

  <section class="content">

    <center>

    <div class="row">
      
      
    

        
        <div class="col-ms-8 col-ms-offset-2"></div>
           
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

     
            
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDOS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
        <!-- /.col -->
     </div>

     
      <!-- /.row -->
      <!-- END ACCORDION & CAROUSEL-->
               </div>
               </center>

            </section>
           
          </div>
        
