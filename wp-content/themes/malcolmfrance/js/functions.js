/*---------------*\
  $HEADER
\*---------------*/
function headerInit(){
  if( $('.main-header').length ){
    var header = new Headroom(document.querySelector('.main-navbar'), {
        tolerance: 0,
        offset : 150
    });
    header.init();
  }
}



/*---------------*\
  $NAV
\*---------------*/
function navInit(){
  if( $('.main-navbar').length ){
    enquire.register("screen and (max-width: 767px)", {
      match : function() {
        $('.main-header .btn-burger').removeClass('open').addClass('closed');
        $('.main-header nav').hide();
        $('.main-header nav ul.category > li').unbind('mouseenter mouseleave');
        $('.main-header nav ul.sub-menu').each(function(index) {
          $(this).closest('li').find('> a').click(function() {
            if( $(this).next('ul.sub-menu').is(':visible') ) {
              $(this).next('ul.sub-menu').slideUp();
              $(this).parent().removeClass('active');
            }
            else {
              $('.main-header nav ul.sub-menu').slideUp();
              $(this).next('ul.sub-menu').stop(true, true).slideDown();
              $('.main-header nav ul.category > li').removeClass('active');
              $(this).parent().addClass('active');
            }
            return false;
          });
        });
      }
    });
    enquire.register("screen and (min-width: 768px)", {
      match : function() {
        $('.main-header nav').removeClass('active');
        $('.main-header nav').show();
        $('.main-header nav ul.category > li > a').unbind('click');
        hoverNav = false;
        $('.main-header nav ul.category').hover(function() {
          //
        }, function() {
          hoverNav = false;
        });
        $('.main-header nav ul.category > li').hover(function() {
          if( hoverNav == true ) {
            $('.sub-menu', this).show();
          }
          else {
            hoverNav = true;
            $('.sub-menu', this).fadeIn(300);
          }
          $(this).addClass('active');
          if( $('.main-header nav ul.category > li.current').length ) {
            $('.main-header nav ul.category > li.current').toggleClass('current current-off');
          }
        }, function() {
          if( hoverNav == true ) {
            $('.sub-menu', this).hide();
          }
          else {
            hoverNav = false;
            $('.sub-menu', this).fadeOut(300);
          }
          $(this).removeClass('active');
          if( $('.main-header nav ul.category > li.current-off').length ) {
            $('.main-header nav ul.category > li.current-off').toggleClass('current current-off');
          }
        });
      }
    });
  }
}



/*---------------*\
  $BURGER
\*---------------*/
function burgerInit(){
  if( $('.main-header .btn-burger').length ){
    $('.main-header .btn-burger').click(function() {
      $(this).toggleClass('open closed');
      if( $(this).hasClass('open') ) {
        $('.main-header nav').addClass('active');
        $('.main-header nav').stop(true, true).slideDown(300);
      }
      else {
        $('.main-header nav').removeClass('active');
        $('.main-header nav').slideUp(300);
      }
    });
  }
}



/*---------------*\
  $CHARACTER
\*---------------*/
function charactersInit(){
  if( $('.main-header .character').length ){
    $('.main-header .character').hover(function() {
      $('.main-header .character').addClass('hover');
    }, function() {
      $('.main-header .character').removeClass('hover');
    });
  }
}



/*---------------*\
  $SEARCH
\*---------------*/
function searchInit(){
  if( $('.main-navbar').length ){
    $('.main-header ul.category > li.search').hover(function() {
      $(this).addClass('active');
    }, function() {
      $(this).removeClass('active');
    });
  }
}



/*---------------*\
  $SCROLL TO
\*---------------*/
function scrollToInit(){
  if( $('.scroll-to').length ){
    $('.scroll-to').click(function() {
      var target = $(this).attr('href');
      var speed = 500;
      $('html, body').animate( { scrollTop: $(target).offset().top }, speed );
      return false;
    });
  }
}



