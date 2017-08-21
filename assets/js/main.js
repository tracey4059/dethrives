$(document).ready(function() {       //owl
    $(".owl-carousel").owlCarousel({
        loop: false,
        responsiveClass: true,
        nav: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40,
                margin: 5,
                dots: false
            },
            640: {
                items: 2,
                stagePadding: 50,
                margin: 10,
                dots: false
            },
            1024: {
                items: 3,
                loop: false,
                dots: false
            },
            1400: {
                items: 4,
                loop: false,
                dots: false
            }
        }
    });
});

$(document).ready(function() {       //owl with sidebar
    $(".owl-carousel-sm").owlCarousel({
        loop: false,
        responsiveClass: true,
        nav: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40,
                margin: 5,
                dots: false
            },
            640: {
                items: 2,
                stagePadding: 50,
                margin: 10,
                dots: false
            },
            1024: {
                items: 2,
                loop: false,
                dots: false
            },
            1400: {
                items: 2,
                loop: false,
                dots: false
            }
        }
    });
});


if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divone = jQuery(".col").height();
    var divtwo = jQuery(".col2").height();

    var maxdiv = Math.max(divone, divtwo);

    jQuery(".col").height(maxdiv);
    jQuery(".col2").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divthree = jQuery(".col3").height();
    var divfour = jQuery(".col4").height();

    var maxdiv = Math.max(divthree, divfour);

    jQuery(".col3").height(maxdiv);
    jQuery(".col4").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divfive = jQuery(".col5").height();
    var divsix = jQuery(".col6").height();

    var maxdiv = Math.max(divfive, divsix);

    jQuery(".col5").height(maxdiv);
    jQuery(".col6").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divseven = jQuery(".col7").height();
    var diveight = jQuery(".col8").height();

    var maxdiv = Math.max(divseven, diveight);

    jQuery(".col7").height(maxdiv);
    jQuery(".col8").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divnine = jQuery(".col9").height();
    var divten = jQuery(".col10").height();

    var maxdiv = Math.max(divnine, divten);

    jQuery(".col9").height(maxdiv);
    jQuery(".col10").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divelevin = jQuery(".col11").height();
    var divtwelve = jQuery(".col12").height();

    var maxdiv = Math.max(divelevin, divtwelve);

    jQuery(".col11").height(maxdiv);
    jQuery(".col12").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divthirteen = jQuery(".col13").height();
    var divfourteen = jQuery(".col14").height();

    var maxdiv = Math.max(divthirteen, divfourteen);

    jQuery(".col13").height(maxdiv);
    jQuery(".col14").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divfifteen = jQuery(".col15").height();
    var divsixteen = jQuery(".col16").height();

    var maxdiv = Math.max(divfifteen, divsixteen);

    jQuery(".col15").height(maxdiv);
    jQuery(".col16").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divseventeen = jQuery(".col17").height();
    var diveightteen = jQuery(".col18").height();

    var maxdiv = Math.max(divseventeen, diveightteen);

    jQuery(".col17").height(maxdiv);
    jQuery(".col18").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divnineteen = jQuery(".col19").height();
    var divtwenty = jQuery(".col20").height();

    var maxdiv = Math.max(divnineteen, divtwenty);

    jQuery(".col19").height(maxdiv);
    jQuery(".col20").height(maxdiv);

});
}
else {
}

if ( $(window).width() > 639) {
  jQuery(document).ready(function() {   //two equal height columns, after 630px not equal
    var divtwone = jQuery(".col21").height();
    var divtwtwo = jQuery(".col22").height();

    var maxdiv = Math.max(divtwone, divtwtwo);

    jQuery(".col21").height(maxdiv);
    jQuery(".col22").height(maxdiv);

});
}
else {
}

// AMF WAS HERE
$(document).ready(function() {
  var acc = document.getElementsByClassName('accordion');
  var moreBtn = document.getElementsByClassName('alm-load-more-btn');
  var $grid = $('.grid');
  var i;

  // init Masonry
  $grid.masonry({
    // options...
    itemSelector: '.grid-item'
  });

  for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      $('.active').removeClass('active');
      this.classList.toggle("active");
      $(this).children(".plus-minus").toggleClass("clicked");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    };
  }
});





// END OF AMF TERRITORY

// window.onresize = function(){ $('.mp-pusher').removeClass('mp-pushed'); $('.mp-pusher').addClass('mp-pushed'); }  // add and remove class
