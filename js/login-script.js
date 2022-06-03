$(document).ready(function(){
        
    $(document).ajaxStart(function () {
        console.log('saving...');
		$("#errorMsg").hide();	
		$("#expired").hide();
		$("#logout").hide();
		$("#loginBtn").prop("disabled",true);
    });

	
   $(document).ajaxStop(function () {
        console.log('end');	
		$("#loginBtn").prop("disabled",false);
	});

	
    var frm = $('#loginForm');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../php/login-script.php',
			data: frm.serialize(),
			cache: false,
            success: function (data) {
                console.log(data);
				
				if (data == 1) {
					// Success log-in
					window.location.href='index.php?login=success';
					return false;
				}
			
				$("#errorMsg").show();	
				
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
				$("#errorMsg").show();				
				$("#saveBtn").prop("disabled",false);
            },
        });
    });


});
