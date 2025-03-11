<h3 class="text-center text-success">All Categories</h3>
<table class="table table-border mt-5 w-50 m-auto align-center">
    <thead class="bg-info">
        <tr class="text-center">
            <th>S.No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-danger text-light">
        <?php

        $get_categories = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $get_categories);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $cat_id = $row['category_id'];
            $cat_title = $row['category_title'];
            $number++;
                ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $cat_title; ?></td>
            <td><a href='index.php?edit_category=<?php echo $cat_id ?>' class='text-center'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $cat_id ?>'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }   ?>
    </tbody>
</table>