/*---------------*\
  $OWL CAROUSEL
\*---------------*/
function carouselInit(){
  if( $("#slideshow").length || $("#thumbnail").length ){
    var sync1 = $("#slideshow");
    var sync2 = $("#thumbnail");
    function syncPosition(el){
      var current = this.currentItem;
      $("#thumbnail")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced")
      if($("#thumbnail").data("owlCarousel") !== undefined){
        center(current)
      }
    }
    function center(number){
      var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
      var num = number;
      var found = false;
      for(var i in sync2visible){
        if(num === sync2visible[i]){
          var found = true;
        }
      }
      if(found===false){
        if(num>sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", num - sync2visible.length+2)
        }else{
          if(num - 1 === -1){
            num = 0;
          }
          sync2.trigger("owl.goTo", num);
        }
      } else if(num === sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", sync2visible[1])
      } else if(num === sync2visible[0]){
        sync2.trigger("owl.goTo", num-1)
      }
    }
    sync1.owlCarousel({
      singleItem            : true,
      slideSpeed            : 1000,
      navigation            : false,
      pagination            : false,
      afterAction           : syncPosition,
      responsiveRefreshRate : 200,
      autoHeight            : true,
    });
    sync2.owlCarousel({
      items                 : 5,
      itemsDesktop          : [1199,4],
      itemsDesktopSmall     : [991,3],
      itemsTablet           : [767,5],
      itemsMobile           : [479,2],
      navigation            : true,
      pagination            : false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });
    $("#thumbnail").on("click", ".owl-item", function(e){
      e.preventDefault();
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
    });
  }
}



/*---------------*\
  $TOOLTIP
\*---------------*/
function tooltipInit(){
  if( $('[data-toggle="tooltip"]').length ){
    $('[data-toggle="tooltip"]').tooltip();
  }
}



/*---------------*\
  $FULLSCREEN
\*---------------*/
function fullScreenInit(){
  if( $('.owl-container .expand').length ){
    $('.owl-container .expand').click(function(e){
      if( $(this).closest('.owl-container').hasClass('fullscreen') ) {
        $(this).closest('.owl-container').removeClass('fullscreen');
        $('body').css('overflow','inherit');
      }
      else {
        $(this).closest('.owl-container').addClass('fullscreen');
        $('body').css('overflow','hidden');
      }
      $(this).find('.fa').toggleClass('fa-expand fa-compress');
      e.preventDefault();
      $('#slideshow').data('owlCarousel').destroy();
      $('#thumbnail').data('owlCarousel').destroy();
      carouselInit();
    });
  }
}



/*---------------*\
  $TWENTYTWENTY
\*---------------*/
function twentytwentyInit(){
  if( $('.twentytwenty').length ){
    $('.twentytwenty').twentytwenty();
  }
}


/*---------------*\
  $RATING
\*---------------*/
function ratingInit(){
  if( $(".rating").length ){
    //
  }
}



/*---------------*\
  $GIFS
\*---------------*/
function gifsInit(){
  if( $(".gifs img").length ){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      var srcAnimated = $(".gifs img").data('animated');
      $(".gifs img").attr('src', srcAnimated);
    }
    else {
      $(".gifs img").hover(function(){
        var srcAnimated = $(this).data('animated');
        $(this).attr('src', srcAnimated);
      }, function(){
        var srcStatic = $(this).data('static');
        $(this).attr('src', srcStatic);
      });
    }
  }
}



/*---------------*\
  $SORT
\*---------------*/
function sortInit(){
  if( $(".filmography .btn-group").length ){

    $('.filmography .btn-group .btn').click(function(){
      if( $(this).hasClass('active') ){
        $('.filmography .btn-group .btn').removeClass('active');
        $('.filmography .table>tbody>tr>td').fadeIn();
      }
      else {
        var target = $(this).find('i').attr('class');
        $('.filmography .btn-group .btn').removeClass('active');
        $(this).toggleClass('active');
        var elements = $('.filmography .table>tbody>tr>td').find('i');
        for(var icon=0; icon<=elements.length; icon++){
          if( $(elements[icon]).hasClass(target) ){
            $(elements[icon]).closest('tr').find('td').show();
          }
          else {
            $(elements[icon]).closest('tr').find('td').fadeOut();
          }
        }
      }
    });

  }
}



