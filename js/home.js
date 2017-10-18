//Navigation bar Scroll

$(document).ready(function () {
    var navpos = $('#navmenu').offset();
    console.log(navpos.top);
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 300) {
            $('#fix-navmenu').addClass('db');
            $('navmenu').removeClass('db');
        } else {
            $('navmenu').addClass('db');
            $('#fix-navmenu').removeClass('db');
        }
    });
});

//Go to individual container 
$(document).ready(function () {
      $('li a[href*=#]').each(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    && location.hostname == this.hostname
                    && this.hash.replace(/#/, '')) {
                    var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) + ']');
                    var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
                    if ($target) {
                         var targetOffset = $target.offset().top;
                    $(this).click(function () {
                    $("li a").removeClass("active");
                    $(this).addClass('active');
                               $('html, body').animate({scrollTop: targetOffset}, 1000);
                               return false;
                         });
                  }
            }
      });
});



// $(document).ready(function($) {          
//     $(document).ready(function(){                    
//         $(window).scroll(function(){                          
//             if ($(this).scrollTop() > 200) {
//                 $('#fix-navmenu').fadeIn(500);
//             } else {
//                 $('#fix-navmenu').fadeOut(500);
//             }
//         });
//     });
// });