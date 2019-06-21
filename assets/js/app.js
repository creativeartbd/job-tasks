// Add more features
// =================

$(document).ready(function(e) {	

	if (e.keyCode == 13) {

		var max_fields      = 10; 
		var wrapper   		= $(".input_fields_wrap"); 
		var add_button      = $(".add_field_button"); 

		var x = 1; 
		$(add_button).click(function(e){ 
			e.preventDefault();		
			if(x < max_fields){
				x++; 
				var form = '<div class="delete-row"><div class="form-group row"><label class="col-sm-3 col-form-label">Items</label><div class="col-sm-7"><input type="text" name="items[]" class="form-control items"></div><div class="col-sm-2"><a href="#" class="remove_field btn btn-danger btn-sm">( X )</a></div></div></div>';
				$(wrapper).append('<div>'+form+'</div>'); 
			}
		});

		$(wrapper).on("click",".remove_field", function(e){ 
			e.preventDefault(); 
			$(this).parents('.delete-row').remove(); x--;
		})

	}

});


// Record sales validation 
// =======================

function validateForm () {	
	
	var IsJsValidate 	=	false;
	var amount			=	document.forms["salesform"]["amount"];               
	var buyer 			=	document.forms["salesform"]["buyer"];    
	var buyerRegex		=	/^[a-zA-Z0-9_ ]*$/;		
	var receipt_id		=	document.forms["salesform"]["receipt_id"];  
	var receiptIdRegex	=	/^[a-zA-Z_ ]*$/;		
	let items 			= document.querySelectorAll(".items")
	var itemsRegex		=	/^[a-zA-Z_ ]*$/;
	var buyer_email 	=	document.forms["salesform"]["buyer_email"];  
	var note 			=	document.forms["salesform"]["note"];  
	var city 			=	document.forms["salesform"]["city"];  
	var cityRegex		=	/^[a-zA-Z_ ]*$/;
	var phone 			=	document.forms["salesform"]["phone"];
	var phoneRegex		=	/^[0-9]*$/;
	var entry_by 		=	document.forms["salesform"]["entry_by"];
	var entryByRegex	=	/^[0-9]*$/;

	function validateEmail(email) {
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(String(email).toLowerCase());
	}
	
	if (amount.value == "") { 
    	alert("Please enter the amount."); 
    	amount.focus(); 
    	return false; 
	} else if (isNaN(amount.value)) {
		alert("Amount must be only numeric value."); 
    	amount.focus(); 
    	return false; 
	} else if (amount.length > 10 ) {
		alert("Amount must be less than 10 characters long."); 
    	amount.focus(); 
    	return false; 
	}

	if (buyer.value == "") { 
    	alert("Buyer name is required"); 
    	buyer.focus(); 
    	return false; 
	} else if (!buyerRegex.test(buyer.value)) {
		alert("Buyer name only contain letter, number and space."); 
    	buyer.focus(); 
    	return false; 
	} else if (buyer.value.length > 20 ) {
		alert("Buyer name must be less than 20 characters long."); 
    	buyer.focus(); 
    	return false; 
	}

	if (receipt_id.value == "") { 
    	alert("Receipt Id is reuired"); 
    	receipt_id.focus(); 
    	return false; 
	} else if (!receiptIdRegex.test(receipt_id.value)) {
		alert("Receipt Id must contain only characters."); 
    	receipt_id.focus(); 
    	return false; 
	} else if ( receipt_id.length > 20 ) {
		alert("Receipt Id must be less than 20 characters long."); 
    	receipt_id.focus(); 
    	return false; 
	}

	for (let i = 0; i < items.length; i++) {
	  	if (items[i].value == "") {
	    	alert("Item nummber "+(i+1)+" is required");
	    	items[i].focus();
	    	return false;
	  	} else if (!itemsRegex.test(items[i].value)) {
	  		alert("Item nummber "+(i+1)+" must contain only characters");
	    	items[i].focus();
	    	return false;
	  	} else if (items[i].value.length > 255 ) {
	  		alert("Item nummber "+(i+1)+" mest be less than 25 characters long");
	    	items[i].focus();
	    	return false;
	  	}
	}	

	if (buyer_email.value == "") { 
    	alert("Buyer email address is reuired"); 
    	buyer_email.focus(); 
    	return false; 
	} else if (!validateEmail(buyer_email.value)) {
		alert("Buyer email address is not correct"); 
    	buyer_email.focus(); 
    	return false; 
	}

	if (note.value == "") { 
    	alert("Note is required"); 
    	note.focus(); 
    	return false; 
	} else if (note.length > 30) {
		alert("Note details must be less 30 characters long"); 
    	note.focus(); 
    	return false; 
	}

	if (city.value == "") { 
    	alert("City name is reuired"); 
    	city.focus(); 
    	return false; 
	} else if (!cityRegex.test(city.value)) {
		alert("City name must contain only characters."); 
    	city.focus(); 
    	return false; 
	} else if ( city.length > 20 ) {
		alert("City name must be less than 20 characters long."); 
    	city.focus(); 
    	return false; 
	}	


	if (phone.value == "") { 
    	alert("Phone number is required"); 
    	phone.focus(); 
    	return false; 
	} else if (!phoneRegex.test(phone.value)) {
		alert("Phone number must contain only numerical value."); 
    	phone.focus(); 
    	return false; 
	} else if ( phone.value.length > 13 || phone.value.length < 10) {
		alert("Invalid phone number is given."); 
    	phone.focus(); 
    	return false; 
	} else {
		if(phone.value.length == 10) {
			const text    	= '880';
			const child  	= document.getElementById('phone');
			const value 	= child.value;
			phone.value 	= text + value;	
		}
		
	}

	if (entry_by.value == "") { 
    	alert("Entry by is required."); 
    	entry_by.focus(); 
    	return false; 
	}  else if (!entryByRegex.test(entry_by.value)) {
		alert("Entry by should mest be numeric value."); 
    	entry_by.focus(); 
    	return false; 
	} else if( entry_by.length > 10 ) {
		alert("Entry by must be less than 10 characters long."); 
    	entry_by.focus(); 
    	return false; 
	}
	
	return true;		
}

