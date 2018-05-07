window.onload = function () {

    // MODAL TOGGLE 

    // LOGIN MODAL SELECT
    var loginModal = document.querySelector(".login-modal");
    var loginTrigger = document.querySelector(".login-trigger");

    // SIGN UP MODAL SELECT

    var signupModal = document.querySelector(".signup-modal");
    var signupTrigger = document.querySelector(".signup-trigger");

    // CLOSE MODAL BUTTONS

    function toggleLoginModal() {
        loginModal.classList.toggle("show-modal");
    }

    function toggleSignupModal() {
        signupModal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        var closeLoginModalButton = document.getElementById("close-login-modal-button");
        var closeSignupModalButton = document.getElementById("close-signup-modal-button");

        closeLoginModalButton.addEventListener("click", toggleLoginModal);
        closeSignupModalButton.addEventListener("click", toggleSignupModal);

        if (event.target === loginModal) {
            toggleLoginModal();
        }
        if (event.target === signupModal) {
            toggleSignupModal();
        }
    }

    loginTrigger.addEventListener("click", toggleLoginModal);
    signupTrigger.addEventListener("click", toggleSignupModal);

    window.addEventListener("click", windowOnClick);

    // MODAL SNAKE EFFECT

    var current = null;
    document.querySelector('#login-email, #reset-email, #new-password').addEventListener('focus', function (e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: 0,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '240 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });

    document.querySelector('#login-password, #re-password').addEventListener('focus', function (e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: -336,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '240 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });

    document.querySelector('#login-submit, #reset-submit').addEventListener('mouseover', function (e) {
        document.querySelector('#login-email, #reset-email').blur();
        document.querySelector('#login-password').blur();
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: -730,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '530 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });

    document.querySelector('#signup-email').addEventListener('focus', function (e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: 0,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '240 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });

    document.querySelector('#signup-password').addEventListener('focus', function (e) {
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: -336,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '240 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });

    document.querySelector('#signup-submit').addEventListener('mouseover', function (e) {
        document.querySelector('#signup-email').blur();
        document.querySelector('#signup-password').blur();
        if (current) current.pause();
        current = anime({
            targets: 'path',
            strokeDashoffset: {
                value: -730,
                duration: 700,
                easing: 'easeOutQuart'
            },
            strokeDasharray: {
                value: '530 1386',
                duration: 700,
                easing: 'easeOutQuart'
            }
        });
    });
};
$(document).ready(function(){
	
	// Lift card and show stats on Mouseover
	$('.product-card').hover(function(){
			$(this).addClass('animate');
			$(this).find('div.carouselNext, div.carouselPrev').addClass('visible');			
		 }, function(){
			$(this).removeClass('animate');			
			$(this).find('div.carouselNext, div.carouselPrev').removeClass('visible');
	});	
	
	// Flip card to the back side
	$('.view_details').click(function(){
		var parent = $(this).closest('.product-card');		
		parent.children('div.carouselNext, div.carouselPrev').removeClass('visible');
		parent.addClass('flip-10');
		setTimeout(function(){
			parent.removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, function(){
				parent.children('.product-front, .product-front div.shadow').hide();			
			});
		}, 50);
		
		setTimeout(function(){
			parent.removeClass('flip90').addClass('flip190');
			parent.children('.product-back').show().find('div.shadow').show().fadeTo( 90 , 0);
			setTimeout(function(){				
				parent.removeClass('flip190').addClass('flip180').find('div.shadow').hide();						
				setTimeout(function(){
					parent.css('transition', '100ms ease-out');			
					parent.find('.cx').addClass('s1');
					parent.find('.cy').addClass('s1');
					setTimeout(function(){
						parent.find('.cx').addClass('s2');
						parent.find('.cy').addClass('s2');
					}, 100);
					setTimeout(function(){
						parent.find('.cx').addClass('s3');
						parent.find('.cy').addClass('s3');
					}, 200);				
					parent.children('div.carouselNext, div.carouselPrev').addClass('visible');				
				}, 100);
			}, 100);			
		}, 150);			
	});			
	
	// Flip card back to the front side
	$('.flip-back').click(function(){	
		var parent = $(this).closest('.product-card');	
		parent.removeClass('flip180').addClass('flip190');
		setTimeout(function(){
			parent.removeClass('flip190').addClass('flip90');
	
			parent.find('.product-back div.shadow').css('opacity', 0).fadeTo( 100 , 1, function(){
				parent.find('.product-back, .product-back div.shadow').hide();
				parent.find('.product-front, .product-front div.shadow').show();
			});
		}, 50);
		
		setTimeout(function(){
			parent.removeClass('flip90').addClass('flip-10');
			parent.find('.product-front div.shadow').show().fadeTo( 100 , 0);
			setTimeout(function(){						
				parent.find('.product-front div.shadow').hide();
				parent.removeClass('flip-10').css('transition', '100ms ease-out');		
				parent.find('.cx, .cy').removeClass('s1 s2 s3');			
			}, 100);			
		}, 150);			
		
	});	

	
	/* ----  Image Gallery Carousel   ---- */
	
	var carousel = $('.carousel ul');
	var carouselSlideWidth = 335;
	var carouselWidth = 0;	
	var isAnimating = false;
	
	// building the width of the casousel
	$('.carousel li').each(function(){
		carouselWidth += carouselSlideWidth;
	});
	$(carousel).css('width', carouselWidth);
	
	// Load Next Image
	$('div.carouselNext').on('click', function(){
		var parent = $(this).closest('.product-card');	
		var currentLeft = Math.abs(parseInt(parent.find('.carousel ul').css("left")));
		var newLeft = currentLeft + carouselSlideWidth;
		if(newLeft >= carouselWidth || isAnimating === true){return;}
		parent.find('.carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
		isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);			
	});
	
	// Load Previous Image
	$('div.carouselPrev').on('click', function(){
		var parent = $(this).closest('.product-card');
		var currentLeft = Math.abs(parseInt(parent.find('.carousel ul').css("left")));
		var newLeft = currentLeft - carouselSlideWidth;
		if(newLeft < 0  || isAnimating === true){return;}
		parent.find('.carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
	    isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);			
	});
});