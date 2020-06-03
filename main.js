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


	
});