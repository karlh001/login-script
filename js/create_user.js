		
	$(document).ready(function(){
    
				$("#NewUserForm").submit(function(){
						
						// Clear error message
						$(".errorMsg").text("");	
						
						// POST to php script
						$.post("../php/create_user.php", $(this).serialize(), function(data){
							
							var response = data;
							console.log(response);
				
							if (response == 1 ) {
								// Returns 1 when successful
								console.log("Success");

								// Refresh page
								//location.reload();
								$("#SuccessAccount").show();
								$('#NewUserModal').modal('toggle')
								return false;
								
							} else {
								console.log("Error with form");
								$(".errorMsg").text(response);
							}
							
						}).fail(function() {
						 
							// just in case posting your form failed
							console.log("AJAX failed by PHP");

						});
									 
						// to prevent refreshing the whole page page
						return false;
				});
	});

