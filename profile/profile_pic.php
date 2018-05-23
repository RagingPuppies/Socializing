    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" > </script>
    <script type="text/javascript" src="js/jquery.imgareaselect.pack.js" > </script>
<div class="container" >
    <p>
        <img id="photo" src="uploads/<?php echo $_SESSION['newpic']; ?>" alt="Nature" title="Nature" />
    </p>
   <form action="crop.php" method="post" >
       <input type="hidden" name="x1" value="" />
       <input type="hidden" name="y1" value="" />
       <input type="hidden" name="x2" value="" />
       <input type="hidden" name="y2" value="" />
       <input type="hidden" name="width" value="" />
       <input type="hidden" name="height" value="" />
	   <input type="hidden" name="name" value="<?php echo $_SESSION['newpic']; ?>" />
	   <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
       <input type="submit" value="Crop" />
   </form>
</div>
<script>
    // This method is used to preview the selected area of main image
    function preview( img, selected ) {
        var scaleX = 200 / (selected.width);
        var scaleY = 200 / (selected.height);
        jQuery('#photo + div > img').css( {
            width: Math.round(scaleX * 400) + 'px',
            height: Math.round(scaleY * 400) + 'px',
            marginLeft: '-' + Math.round(scaleX * selected.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selected.y1) + 'px'
        });
    }

    // On document ready, we are placing an default image of image preview
    jQuery(document).ready(function () {
        jQuery('<div><img src="nature.jpg" style="position: relative; display:none;" /><div>').css( {
            float: 'left',
            position: 'relative',
            overflow: 'hidden',
            width: '200px',
            height: '200px',
            marginRight: '20px'
        }) .insertAfter(jQuery('#photo'));

    // On Initialization and select we are calling preview method
    // which displays selected image in parallel
    jQuery('#photo').imgAreaSelect( {
        aspectRatio: '1:1',
        handles: true,
        persistent: true,
        x1: 100, y1: 100, x2: 300, y2: 300,
        onInit: preview,
        onSelectChange: preview,
        onSelectEnd: function ( image, selected) {
            jQuery('input[name=x1]').val(selected.x1);
            jQuery('input[name=y1]').val(selected.y1);
            jQuery('input[name=x2]').val(selected.x2);
            jQuery('input[name=y2]').val(selected.y2);
            jQuery('input[name=width]').val(selected.width);
            jQuery('input[name=height]').val(selected.height);
        }
    });
});
</script>
