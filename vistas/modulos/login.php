
<div id="back"></div>



    <div class="login-box" >

      <img src="vistas/img/plantilla/login.png" class="img-responsive">

 
        <div class="login-box-body">

            <p class="login-box-msg">Inicia sesion para comenzar</p>

          <form method="post">

                <div class="form-group has-feedback">

                  <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>

               <div class="form-group has-feedback">

              <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
     
              </div>

                <div>
             

                    <button type="submit" class="btn login_btn btn-block">Ingresar</button>


                    <a  class="btn login_btn btn-block" data-toggle="modal" data-target="#modalRegistroUsuario">Registrarse</a>
              
               </div>

                  

              <?php

             

              $login = new ControladorUsuarios();
              $login -> ctrIngresoUsuario();


              ?>



          </form>

          <center>

          <h4><a href="indexAdmin.php" class="text-center" color="">Acceso administrativo</a>
          </h4>

          </center>

       </div>



        </div>



    </div>


<!--=============================================
  =           Modal           =
  =============================================-->
<div id="modalRegistroUsuario" class="modal fade" role="dialog">
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

                      <span class="input-group-addon"><i class="fa fa-key"></i></span>

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

                      <span class="input-group-addon"><i class="fa fa-key"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoNumero" id="nuevoNumero" 
                      placeholder="Ingresar su número" >
                      
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


              $crearUsuarioLogin = new ControladorUsuarios();
              $crearUsuarioLogin -> ctrCrearUsuarioLogin();

               ?>
