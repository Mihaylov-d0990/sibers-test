<?php 
    // A function that creates options for select 

    function create_select($query, $select, $compare) {

        while($row = mysqli_fetch_assoc($query)) {

            $id     = $row['id'];
            $name   = $row['name'];

            if ($row['name'] == $compare) {
                $select = $select . "<option selected value='$id'>$name</option>";
            } else {
                $select = $select . "<option value='$id'>$name</option>";
            }
        }
        return $select;
    }
?>