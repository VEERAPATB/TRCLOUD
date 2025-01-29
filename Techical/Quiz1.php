<!-- Create a web app that output a triangle of '*' depending on the user input intege -->
<!-- 
Condition
    For even numbers, a head-up triangle.
    For odd numbers, an upside-down triangle.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz-1</title>
</head>
<body>

    <form action="" method="POST">
        <p>Input your Number of star <input type="text" name="number"></p>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
    Condition($_POST);
    ?>  
<?php

function Condition(){
    echo '<pre>';
    
    $number = filter_input(INPUT_POST,'number',FILTER_VALIDATE_INT);        // Check Validate integer type [number]
    
    // Condition check if input not number
    if(empty($number)){
        echo "That number wasn't valid, Please check your input [number only]";
    }
    // Condition input for number
    else{
        // Condition filter Number less than 0
        if($number < 0){
            $number = abs($number);
            echo "Do you want to display $number? <br/>";
        }
        // Number odd number
        if($number %2 == 0){
        
            for($start=1;$start<=$number;$start++){
                for($end=0;$end<$start;$end++){
                    echo "*";
                };
                echo "<br/>";
            }
        }
        // Number even number
        else if($number %2 != 0){
            for($start=$number; $start>=1; $start--){
                for($end=1;$end<=$start;$end++){
                    echo "*";
                };
                echo "<br/>";
            }
        }
    }
        
}