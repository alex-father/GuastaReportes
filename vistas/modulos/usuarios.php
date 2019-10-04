<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-header with-border">
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar usuario

        </button>

      </div>

      <div class="box-body" >

          <table class="table table-bordered table-striped dt-responsive tablas" >

              <thead>

                  <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Foto</th>
                      <th>Perfirl</th>
                      <th>estado</th>
                      <th>Ultimo Login</th>

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

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                foreach ($usuarios as $key => $value){
         
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                    }
                    else  {

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                    }

                   echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                    echo '<td>'.$value["ultimo_login"].'</td>';


                     if($_SESSION["perfil"] =="Administrador"){
                            
                            echo'<td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Empleado">Empleado</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail visualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-success pull-left btnCerrar" data-dismiss="modal" data-backdrop="false">Cerrar</button>

          <button type="submit" class="btn btn-success">Crear Empleado</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>


 

    <!--=============================================
  =           Modal Editar Usiario         =
  =============================================-->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
  

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=============================================
        =           Cabecera del Modal           =
        =============================================-->

      <div class="modal-header" style="background:#00a65a; color: white; ">

        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Usuarios</h4>
      </div>

        <!--=============================================
          =           Cuerpo del Modal           =
          =============================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- entrada del empleado -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

            </div>
            
          </div>
          <!-- entrada del usuario -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

              <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" required>
              
            </div>

          </div>

          <!-- entrada del la contraseña -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

              <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Ingresar nueva contraseña" required>
              <input type="hidden" id="passwordActual" name="passwordActual">
              
            </div>
            
          </div>

          <!-- entrada para seleccionar el perfil -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Empleado">Empleado</option>

                  <option value="Usuario">Usuario</option>
                  

                </select>
              
            </div>
            
          </div>

                <div class="form-group">
              
                    <div class="panel">Subir Foto</div>

                    <input type="file" class="nuevafoto" name="editarFoto">

                      <p class="help-block">Peso maximo de la foto 2MB</p>

                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                      <input type="hidden" name="fotoActual" id="fotoActual">

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

                $editarUsuario = new ControladorUsuarios();
                $editarUsuario -> ctrEditarUsuario();

                ?>

            </form>

        </div>

      </div>

    </div>

    <?php

    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario -> ctrBorrarUsuario();


    ?>