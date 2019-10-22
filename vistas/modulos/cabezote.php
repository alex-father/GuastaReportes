 <header class="main-header">
 	
			<!--=====================================
			LOGOTIPO
			======================================-->

			<a href="inicio" class="logo">
				
				<!-- logo mini -->
				<span class="logo-mini">
					
					<img src="vistas/img/plantilla/logo-muni1.png" class="img-responsive" style="padding:10px">

				</span>

				<!-- logo normal -->

				<span class="logo-lg">
					
					<img src="vistas/img/plantilla/logo-cabezote.png" class="img-responsive" style="padding: 10px 0px">

				</span>

			</a>
	

			<!--=====================================
			BARRA DE NAVEGACIÓN
			======================================-->
			<nav class="navbar navbar-static-top" role="navigation">
		
			<!-- Botón de navegación -->

			 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		        	
		        	<span class="sr-only">Toggle navigation</span>
		      	
		      	</a>

				<!-- perfil de usuario -->

					<div class="navbar-custom-menu">
							
						<ul class="nav navbar-nav">

							
							<li class="dropdown user user-menu">
								
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">

								<?php 

									if($_SESSION["foto"] != ""){

										echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

								} else {


									echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
								}

									?>


									<span class="hidden-md">

										<?php  echo $_SESSION["nombre"];


										?> 

									</span>

								</a>

								<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
			              <!-- User image -->
			              <li class="user-header">

			              	<?php 

									if($_SESSION["foto"] != ""){

										$item = "id";
										$valor = $_SESSION["id"];

										$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

										if($respuesta == false){

											$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);
										}

										$fecha = substr($respuesta["fecha"],0,10);


										$fechaLetras = ControladorUsuarios::ctrfechaCastellano ($fecha);


										echo '<img src="'.$_SESSION["foto"].'" class="img-circle" alt="User Image">
												<p>
			                 					'.$_SESSION["nombre"].' - '.$_SESSION["perfil"].'
			                 					 <small>Miembro desde '.$fechaLetras.'</small>
			                					</p>';

								} else {


									echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
								}

									?>

			                
			              </li>
			              <!-- Menu Body -->
			              <li class="user-body">

			                <div class="row">
			                 
			                 <center>
			                  	<div class="col-lg-12 text-right">

			                 		<a href="salir" class="btn btn-primary">Salir  <i class="fa fa-sign-out"></i></a>

			               	 	</div>

			               	 </center>

			                </div>

			              </li>
			             

			          </ul>

					</li>

				</ul>

			</div>

		</nav>

 </header>