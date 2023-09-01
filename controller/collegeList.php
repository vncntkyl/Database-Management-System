<?php

function printColleges($conn){
    $collegeSQL = 'SELECT `collegeName` FROM tblcolleges ORDER BY `deptType` ASC, `collegeName`';
    if($query = mysqli_query($conn,$collegeSQL)){
        return $query;
    }
}

?>