// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "acao/retrieve.php",
		"order": []
	});

	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var aplbackup    = $("#aplbackup").val();
			var cliente 	 = $("#cliente").val();
			var host 		 = $("#host").val();
			var nmrotina     = $("#nmrotina").val();
			var chamado 	 = $("#chamado").val();
			var tiposo 		 = $("#tiposo").val();
			var descricao    = $("#descricao").val();
			var data 	     = $("#data").val();
			var hora 		 = $("#hora").val();
			var _status  	 = $("#_status").val();




			if(aplbackup == "") {
				$("#aplbackup").closest('.form-group').addClass('has-error');
				$("#aplbackup").after('<p class="text-danger">The aplbackup field is required</p>');
			} else {
				$("#aplbackup").closest('.form-group').removeClass('has-error');
				$("#aplbackup").closest('.form-group').addClass('has-success');				
			}

			if(cliente == "") {
				$("#cliente").closest('.form-group').addClass('has-error');
				$("#cliente").after('<p class="text-danger">The cliente field is required</p>');
			} else {
				$("#cliente").closest('.form-group').removeClass('has-error');
				$("#cliente").closest('.form-group').addClass('has-success');				
			}

			if(host == "") {
				$("#host").closest('.form-group').addClass('has-error');
				$("#host").after('<p class="text-danger">The host field is required</p>');
			} else {
				$("#host").closest('.form-group').removeClass('has-error');
				$("#host").closest('.form-group').addClass('has-success');				
			}

			if(_status == "") {
				$("#_status").closest('.form-group').addClass('has-error');
				$("#_status").after('<p class="text-danger">The _status field is required</p>');
			} else {
				$("#_status").closest('.form-group').removeClass('has-error');
				$("#_status").closest('.form-group').addClass('has-success');				
			}

			if(aplbackup && cliente && host && _status) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});


function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'acao/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}



function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'acao/registro.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editaplbackup").val(response.aplbackup);
				$("#editcliente").val(response.cliente);
				$("#edithost").val(response.host);

				$("#editnmrotina").val(response.nmrotina);
				$("#editchamado").val(response.chamado);
				$("#edittiposo").val(response.tiposo);
				$("#editdescricao").val(response.descricao);
				$("#editdata").val(response.data);
				$("#edithora").val(response.hora);




				$("#edit_status").val(response._status);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					var editaplbackup 	 = $("#editaplbackup").val();
					var editcliente 	 = $("#editcliente").val();
					var edithost 		 = $("#edithost").val();
					var edit_status 	 = $("#edit_status").val();

					if(editaplbackup == "") {
						$("#editaplbackup").closest('.form-group').addClass('has-error');
						$("#editaplbackup").after('<p class="text-danger">Assunto não pode ser vazio!</p>');
					} else {
						$("#editaplbackup").closest('.form-group').removeClass('has-error');
						$("#editaplbackup").closest('.form-group').addClass('has-success');				
					}

				/*	if(editobs == "") {
						$("#editobs").closest('.form-group').addClass('has-error');
						$("#editobs").after('<p class="text-danger">The Address field is required</p>');
					} else {
						$("#editobs").closest('.form-group').removeClass('has-error');
						$("#editobs").closest('.form-group').addClass('has-success');				
					}

					if(editcodencerramento == "") {
						$("#editcodencerramento").closest('.form-group').addClass('has-error');
						$("#editcodencerramento").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#editcodencerramento").closest('.form-group').removeClass('has-error');
						$("#editcodencerramento").closest('.form-group').addClass('has-success');				
					}
*/
					if(edit_status == "") {
						$("#edit_status").closest('.form-group').addClass('has-error');
						$("#edit_status").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#edit_status").closest('.form-group').removeClass('has-error');
						$("#edit_status").closest('.form-group').addClass('has-success');				
					}

					if(editaplbackup && edit_status) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}





function viewMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");
		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'acao/registro.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				
				$("#viewaplbackup").val(response.aplbackup);
				$("#viewcliente").val(response.cliente);
				$("#viewhost").val(response.host);

				$("#viewnmrotina").val(response.nmrotina);
				$("#viewchamado").val(response.chamado);
				$("#viewtiposo").val(response.tiposo);
				$("#viewdescricao").val(response.descricao);
				$("#viewdata").val(response.data);
				$("#viewhora").val(response.hora);	
				$("#view_status").val(response._status);	
					

				// mmeber id 
				$(".viewMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var viewaplbackup = $("#viewaplbackup").val();				
					var view_status   = $("#view_status").val();

				
					if(view_status == "") {
						$("#view_status").closest('.form-group').addClass('has-error');
						$("#view_status").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#view_status").closest('.form-group').removeClass('has-error');
						$("#view_status").closest('.form-group').addClass('has-success');				
					}

					if(view_status) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}