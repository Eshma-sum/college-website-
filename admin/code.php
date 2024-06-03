<?php
require '../config/function.php';

if(isset($_POST['saveUser']))
{
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;
    // $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $role = validate($_POST['role']);

    if($name != '' || $email != '' || $phone != '' || $password != '')
    {
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);
        // $query = "INSERT INTO users (name,phone,email,password,is_ban) 
        //           VALUES ('$name','$phone','$email','$hashPassword','$is_ban')";
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            redirect('users-create.php','Invalid last name and first name. Only letters, spaces, and hyphens are allowed.');
                exit;
        }
    
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect('users-create.php','Invalid email format.');
            // echo "Invalid email format.";
            exit;
        }
    
        if (!preg_match("/^\d{10}$/", $number)) {
            redirect('users-create.php','Invalid phone number. Must be 10 digits.');
            // echo "Invalid phone number. Must be 10 digits.";
            exit;
        }
        $query = "INSERT INTO users (name,phone,email,password,is_ban,role) 
                  VALUES ('$name','$phone','$email','$hashPassword','$is_ban','$role')";
        $result = mysqli_query($conn,$query);

        // $result = mysqli_stmt_execute($stmt);

        if($result)
        {
            redirect('users.php','User/Admin Added Successfully');
        }
        else
        {

            redirect('users-create.php','Something Went Wrong');

        }
    }
    else
    {
        redirect('users-create.php','Please Fill All The Fields');
    }
}

if(isset($_POST['updateUser']))
{
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;
    // $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $role = validate($_POST['role']);

    //when trying to access an unadded id
    $userId = validate($_POST['userId']);

    $user = getById('users', $userId);
    if($user['status'] != 200)
    {
        redirect('users-edit.php?id='.$userId,'No such id found');
    }

    if($name != '' || $email != '' || $phone != '' || $password != '')
    {
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            redirect('users-edit.php','Invalid last name and first name. Only letters, spaces, and hyphens are allowed.');
                exit;
        }
    
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect('users-edit.php','Invalid email format.');
            // echo "Invalid email format.";
            exit;
        }
    
        if (!preg_match("/^\d{10}$/", $number)) {
            redirect('users-edit.php','Invalid phone number. Must be 10 digits.');
            // echo "Invalid phone number. Must be 10 digits.";
            exit;
        }
        $query = "UPDATE users SET 
                  name='$name',
                  phone='$phone',
                  email='$email',
                  password='$hashPassword',
                  is_ban='$is_ban',
                  role='$role'
                 WHERE id='$userId' ";
        // $query = "UPDATE users SET 
        //           name='$name',
        //           phone='$phone',
        //           email='$email',
        //           password='$hashPassword',
        //           is_ban='$is_ban',
        //          WHERE id='$userId' ";

        $result = mysqli_query($conn,$query);


        if($result)
        {
            redirect('users-edit.php?id='.$userId,'User/Admin Updated Successfully');
        }
        else
        {

            redirect('users-create.php','Something Went Wrong');

        }
    }
    else
    {
        redirect('users-create.php','Please Fill All The Fields');
    }
}
if(isset($_POST['saveSetting']))
    {
        $title = validate($_POST['title']);
        $slug = validate($_POST['slug']);
        $small_description = validate($_POST['small_description']);

        $meta_description = validate($_POST['meta_description']);
        $meta_keyword=validate($_POST['meta_keyword']);

        $email1 = validate($_POST['email1']);
        $email2 = validate($_POST['email2']);
        $mobile1 = validate($_POST['mobile1']);
        $mobile2 = validate($_POST['mobile2']);
        $phone = validate($_POST['phone']);
        $address = validate($_POST['address']);

        $settingId = validate($_POST['settingId']);

        if($settingId == 'insert')
        {
            $query = "INSERT INTO settings
                      (title,slug,small_description	,meta_description,meta_keyword,email1,email2,mobile1,mobile2,phone,address) 
                      VALUES ('$title','$slug','$small_description','$meta_description','$meta_keyword','$email1','$email2','$mobile1','$mobile2','$phone','$address')";

            $result = mysqli_query($conn,$query);
        }
        if(is_numeric($settingId))
        {
            $query = "UPDATE settings SET title='$title',
                slug='$slug',
                small_description='$small_description',
                meta_description='$meta_description',
                meta_keyword='$meta_keyword',
                email1='$email1',
                email2='$email2',
                mobile1='$mobile1',
                mobile2='$mobile2',
                phone='$phone',
                address='$address' 
                WHERE id='$settingId' ";

            $result = mysqli_query($conn,$query);
        }
        if($result)
        {
            redirect('settings.php','Settings saved');
        }
        else
        {
            redirect('settings.php','Something went wrong!');
        }
    }


    if(isset($_POST['saveSocialMedia']))
{
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    // $status = isset($_POST['status']) ? 1 : 0;
     $status = validate($_POST['status']) == true ? 1:0;

    if($name != '' || $url != '')
    {
        $query = "INSERT INTO social_medias (name,url,status) 
                  VALUES ('$name','$url','$status')";
        $result = mysqli_query($conn,$query);

        // $result = mysqli_stmt_execute($stmt);

        if($result)
        {
            redirect('social-media.php','Social Media Added Successfully');
        }
        else
        {

            redirect('social-media-create.php','Something Went Wrong');

        }
    }
    else
    {
        redirect('social-media-create.php','Please Fill All The Fields');
    }
}

