
        <div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Reportes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Reportes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-reporte">

          <button class="btn btn-success">
            
            Crear Reporte Final

          </button>

        </a>

         <button type="button" class="btn bg-orange-active color-palette pull-right" id="daterange-btn">

           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Usuario</th>
           <th>Empleado</th>
           <th>Lugar</th>
           <th>Descripción</th>
           <th>Categoria</th> 
           <th>Fecha de Reclamo</th>
           <th>Fecha de Creacion</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>


          <?php 

          $item = null;

          $valor = null;


          $respuesta = ControladorCrearReportes::ctrMostrarCrearReportes($item, $valor);


          foreach ($respuesta as $key => $value) {
            # code...
          
          echo ' <tr>

            <td>'.($key+1).'1</td>

            <td>'.$value["codigo"].'</td>

            <td>'.$value["id_usuario"].'</td>

            <td>'.$value["id_empleado"].'</td>

            <td>'.$value["lugar"].'</td>

            <td>'.$value["descripcion"].'</td>

            <td>'.$value["categoria"].'</td>

            <td>'.$value["fecha_inicio"].'</td>

            <td>'.$value["fecha"].'</td>

            <td>

              <div class="btn-group">
                  
                <button class="btn btn-info"><i class="fa fa-print"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

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


        