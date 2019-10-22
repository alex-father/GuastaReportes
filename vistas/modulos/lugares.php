<?php

if($_SESSION["perfil"] == "Usuario"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

    <section class="content-header">
    
        <h1>
          
          Administrar Ubicación
        
        </h1>

        <ol class="breadcrumb">
          
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          
          <li class="active">Administrar ubicación</li>
        
        </ol>

    </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-header with-border">
  
          <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarLugar">
            
            Agregar Ubicación

          </button>

        </div>

      <div class="box-body" >

          <table class="table table-bordered table-striped dt-responsive tablas" >

              <thead>

                  <tr>
                      <th style="width: 10px">#</th>
                      <th>Codigo</th>
                      <th>Municipio</th>
                      <th>Ubicación</th>
                      <th>Fecha</th>

                      <?php  

                       if($_SESSION["perfil"] =="Administrador"){

                             echo '<th>Acción</th>';
                          }

                      ?>

                  </tr>

              </thead>

                <tbody>

                  <?php

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorLugares::ctrMostrarLugares($item, $valor);

                    foreach ($usuarios as $key => $value){
             
                        echo '<tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["codigo"].'</td>
                              <td>'.$value["municipio"].'</td>
                              <td>'.$value["aldea"].'</td>
                              <td>'.$value["fecha"].'</td>';


                         if($_SESSION["perfil"] =="Administrador"){
                            
                            echo'<td>

                                      <div class="btn-group">

                                        <button class="btn btn-warning btnEditarLugar" idLugar="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarLugar"><i class="fa fa-pencil"></i></button>

                                          <button class="btn btn-danger btnEliminarLugar" idLugar="'.$value["id"].'"><i class="fa fa-times"></i></button>

                                      </div>  

                                  </td>';
                            
                                }

                    echo '</tr>';

                       }

                    ?>
                
                 </tbody>
          
             </table>

           </div>
  
        </div>

     </section>
  
   </div>

   <!--=====================================
      Modal agregar ubicación
    ======================================-->

<div id="modalAgregarLugar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Ubicacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el municipio -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoMunicipio" id="nuevaMunicipio" value="Guastatoya"placeholder="Guastatoya" readonly>

              </div>

            </div>

            <!-- Entrada para la ubicación -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaUbicacion" placeholder="Ubicación" id="nuevaUbicacion"  required>

              </div>

            </div>

            <!-- Entrada para el codigo -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar código" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-success pull-left btnCerrar" data-dismiss="modal" data-backdrop="false">Cerrar</button>

          <button type="submit" class="btn btn-success">Crear Ubicación</button>

        </div>

        <?php

        $ubicacion = new ControladorLugares();
        $ubicacion ->ctrCrearLugar();

        ?>

      </form>

    </div>

  </div>

</div>


 

    <!--=============================================
      =           Modal Editar Ubicacion        =
      =============================================-->
<div id="modalEditarLugar" class="modal fade" role="dialog">

  <div class="modal-dialog">
  
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=============================================
        =           Cabecera del Modal           =
        =============================================-->

      <div class="modal-header" style="background:#00a65a; color: white; ">

        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Ubicación</h4>
      </div>

        <!--=============================================
          =           Cuerpo del Modal           =
          =============================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- Ver municipio -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="editarMunicipio"  name="editarMunicipio" value="" readonly>
              <input type="hidden"  name="idMunicipio" id="idMunicipio" required>

            </div>
            
          </div>

          <!-- Ver ubicación -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

              <input type="text" class="form-control input-lg" id="editarUbicacion"  name="editarUbicacion" value="" required>
              <input type="hidden"  name="idUbicacion" id="idUbicacion" required>
              
            </div>

          </div>

          <!-- Ver codigo -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

              <input type="text" class="form-control input-lg"   id="editarCodigo" name="editarCodigo" value="" required>
              <input type="hidden"  name="idCodigo" id="idCodigo" required>             
              
            </div>
            
          </div>
          
        </div> 

      </div>

        <!--=============================================
          =           Pie del Modal           =
          =============================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-success pull-left btnCerrar" data-dismiss="modal">Cerrar</button>

        <button type="submit" class="btn btn-success pull-right">Actualizar</button>

      </div>


      <?php 

        $editarUbicacion = new ControladorLugares();
        $editarUbicacion ->ctrEditarLugar();


      ?>

          </form>

      </div>

    </div>

  </div>

    <?php 

      $borrarUbicacion = new ControladorLugares();
      $borrarUbicacion ->ctrBorrarLugar();

     ?>

   