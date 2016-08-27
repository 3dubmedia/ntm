var flexSlide = 0;
var screenHeight = 0;
var homeSlideSwitch = 0;
var sliderMargin = 0;
var currSlide = 0;
var shownSlides = 0;

//document is loaded
$(document).ready(function(){

    posHomeSlider();
    calcSlides();
    sizeModal();

    $(window).resize(function(){
        posHomeSlider();
        posVidIcon();
        calcSlides();
        sizeModal();
    });

    $('ul.slides > li.slide').fadeOut();

    $('.home-slider-nav > li').mouseenter(function(){
        var thisSlide = $(this).attr('name');
        var pageSize = $(window).width();
        if(pageSize>480){homeSliderNav(thisSlide);}
    });

    $('ul.slides').mouseenter(function(){
        if(homeSlideSwitch === 0){
            homeSlideSwitch = 1;
            $('ul.slides > li.slide-default').css('display','block');
            $('ul.slides > li.slide-default').css('opacity','1');
            $('ul.slides > li.slide').fadeOut('1500','swing', function(){homeSlideSwitch = 0;});
        }
    });

    /*$('.slide-container').on('swipeleft',function(){
        var navDirection = 'slide-nav-right';
        if($(this).closest('.slider-horiz').hasClass('active-slider')){
        }else{
            currSlide = 0;
            sliderMargin = 0;
            $('.slider-horiz').removeClass('active-slider');
            $(this).closest('.slider-horiz').addClass('active-slider');
        }
        sliderHorizNav(navDirection);
    });

    $('.slide-container').on('swiperight',function(){
        var navDirection = 'slide-nav-left';
        if($(this).closest('.slider-horiz').hasClass('active-slider')){
        }else{
            currSlide = 0;
            sliderMargin = 0;
            $('.slider-horiz').removeClass('active-slider');
            $(this).closest('.slider-horiz').addClass('active-slider');
        }
        sliderHorizNav(navDirection);
    });*/



    $('.slide-button').click(function(){
        var navDirection = $(this).attr('name');
        if($(this).closest('.slider-horiz').hasClass('active-slider')){

        }else{
            currSlide = 0;
            sliderMargin = 0;
            $('.slider-horiz').removeClass('active-slider');
            $(this).closest('.slider-horiz').addClass('active-slider');
        }

        sliderHorizNav(navDirection);
    });

    $('.about-video').click(function(){
        var vidNum = $(this).attr('id');
        videoModal(vidNum);
    });

    $('.about-video').click(function(){
        var thisId = $(this).attr('id');
        $('.video-container').empty();
        $('.video-container').append('<div class="video-embed"><script src="//embed.ramp.com/amd.js" data-ramp-playlist-id="" data-ramp-item-id="'+thisId+'" data-ramp-widget="604-6587" data-ramp-api-key="IRoN8rUnQAX91B49CrqLDTF5fcbI1HqR"></script></div>');
    });
});

//everything is loaded
$(window).on('load',function(){
    posVidIcon();
    imgCenter();
});

function videoModal(vidNum){

    $('.video-modal').modal('show');
}

function sizeModal(){
    var winHeight = $(window).height();
    var modalHeight = winHeight-80;
    var modalCHeight = modalHeight-133;
    $('.modal-dialog').css('height',modalHeight+'px');
    $('.modal-body').css('height',modalCHeight+'px');
}

function imgCenter(){
    $('.img-center').each(function(){
        var theBox = $(this).height();
        var theImg = $(this).children('img').height();
        var theDiff = (theBox-theImg)/(2);
        $(this).children('img').css('margin-top',theDiff+'px');
    });
}

