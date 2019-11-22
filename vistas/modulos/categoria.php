<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Categorías
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Categoría</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
  <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoría"> Agregar Categoría</button>

      </div>

        <div class="box-body" >

          <table class="table table-bordered table-striped dt-responsive tablas" >

             <thead>

                  <tr>
                      <th style="width: 10px">#</th>
                      <th>Categoría</th>
                      <th>Acciónes</th>

                  </tr>

              </thead>

            <tbody>

            <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                 
                  echo ' <tr>

                          <td>'.($key+1).'</td>

                          <td class="text-uppercase">'.$value["categoria"].'</td>

                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>

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

  <!--=============================================
  =           Modal           =
  =============================================-->
<div id="modalAgregarCategoría" class="modal fade" role="dialog">
  <div class="modal-dialog">
  

    <div class="modal-content">

      <form role="form" method="post">

      <!--=============================================
        =           Cabecera del Modal           =
        =============================================-->

      <div class="modal-header" style="background:#00a65a; color: white; ">

        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Categoría</h4>
      </div>

        <!--=============================================
          =           Cuerpo del Modal           =
          =============================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- entrada del empleado -->

          <div class="form-group">

            <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoría" required>

            </div>
            
          </div>
          
        </div>

      </div>

        <!--=============================================
          =           Pie del Modal           =
          =============================================-->

          <div class="modal-footer">

             <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Cerrar</button>

             <button type="submit" class="btn btn-success pull-right">Guardar</button>

          </div>

          <?php 

            $crearCategoria = new ControladorCategorias();
            $crearCategoria -> ctrCrearCategoria();


           ?>

        </form>

      </div>

    </div>

  </div>

  <!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-dsuccess pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-success">Guardar cambios</button>

        </div>

      <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>
