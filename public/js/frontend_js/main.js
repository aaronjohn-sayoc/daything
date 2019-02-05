	
	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#datingForm").validate({
			errorPlacement: function(error, element) {
    		error.insertAfter(element.parent('.input-group'));
			},
			rules: {
				marital_status: {
					required: true
				},
				body_type: {
					required: true
				},
				date_of_birth: {
					required: true
				},
				height: {
					required: true		
				},
				description: {
					required: true,
					minlength: 20		
				},
/*				username: {
					required: true,
					minlength: 4,
					remote:"/check-username"
				},*/
				gender: {
					required: true
				}
			},
			messages: {
				marital_status: {
					required: "Please select your marital status!"
				},
				body_type: {
					required: "Please select your body type!"
				},
				date_of_birth: {
					required: "Please enter your birthday!"
				},
				height: {
					required: "Please enter your height!"
				},
				description: {
					required: "Please provide a description!",
					minlength: "Please add more to your description!"
				},
/*				username: {
					required: "Please enter your username!",
					minlength: "Your username must consist of 4 characters or more!",
					remote: "This username already exists!"
				},*/
				gender: {
					required: "Please choose your gender!"
				}				
			}
		});

		$("#signupForm").validate({
			errorPlacement: function(error, element) {
    		error.insertAfter(element.parent('.input-group'));
			},
			rules: {			
				name: {
					required: true,
					minlength: 2,
					lettersonly: true
				},
				password: {
					required: true,
					minlength: 9
				},
				confirm_password: {
					required: true,
					minlength: 9,
					equalTo: "#password"
				},
				username: {
					required: true,
					minlength: 4,
					remote:"/check-username"
				},				
				email: {
					required: true,
					email: true,
					remote: "/check-email"
				},

			},
			messages: {
				username: {
					required: "Please enter your username!",
					minlength: "Your username must consist of 4 characters or more!",
					remote: "This username already exists!"
				},
				email: {
					required: "Please enter your email address!",
					email: "Please enter a valid email address!",
					remote: "This email already exists!"
				},
				name: {
					required: "Please enter a name!",
					minlength: "Your name must consist of 2 characters or more!"
				},
				password: {
					required: "Please provide a password!",
					minlength: "Your password must be 9 characters or more!"
				},
				confirm_password: {
					required: "Please provide a password!",
					minlength: "Your password must be 9 characters or more!"
				}		
			}
			
		});		
		

		// validate signup form on keyup and submit
/*		$("#signupForm").validate({
			errorPlacement: function(error, element) {
    		error.insertAfter(element.parent('.input-group'));
			},
			rules: {
				name: {
					required: true,
					minlength: 2,
					lettersonly: true
				},
				password: {
					required: true,
					minlength: 9
				},
				confirm_password: {
					required: true,
					minlength: 9,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true,
					remote: "/check-email"
					
				},
			},
			messages: {
				email: {
					required: "Please enter your email address!",
					email: "Please enter a valid email address!",
					remote: "This email already exists!"
				},
				name: {
					required: "Please enter a name!",
					minlength: "Your name must consist of 2 characters or more!",
					lettersonly: "Your name must consist of only letters!"
				},
				password: {
					required: "Please provide a password!",
					minlength: "Your password must be 9 characters or more!"
				},
				confirm_password: {
					required: "Please provide a password!",
					minlength: "Your password must be 9 characters or more!",
					equalTo: "Please enter the same password as above!"
				}				
			}
		});*/

    $(".deletePhoto").click(function() {
    var photo = $(this).attr('rel');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }),
    $('.swal2-confirm').click(function(){
        window.location.href="/delete-photo/"+photo, true;
    });
  });

	});



/*		$.validator.setDefaults({
		submitHandler: function() {
			alert("Submitted!");
		}
	});*/

	//sweetalert
	