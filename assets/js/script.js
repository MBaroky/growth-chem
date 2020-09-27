/* this part to init AOS function */
$(function() {  /* this is the jQuery equivalent of documents.ready */
    AOS.init();
    setTimeout(() => {AOS.refresh();}, 500);
});

// sticky navbar detect when reaches top of window (functions)
function getTopOf(target){
    var viewportOffset = target.getBoundingClientRect();
    return viewportOffset.top;
}
function isStuck(target){
    getTopOf(target) <= 0?target.classList.add('stuck'):target.classList.remove('stuck');
    
}
const topNav = document.getElementById('mainNav');
function imgToBg(elm){
    elm.each(function(){
        var $slide = $(this);
        $slide.css("background-image","url('"+$slide.find('img').attr('src')+"')") ;
        $slide.find('img').hide();
    });
}
$(document).ready(function(){
    // sticky navbar detect when reaches top of window (on page load)
    isStuck(topNav);

    // flexslider 
     $('.flexslider').each(function(){
         const $self = $(this);
        //  get optinons from data attr
         const options = $self.data();
        //  adding function for when active slide changes
         options.before = function(slider){
            // console.log(slider.vars); 
         }
         options.after = function(slider){
            //  select active slide
            var $activeInner = slider.find(".slides>li.flex-active-slide .slide-inner");
            // remove animation from all slides inner
             slider.find(".slides>li .slide-inner").each(function(){
                const $self = $(this);
                 $self.removeClass(`aos-animate aos-init  ${$self.attr('data-aos')}`);
             })
            //  reinitiate animation on active slide inner 
             $activeInner.addClass(`aos-animate aos-init  ${$activeInner.attr('data-aos')}`)
         }
        //  flexslider init with options
         $self.flexslider(options);
        //  use background image instead of img tag
        imgToBg($self.find('.slides li'));
     }); 
     imgToBg($('.gallery-image'));
     
});
$(window).on('scroll', function(){
    // sticky navbar detect when reaches top of window (on scroll)
    isStuck(topNav);

    if ($(window).scrollTop() > 50){
        $('#mainNav').addClass('scrolled');
    }else{
        $('#mainNav').removeClass('scrolled');
    }
});

// fixed header get the height of fixed header
function fixedHeight(elm){
    if ($(elm).css('position') === 'fixed'){
        return $(elm).outerHeight();
    }
}
let headerHeight = fixedHeight('header#main-header');
const $successMessage = $("#sentMailSuc");
const $formWrap = $('.form-wrapper');
// fixed header add padding to body
$(window).on('load resize', function(){
    $('body').css('padding-top', headerHeight);
    $successMessage && $successMessage.css({paddingTop : headerHeight});
    $formWrap && $formWrap.css({minHeight:headerHeight + $successMessage.outerHeight()});
});
$(document).ready(function(){
     $('body').css('padding-top', headerHeight);
     $successMessage && $successMessage.css({paddingTop : headerHeight});
     $formWrap && $formWrap.css({minHeight:headerHeight + $successMessage.outerHeight()});

});

// Fixed Height for bootstrap tabs
var maxHeight=0;
$(".tabs").each(function(i){
    const contCount = i+1;
    $(this).find('.tab-pane').each(function(n){
        $(this).attr({'id': `tab-${contCount}-${n+1}`})
    });
    $(this).find('.nav-link').each(function(n){
        $(this).attr({'href': `#tab-${contCount}-${n+1}`})
    });
});
$(".tab-content .tab-pane").each(function(){
    $(this).addClass("active");
   var height = $(this).height();
    maxHeight = height>maxHeight?height:maxHeight;
    $(this).removeClass("active");
});
$(".tab-content .tab-pane:first-child").addClass("active");
$(".tab-content").height(maxHeight);


// scroll to target
$('[href*=".php#"]:not([href="#"])').on('click', function(event) {
    var target = this.hash;
  
    // event.preventDefault();
  
    var navOffset = $('#main-header').height();
  
    return $('html, body').animate({
      scrollTop: parseInt($(this.hash).offset().top) - navOffset //$(this.hash)
    }, 300, function() {
      return window.history.pushState(null, null, target);
    });
  });
/* $('[href*="#"]:not([href="#"])').on('click', function(e){
    const url = $(this).attr('href');
    // e.preventDefault();
    $('html, body').animate({
        scrollTop: parseInt($(url).offset().top) + headerHeight
    }, 400);
}) 

*/