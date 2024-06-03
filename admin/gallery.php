<?php
include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Gallery
                    <a href="gallery-create.php" class="btn btn-info float-end">Add Image</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       $gallery = getAll('gallery');
                       if($gallery)
                       {
                        if(mysqli_num_rows($gallery) > 0)
                        {
                             foreach($gallery as $item)
                             {
                                 ?>
                                 <tr>
                                     <td><?=  $item['id'];?></td>
                                     <td><img src="<?= '../' . $item['image']; ?>" alt="img" style="width: 70px; height: 70px;"></td>

                                     <td>
                                        <?php
                                        if($item['status'] == 1)
                                        {
                                            echo '<span class="badge bg-danger text-white">Hidden</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="badge bg-success text-white">Visible</span>';
                                        }
                                        ?>
                                     </td>

                                     <td>
                                         <!-- <a href="gallery-edit.php?id=<?=  $item['id'];?>" class="btn btn-success btn-sm">Edit</a> -->
                                         <a href="gallery-delete.php?id=<?=  $item['id'];?>" 
                                         class="btn btn-danger btn-sm mx-2"
                                         onclick = "return confirm('Are you sure you want to delete this image?')"
                                         >
                                         Delete</a>
                                     </td>
                                 </tr>
 
                                 <?php
                             }
                        }
                        else
                        {
                         ?>
                             <tr>
                                 <td  colspan="4">No Record Found</td>
                             </tr>
                         <?php
                        }
                       }

                       else
                       {
                        ?>
                        <tr>
                            <td  colspan="5">Something went Wrong!</td>
                        </tr>
                        <?php
                       }
                     
                    ?> 
                 

                    
                </tbody>
            </table>

            </div>
        </div>
    </div>
</div>




<?php
include('includes/footer.php');
?>