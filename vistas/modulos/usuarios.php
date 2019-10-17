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
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalCrearUsuario">
          
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

  !--=============================================
  =           Modal           =
  =============================================-->
<div id="modalCrearUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
  

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=============================================
        =           Cabecera del Modal           =
        =============================================-->

          <div class="modal-header" style="background:#00a65a; color: white; ">

            <button type="button " class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title ">Registrarse</h4>
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

                      <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                    </div>
                    
                  </div>

                  <!-- entrada del usuario -->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoUsuario"
                       id="nuevoUsuario" placeholder="Ingresar usuario" required>
                      
                    </div>
                    
                  </div>

                  <!-- entrada del la contraseña -->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                      <input type="password" class="form-control input-lg" name="nuevoPassword"
                       placeholder="Ingresar contraseña" required>
                      
                    </div>
                    
                  </div>

                  <!-- entrada del usuario -->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-mobile fa-lg"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoNumero" id="nuevoNumero" 
                      placeholder="Ingresar su número" >
                      
                    </div>
                    
                  </div>
                  <!-- entrada del email -->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoEmail" id="nuevoEmail" 
                      placeholder="Ingresar su email" >
                      
                    </div>
                    
                  </div>

                  <!-- entrada del dpi -->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-code"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoDpi" id="nuevoDpi" 
                      placeholder="Ingresa tu DPI por seguridad" >
                      
                    </div>
                    
                  </div>

                  

                  <!-- entrada para seleccionar el perfil -->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <select class="form-control input-lg" name="nuevoPerfil">

                          <option value="Usuario">Usuario</option>

                        </select>
                      
                    </div>
                    
                  </div>

                        <div class="form-group">
                      
                            <div class="panel">Subir Foto</div>

                            <input type="file" class="nuevaFotoLogin" name="nuevaFotoLogin" required>

                              <p class="help-block">Peso maximo de la foto 200MB</p>


                              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail visualizar" width="100px">



                        </div>
                  
                    </div>

                </div>

          <!--=============================================
          =           Pie del Modal           =
          =============================================-->

                <div class="modal-footer">

                  <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Cerrar</button>

                  <button type="submit" class="btn btn-success pull-right">Registrarser</button>

                </div>

            </form>

        </div>
        

      </div>

  </div>
              <?php 


              $crearUsuario = new ControladorUsuarios();
              $crearUsuario-> ctrCrearUsuario();
               ?>



    <!--=============================================
  =           Modal Editar Empleado         =
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

              <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
              
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

                  <option id="editarPerfil" value=""></option>

                  <option value="Usuario">Usuario</option>

                  
                  

                </select>
              
            </div>
            
          </div>

                <div class="form-group">
              
                    <div class="panel">Subir Foto</div>

                    <input type="file" class="nuevaFotoUsuario" name="editarFoto">

                      <p class="help-block">Peso maximo de la foto 2MB</p>

                      <img src="vistas/img/empleados/default/anonymous.png" class="img-thumbnail visualizar" width="100px">
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
                $editarUsuario->ctrEditarUsuario();



                ?>

               


            </form>

        </div>

      </div>

    </div>

 


    <?php

    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario -> ctrBorrarUsuario();


    ?>