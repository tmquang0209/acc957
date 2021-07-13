
<?php
//-------------------------------------------------- DEFINE MAXMEM
define ("MAXMEM", 32*1024*1024);  //--- memory limit (32M) ---

//-------------------------------------------------- ENOUGH MEMORY ?
function enoughmem ($x, $y, $rgb=3) {
    return ( $x * $y * $rgb * 1.7 < MAXMEM - memory_get_usage() );
}

//-------------------------------------------------- SIMPLE EXAMPLE
list ($x, $y) = @getimagesize ('your_img.jpg');  //--- get size of img ---
if (enoughmem($x,$y)) {
    $img = @imagecreatefromjpeg ('your_img.jpg');  //--- open img file ---
    $thumb = 200;  //--- max. size of thumb ---
    if ($x > $y) {
        $tx = $thumb;  //--- landscape ---
        $ty = round($thumb / $x * $y);
    } else {
        $tx = round($thumb / $y * $x);  //--- portrait ---
        $ty = $thumb;
    }
    if (enoughmem($tx,$ty)) {
        $thb = imagecreatetruecolor ($tx, $ty);  //--- create thumbnail ---
        imagecopyresampled ($thb,$img, 0,0, 0,0, $tx,$ty, $x,$y);
        imagejpeg ($thb, 'your_thumbnail.jpg', 80);
        imagedestroy ($thb);
    }
    imagedestroy ($img);
}

//--------------------------------------------------
//--- to check the memory working with           ---
//--- b/w-image or gif use:                      ---
//--------------------------------------------------
$check = enoughmem ($x, $y, 1);
?>