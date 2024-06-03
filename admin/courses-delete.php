<?php
require '../config/function.php';


$paraResult = checkParamId('id');
if(is_numeric($paraResult))
{
    $courseId = validate($paraResult);

    $course = getById('courses', $courseId);
    if($course['status'] == 200)
    {
        $courseDeleteRes = deleteQuery('courses',$courseId);
        if($courseDeleteRes)
        {
            $deleteFile = "../".$course['data']['file'];
            if(file_exists($deleteFile))
            {
                unlink($deleteFile);
            }
            // $deleteSyllabus = "../".$course['data']['syllabus'];
            // if(file_exists($deleteSyllabus))
            // {
            //     unlink($deleteSyllabus);
            // }
            // $deleteFee = "../".$course['data']['fee'];
            // if(file_exists($deleteFee))
            // {
            //     unlink($deleteFee);
            // }
            redirect('course.php','Course Deleted Successfully');
        }
        else
        {
            
        redirect('course.php','Something went wrong');
        }
    }
    else
    {
        redirect('course.php',$course['message']);
    }
}
else
{
    redirect('course.php',$paraResult);
}


?>