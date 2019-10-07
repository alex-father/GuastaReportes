<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar reportes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar reportes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarReporte">
          
          Agregar Reporte

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaReportes">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Usuario</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Lugar</th>
           <th>Estado</th>
           <th>Agregado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       <!-- <tbody>

          <?php 

          $item = null;
          $valor = null;

            $reportes = ControladorReportes::ctrMostrarReportes($item, $valor);


            foreach ($reportes as $key => $value) {


              echo '<tr>
                        <td>'.($key+1).'</td>
                        <td><img src="vistas/img/reportes/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>'.$value["codigo"].'</td>
                        <td>'.$value["descripcion"].'</td>';

                        $item = "id";
                        $valor = $value["id_categoria"];

                        $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);



                    echo ' <td>'.$categoria["categoria"].'</td>
                          
                           <td>'.$value["lugar"].'</td>';



                   if($value["estado"] != 0){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idReporte="'.$value["id"].'" estadoReporte="0">Activado</button></td>';

                  }
                    else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idReporte="'.$value["id"].'" estadoReporte="1">Desactivado</button></td>';

                  }
                       
                       echo ' <td>'.$categoria["fecha"].'</td>
                        <td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>

                      </tr>';
              # code...
            }


           ?>

        </tbody>-->

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR Reporte
======================================-->

<div id="modalAgregarReporte" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Reporte</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">  

            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php 

                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {
                      

                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                      }

                   ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo" placeholder="Codigo Categoria" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL Usuario -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <?php 

                   $usuario = $_SESSION["usuario"];

                   echo' <input type="text" class="form-control input-lg" name="usuario" id="usuario" placeholder="'.$_SESSION["usuario"].'" readonly>'


                 ?>

               

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR LUGAR -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg" name="nuevaCategoria">
                  
                  <option value="">Selecionar Barrio o Aldea</option>
                  <?php 

                    $item = null;
                    $valor = null;

                    $ubicacion = ControladorLugares::ctrMostrarLugares($item, $valor);

                    foreach ($ubicacion as $key => $value) {

                      echo '<option value="'.$value["codigo"].'">'.$value["aldea"].'</option>';

                      
                    }

                   ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

            <div class="form-group">

                <label for="comment">Descripción:</label>

                <textarea class="form-control" rows="4" id="descripcion" required></textarea>


            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" id="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/reportes/default/anonymous.png" class="img-thumbnail  ver" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-success">Guardar Reporte</button>

        </div>

         <?php 

          $crearReporte = new ControladorReportes();
         ?>

      </form>

    </div>

  </div>

</div>
