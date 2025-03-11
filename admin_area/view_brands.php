<h3 class="text-center text-success">All Brands</h3>
<table class="table table-border mt-5 w-50 m-auto align-center">
    <thead class="bg-info">
        <tr class="text-center">
            <th>S.No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-danger text-light">
        <?php

        $get_categories = "SELECT * FROM `brands`";
        $result = mysqli_query($con, $get_categories);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
                ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='text-center'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brands=<?php echo $brand_id ?>' type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }   ?>
    </tbody>
</table>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
   <h4><b>BABA</b> Are you sure? You want to <b>Delete </b>this</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brands=<?php echo $brand_id ?>' class="text-light text-decoration-none">YES</a></button>
      </div>
    </div>
  </div>
</div>