if(isset($_POST['updateSocialMedia']))
{
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    // $status = isset($_POST['status']) ? 1 : 0;
    $status = validate($_POST['status']) == true ? 1:0;

    $socialMediaId = validate($_POST['socialMediaId']);

    if($name != '' || $url != '')
    {
        $query = "UPDATE social_medias SET 
                  name='$name',
                  url='$url',
                  status='$status'
                  WHERE id='$socialMediaId' LIMIT 1";
        // $query = "UPDATE social_medias SET
        //           name='$name',
        //           url='$url',
        //           status='$status' 
        //           WHERE id='$socialMediaId' LIMIT 1";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('social-media.php','Social Media Updated Successfully');
        }
        else
        {

            redirect('social-media-edit.php?id='.$socialMediaId,'Something Went Wrong');

        }
    }
    else
    {
        redirect('social-media-edit.php?id='.$socialMediaId,'Please Fill All The Fields');
    }
}

if(isset($_POST['saveService']))
{
    $name = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($name));
    $small_description = validate($_POST['small_description']);
    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image']['name'];

        $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        {
            redirect ('services.php','Sorry, only JPG, JPEG, PNG images only');
        }

        $path = "../assets/img/services/";
        $imgExt = pathinfo($image,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'assets/img/services/'.$filename;
    }
    else
    {
        $finalImage = NULL;
    }

    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? '1': '0';

        $query = "INSERT INTO services (name,slug,small_description,image,meta_title,meta_description,meta_keyword,status) 
                  VALUES ('$name',
                  '$slug',
                  '$small_description',
                  '$finalImage',
                  '$meta_title',
                  '$meta_description',
                  '$meta_keyword',
                  '$status')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['image']['size']>0)
            {
                move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
            }
            redirect('services.php','Services Added Successfully');
        }
        else
        {

            redirect('services-create.php','Something Went Wrong');

        }
}

if(isset($_POST['updateService']))
{
    $serviceId = validate($_POST['serviceId']);

    $name = validate($_POST['name']);

    $slug = str_replace(' ','-',strtolower($name));
    $small_description = validate($_POST['small_description']);

    $service = getById('services',$serviceId);

    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image']['name'];

        $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        {
            redirect ('services.php','Sorry, only JPG, JPEG, PNG images only');
        }


        $path = "../assets/img/services/";
        $deleteImage = "../".$service['data']['image'];
        if(file_exists($deleteImage))
        {
            unlink($deleteImage);
        }

        $imgExt = pathinfo($image,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'assets/img/services/'.$filename;
    }
    else
    {
        $finalImage = $service['data']['image'];
    }

    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? '1': '0';

        $query = "UPDATE services SET 
                  name='$name',
                  slug='$slug',
                  small_description='$small_description',
                  image='$finalImage',
                  meta_title='$meta_title',
                  meta_description='$meta_description',
                  meta_keyword='$meta_keyword',
                  status='$status' 
                  WHERE id='$serviceId'
                ";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['image']['size']>0)
            {
                move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
            }
            redirect('services-edit.php?id='.$serviceId,'Services Updated Successfully');
        }
        else
        {

            redirect('services-edit.php?id='.$serviceId,'Something Went Wrong');

        }
}


