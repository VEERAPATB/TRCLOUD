<!-- Write a code that performs the array MAPPING function similar to VLOOKUP where the input arrays are -->
<!-- 
Condition
    'Array1' and 'Array2' returning 'Output' array.

-->
<?php
    $array1 = array(
        array('Code','Name'),
        array(101,'AAA'),
        array(102,'BBB'),
        array(103,'CCC'),
    );
    $array2 = array(
        array('Code','City'),
        array(103,'Singapore'),
        array(102,'Tokyo'),
        array(101,'Bangkok'),
    );
    echo '<pre>';
    //print_r($array1);
   
    echo "<table border='2' cellpadding='5' cellspacing='5'>";
    foreach($array1 as $row1){
        echo "<tr>";
            echo "<td>" . $row1[0] . "</td>"; 
            echo "<td>" . $row1[1] . "</td>"; 
            echo "</tr>";
    }

    echo '<pre>';
    echo "array1";

    //print_r($array2);
    echo "<table border='2' cellpadding='5' cellspacing='5'>";
    foreach($array2 as $row2){
        echo "<tr>";
            echo "<td>" . $row2[0] . "</td>"; 
            echo "<td>" . $row2[1] . "</td>"; 
            echo "</tr>";
    }
    echo '<pre>';
    echo "array2";
    $array_result = array();

    // Check Condition processing 
    $found = false;
    
    echo "<table border='2' cellpadding='5' cellspacing='5'>";
    // Loop Main Array [Array1]
    foreach($array1 as $row1){
        // Loop Seccond Array internal 
        foreach($array2 as $row2){
            // Check condition array by value in first position array 1 and array2 ==
            if($row1[0] == $row2[0]){
                // Merge Array1 and Array2 [main, mix seccond]
                $array_result[] = array_merge($row1,array($row2[1]));
                echo "<tr>";
                echo "<td>" . $row1[0] . "</td>"; // Code from array1
                echo "<td>" . $row1[1] . "</td>"; // Name from array1
                echo "<td>" . $row2[1] . "</td>"; // City from array2
                echo "</tr>";
                // Check Condition process [finish]
                $found = true;
                break;
            }// if check
        }// seccond foreach
    }// main foreach
    
    echo '<pre>';
    // table with headers
    echo "Output";
    echo "</table>";
    //echo '<pre>';

?>