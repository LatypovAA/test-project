	$(document).ready(function(){ 

		tinymce.init({
 		selector: "textarea",
 		language : "ru",
 		
		setup: function(editor) {
		        editor.on('blur', function(e) {
		            console.log('blur event', e);
		            var val = tinymce.get('text').getContent();
		            if (val.length < 400 && val != '') {
		            	$('#mce_15').addClass('not_error');
        			$('#textErr').addClass('errDisplay');
		            }
		            if (val.length > 400 || val.length < 7) {
		            	$('#mce_15').removeClass('not_error');
		            	$('#textErr').removeClass('errDisplay');
		            }
		            

		        });
		    }
 		});







		$('input#name').unbind().blur( function(){

			var id = $(this).attr('id');
        			var val = $(this).val();

        			//var val = tinymce.get('text').getContent();    получение значения text area

        			switch(id) {
        				//name validation
        				case'name':
        				if (val.length > 2 && val != '' && val.length < 10) {
        					$(this).addClass('not_error');
        					$('#nameErr').addClass('errDisplay');
        				}
        				else {
        					$('#nameErr').removeClass('errDisplay');
        					$(this).removeClass('not_error');
        				}

        				break;

        			}

		 }); // end blur()

		$('form#feedback').submit(function(e){
			var name = $("#name").val();
			var text = $("#text").val(); 
			e.preventDefault();
			if($('.not_error').length == 2) {
				$(function(){
			   		var date = $("#date").val();
			   		var colorText =$("#colorText").val();
			   		var id = $("button:first").val();
				    	var name = $("#name").val();
				     	var text = $("#text").val();
				   	$.ajax({
					         type: "POST",
					         url: "message.php",
					         data: {"name": name, "text": text},
					         cache: false,
					         success: function(response){
					         	var report = JSON.parse(response);
					        	var text = report.msg;
					         	var name = report.username;
					         	$('#name').removeClass('not_error');
					         	$('#text').removeClass('not_error');
					         	$("#name").val("");
						$("#text").val("");
						$("#noMess").addClass('errDisplay');
					   	$("#commentBlock").prepend("<div class='span12 commentBlock' id='textBlock'>  <div class='span7 well overflow marginleft' style='color:#CC0033'>"+text+"</div> <div class='span2'>"+name+"</div> </div>");
					   	$("#textBlock").append("<div class='span2'>"+date+"</div>");
			              		alert ("success!");
					          }
					});
	         				return false;
                                                               



				});

			}
			else {
				//return false;
        				if (name <2  || name == '' || name >6) {
        					$('#nameErr').removeClass('errDisplay');
        				}
				 if (text == '') {
        					$('#textErr').removeClass('errDisplay');
        				}      					

        				
			}
		}); // end submit
	}); //end script