/*---------------*\
  $VIDEO CONTROLS
\*---------------*/
function videoControlsInit(){
  if( $(".video-controls").length ){

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $('#video').hide();
      $('.video-controls .play').find('.fa').addClass('fa-play').removeClass('fa-pause');
    }

    $('.video-controls .play').click(function() {
      $(this).find('.fa').toggleClass('fa-play fa-pause');
      if( $(this).find('.fa').hasClass('fa-play') ) {
        $('#video').get(0).pause();
      }
      else {
        $('#video').fadeIn(1000);
        $('#video').get(0).play();
      }
    });

    $('.video-controls .mute').click(function() {
      if( !$(this).hasClass('active') ) {
        $(this).addClass('active').find('.fa').addClass('fa-volume-up').removeClass('fa-volume-off');
        $('#video').prop('muted', false);
      }
      else {
        $(this).removeClass('active').find('.fa').addClass('fa-volume-off').removeClass('fa-volume-up');
        $('#video').prop('muted', 'muted');
      }
    });

    $('.video-controls .mute').hover(function() {
      if( !$(this).hasClass('active') ) {
        $(this).find('.fa').addClass('fa-volume-up').removeClass('fa-volume-off');
        $('#video').prop('muted', false);
      }
    }, function() {
      if( !$(this).hasClass('active') ) {
        $(this).find('.fa').addClass('fa-volume-off').removeClass('fa-volume-up');
        $('#video').prop('muted', 'muted');
      }
    });

    function hideVideo(e) {
      $('#video').fadeOut(1000);
      $('.video-controls .play').find('.fa').addClass('fa-play').removeClass('fa-pause');
    }

    document.getElementById('video').addEventListener('ended', hideVideo, false);

  }
}



/*---------------*\
  $CONTACT
\*---------------*/
function contactInit(){
  if( $(".form-contact").length ){
    $('#formOtherSubject').hide();
    $('#formSubject').change(function(e){
      if( $(this).val() == 'Autre : préciser' ) {
        $('#formOtherSubject').fadeIn();
      }
      else {
        $('#formOtherSubject').fadeOut();
      }
    });
  }
}



/*---------------*\
  $POSITION
\*---------------*/
function positionInit(){
  if( $(document).scrollTop() >= 1 ) {
    $('.main-header .main-navbar .logo').addClass('fixed');
  }
  else {
    $('.main-header .main-navbar .logo').removeClass('fixed');
  }
}



/*---------------*\
  $HOMEPAGE
\*---------------*/
function homepageInit(){
  if( $('.main-navbar').length ){
    enquire.register("screen and (max-width: 991px)", {
      match : function() {
        $('.news article.last .horizontal .col').insertAfter('.news article.last .horizontal .img-container');
      }
    });
    enquire.register("screen and (min-width: 992px)", {
      match : function() {
        $('.news article.last .horizontal .img-container').insertAfter('.news article.last .horizontal .col');
      }
    });
  }
}



/*---------------*\
  $ASCII
\*---------------*/
function asciiInit(){
  $.get( '/malcolmfrance/wp-content/themes/malcolmfrance/ascii.html', function(data) {
    console.log(data);
  });
}



/*---------------*\
  $INIT
\*---------------*/
$(document).ready(function(){

  headerInit();
  navInit();
  burgerInit();
  charactersInit();
  searchInit();
  scrollToInit();
  carouselInit();
  fullScreenInit();
  twentytwentyInit();
  tooltipInit();
  ratingInit();
  gifsInit();
  videoControlsInit();
  sortInit();
  contactInit();
  positionInit();
  homepageInit();
  asciiInit();

  if(navigator.userAgent.match(/Trident\/7\./)){
    $('body').on("mousewheel", function(){
      event.preventDefault();
      var wheelDelta = event.wheelDelta;
      var currentScrollPosition = window.pageYOffset;
      window.scrollTo(0, currentScrollPosition - wheelDelta);
    });
  }

});



$(window).load(function(){

  positionInit();

});



$(window).scroll(function(){

  positionInit();

});
