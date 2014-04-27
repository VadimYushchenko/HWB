//------------------------------------- Waiting for the entire site to load ------------------------------------------------//



jQuery(window).load(function() { 
		jQuery("#loaderInner").fadeOut();
		jQuery("#loader").delay(400).fadeOut("slow");
		jQuery("#loaderInner p").removeClass("loading");
				
});





$(document).ready(function(){


    var category = $('meta[name=category]').attr("content");


        $.getJSON('../content.php?category='+category, {}, function(json){
        $('#example-4').html('');
        $.each(json.posts, function(i,post){

        $('#example-4').append('<div class="titleInner"><h1>'+post.title+'</h1></div>');

//                            var container = $('<div>').html(post.content);
//                            container.find('div.metaslider').replaceWith(function() {return ' '});
    ////                            .find('p').replaceWith(function() {return " "})
    //                            $('#example-4').append(container.html());
    $('#example-4').append(post.excerpt).append("<br/>");
    });

    });

    var comment = $('meta[name=comment]').attr("content");

    $.getJSON('../content.php?category='+comment, {}, function(json){

        var comment = $('#comment').html('');
        $.each(json.posts, function(i,post){

        comment.append('<div class="authorBio "><div class="bio clearfix"><div class="bDesc"><h3>'+post.title+'</h3><p>'+post.excerpt+'</p></div></div></div>');


        });

    });






	
//------------------------------------- Navigation setup ------------------------------------------------//


//--------- Scroll navigation ---------------//


$("#mainNav ul a, .logo a, .cta a").click(function(e){

	
	var full_url = this.href;
	var parts = full_url.split("#");
	var trgt = parts[1];
	var target_offset = $("#"+trgt).offset();
	var target_top = target_offset.top;
	


	$('html,body').animate({scrollTop:target_top -66}, 800);
		return false;
	
});


//-------------Highlight the current section in the navigation bar------------//
	var sections = $("section");
		var navigation_links = $("#mainNav a");

		sections.waypoint({
			handler: function(event, direction) {

				var active_section;
				active_section = $(this);
				if (direction === "up") active_section = active_section.prev();

				var active_link = $('#mainNav a[href="#' + active_section.attr("id") + '"]');
				navigation_links.removeClass("active");
				active_link.addClass("active");

			},
			offset: '35%'
		});
		
		
//------------------------------------- End navigation setup ------------------------------------------------//




//---------------------------------- Clients animation and testimonia quote -----------------------------------------//

$('.testimoniaContainer .testimonialContent .icoQuote').css({opacity:0.2});
$('.clientList a').css({opacity:0.2});
		$('.clientList a').hover( function(){ 
			$(this).stop().animate({opacity:"1"},  "slow", 'easeOutQuint');
		}, function(){ 
			$(this).stop().animate({opacity:"0.2"},  "slow", 'easeOutQuint');
		});
//---------------------------------- End clients animation and testimonia quote-----------------------------------------//



//------------------------------ Sorting portfolio elements with quicksand plugin- ----------------------------//


//------------------------------ MagnificPopup ----------------------------//

		$('a.prev').magnificPopup({
		  type: 'image'
		});
		

//-------------------------- End magnificPopup ----------------------------//


	var $portfolioClone = $('.portfolio').clone();

	$('.filter a').click(function(e){
		$('.filter li').removeClass('current');	
		var $filterClass = $(this).parent().attr('class');
		if ( $filterClass == 'all' ) {
			var $filteredPortfolio = $portfolioClone.find('li');
		} else {
			var $filteredPortfolio = $portfolioClone.find('li[data-type~=' + $filterClass + ']');
		}
		$('.portfolio').quicksand( $filteredPortfolio, { 
			duration: 800,
			easing: 'easeInOutQuad' 
		}, function(){
			


//------------------------------ Reinitilaizing magnificPopup ----------------------------//

		$('a.prev').magnificPopup({
		  type: 'image',
		  gallery:{
		    enabled:true
		  }
		});
		

//-------------------------- End einitilaizing magnificPopup ----------------------------//

		});


		$(this).parent().addClass('current');
		e.preventDefault();
	});

//--------------------------------- End sorting portfolio elements with quicksand plugin--------------------------------//



//------------------------------------- Facts counter ------------------------------------------------//

$('.facts').appear(function() {
	$(".timer .count").each(function() {
	var counter = $(this).html();
	$(this).countTo({
		from: 0,
		to: counter,
		speed: 2000,
		refreshInterval: 60
		});
	});
});

//------------------------------------- End facts counter ------------------------------------------------//







//---------------------------------- Form validation-----------------------------------------//



    function removeModal(element, hasPerspective ) {
        classie.remove( element, 'md-show' );

        if( hasPerspective ) {
            classie.remove( document.documentElement, 'md-perspective' );
        }
    }

    function removeModalHandler(removeEl) {
        var modal = document.querySelector( '#' + removeEl );
        [].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {
        removeModal(modal, classie.has( el, 'md-setperspective' ) );
        });
    }

function isFieldBlank(field){
    if(institution == "" || institution == " ") {
        return true;
    }
    return false;
}

    $('#submitform1').click(function(){

        $('input#name').removeClass("errorForm");
        $('textarea#message').removeClass("errorForm");
        $('input#email').removeClass("errorForm");

        var error = false;
        var institution = $('input#institution').val();
        var activities = $('input#activities').val();
        var address = $('input#address').val();
        var fio = $('input#fio').val();
        var contact = $('input#contact').val();
        var sum = $('input#sum').val();
        var purpose = $('input#purpose').val();

        if(isFieldBlank(institution)) {
            error = true;
            $('input#institution').addClass("errorForm");
        }

        if(isFieldBlank(institution)) {
            error = true;
            $('input#institution').addClass("errorForm");
        }

        if(isFieldBlank(activities)) {
            error = true;
            $('input#activities').addClass("errorForm");
        }

        if(isFieldBlank(address)) {
            error = true;
            $('input#address').addClass("errorForm");
        }


        if(isFieldBlank(fio)) {
            error = true;
            $('input#fio').addClass("errorForm");
        }

        if(isFieldBlank(contact)) {
            error = true;
            $('input#contact').addClass("errorForm");
        }


        if(isFieldBlank(sum)) {
            error = true;
            $('input#sum').addClass("errorForm");
        }

        if(isFieldBlank(purpose)) {
            error = true;
            $('input#purpose').addClass("errorForm");
        }


        var msg = $('textarea#purpose').val();
        if(msg == "" || msg == " ") {
            error = true;
            $('textarea#purpose').addClass("errorForm");

        }

//        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
//        var email = $('input#email').val();
//        if (email == "" || email == " ") {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }else if (!email_compare.test(email)) {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }

        if(error == true) {
            return false;
        }

        var data_string = $('.contactForm #form1').serialize();

        var formData = new FormData($('#form1')[0]);//

formData.append("filecount",document.getElementById('documents1').files.length);
        $.ajax({
            type: "POST",
            url: '../contact.php',
            data: formData,
            dataType : 'json',
            async : true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            error : function(request){
                console.log(request.responseText);
                console.debug(request);
            },
            success: function(message) {
               alert('Your message has been sent. Thank you!');
                removeModalHandler("modal-2");
//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
            }
        });

        return false;
    });

    $('#submitform2').click(function(){

        $('input#name').removeClass("errorForm");
        $('textarea#message').removeClass("errorForm");
        $('input#email').removeClass("errorForm");

        var error = false;
        var representative = $('input#representative').val();
        var patient_info = $('input#patient_info').val();
        var patient_dialog = $('input#patient_dialog').val();
        var medical_institution = $('input#medical_institution').val();
        var money_amount_patient = $('input#money_amount_patient').val();
        var visit_date = $('input#visit_date').val();
        var money_amount_appl = $('input#money_amount_appl').val();
        var health_status = $('input#health_status').val();
        var addional_info2 = $('input#addional_info2').val();

        if(isFieldBlank(representative)) {
            error = true;
            $('input#representative').addClass("errorForm");
        }

        if(isFieldBlank(patient_info)) {
            error = true;
            $('input#patient_info').addClass("errorForm");
        }

        if(isFieldBlank(patient_dialog)) {
            error = true;
            $('input#patient_dialog').addClass("errorForm");
        }

        if(isFieldBlank(medical_institution)) {
            error = true;
            $('input#medical_institution').addClass("errorForm");
        }


        if(isFieldBlank(money_amount_patient)) {
            error = true;
            $('input#money_amount_patient').addClass("errorForm");
        }

        if(isFieldBlank(visit_date)) {
            error = true;
            $('input#visit_date').addClass("errorForm");
        }


        if(isFieldBlank(money_amount_appl)) {
            error = true;
            $('input#money_amount_appl').addClass("errorForm");
        }

        if(isFieldBlank(health_status)) {
            error = true;
            $('input#health_status').addClass("errorForm");
        }

        if(isFieldBlank(addional_info2)) {
            error = true;
            $('input#addional_info2').addClass("errorForm");
        }



//        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
//        var email = $('input#email').val();
//        if (email == "" || email == " ") {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }else if (!email_compare.test(email)) {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }

        if(error == true) {
            return false;
        }

        var data_string = $('.contactForm #form2').serialize();

        var formData = new FormData($('#form2')[0]);//

        formData.append("filecount",document.getElementById('documents2').files.length);
        $.ajax({
            type: "POST",
            url: '../contact.php',
            data: formData,
            dataType : 'json',
            async : true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            error : function(request){
                console.log(request.responseText);
                console.debug(request);
            },
            success: function(message) {
                alert('Your message has been sent. Thank you!');
                removeModalHandler("modal-1");
//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
            }
        });


        return false;
    });



    $('#submitform3').click(function(){

        $('input#name').removeClass("errorForm");
        $('textarea#message').removeClass("errorForm");
        $('input#email').removeClass("errorForm");

        var error = false;
        var fio3 = $('input#fio3').val();
        var contact3 = $('input#contact3').val();
        var institution_name3 = $('input#institution_name3').val();
        var address3 = $('input#address3').val();
        var hosting_institution3 = $('input#hosting_institution3').val();
        var address32 = $('input#address32').val();
        var transplantation_date3 = $('input#transplantation_date3').val();
        var aditional_info3 = $('input#aditional_info3').val();


        if(isFieldBlank(fio3)) {
            error = true;
            $('input#fio3').addClass("errorForm");
        }

        if(isFieldBlank(contact3)) {
            error = true;
            $('input#contact3').addClass("errorForm");
        }

        if(isFieldBlank(institution_name3)) {
            error = true;
            $('input#institution_name3').addClass("errorForm");
        }

        if(isFieldBlank(address3)) {
            error = true;
            $('input#address3').addClass("errorForm");
        }


        if(isFieldBlank(hosting_institution3)) {
            error = true;
            $('input#hosting_institution3').addClass("errorForm");
        }

        if(isFieldBlank(address32)) {
            error = true;
            $('input#address32').addClass("errorForm");
        }


        if(isFieldBlank(transplantation_date3)) {
            error = true;
            $('input#transplantation_date3').addClass("errorForm");
        }

        if(isFieldBlank(aditional_info3)) {
            error = true;
            $('input#aditional_info3').addClass("errorForm");
        }





//        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
//        var email = $('input#email').val();
//        if (email == "" || email == " ") {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }else if (!email_compare.test(email)) {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }

        if(error == true) {
            return false;
        }

        var data_string = $('.contactForm #form3').serialize();

        var formData = new FormData($('#form3')[0]);//

        formData.append("filecount",document.getElementById('documents3').files.length);
        $.ajax({
            type: "POST",
            url: '../contact.php',
            data: formData,
            dataType : 'json',
            async : true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            error : function(request){
                console.log(request.responseText);
                console.debug(request);
            },
            success: function(message) {
                alert('Your message has been sent. Thank you!');
                removeModalHandler("modal-3");
//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
            }
        });


        return false;
    });


    $('#submitform4').click(function(){

        $('input#name').removeClass("errorForm");
        $('textarea#message').removeClass("errorForm");
        $('input#email').removeClass("errorForm");

        var error = false;
        var fio4 = $('input#fio4').val();
        var contact4 = $('input#contact4').val();
        var donation4 = $('input#donation4').val();
        var imported_material4 = $('input#imported_material4').val();
        var address4 = $('input#address4').val();
        var money_amount4 = $('input#money_amount4').val();
        var money_amount_appl4 = $('input#money_amount_appl4').val();
        var health_status = $('input#health_status').val();
        var addional_info2 = $('input#addional_info2').val();

        if(isFieldBlank(fio4)) {
            error = true;
            $('input#fio4').addClass("errorForm");
        }

        if(isFieldBlank(contact4)) {
            error = true;
            $('input#contact4').addClass("errorForm");
        }

        if(isFieldBlank(donation4)) {
            error = true;
            $('input#donation4').addClass("errorForm");
        }

        if(isFieldBlank(imported_material4)) {
            error = true;
            $('input#imported_material4').addClass("errorForm");
        }


        if(isFieldBlank(address4)) {
            error = true;
            $('input#address4').addClass("errorForm");
        }

        if(isFieldBlank(money_amount4)) {
            error = true;
            $('input#money_amount4').addClass("errorForm");
        }


        if(isFieldBlank(money_amount_appl4)) {
            error = true;
            $('input#money_amount_appl4').addClass("errorForm");
        }

        if(isFieldBlank(aditional_info4)) {
            error = true;
            $('input#aditional_info4').addClass("errorForm");
        }

        if(isFieldBlank(addional_info2)) {
            error = true;
            $('input#addional_info2').addClass("errorForm");
        }



//        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
//        var email = $('input#email').val();
//        if (email == "" || email == " ") {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }else if (!email_compare.test(email)) {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }

        if(error == true) {
            return false;
        }

        var data_string = $('.contactForm #form4').serialize();


        var formData = new FormData($('#form4')[0]);//

        formData.append("filecount",document.getElementById('documents4').files.length);
        $.ajax({
            type: "POST",
            url: '../contact.php',
            data: formData,
            dataType : 'json',
            async : true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            error : function(request){
                console.log(request.responseText);
                console.debug(request);
            },
            success: function(message) {
                alert('Your message has been sent. Thank you!');
                removeModalHandler("modal-4");
//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
            }
        });


        return false;
    });


    $('#submitform5').click(function(){

        $('input#name').removeClass("errorForm");
        $('textarea#message').removeClass("errorForm");
        $('input#email').removeClass("errorForm");

        var error = false;
        var fio5 = $('input#fio5').val();
        var contact5 = $('input#contact5').val();
        var age5 = $('input#age5').val();
        var imported_material5 = $('input#imported_material5').val();
        var blood5 = $('input#blood5').val();
        var been_donor2 = $('input#been_donor2').val();
        var diseases5 = $('input#diseases5').val();
        var additional_info5 = $('input#additional_info5').val();


        if(isFieldBlank(fio5)) {
            error = true;
            $('input#fio5').addClass("errorForm");
        }

        if(isFieldBlank(contact5)) {
            error = true;
            $('input#contact5').addClass("errorForm");
        }

        if(isFieldBlank(age5)) {
            error = true;
            $('input#age5').addClass("errorForm");
        }

        if(isFieldBlank(imported_material5)) {
            error = true;
            $('input#imported_material5').addClass("errorForm");
        }


        if(isFieldBlank(blood5)) {
            error = true;
            $('input#blood5').addClass("errorForm");
        }

        if(isFieldBlank(been_donor2)) {
            error = true;
            $('input#been_donor2').addClass("errorForm");
        }


        if(isFieldBlank(diseases5)) {
            error = true;
            $('input#diseases5').addClass("errorForm");
        }

        if(isFieldBlank(additional_info5)) {
            error = true;
            $('input#additional_info5').addClass("errorForm");
        }



//        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
//        var email = $('input#email').val();
//        if (email == "" || email == " ") {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }else if (!email_compare.test(email)) {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }

        if(error == true) {
            return false;
        }

        var data_string = $('.contactForm #form5').serialize();


        var formData = new FormData($('#form5')[0]);//

        formData.append("filecount",document.getElementById('documents5').files.length);
        $.ajax({
            type: "POST",
            url: '../contact.php',
            data: formData,
            dataType : 'json',
            async : true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            error : function(request){
                console.log(request.responseText);
                console.debug(request);
            },
            success: function(message) {
                alert('Your message has been sent. Thank you!');
                removeModalHandler("modal-5");

//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
            }
        });


        return false;
    });


    $('#submitform6').click(function(){

        $('input#name').removeClass("errorForm");
        $('textarea#message').removeClass("errorForm");
        $('input#email').removeClass("errorForm");

        var error = false;
        var fio6 = $('input#fio6').val();
        var country6 = $('input#country6').val();
        var contact6 = $('input#contact6').val();



        if(isFieldBlank(fio6)) {
            error = true;
            $('input#fio6').addClass("errorForm");
        }

        if(isFieldBlank(country6)) {
            error = true;
            $('input#country6').addClass("errorForm");
        }

        if(isFieldBlank(contact6)) {
            error = true;
            $('input#contact6').addClass("errorForm");
        }

//        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
//        var email = $('input#email').val();
//        if (email == "" || email == " ") {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }else if (!email_compare.test(email)) {
//            $('input#email').addClass("errorForm");
//            error = true;
//        }

        if(error == true) {
            return false;
        }

        var data_string = $('.contactForm #form6').serialize();


        var formData = new FormData($('#form6')[0]);//

//        formData.append("filecount",document.getElementById('documents1').files.length);
        $.ajax({
            type: "POST",
            url: '../contact.php',
            data: formData,
            dataType : 'json',
            async : true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            error : function(request){
                console.log(request.responseText);
                console.debug(request);
            },
            success: function(message) {
                alert('Your message has been sent. Thank you!');
                removeModalHandler("modal-6");

//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
            }
        });

        return false;
    });


    $('#submit').click(function(){
alert('321');
	$('input#contact_name').removeClass("errorForm");
	$('textarea#contact_message').removeClass("errorForm");
	$('input#contact_email').removeClass("errorForm");
	
	var error = false; 
	var name = $('input#contact_name').val();
	if(name == "" || name == " ") { 
		error = true; 
		$('input#contact_name').addClass("errorForm");
	}
	
	
		var msg = $('textarea#contact_message').val();
		if(msg == "" || msg == " ") {
			error = true;
			$('textarea#contact_message').addClass("errorForm");
			
		}
	
	var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i; 
	var email = $('input#contact_email').val();
	if (email == "" || email == " ") { 
		$('input#contact_email').addClass("errorForm");
		error = true;
	}else if (!email_compare.test(email)) { 
		$('input#contact_email').addClass("errorForm");
		error = true;
	}

	if(error == true) {
		return false;
	}

	var data_string = $('.contactForm form').serialize();

        var formData = new FormData($('#form')[0]);
	$.ajax({
		type: "POST",
		url: '../contact.php',
		data: formData,

        dataType : 'json',
        async : true,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        error : function(request){
            console.log(request.responseText);
            console.debug(request);
        },
        success: function(message) {
            alert('Your message has been sent. Thank you!');
            removeModalHandler("modal-6");

//                if(message == 'SENDING'){
//                    $('#success').fadeIn('slow');
//                }
//                else{
//                    $('#error').fadeIn('slow');
//                }
        }
    });

	return false; 
});



//---------------------------------- End form validation-----------------------------------------//


//--------------------------------- Mobile menu --------------------------------//


var fade=false;
$('.mobileBtn').click(function() {
		if(fade==false){
        	$('#mainNav ul').slideDown("slow");
			$('#mainNav ul').css({"display":"block"});
			fade=true;
			return false;
			
		}else{
		
			$('#mainNav ul').slideUp("faste");
			fade=false;
			return false;	
		}
});


//--------------------------------- End mobile menu --------------------------------//


//--------------------------------- Parallax --------------------------------//

$("#teaser").parallax("100%", 0.3);	
$(".testimoniaContainer").parallax("100%", 0.3);
$(".clientContainer").parallax("100%", 0.3);


//--------------------------------- End parallax --------------------------------//






//---------------------------------- Testimonials -----------------------------------------//

$('.testimoniaContainer').slides({
	preload: false,
	generateNextPrev: false,
	play: 6500,
	container: 'testimonialContent'
});


//---------------------------------- End testimonial -----------------------------------------//


//---------------------------------- Text animation -----------------------------------------//

$(".rotate").textrotator({
        animation: "fade",
		separator: ",",
    	speed: 2000
});



$(".loading").textrotator({
        animation: "fade",
    	speed: 1000
});


//---------------------------------- End text animation -----------------------------------------//


//---------------------------------- Slider-----------------------------------------//

$('.sliderHolder, .postSlider').flexslider({
	animation: "slide",
	slideshow: true,
	minItems: 1,
	maxItems: 1
});

//---------------------------------- End slider-----------------------------------------//



//--------------------------------- To the top handler --------------------------------//

$().UItoTop({ easingType: 'easeOutQuart' });

//--------------------------------- End to the top handler --------------------------------//



});

