$(document).ready(function () {
    _bindhome_slider();
    _bindService_Post();
    _bindfetchimage();
    _demo();
});
function _demo(){
    var $container = $('#image-container');
    var $status = $('#status');
    var $progress = $('progress');
    
    var supportsProgress = $progress[0] &&
      // IE does not support progress
      $progress[0].toString().indexOf('Unknown') === -1;
    
    var loadedImageCount, imageCount;
    
    $('#add').click( function() {
      // add new images
      var items = getItems();
      $container.prepend( $(items) );
      // use ImagesLoaded
      $container.imagesLoaded()
        .progress( onProgress )
        .always( onAlways );
      // reset progress counter
      imageCount = $container.find('img').length;
      resetProgress();
      updateProgress( 0 );
    });
    
    // reset container
    $('#reset').click( function() {
      $container.empty();
    });
    
    // -----  ----- //
    
    // return doc fragment with
    function getItems() {
      var items = '';
      for ( var i = 0; i < 7; i++ ) {
        items += getImageItem();
      }
      return items;
    }
    
    // return an <li> with a <img> in it
    function getImageItem() {
      var item = '<li class="is-loading">';
      var size = Math.random() * 3 + 1;
      var width = Math.random() * 110 + 100;
      width = Math.round( width * size );
      var height = Math.round( 140 * size );
      var rando = Math.ceil( Math.random() * 1000 );
      // 10% chance of broken image src
      // random parameter to prevent cached images
      var src = rando < 100 ? '//foo/broken-' + rando + '.jpg' :
        // use lorempixel for great random images
        '//lorempixel.com/' + width + '/' + height + '/' + '?' + rando;
      item += '<img src="' + src + '" /></li>';
      return item;
    }
    
    // -----  ----- //
    
    function resetProgress() {
      $status.css({ opacity: 1 });
      loadedImageCount = 0;
      if ( supportsProgress ) {
        $progress.attr( 'max', imageCount );
      }
    }
    
    function updateProgress( value ) {
      if ( supportsProgress ) {
        $progress.attr( 'value', value );
      } else {
        // if you don't support progress elem
        $status.text( value + ' / ' + imageCount );
      }
    }
    
    // triggered after each item is loaded
    function onProgress( imgLoad, image ) {
      // change class if the image is loaded or broken
      var $item = $( image.img ).parent();
      $item.removeClass('is-loading');
      if ( !image.isLoaded ) {
        $item.addClass('is-broken');
      }
      // update progress element
      loadedImageCount++;
      updateProgress( loadedImageCount );
    }
    
    // hide status when done
    function onAlways() {
      $status.css({ opacity: 0 });
    }
    

 

      
}

function  _bindfetchimage(){
    // var $grid = $('.grid').masonry({
    //     itemSelector: '.grid-item',
    //     percentPosition: true,
    //     columnWidth: '.grid-sizer'
    // });

    // // layout Masonry after each image loads
    // $grid.imagesLoaded().progress( function() {
    //     $grid.masonry();
    // });

    //$(document).ready(function(){
        load_image_data();
            function load_image_data()
            {
                $.ajax({
                url:"fetch.php",
                method:"POST",
                success:function(data)
                    {          
                        //$('.image_tables').html(data);
                        $("#image-container").html(data);
                        getImageItem();
                    }
            });
        }  
    //});
}

//== Featured Car Slider ==============
function _bindhome_slider() {
    var offerslider = $('#home_slider');
    offerslider.owlCarousel({
        //center: true,
        items: 1,
        autoplay: false,
        loop: false,
        nav: true,
        margin: 0,
        dots: false,
        autoplayHoverPause: true,
        responsive: {
            680: {
                items: 1,
                singleItem: true
            },
            1268: {
                //items: 3
                items: 1,
                singleItem: true
            }
        }
    });
}

//Service Page Send User data to Service Lead Table
function _bindService_Post(){
    $('#form_register').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
        //return false; // Don't submit form for this demo
        alert('hello');
        event.preventDefault();
        $.ajax({
            url : "lead/service_post.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
                $('#message').text(strMessage);
                $(".service_lead")[0].reset();
            }

        })
        // $('.bs-callout-info').toggleClass('hidden', !ok);
    });

}


$(function () {
    
});