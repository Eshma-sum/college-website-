<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $galleryId = validate($paraResult);

    $gallery = getById('gallery', $galleryId);
    if($gallery['status'] == 200)
    {
        $galleryDeleteRes = deleteQuery('gallery',$galleryId);
        if($galleryDeleteRes)
        {
            $deleteImage = "../".$gallery['data']['image'];
            if(file_exists($deleteImage))
            {
                unlink($deleteImage);
            }
            redirect('gallery.php','Image Deleted Successfully');
        }
        else
        {
            
        redirect('gallery.php','Something went wrong');
        }
    }
    else
    {
        redirect('gallery.php',$gallery['message']);
    }
}
else
{
    redirect('gallery.php',$paraResult);
}


?>