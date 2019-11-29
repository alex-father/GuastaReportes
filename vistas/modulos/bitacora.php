<?php

if($_SESSION["perfil"] == "Usuario"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

  }

?>

<div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        
        Bitácoras de Reportes
      
      </h1>

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Bitácoras</li>
      
      </ol>

    </section>

  <section class="content">

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
             <th>Agregado</th>

             <?php  

             if($_SESSION["perfil"] =="Administrador"){ 

             echo '<th>Accion</th>';

              }

              ?>

           </tr> 

        </thead>

       <tbody>

          <?php 

          $item = "usuario";
          $valor = null;

            $reportes = ControladorBitacoraReportes::ctrMostrarBitacoraReportes($item, $valor);

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
                       
                        echo '<td>'.$value["fecha"].'</td>';

                              if($_SESSION["perfil"] =="Administrador"){

                                 echo '<td>

                          <div class="btn-group">

                               <button class="btn btn-danger btnEliminarBitacora" idBitacora="'.$value["id"].'" imagen="'.$value["imagen"].'" codigo="'.$value["codigo_reporte"].'"><i class="fa fa-times"></i></button>

                          </div>  

                             </td>';
                              }

                    echo '  </tr>';
              
                  }


                ?>

            </tbody>

          </table>

        </div>

      </div>

    </section>

  </div>

        <?php 

          $eliminarBitacora = new ControladorBitacoraReportes();
          $eliminarBitacora ->ctrEliminarReporteBitacora();



         ?>

      