if(isset($_POST['saveInfo']))
{
    $highlight = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($highlight));
    $description = validate($_POST['small_description']);
    if($_FILES['media']['size'] > 0)
    {
        $media = $_FILES['media']['name'];

        $imgFileTypes = strtolower(pathinfo($media, PATHINFO_EXTENSION));
        // if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        // {
        //     redirect ('services.php','Sorry, only JPG, JPEG, PNG images only');
        // }

        $path = "../assets/img/infos/";
        $imgExt = pathinfo($media,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'assets/img/infos/'.$filename;
    }
    else
    {
        $finalImage = NULL;
    }

    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? '1': '0';

        $query = "INSERT INTO infos (name,slug,small_description,media,meta_title,meta_description,meta_keyword,status) 
                  VALUES ('$highlight',
                  '$slug',
                  '$description',
                  '$finalImage',
                  '$meta_title',
                  '$meta_description',
                  '$meta_keyword',
                  '$status')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['media']['size']>0)
            {
                move_uploaded_file($_FILES['media']['tmp_name'],$path.$filename);
            }
            redirect('infos.php','Infos Added Successfully');
        }
        else
        {

            redirect('infos-create.php','Something Went Wrong');

        }
}

if(isset($_POST['updateInfo']))
{
    $infoId = validate($_POST['infoId']);
    $highlight = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($highlight));
    $description = validate($_POST['small_description']);

    $info = getById('infos',$infoId);

    if($_FILES['media']['size'] > 0)
    {
        $media = $_FILES['media']['name'];

        // $imgFileTypes = strtolower(pathinfo($media, PATHINFO_EXTENSION));
        // if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        // {
        //     redirect ('services.php','Sorry, only JPG, JPEG, PNG images only');
        // }


        $path = "../assets/img/infos/";
        $deleteMedia = "../".$info['data']['media'];
        if(file_exists($deleteMedia))
        {
            unlink($deleteMedia);
        }

        $imgExt = pathinfo($media,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'assets/img/infos/'.$filename;
    }
    else
    {
        $finalImage = $info['data']['media'];
    }

    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? '1': '0';

        $query = "UPDATE infos SET 
                  name='$highlight',
                  slug='$slug',
                  small_description='$description',
                  media='$finalImage',
                  meta_title='$meta_title',
                  meta_description='$meta_description',
                  meta_keyword='$meta_keyword',
                  status='$status' 
                  WHERE id='$infoId'
                ";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['media']['size']>0)
            {
                move_uploaded_file($_FILES['media']['tmp_name'],$path.$filename);
            }
            redirect('infos-edit.php?id='.$infoId,'Infos Updated Successfully');
        }
        else
        {

            redirect('infos-edit.php?id='.$infoId,'Something Went Wrong');

        }
}


