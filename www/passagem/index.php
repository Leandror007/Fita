<?php include "../corpo/corpo.php";  ?>

<script>
  function alterar(id){       
    window.open('notas.php?id='+id, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=170, WIDTH=780, HEIGHT=580')+id;
  }

</script>

  <!-- =============================================== -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Sistema de Fitas
                <small>Registro</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Fitas</a></li>
              </ol>
            </section>

            <!-- ========================================================================================================== -->
            <!-- Main content -->


	  <section class="content">
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
			<div class="col-md-12">	

				<div class="removeMessages"></div>

				<button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Adicionar Fita
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr>
							<th>#</th>
              <th>Aplicação</th>                         
              <th>Cliente</th>
              <th>Host</th>  
              <th>Chamado</th>
              <th>SO</th>    
              <th>Data</th>              
              <th>Status</th>
              <th>Opcao</th>
              
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Adicionar</h4>
	      </div>
	      
	     <form class="form-horizontal" action="acao/adicionar.php" method="POST" id="createMemberForm">

        <div class="modal-body">
          <div class="messages"></div>

          <div class="form-group">
          <label for="aplbackup" class="col-sm-2 control-label">Aplicação</label>
          <div class="col-sm-3">
            <select class="form-control" name="aplbackup" id="aplbackup">
              <option value="">~~~~~~ SELECIONE ~~~~~~</option>
              <option value="CommVault Simpana">CommVault Simpana</option>
              <option value="Backup Exec">Backup Exec</option>
              <option value="HP Data Protector">HP Data Protector</option>
              <option value="Net Backup">Net Backup </option>
            </select>
          </div>
        </div> 

         <div class="form-group">
          <label for="cliente" class="col-sm-2 control-label">Cliente</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente">
          </div>
         

         <div class="form-group">
          <label for="host" class="col-sm-1 control-label">Host</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="host" name="host" placeholder="Host">
          </div>
        </div> 

        </div>

         <div class="form-group">
          <label for="nmrotina" class="col-sm-2 control-label">Nome da Shedule</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="nmrotina" name="nmrotina" placeholder="Nome da Shedule">
          </div>
           

        <div class="form-group">
          <label for="chamado" class="col-sm-1 control-label">Chamado</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="chamado" name="chamado" placeholder="Chamado">
          </div>
        </div>
        </div>    

        <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="tiposo" class="col-sm-2 control-label">SO</label>
          <div class="col-sm-4">             
        <select class="form-control" id="tiposo" name="tiposo">
              <option value="">~~~~~~ SELECIONE ~~~~~~</option>
              <option value="Windows">Windows</option>
              <option value="Linux">Linux</option>
              <option value="Banco">Banco</option>              
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="barcode" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Texto ..."></textarea>
          </div>
        </div>

         <div class="form-group">
          <label for="data" class="col-sm-2 control-label">Data</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="data" name="data" placeholder="data">
          </div>
       

        <div class="form-group">
          <label for="hora" class="col-sm-1 control-label">Hora</label>
          <div class="col-sm-4">
            <input type="time" class="form-control" id="hora" name="hora" placeholder="hora">
          </div>
        </div>  
         </div>  

         <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="_status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-4">             
        <select class="form-control"id="_status" name="_status">
              <option value="">~~ SELECIONE ~~</option>
               <option value="Em Atendimento">Em Atendimento</option>
              <option value="Aguardando Atendimento">Aguardando Atendimento</option>             
              <option value="Aguardando Algar">Aguardando Algar</option> 
              <option value="Aguardando Cliente">Aguardando Cliente</option>
              <option value="Resolvido">Resolvido</option>               
            </select>
          </div>
        </div>
                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar Registro</button>
        </div>
        </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remover Fita</h4>
	      </div>
	      <div class="modal-body">
	        <p>Você realmente deseja remover ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Salvar Alterações</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->





	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Editar Fita</h4>
	      </div>

		<form class="form-horizontal" action="acao/atualizar.php" method="POST" id="updateMemberForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group">
          <label for="editaplbackup" class="col-sm-2 control-label">Aplicação</label>
          <div class="col-sm-3">
            <select class="form-control" name="editaplbackup" id="editaplbackup">
              <option value="">~~ SELECIONE ~~</option>
              <option value="CommVault Simpana">CommVault Simpana</option>
              <option value="Backup Exec">Backup Exec</option>
              <option value="HP Data Protector">HP Data Protector</option>
              <option value="Net Backup">Net Backup </option>
            </select>
          </div>
        </div> 

			  <div class="form-group">
			    <label for="editcliente" class="col-sm-2 control-label">Cliente</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="editcliente" name="editcliente" placeholder="Cliente">
			    </div>
			  

			  <div class="form-group">
			    <label for="edithost" class="col-sm-1 control-label">Host</label>
			    <div class="col-sm-4">
			       <input type="text" class="form-control" id="edithost" name="edithost" placeholder="Host">
			    </div>
			  </div>
        </div>

         <div class="form-group">
          <label for="editnmrotina" class="col-sm-2 control-label">Rotina</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="editnmrotina" name="editnmrotina" placeholder="Rotina">
          </div>
           

        <div class="form-group">
          <label for="editchamado" class="col-sm-1 control-label">Chamado</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="editchamado" name="editchamado" placeholder="Chamado">
          </div>
        </div>
        </div>    

        <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="edittiposo" class="col-sm-2 control-label">SO</label>
          <div class="col-sm-4">             
        <select class="form-control" id="edittiposo" name="edittiposo">
              <option value="">~~ SELECIONE ~~</option>
              <option value="Windows">Windows</option>
              <option value="Linux">Linux</option>
              <option value="Banco">Banco</option>              
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="editdescricao" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="editdescricao" name="editdescricao" rows="3" placeholder="Texto ..."></textarea>
          </div>
        </div>

         <div class="form-group">
          <label for="editdata" class="col-sm-2 control-label">Data</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="editdata" name="editdata" placeholder="Data">
          </div>
       

        <div class="form-group">
          <label for="edithora" class="col-sm-1 control-label">Hora</label>
          <div class="col-sm-4">
            <input type="time" class="form-control" id="edithora" name="edithora" placeholder="hora">
          </div>
        </div>  
         </div>  

         <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="edit_status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-4">             
        <select class="form-control"id="edit_status" name="edit_status">
              <option value="">~~ SELECIONE ~~</option>
               <option value="Em Atendimento">Em Atendimento</option>
              <option value="Aguardando Atendimento">Aguardando Atendimento</option>             
              <option value="Aguardando Algar">Aguardando Algar</option> 
              <option value="Aguardando Cliente">Aguardando Cliente</option>
              <option value="Resolvido">Resolvido</option>               
            </select>
          </div>
        </div>
             
		 		
	      </div>
	      <div class="modal-footer editMemberModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->




<!-- view modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="viewMemberModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-eye-open"></span> Visualizar Registro</h4>
        </div>

    <form class="form-horizontal" action="#" method="POST" id="updateMemberForm">       

        <div class="modal-body">
            
          <div class="edit-messages"></div>

         <div class="form-group">
          <label for="viewaplbackup" class="col-sm-2 control-label">Aplicação</label>
          <div class="col-sm-3">
           <input type="text" class="form-control" id="viewaplbackup" name="viewaplbackup" readonly="readonly" placeholder="Cliente">
          </div>
        </div> 

        <div class="form-group">
          <label for="viewcliente" class="col-sm-2 control-label">Cliente</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="viewcliente" name="viewcliente" readonly="readonly" placeholder="Cliente">
          </div>
        

        <div class="form-group">
          <label for="viewhost" class="col-sm-1 control-label">Host</label>
          <div class="col-sm-4">
             <input type="text" class="form-control" id="viewhost" name="viewhost" readonly="readonly" placeholder="Host">
          </div>
        </div>
        </div>

         <div class="form-group">
          <label for="viewnmrotina" class="col-sm-2 control-label">Rotina</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="viewnmrotina" name="viewnmrotina" readonly="readonly" placeholder="Rotina">
          </div>
           

        <div class="form-group">
          <label for="viewchamado" class="col-sm-1 control-label">Chamado</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="viewchamado" name="viewchamado" readonly="readonly" placeholder="Chamado">
          </div>
        </div>
        </div>    

        <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="viewtiposo" class="col-sm-2 control-label">SO</label>
          <div class="col-sm-4">   
          <input type="text" class="form-control" id="viewtiposo" name="viewtiposo" readonly="readonly" placeholder="Chamado">          
       
          </div>
        </div>
        <div class="form-group">
          <label for="viewdescricao" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="viewdescricao" name="viewdescricao" rows="3" placeholder="Texto ..."></textarea>
          </div>
        </div>

         <div class="form-group">
          <label for="viewdata" class="col-sm-2 control-label">Data</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="viewdata" name="viewdata" placeholder="Data">
          </div>
       

        <div class="form-group">
          <label for="viewhora" class="col-sm-1 control-label">Hora</label>
          <div class="col-sm-4">
            <input type="time" class="form-control" id="viewhora" name="viewhora" placeholder="hora">
          </div>
        </div>  
         </div>  

         <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="view_status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-4"> 
            <input type="text" class="form-control" id="view_status" name="view_status" placeholder="Status">      
       
          </div>
        </div>
 
        </div>
        <div class="modal-footer viewMemberModal">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
         
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /view modal -->





  </div><!-- /.content-wrapper -->

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
