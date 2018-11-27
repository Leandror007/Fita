<?php include "../corpo/corpo.php";  ?>

<?php

include "../db_connect.php";

include "Interacao.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);


$lista = array();
$dens = array();
$cor = array();

$i = 0;

$sql = "SELECT ambiente, COUNT(ambiente) AS total FROM tbfitabackup GROUP BY ambiente ORDER BY COUNT(ambiente)";
//$sql = "SELECT * FROM tbl_total";
$resultado = mysql_query($sql);
while($row = mysql_fetch_object($resultado)){

   $ambiente = $row->ambiente;
   $total  = $row->total;

   $ambientes[$i] = $ambiente;
   $totais[$i] =  $total;
   $i = $i + 1;
}

?>



          <!-- =============================================== -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tabelas
            <small>Simples</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-8">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bordered Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Ambiente</th>
                      <th>Progresso</th>
                      <th style="width: 40px">Quantidade</th>
                    </tr>
                   

<?php
  $k = $i;
    for($i = 0; $i < $k; $i++){

       echo '<tr>';
       echo '<td>'.$i.'</td>';
       echo '<td>'.$ambientes[$i].'</td>';

       if($i == 0){
           echo '<td> <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-yellow" style="width:'.$totais[$i].'%"> </div>
                  </div>
            </td>';
            echo '<td><center> <span class="badge bg-yellow">'.$totais[$i].'</span> </center></td>';

        }else if($i == 1){

          echo '<td> <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-red" style="width:'.$totais[$i].'%"> </div>
                  </div>
            </td>';
            echo '<td><center> <span class="badge bg-red">'.$totais[$i].'</span> </center></td>';

        }else if($i == 2){

          echo '<td> <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-blue" style="width:'.$totais[$i].'%"> </div>
                  </div>
            </td>';
            echo '<td><center> <span class="badge bg-blue">'.$totais[$i].'</span> </center></td>';

        }else if($i == 3){
            echo '<td> <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-green" style="width:'.$totais[$i].'%"> </div>
                  </div>
            </td>';

            echo '<td><center> <span class="badge bg-green">'.$totais[$i].'</span> </center></td>';
        

        }else if($i == 4){

          echo '<td> <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-pink" style="width:'.$totais[$i].'%"> </div>
                  </div>
            </td>';
            echo '<td><center> <span class="badge bg-pink">'.$totais[$i].'</span> </center></td>';
        
        }else if($i == 5){
            echo '<td> <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-green" style="width:'.$totais[$i].'%"> </div>
                  </div>
            </td>';

            echo '<td><center> <span class="badge bg-yellow">'.$totais[$i].'</span> </center></td>';
        }

      


        echo '</tr>';

        //echo $ambientes[$i].' - '.$totais[$i].'- '.$totais[$i].'</br>';       
      
    }
  ?>

    </table>
                </div><!-- /.box-body -->
           </div>
        </div>
    </div>

<!-- ------------------------------------------------------------------------------------------------------------------------>

 <div class="row">
            <div class="col-xs-8">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Responsive Hover Table</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>#</th>
                      <th>Ambiente</th>
                      <th>Disponivel</th>
                      <th>Em Uso</th>
                      <th>Problema</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>CSCSIMPANA</td>
                      <td><span class="label label-success"><?php echo $d1;  ?></span></td>
                      <td><span class="label label-warning"><?php echo $d2;  ?></span></td>
                      <td><span class="label label-danger"><?php echo $d3;  ?></span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>CSCBACKUPEXE</td>
                      <td><span class="label label-success"><?php echo $d4;  ?></span></td>
                      <td><span class="label label-warning"><?php echo $d5;  ?></span></td>
                      <td><span class="label label-danger"><?php echo $d6;  ?></span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>BANCOSEMEAR 238</td>
                      <td><span class="label label-success"><?php echo $d7;  ?></span></td>
                      <td><span class="label label-warning"><?php echo $d8;  ?></span></td>
                      <td><span class="label label-danger"><?php echo $d9;  ?></span></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>BANCOSEMEAR GRANJA</td>
                       <td><span class="label label-success"><?php echo $d10;  ?></span></td>
                      <td><span class="label label-warning"><?php echo $d11;  ?></span></td>
                      <td><span class="label label-danger"><?php echo $d12;  ?></span></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>IBMLTO4</td>
                      <td><span class="label label-success"><?php echo $d13;  ?></span></td>
                      <td><span class="label label-warning"><?php echo $d14;  ?></span></td>
                      <td><span class="label label-danger"><?php echo $d15;  ?></span></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>IBMLTO6</td>
                      <td><span class="label label-success"><?php echo $d16;  ?></span></td>
                      <td><span class="label label-warning"><?php echo $d17;  ?></span></td>
                      <td><span class="label label-danger"><?php echo $d18;  ?></span></td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

          <!-- /.content-wrapper -->
          <!-- ===============================================

          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.3.0
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
          </footer>

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
              <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

              <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Home tab content -->
              <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                        <p>Will be 23 on April 24th</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-user bg-yellow"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                        <p>New phone +1(800)555-1234</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                        <p>nora@example.com</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-file-code-o bg-green"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                        <p>Execution time 5 seconds</p>
                      </div>
                    </a>
                  </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Custom Template Design
                        <span class="label label-danger pull-right">70%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Update Resume
                        <span class="label label-success pull-right">95%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Laravel Integration
                        <span class="label label-warning pull-right">50%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Back End Framework
                        <span class="label label-primary pull-right">68%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                      </div>
                    </a>
                  </li>
                </ul><!-- /.control-sidebar-menu -->

              </div><!-- /.tab-pane -->
              <!-- Stats tab content -->
              <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
              <!-- Settings tab content -->
              <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                  <h3 class="control-sidebar-heading">General Settings</h3>
                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Report panel usage
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Some information about this general settings option
                    </p>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Allow mail redirect
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Other sets of options are available
                    </p>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Expose author name in posts
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Allow the user to show his name in blog posts
                    </p>
                  </div><!-- /.form-group -->

                  <h3 class="control-sidebar-heading">Chat Settings</h3>

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Show me as online
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Turn off notifications
                      <input type="checkbox" class="pull-right">
                    </label>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Delete chat history
                      <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                  </div><!-- /.form-group -->
                </form>
              </div><!-- /.tab-pane -->
            </div>
          </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->



	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	

	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js?<?php echo time(); ?>"></script>



    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <!-- SweetAlert -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="../../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="customer.js?<?php echo time(); ?>"></script>

  </body>
  </html>