if(isset($_POST['saveCourse']))
{
    $name = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($name));
    // $description = validate($_POST['small_description']);
    if($_FILES['file']['size'] > 0)
    {
        $file = $_FILES['file']['name'];

        $imgFileTypes = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        // if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        // {
        //     redirect ('courses.php','Sorry, only JPG, JPEG, PNG images only');
        // }

        $path = "../assets/file";
        $imgExt = pathinfo($file,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $file = 'assets/file'.$filename;
    }
    else
    {
        $file= NULL;
    }

    // if($_FILES['fee']['size'] > 0)
    // {
    //     $fees = $_FILES['fee']['name'];

    //     $imgFileTypes = strtolower(pathinfo($fees, PATHINFO_EXTENSION));
    //     if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
    //     {
    //         redirect ('courses.php','Sorry, only JPG, JPEG, PNG images only');
    //     }

    //     $path = "../assets/img/courses/";
    //     $imgExt = pathinfo($fees,PATHINFO_EXTENSION);
    //     $filename = time().'.'.$imgExt;

    //     $finalImage2 = 'assets/img/courses/'.$filename;
    // }
    // else
    // {
    //     $finalImage2 = NULL;
    // }

    // $meta_title = validate($_POST['meta_title']);
    // $meta_description = validate($_POST['meta_description']);
    // $meta_keyword = validate($_POST['meta_keyword']);
    $status = validate($_POST['status']) == true ? '1': '0';

        // $query = "INSERT INTO courses (name,slug,syllabus,fee,meta_title,meta_description,meta_keyword,status) 
        //           VALUES ('$name',
        //           '$slug',
        //           '$finalImage1',
        //           '$finalImage2',
        //           '$meta_title',
        //           '$meta_description',
        //           '$meta_keyword',
        //           '$status')";
        $query = "INSERT INTO courses (name,slug,file,status) 
                  VALUES ('$name',
                  '$slug',
                  '$file',
                  '$status')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['file']['size']>0)
            {
                move_uploaded_file($_FILES['file']['tmp_name'],$path.$filename);
            }
            // if($_FILES['syllabus']['size']>0)
            // {
            //     move_uploaded_file($_FILES['syllabus']['tmp_name'],$path.$filename);
            // }
            // if($_FILES['fee']['size']>0)
            // {
            //     move_uploaded_file($_FILES['fee']['tmp_name'],$path.$filename);
            // }
            redirect('course.php','Courses Added Successfully');
        }
        else
        {

            redirect('courses-create.php','Something Went Wrong');

        }
}
if(isset($_POST['updateCourse']))
{
    $courseId = validate($_POST['courseId']);
    $name = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($name));

    $course = getById('courses',$courseId);
    if($_FILES['file']['size'] > 0)
    {
        $file = $_FILES['file']['name'];

        $imgFileTypes = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        // if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        // {
        //     redirect ('course.php','Sorry, only JPG, JPEG, PNG images only');
        // }
        $path = "../assets/file";
        $deleteFile = "../".$course['data']['file'];
        if(file_exists($deleteFile))
        {
            unlink($deleteFile);
        }

        $imgExt = pathinfo($file,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $file = 'assets/file'.$filename;
    }
    else
    {
        $file = $course['data']['file'];
    }

    // if($_FILES['syllabus']['size'] > 0)
    // {
    //     $syllabus = $_FILES['syllabus']['name'];

    //     $imgFileTypes = strtolower(pathinfo($syllabus, PATHINFO_EXTENSION));
    //     if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
    //     {
    //         redirect ('course.php','Sorry, only JPG, JPEG, PNG images only');
    //     }
    //     $path = "../assets/img/courses/";
    //     $deleteSyllabus = "../".$course['data']['syllabus'];
    //     if(file_exists($deleteSyllabus))
    //     {
    //         unlink($deleteSyllabus);
    //     }

    //     $imgExt = pathinfo($syllabus,PATHINFO_EXTENSION);
    //     $filename = time().'.'.$imgExt;

    //     $finalImage1 = 'assets/img/courses/'.$filename;
    // }
    // else
    // {
    //     $finalImage1 = $course['data']['syllabus'];
    // }

    // if($_FILES['fee']['size'] > 0)
    // {
    //     $fee = $_FILES['fee']['name'];

    //     $imgFileTypes = strtolower(pathinfo($fee, PATHINFO_EXTENSION));
    //     if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
    //     {
    //         redirect ('course.php','Sorry, only JPG, JPEG, PNG images only');
    //     }


    //     $path = "../assets/img/courses/";
    //     $deleteFee = "../".$course['data']['fee'];
    //     if(file_exists($deleteFee))
    //     {
    //         unlink($deleteFee);
    //     }

    //     $imgExt = pathinfo($fee,PATHINFO_EXTENSION);
    //     $filename = time().'.'.$imgExt;

    //     $finalImage2 = 'assets/img/courses/'.$filename;
    // }
    // else
    // {
    //     $finalImage2 = $course['data']['fee'];
    // }

    // $meta_title = validate($_POST['meta_title']);
    // $meta_description = validate($_POST['meta_description']);
    // $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? '1': '0';

        // $query = "UPDATE courses SET 
        //           name='$name',
        //           slug='$slug',
        //           syllabus='$finalImage1',
        //           fee='$finalImage2',
        //           meta_title='$meta_title',
        //           meta_description='$meta_description',
        //           meta_keyword='$meta_keyword',
        //           status='$status' 
        //           WHERE id='$courseId'
        //         ";
        $query = "UPDATE courses SET 
        name='$name',
        slug='$slug',
        file='$file',
        status='$status' 
        WHERE id='$courseId'
      ";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['file']['size']>0)
            {
                move_uploaded_file($_FILES['file']['tmp_name'],$path.$filename);
            }
            // if($_FILES['syllabus']['size']>0)
            // {
            //     move_uploaded_file($_FILES['syllabus']['tmp_name'],$path.$filename);
            // }
            // if($_FILES['fee']['size']>0)
            // {
            //     move_uploaded_file($_FILES['fee']['tmp_name'],$path.$filename);
            // }
            redirect('courses-edit.php?id='.$courseId,'Courses Updated Successfully');
        }
        else
        {

            redirect('courses-edit.php?id='.$courseId,'Something Went Wrong');

        }
}




