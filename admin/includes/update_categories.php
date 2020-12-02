<form action="" method="post">
    <div class="form-group">
        <label for="editCatTitle">Edit Categories</label>
        <?php
            if (isset($_GET['edit'])) {
            $catId = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = {$catId} ";

            $selectCategoriesId = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($selectCategoriesId)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];
            ?>
             <input type="text" name="editCatTitle" id="editCatTitle" class="form-control" value="<?php if(isset($catTitle)) {echo $catTitle; }?>">

        <?php
            }
            }
        ?>
        <?php

                ///////// update Query
                if (isset($_POST['updateCategories'])) {
                    $catTitle = $_POST['editCatTitle'];
                    $query = "UPDATE categories SET  cat_title = '{$catTitle}' WHERE cat_id = $catId ";
                   
                    $updateQuery = mysqli_query($conn, $query);

                    if (!$updateQuery) {
                        die("Query Faild " . mysqli_error($conn));
                    }

                }
            ?>


    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updateCategories" value="Update Category">
    </div>

</form>
