<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $serviceId = validate($paraResult);

    $service = getById('services', $serviceId);
    if($service['status'] == 200)
    {
        $serviceDeleteRes = deleteQuery('services',$serviceId);
        if($serviceDeleteRes)
        {
            $deleteImage = "../".$service['data']['image'];
            if(file_exists($deleteImage))
            {
                unlink($deleteImage);
            }
            redirect('services.php','Service Deleted Successfully');
        }
        else
        {
            
        redirect('services.php','Something went wrong');
        }
    }
    else
    {
        redirect('services.php',$service['message']);
    }
}
else
{
    redirect('services.php',$paraResult);
}


?>