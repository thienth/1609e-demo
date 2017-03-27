window.categoryIndex = {
	removeCateUrl: $("#remove-cate-url").val(),
	init: function(){
		$(".cate-remove").on("click", function(){
			var id = $(this).attr('remove-id');
			bootbox.confirm({
			    message: "Ban co thuc su muon xoa?",
			    buttons: {
			        confirm: {
			            label: 'Có - cậu thích xoá',
			            className: 'btn-success'
			        },
			        cancel: {
			            label: 'Không - xoá làm gì!',
			            className: 'btn-danger'
			        }
			    },
			    callback: function (result) {
			    	if(result == true){
			    		$.ajax({
							url: categoryIndex.removeCateUrl,
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
			    	}
			    }
			});
			
			
		});
	}
}