function calcSlides(){
	//this is for the event carousel?
    var pageWidth = $(window).width();
    var thePageWidth = parseInt(pageWidth,10);

    $('.slide-content').each(function(){
        var numSlides = $(this).children().length;
        var maxSlidesWidth;

        //centers slider if less than 4 slides on different screen widths
        if(numSlides<4){
            switch(numSlides){
                case 1:
                    maxSlidesWidth = 282;
                    $(this).closest('.slide-nav').css('display','none');
                break;
                case 2:
                    if(pageWidth>600){
                        maxSlidesWidth = 570;
                        $(this).closest('.slide-nav').css('display','none');
                    }else{
                        maxSlidesWidth = 282;
                        $(this).closest('.slide-nav').css('display','block');
                    }
                break;
                case 3:
                    if(pageWidth>900){
                        console.log('wider than 900');
                        maxSlidesWidth = 885;
                        $(this).parent().parent().siblings('.slide-nav').css('display','none');
                    }else if(pageWidth<900 && pageWidth>600){
                        console.log('wider than 600');
                        maxSlidesWidth = 570;
                        $(this).parent().parent().siblings('.slide-nav').css('display','block');
                    }else{
                        console.log('narrower than 600');
                        maxSlidesWidth = 282;
                        $(this).parent().parent().siblings('.slide-nav').css('display','block');
                    }
                break;
            }
            $(this).parent().css('width',maxSlidesWidth+'px');
            $(this).parent().css('margin','auto');
        }
    });

    if(thePageWidth>1200){
        shownSlides = 4;
    }else if((1201>thePageWidth)&&(thePageWidth>901)){
        shownSlides = 3;
    }else if((900>thePageWidth)&&(thePageWidth>601)){
        shownSlides = 2;
    }else if(600>thePageWidth){
        shownSlides = 1;
    }else{
        //console.log('there was an error');
    }

    $('.slide-content').animate({marginLeft: '0px'}, 100);
    currSlide = 0;
    sliderMargin = 0;
    $('button[name="slide-nav-right"]').removeClass('disabled');
    $('button[name="slide-nav-left"]').addClass('disabled');
}

function sliderHorizNav(direction){

    var numSlides = $('.active-slider .slide-item').length;
    var maxMargin = 287*numSlides;

    if((direction == 'slide-nav-right')&&(currSlide < (numSlides - shownSlides))){
        sliderMargin -= 287;
        currSlide += 1;
        $('.active-slider button[name="slide-nav-left"]').removeClass('disabled');
    }else if((direction == 'slide-nav-left')&&(sliderMargin < 0)){
        sliderMargin += 287;
        currSlide -= 1;
        $('.active-slider button[name="slide-nav-right"]').removeClass('disabled');
    }else{
        //console.log('there was an error');
    }

    if(sliderMargin === 0){
        $('.active-slider button[name="slide-nav-left"]').addClass('disabled');
    }else if(currSlide == (numSlides - shownSlides)){
        $('.active-slider button[name="slide-nav-right"]').addClass('disabled');
    }

    $('.active-slider .slide-content').animate({marginLeft: sliderMargin+'px'}, 200);
}

function posVidIcon(){

    $('.about-video').each(function(index) {
        var theImg = $(this).find('img');
        var theWidth = theImg.width();
        var theHeight = theImg.height();
        var newWidth = (theWidth/2)-20;
        var newHeight = (theHeight/2)+20;
        var theIcon = $(this).find('span');
        if(!$(this).hasClass('ftd-video')){
            var ftdHeight = $('.ftd-video').height();
            var smlHeight = (ftdHeight/2)-(5);
            console.log('ftdHeight: '+ftdHeight+', smlHeight: '+smlHeight);
            $(this).children('img').css('height',smlHeight+'px');
        }
        $(theIcon).css('margin','-'+newHeight+'px 0 0 '+newWidth+'px');
    });
}

function posHomeSlider(){

    screenHeight = $(window).height();
    var thisWinWidth = $(window).width();
    h1Pos = (screenHeight-537)/2;
    //$('.home-slider').css('height',screenHeight+'px');
    if(thisWinWidth>768){
        $('.home-slider h1').css('margin-top',h1Pos+'px');
        $('.home-slider h2').css('margin-top',h1Pos+'px');
    }else{
        $('.home-slider h1').css('margin-top','0px');
        $('.home-slider h2').css('margin-top','0px');
    }
}

function homeSliderNav(thisSlide){

    if(homeSlideSwitch === 0){
        homeSlideSwitch = 1;
        $('ul.slides > li.slide').fadeOut('1500','swing', function(){});
        $('ul.slides > li.'+thisSlide).fadeIn('1500','swing', function(){homeSlideSwitch = 0;});
    }
}
