<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Crear Reporte Final
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Reportes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-4 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border">

            <center>
            
              <h3 class="box-title">Informacion del Reporte</h3>

            </center>

          </div>

          <form role="form" method="POST" class="formularioReporte">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL Empleado
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                    
                    <?php 
                    $idEmpleado = $_SESSION["id"];
                    $nombreEmpleado =  $_SESSION["nombre"];

                    echo ' <input type="text" class="form-control" id="nuevoEmpleado" name="nuevoEmpleado" value="'.$nombreEmpleado.'" readonly>

                            <input type="hidden" name="idEmpleado" value="'.$idEmpleado.'">';


                     ?>

                   

                  </div>

                </div> 

                <!--=====================================
                        Codigo entrada del Reporte
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php 

                    $item = null;
                    $valor = null;

                      $reportes = ControladorCrearReportes::ctrMostrarCrearReportes($item, $valor);


                      if(!$reportes){

                        echo '<input type="text" class="form-control" id="nuevoReporteCreado" name="nuevoReporteCreado" value="1000" readonly>';


                      }else{

                        foreach ($reportes as $key => $value) {



                        }

                        var_dump($value["codigo"]);

                        $codigo = $value["codigo"]+ 1;

                        echo '<input type="text" class="form-control" id="nuevoReporteCreado" name="nuevoReporteCreado" value="'.$codigo.'" readonly>';


                      }

                     ?>
                    
                    
                  
                  </div>
                
                </div>


                  

                <!--=====================================
                      Entrada para agregar el Reporte
                ======================================--> 

                <div class="form-group row nuevoReporte">

                </div>



                <input type="hidden" id="listaReportes" name="listaReportes">


                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-success hidden-lg agregarReporte">Agregar Reporte</button>
                
                <br>
      
              </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-success pull-right">Crear Reporte</button>

          </div>

        </form>

        <?php 

            $crearReporte = new ControladorCrearReportes();
            $crearReporte->ctrCrearReportesUsuarios();


         ?>

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE Reportes
      ======================================-->

      <div class="col-lg-8 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-success">

          <div class="box-header with-border">
            
              <h4>Reportes</h4>

          </div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaCrearReportes">
              
               <thead>

                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Ubicacion</th>
                  <th>Codigo Reporte</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>


      </div>

    </div>
   
  </section>

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

                            <input type="file" class="nuevaFotoLogin" name="nuevaFotoLogin" >

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
