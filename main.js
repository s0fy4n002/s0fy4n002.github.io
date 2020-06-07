$(document).ready(function(){
	
	cat();
	brand();
	product();

	function cat(){
		$.ajax({
			url		: "action.php",
			method	: "POST",
			data	: {category:1},
			success	: function(data){
				$("#category").html(data);
			}
		})
	}

	
	function brand(){
		$.ajax({
			url		: "action.php",
			method	: "POST",
			data	: {brand:1},
			success	: function(data){
				$("#brand").html(data);
			}
		})
	}

	function product(){
		$.ajax({
			url		: "action.php",
			method	: "POST",
			data	: {product:1},
			success	: function(data){
				$("#product").append(data);
			}
		})
	}

	$("body").delegate(".category", "click", function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
		$.ajax({
			url		: "action.php",
			method	: "POST",
			data	: {getCategory:1, cat_id:cid},
			success	: function(data){
				
				$("#product").html(data);
			}
		});
	});

	
	$("body").delegate(".brand", "click", function(event){
		event.preventDefault();
		var bid = $(this).attr('bid');
		$.ajax({
			url		: "action.php",
			method	: "POST",
			data	: {getBrand:1, brand_id:bid},
			success	: function(data){
				
				$("#product").html(data);
			}
		});
	});

	$(".btn-login").click(function(event){
		event.preventDefault();
		
		var email = $("#formLogin input[name=email]").val()
		var password = $("#formLogin input[name=password]").val()
		if(email == ""){
			$("#formLogin input[name=email]").css({"border":"1.3px solid red"});
			$("#formLogin input[name=email]").attr("placeholder", "email harus diisi").placeholder();	
			return false;
		}
		else{
			$("#formLogin input[name=email]").css({"border-color":"#ced4da"});
		}

		if(password == ""){
			$("#formLogin input[name=password]").css({"border":"1.3px solid red"});
			$("#formLogin input[name=password]").attr("placeholder", "password harus diisi").placeholder();
			return false;
		}else{
			$("#formLogin input[name=password]").css({"border-color":"#ced4da"});
		}

		$.ajax({
			url		: "login.php",
			method	: "POST",
			data	: {userLogin:"saya", email:email, password:password},
			success	: function(data){
				
				// $("#product").html(data);
				if(data == "login"){
					window.location.href="profile.php";
				}else{
					alert("email/password salah");
				}
			}
		});
  })

  $("#search").click(function(event){
		event.preventDefault();
		var email = $("#formLogin input[name=email]").val()
		var password = $("#formLogin input[name=password]").val()
		$.ajax({
			url		: "action.php",
			method	: "POST",
			data	: $("#formLogin").serialize(),
			success	: function(data){
				
				$("#product").html(data);
				
			}
		});
  })
  

	

	


	
});