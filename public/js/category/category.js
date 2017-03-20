$("#add-new-cate").on('click', function(){
	$("#category-modal").modal('show');
});

$(".remove-btn").on('click', function () {
	var id = $(this).attr('object-id');
	$.ajax(
		{
			url: "remove-category", 
			method: "POST",
			data: {
				cateId: id
			},
			dataType: "JSON",
			success: function(result){
				debugger;
				$("tr#cate-"+id).remove();	        	
	    	},
	    	complete: function(){
	    		
	    	},
	    	error: function(error){
	    		console.log(error);
	    	}
    	}
    );
})

$("#save-form").on('click', function(){
	var cateName = $("#cate-name").val();
	$.ajax(
		{
			url: "save-category", 
			method: "POST",
			data: {
				cateName: cateName
			},
			dataType: "JSON",
			success: function(result){
	        	$("tbody").empty();
	        	$("tbody").html(result.data);
	    	},
	    	complete: function(){
	    		$("#category-modal").modal('hide');
	    	},
	    	error: function(error){
	    		console.log(error);
	    	}
    	}
    );
});

