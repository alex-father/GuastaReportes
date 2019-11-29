<div id="back"></div>

    <div class="login-box" >

      <img src="vistas/img/plantilla/login.png" class="img-responsive">

        <div class="login-box-body">

            <p class="login-box-msg">ADMINISTRACION</p>

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

                 </div>

              <?php

              $login = new ControladorEmpleados();
              $login -> ctrIngresoEmpleado();


              ?>
              
          </form>

       </div>

    </div>




