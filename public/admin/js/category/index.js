window.categoryIndex = {
	init: function(){
		$(".cate-remove").on("click", function(){
			var id = $(this).attr('remove-id');
			$.ajax({
				url: $("#remove-cate-url").val(),
				data: {id: id},
				dataType: "JSON",
				method: "DELETE",
				beforeSend: function(){
					$(".overlay").addClass("active");
				},
				success: function(response){
					if(response.data == true){
						$("tr#cate-"+id).remove();
					}
				},
				complete: function(){
					$(".overlay.active").removeClass("active");
				},
				error: function(err){
					console.log(err);
				}
			});
			
		});
	}
}