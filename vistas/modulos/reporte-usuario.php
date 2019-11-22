

<div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        
        Tus Reportes
      
      </h1>

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar tu reportes</li>
      
      </ol>

    </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalReportesUsuario">
          
          Agregar Reporte

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
           <tr>
             
             <th style="width:10px">#</th>
             <th>Imagen</th>
             <th>Categoria</th>
             <th>Lugar</th>
             <th>Usuario</th>
             <th>Descripción</th>
             <th>Estado</th>
             <th>Agregado</th>
             <th>Ver Reporte</th>

           </tr> 

        </thead>

       <tbody>

          <?php 

          $item = "usuario";
          $valor = $_SESSION["usuario"];

            $reportes = ControladorReportesUsuarios::ctrMostrarReportesUsuarios($item, $valor);

            foreach ($reportes as $key => $value) {

              
              $imagen = "<a href='".$reportes[$key]["imagen"]."' download><img src='".$reportes[$key]["imagen"]."' width='100' height='120'></a>";

        
              echo '<td>'.($key+1).'</td>
                    <td>'.$imagen.'</td>';

                        $item = "id";
                        $valor = $value["id_categoria"];

                        $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              echo '<td>'.$categoria["categoria"].'</td>
                    <td>'.$value["lugar"].'</td>
                    <td>'.$value["usuario"].'</td>
                    <td>'.$value["descripcion"].'</td>';



                  
                  if($value["estado"] == 1){

                        echo '<td><button class="btn btn-warning btn-xs " readonly idReporte="'.$value["id"].'" estadoReporte="2">En Proceso</button></td>';

                  }else if ($value["estado"] == 2){


                        echo '<td><button class="btn btn-success btn-xs " readonly idReporte="'.$value["id"].'" estadoReporte="0">Finalizado</button></td>';


                   }else{ echo '<td><button class="btn btn-danger btn-xs " readonly idReporte="'.$value["id"].'" estadoReporte="1">Verificando</button></td>';

                  }
                       
                        echo '<td>'.$value["fecha"].'</td>

                              <td>

                                 <div>

                                   <button class="btn btn-warning btnEditarReporte" idReporte="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarReporte"><i class="fa fa-search-plus"></i>

                                   </button>

                                 </div>
                              
                              </td>

                       </tr>';
              
                  }


                ?>

            </tbody>

          </table>

        </div>

      </div>

    </section>

  </div>

      <!--=====================================
      Modal agregar reporte
      ======================================-->

<div id="modalReportesUsuario" class="modal fade" role="dialog">
  
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

                <select class="form-control input-lg" name="nuevaCategoriaUsuario" id="nuevaCategoriaUsuario" required>
                  
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

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL Usuario -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <?php 

                   $usuario = $_SESSION["usuario"];

                   echo'<input type="text" class="form-control input-lg" name="usuario" value="'.$_SESSION["usuario"].'" placeholder="'.$_SESSION["usuario"].'" readonly>'


                 ?>

               </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR LUGAR -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg" name="nuevoLugar">
                  
                  <option value="">Selecionar Barrio o Aldea</option>

                  <?php 

                    $item = null;
                    $valor = null;

                    $ubicacion = ControladorLugares::ctrMostrarLugares($item, $valor);

                    foreach ($ubicacion as $key => $value) {

                      echo '<option value="'.$value["aldea"].'">'.$value["aldea"].'</option>';

                      
                    }

                   ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

            <div class="form-group">

                <label for="comment">Descripción:</label>

                <textarea class="form-control" rows="4" id="nuevaDescripcion" name="nuevaDescripcion" required></textarea>


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

          <button type="submit" class="btn btn-success">Crear Reporte</button>

        </div>

         <?php 

          $crearReporte = new ControladorReportesUsuarios();
          $crearReporte ->ctrCrearReportes();
          $bitacora = new ControladorBitacoraReportes();
          $bitacora -> ctrCrearBitacoraReportes();

         ?>

      </form>

    </div>

  </div>

</div>

      <!--=====================================
      =            Visualizar Reporte Creado         =
      ======================================-->

<div id="modalEditarReporte" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
             CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Reporte</h4>

        </div>

        <!--=====================================
              CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">  

            <!-- Ver Categoria -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                  
                   <input class="form-control input-lg" name="editarCategoria" readonly id="editarCategoria"></input>

                </select>

              </div>

            </div>

            <!-- Ver codigo -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo"  readonly>

              </div>

            </div>

            <!--Ver Usuario -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                 <input type="text" class="form-control input-lg" name="editarUsuario"  id="editarUsuario" readonly>

               

              </div>

            </div>

            <!-- Ver Ubicacion -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                
                  
                  <input class="form-control input-lg" name="editarUbicacion" readonly id="editarUbicacion"></input>

                

              </div>

            </div>

            <!--Ver Descripción -->

            <div class="form-group">

                <label for="comment">Descripción:</label>

                <textarea class="form-control" rows="4" id="editarDescripcion" name="editarDescripcion" readonly></textarea>


            </div>

            <!-- Ver foto -->

             <div class="form-group " readonly>
              
              <div class="panel" readonly>VER IMAGEN</div>

              <p class="help-block">Imagen del Reporte</p>

              <img src="vistas/img/reportes/default/anonymous.png" class="img-thumbnail  verimagen" width="100px" readonly>
              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
               PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Cerrar</button>

        </div>

      </form>

    </div>

  </div>

</div>

