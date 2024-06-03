<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $voiceId = validate($paraResult);

    $voice = getById('voice', $voiceId);
    if($voice['status'] == 200)
    {
        $voiceDeleteRes = deleteQuery('voice',$voiceId);
        if($voiceDeleteRes)
        {
            $deleteImage = "../".$voice['data']['image'];
            if(file_exists($deleteImage))
            {
                unlink($deleteImage);
            }
            redirect('voice.php','Student Voice Deleted Successfully');
        }
        else
        {
            
        redirect('voice.php','Something went wrong');
        }
    }
    else
    {
        redirect('voice.php',$voice['message']);
    }
}
else
{
    redirect('voice.php',$paraResult);
}


?>