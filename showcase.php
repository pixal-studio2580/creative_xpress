
<?php 
  include ("header.php");
  include ("admin/common/db.php"); 
?>

<div class="bg_white float-left w-100 pt_30 pb_30">
  
  <div class="container main_container">
  <h1 class="section_title mb_20">Our best work</h1>
  <div id="buttons"></div>

  <div id="status"><progress max="50" value="0"></progress></div>
  
  <div id="image-container" class="gallery"></div>

</div>
<form id="form_register"></form>

<?php include ("footer.php");?>

<script>
  $(document).ready(function () {
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
    
    $(document).ready( function() {
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

      img_filter();
    });
    
    // reset container
    $('#reset').click( function() {
      $container.empty();
    });
    
    // -----  ----- //
    
    // return doc fragment with
    function getItems() {
      var items = '';
      for ( var i = 0; i < 10; i++ ) {
        items += getImageItem(i);
      }
      return items;
    }
    
    //getImageItem();
    // return an <li> with a <img> in it
    function getImageItem(i) {
        var imglist =[];
        var imgdesc =[];
    <?php 

    $query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $number_of_rows = $statement->rowCount();
    if($number_of_rows > 0)
    {
        $count = 0;
        foreach($result as $row)
    {
      $imgname = $row['image_name'];
        ?>
        imglist.push("<?php echo file_exists("admin/gallery/files/$imgname")?"admin/gallery/files/$imgname":''; ?>");
        imgdesc.push("<?php echo $row['image_description']; ?>");
        <?php

    }
    }


    ?>
    console.log(imglist.length);
      var item = '<li class="is-loading"  data-tags="'+imgdesc[i]+'">';
      var size = Math.random() * 3 + 1;
      var width = Math.random() * 110 + 100;
      width = Math.round( width * size );
      var height = Math.round( 140 * size );
      var rando = Math.ceil( Math.random() * 1000 );
      // 10% chance of broken image src
      // random parameter to prevent cached images
      // var src = rando < 100 ? '//foo/broken-' + rando + '.jpg' :
      //   // use lorempixel for great random images
      //   '//lorempixel.com/' + width + '/' + height + '/' + '?' + rando;

      //console.log(imageExists(imglist[i]));

      var src = imglist[i].length>0?imglist[i]:'//foo/broken-' + rando + '.jpg';
      item += '<img src="' + src + '" data-tags="'+imgdesc[i]+'" /></li>';
      return item;
    }
    
    // ----- -----///
    
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
</script>





</body>
</html>