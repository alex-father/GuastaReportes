<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<?php

			if($_SESSION["perfil"] == "Usuario" || $_SESSION["perfil"] == "Empleado" || $_SESSION["perfil"] == "Administrador"){

			echo'<li>

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>';

		}




			if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"]== "Empleado"){

		echo '<li>

				<a href="categoria">

					<i class="fa fa-th"></i>
					<span>Categorías</span>

				</a>

			</li>
			<li>

				<a href="lugares">

					<i class="fa fa-map-marker"></i>
					<span>Ubicaciones</span>

				</a>

			</li>
			<li>

				<a href="empleados">

					<i class="fa fa-users"></i>
					<span>Empleados</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-users"></i>
					<span>Usuarios</span>

				</a>

			</li>';

		}


		if($_SESSION["perfil"] == "Usuario"){

			echo '<li>

				<a href="reporte-usuario">

					<i class="fa fa-pencil-square-o"></i>
					<span>Reportes de Usuarios</span>

				</a>

			</li>';
		}





		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"]== "Empleado"){


			echo '<li>

						<a href="reporte-admin">
							
							<i class="fa fa-clipboard"></i>
							<span>Reportes</span>

						</a>

					</li>

					<li>

						<a href="reportes">
							
							<i class="fa fa-pencil-square-o"></i>
							<span>Administrar Reportes</span>

						</a>

					</li>

					<li>

						<a href="crear-reporte">
							
							<i class="fa  fa-pie-chart"></i>
							<span>Crear Reportes</span>

						</a>

					</li>';

				}

				?>

				</ul>

			</li>

		</ul>


		<script>

			var url = window.location;
			$('ul.sidebar-menu a').filter(function() 
			{
				return this.href == url;

			}).parent().addClass('active');

			
		</script>

	 </section>

</aside>