if(isset($_POST['saveImage']))
{
    $name = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($name));
    // $description = validate($_POST['small_description']);
    if($_FILES['image']['size'] > 0)
    {
        $gallery = $_FILES['image']['name'];

        $imgFileTypes = strtolower(pathinfo($gallery, PATHINFO_EXTENSION));
        if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        {
            redirect ('gallery.php','Sorry, only JPG, JPEG, PNG images only');
        }

        $path = "../assets/img/gallery/";
        $imgExt = pathinfo($gallery,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'assets/img/gallery/'.$filename;
    }
    else
    {
        $finalImage = NULL;
    }
    // $meta_title = validate($_POST['meta_title']);
    // $meta_description = validate($_POST['meta_description']);
    // $meta_keyword = validate($_POST['meta_keyword']);
    $status = validate($_POST['status']) == true ? '1': '0';

        $query = "INSERT INTO gallery (name,slug,image,status) 
                  VALUES ('$name',
                  '$slug',
                  '$finalImage',
                  '$status')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['image']['size']>0)
            {
                move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
            }
            redirect('gallery.php','Image Added Successfully');
        }
        else
        {

            redirect('gallery-create.php','Something Went Wrong');

        }
}

if(isset($_POST['updateImage']))
{
    $galleryId = validate($_POST['galleryId']);
    $name = validate($_POST['name']);
    $slug = str_replace(' ','-',strtolower($name));

    $gallery = getById('gallery',$galleryId);

    if($_FILES['image']['size'] > 0)
    {
        $gallery = $_FILES['image']['name'];

        $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
        {
            redirect ('gallery.php','Sorry, only JPG, JPEG, PNG images only');
        }
        $path = "../assets/img/gallery/";
        $deleteImage = "../".$gallery['data']['image'];
        if(file_exists($deleteImage))
        {
            unlink($deleteImage);
        }

        $imgExt = pathinfo($gallery,PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'assets/img/gallery/'.$filename;
    }
    else
    {
        $finalImage = $gallery['data']['image'];
    }

    // $meta_title = validate($_POST['meta_title']);
    // $meta_description = validate($_POST['meta_description']);
    // $meta_keyword = validate($_POST['meta_keyword']);

    $status = validate($_POST['status']) == true ? '1': '0';

        $query = "UPDATE gallery SET 
                  name='$name',
                  slug='$slug',
                  image='$finalImage',
                  status='$status' 
                  WHERE id='$galleryId'
                ";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            if($_FILES['image']['size']>0)
            {
                move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
            }
            redirect('gallery-edit.php?id='.$galleryId,'Image Updated Successfully');
        }
        else
        {

            redirect('gallery-edit.php?id='.$galleryId,'Something Went Wrong');

        }
}


