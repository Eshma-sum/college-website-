<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Enquiries List
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First_Name</th>
                        <th>Last_Name</th>
                        <th>Email</th>
                        <th>Phone_no</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php
                       $contact = getAll('contact');
                       if($contact)
                       {
                        if(mysqli_num_rows($contact) > 0)
                        {
                             foreach($contact as $item)
                             {
                                 ?>
                                 <tr>
                                     <td><?=  $item['id'];?></td>
                                     <td><?=  $item['fname'];?></td>
                                     <td><?=  $item['lname'];?></td>
                                     <td><?=  $item['email'];?></td>
                                     <td><?=  $item['number'];?></td>
                
                                     <!-- <td>
                                         <a href="contact-delete.php?id=<?=  $item['id'];?>" 
                                         class="btn btn-danger btn-sm mx-2"
                                         onclick = "return confirm('Are you sure you want to delete this data?')"
                                         >
                                         Delete</a>
                                     </td> -->
                                 </tr>
 
                                 <?php
                             }
                        }
                        else
                        {
                         ?>
                             <tr>
                                 <td  colspan="6">No Record Found</td>
                             </tr>
                         <?php
                        }
                       }

                       else
                       {
                        ?>
                        <tr>
                            <td  colspan="6">Something went Wrong!</td>
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