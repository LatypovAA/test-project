   $(document).ready(function(){ 	
   	$("#delAllMess").click(function(){ 
   		var delAllMess = 'delAllMess';
   		$.ajax({
		         type: "POST",
		         url: "delMess.php",
		         data: {"delMess": delAllMess,},
		         cache: false,
		         success: function(response){
		         	if($('.commentBlock').length == 0) {
		         		alert("All messages have been removed!");
		         	}
		         	else {
		         	         	$('#nameErr').addClass('errDisplay');
				$('#textErr').addClass('errDisplay');
			         	$('div.commentBlock').remove();
			        	$('#commentBlock').prepend("<p class='well text-info span8 offset1' id='noMess'>There are no posts</p>")
				alert ("all messages was deleted!");		         		
		         	}

		                                                               
		          }
		});
		return false;
   	});

  });