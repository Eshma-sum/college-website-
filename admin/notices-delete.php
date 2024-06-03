<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $noticeId = validate($paraResult);

    $notice = getById('notices', $noticeId);
    if($notice['status'] == 200)
    {
        $noticeDeleteRes = deleteQuery('notices',$noticeId);
        if($noticeDeleteRes)
        {
            $deleteImage = "../".$service['data']['image'];
            if(file_exists($deleteImage))
            {
                unlink($deleteImage);
            }
            redirect('notices.php','Notice Deleted Successfully');
        }
        else
        {
            
        redirect('notices.php','Something went wrong');
        }
    }
    else
    {
        redirect('notices.php',$notice['message']);
    }
}
else
{
    redirect('notices.php',$paraResult);
}


?>