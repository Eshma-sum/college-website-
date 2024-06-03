<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $infoId = validate($paraResult);

    $info = getById('infos', $infoId);
    if($info['status'] == 200)
    {
        $infoDeleteRes = deleteQuery('infos',$infoId);
        if($infoDeleteRes)
        {
            $deleteMedia = "../".$info['data']['media'];
            if(file_exists($deleteMedia))
            {
                unlink($deleteMedia);
            }
            redirect('infos.php','Info Deleted Successfully');
        }
        else
        {
            
        redirect('infos.php','Something went wrong');
        }
    }
    else
    {
        redirect('infos.php',$info['message']);
    }
}
else
{
    redirect('infos.php',$paraResult);
}


?>