if(isset($_POST['saveAbout']))
    {
        $title = validate($_POST['title']);
        $slug = validate($_POST['slug']);
        $description1 = validate($_POST['description1']);
        $description2 = validate($_POST['description2']);
        $meta_description = validate($_POST['meta_description']);
        $meta_keyword=validate($_POST['meta_keyword']);
        $aboutId = validate($_POST['aboutId']);

        if($aboutId == 'insert')
        {
            $query = "INSERT INTO about_us
                      (title,slug,description1,description2,meta_description,meta_keyword) 
                      VALUES ('$title','$slug','$description1','$description2', '$meta_description', '$meta_keyword')";

            $result = mysqli_query($conn,$query);
        }
        if(is_numeric($aboutId))
        {
            $query = "UPDATE about_us SET title='$title',
                slug='$slug',
                description1='$description1',
                description2='$description2',
                meta_description='$meta_description',
                meta_keyword='$meta_keyword'
                WHERE id='$aboutId' ";

            $result = mysqli_query($conn,$query);
        }
        if($result)
        {
            redirect('about-us.php','Saved');
        }
        else
        {
            redirect('about-us.php','Something went wrong!');
        }
    }



    if(isset($_POST['saveVoice']))
    {
        $name = validate($_POST['name']);
        $slug = str_replace(' ','-',strtolower($name));
        $year = validate($_POST['year']);
        $description = validate($_POST['description']);
        if($_FILES['image']['size'] > 0)
        {
            $image = $_FILES['image']['name'];
    
            $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
            {
                redirect ('voice.php','Sorry, only JPG, JPEG, PNG images only');
            }
    
            $path = "../assets/img/voice/";
            $imgExt = pathinfo($image,PATHINFO_EXTENSION);
            $filename = time().'.'.$imgExt;
    
            $finalImage = 'assets/img/voice/'.$filename;
        }
        else
        {
            $finalImage = NULL;
        }

        $status = validate($_POST['status']) == true ? '1': '0';
    
            $query = "INSERT INTO voice (name,slug,year,description,image,status) 
                      VALUES ('$name',
                      '$slug',
                      '$year',
                      '$description',
                      '$finalImage',
                      '$status')";
    
            $result = mysqli_query($conn,$query);
    
            if($result)
            {
                if($_FILES['image']['size']>0)
                {
                    move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
                }
                redirect('voice.php','Courses Added Successfully');
            }
            else
            {
    
                redirect('voices-create.php','Something Went Wrong');
    
            }
    }

    if(isset($_POST['updateVoice']))
    {
        $voiceId = validate($_POST['voiceId']);
    
        $name = validate($_POST['name']);
    
        $slug = str_replace(' ','-',strtolower($name));
        $year = validate($_POST['year']);
        $description = validate($_POST['description']);
        $voice = getById('voice',$voiceId);
    
        if($_FILES['image']['size'] > 0)
        {
            $image = $_FILES['image']['name'];
    
            $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
            {
                redirect ('voice.php','Sorry, only JPG, JPEG, PNG images only');
            }
    
    
            $path = "../assets/img/voice/";
            $deleteImage = "../".$voice['data']['image'];
            if(file_exists($deleteImage))
            {
                unlink($deleteImage);
            }
    
            $imgExt = pathinfo($image,PATHINFO_EXTENSION);
            $filename = time().'.'.$imgExt;
    
            $finalImage = 'assets/img/voice/'.$filename;
        }
        else
        {
            $finalImage = $voice['data']['image'];
        }
    
        $status = validate($_POST['status']) == true ? '1': '0';
    
            $query = "UPDATE voice SET 
                      name='$name',
                      slug='$slug',
                      year='$year',
                      image='$finalImage',
                      description='$description',
                      status='$status' 
                      WHERE id='$voiceId'
                    ";
    
            $result = mysqli_query($conn,$query);
    
            if($result)
            {
                if($_FILES['image']['size']>0)
                {
                    move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
                }
                redirect('voices-edit.php?id='.$voiceId,'Services Updated Successfully');
            }
            else
            {
    
                redirect('voices-edit.php?id='.$voiceId,'Something Went Wrong');
    
            }
    }



    if(isset($_POST['saveNotices']))
    {
        $title = validate($_POST['name']);
        $slug = str_replace(' ','-',strtolower($title));
        $date = validate($_POST['date']);
        $description = validate($_POST['description']);
        if($_FILES['image']['size'] > 0)
        {
            $image = $_FILES['image']['name'];
    
            $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes!= 'png')
            {
                redirect ('notices.php','Sorry, only JPG, JPEG, PNG images only');
            }
    
            $path = "../assets/img/notice/";
            $imgExt = pathinfo($image,PATHINFO_EXTENSION);
            $filename = time().'.'.$imgExt;
    
            $finalImage = 'assets/img/notice/'.$filename;
        }
        else
        {
            $finalImage = NULL;
        }
        $status = validate($_POST['status']) == true ? '1': '0';
    
            $query = "INSERT INTO notices (name,slug,date,description,image,status) 
                      VALUES ('$title',
                      '$slug',
                      '$date',
                      '$description',
                      '$finalImage',
                      '$status')";
    
            $result = mysqli_query($conn,$query);
    
            if($result)
            {
                if($_FILES['image']['size']>0)
                {
                    move_uploaded_file($_FILES['image']['tmp_name'],$path.$filename);
                }
                redirect('notices.php','Courses Added Successfully');
            }
            else
            {
    
                redirect('notices-create.php','Something Went Wrong');
    
            }
    }

?>