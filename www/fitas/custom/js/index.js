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
			var ambiente     = $("#ambiente").val();
			var barcode 	 = $("#barcode").val();
			var dtutilizacao = $("#dtutilizacao").val();
			var _status  	 = $("#_status").val();

			if(ambiente == "") {
				$("#ambiente").closest('.form-group').addClass('has-error');
				$("#ambiente").after('<p class="text-danger">The ambiente field is required</p>');
			} else {
				$("#ambiente").closest('.form-group').removeClass('has-error');
				$("#ambiente").closest('.form-group').addClass('has-success');				
			}

			if(barcode == "") {
				$("#barcode").closest('.form-group').addClass('has-error');
				$("#barcode").after('<p class="text-danger">The barcode field is required</p>');
			} else {
				$("#barcode").closest('.form-group').removeClass('has-error');
				$("#barcode").closest('.form-group').addClass('has-success');				
			}

			if(dtutilizacao == "") {
				$("#dtutilizacao").closest('.form-group').addClass('has-error');
				$("#dtutilizacao").after('<p class="text-danger">The dtutilizacao field is required</p>');
			} else {
				$("#dtutilizacao").closest('.form-group').removeClass('has-error');
				$("#dtutilizacao").closest('.form-group').addClass('has-success');				
			}

			if(_status == "") {
				$("#_status").closest('.form-group').addClass('has-error');
				$("#_status").after('<p class="text-danger">The _status field is required</p>');
			} else {
				$("#_status").closest('.form-group').removeClass('has-error');
				$("#_status").closest('.form-group').addClass('has-success');				
			}

			if(ambiente && barcode && dtutilizacao && _status) {
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
				$("#editambiente").val(response.ambiente);
				$("#editbarcode").val(response.barcode);
				$("#editdtutilizacao").val(response.dtutilizacao);
				$("#edit_status").val(response._status);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					var editambiente 	 = $("#editambiente").val();
					var editbarcode 	 = $("#editbarcode").val();
					var editdtutilizacao = $("#editdtutilizacao").val();
					var edit_status 		= $("#edit_status").val();

					if(editambiente == "") {
						$("#editambiente").closest('.form-group').addClass('has-error');
						$("#editambiente").after('<p class="text-danger">Assunto não pode ser vazio!</p>');
					} else {
						$("#editambiente").closest('.form-group').removeClass('has-error');
						$("#editambiente").closest('.form-group').addClass('has-success');				
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

					if(editambiente && edit_status) {
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
				$("#viewambiente").val(response.ambiente);
				$("#viewbarcode").val(response.barcode);
				$("#viewdtutilizacao").val(response.dtutilizacao);
				$("#view_status").val(response._status);	
					

				// mmeber id 
				$(".viewMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var viewambiente 		= $("#viewambiente").val();
				//	var viewobs 			= $("#viewobs").val();
				//	var viewcodencerramento = $("#viewcodencerramento").val();
					var view_status 		= $("#view_status").val();

				
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