// record sales validation using ajax
// =================================

$("#salesForm").submit(function(e) {
    e.preventDefault();

    if(!validateForm()) return;

    $.ajax({
        url : '../process/add-data.php',
        type: 'POST',
        dataType: "html",
        data : $(this).serialize(),     
        beforeSend : function () {
            $(".formResult").html("Please wait...");
        }, 
        success : function ( data ) {
            $(".formResult").html( data );
        }
    });
}); 

// report page date picker
// =======================

$( function() {
	var dateFormat = "yy-mm-dd",
  	from = $( "#from" )
	.datepicker({
  		defaultDate: "+1w",
  		changeMonth: false,
  		numberOfMonths: 1,
  		dateFormat: 'yy-mm-dd',
	}).on( "change", function() {
  		to.datepicker( "option", "minDate", getDate( this ) );
	}),
  
  	to = $( "#to" ).datepicker({
    	defaultDate: "+1w",
    	changeMonth: false,
    	numberOfMonths: 1,
    	dateFormat: 'yy-mm-dd',
  	})
  		
  	.on( "change", function() {
    	from.datepicker( "option", "maxDate", getDate( this ) );
  	});

	function getDate( element ) {
  		var date;
  		try {
    		date = $.datepicker.parseDate( dateFormat, element.value );
  		} catch( error ) {
    		date = null;
  		}
  	return date;
	}
});

// report page ajax call
// =====================

$("#report").submit(function(e) {
	e.preventDefault();
	$.ajax({
		url : '../process/get-report.php',
		type: 'POST',
		dataType: "html",
		data : $(this).serialize(),		
		beforeSend : function () {
			$(".formResult").html("Please wait...");
		}, 
		success : function ( data ) {
			$(".formResult").html( data );
		}
	});
});