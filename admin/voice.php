<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Student's Voice 
                    <a href="voices-create.php" class="btn btn-info float-end">Add Voice</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       $voices = getAll('voice');
                       if($voices)
                       {
                        if(mysqli_num_rows($voices) > 0)
                        {
                             foreach($voices as $item)
                             {
                                 ?>
                                 <tr>
                                     <td><?=  $item['id'];?></td>
                                     <td><?=  $item['name'];?></td>
                                     <td><?=  $item['year'];?></td>
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
                                         <a href="voices-edit.php?id=<?=  $item['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                         <a href="voices-delete.php?id=<?=  $item['id'];?>" 
                                         class="btn btn-danger btn-sm mx-2"
                                         onclick = "return confirm('Are you sure you want to delete this data?')"
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
                                 <td  colspan="5">No Record Found</td>
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