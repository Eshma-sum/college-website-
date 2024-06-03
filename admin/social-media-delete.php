<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $socialMediaId = validate($paraResult);

    $socialMedia = getById('social_medias', $socialMediaId);
    if($socialMedia['status'] == 200)
    {
        $socialMediaDeleteRes = deleteQuery('social_medias',$socialMediaId);
        if($socialMediaDeleteRes)
        {
            redirect('social-media.php','Social Media Deleted Successfully');
        }
        else
        {
            
        redirect('social-media.php','Something went wrong');
        }
    }
    else
    {
        redirect('social-media.php',$socialMedia['message']);
    }
}
else
{
    redirect('social-media.php',$paraResult);
}


?>