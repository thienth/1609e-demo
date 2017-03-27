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

					console.log("beforeSend");
				},
				success: function(response){
					if(response.data == true){
						$("tr#cate-"+id).remove();
					}
				},
				complete: function(){
					console.log("complete");
				},
				error: function(err){
					console.log(err);
				}
			});
			
		});
	}
}