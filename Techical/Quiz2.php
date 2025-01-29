<!-- Create a web app which can calculate the ratios from a user input number: -->
<!-- 
Condition
    User input a number in one of the five input fields.
    The app calculates the values for the other four fields according to the number given on the top.
    There must be a button to clear all fields.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz-2</title>
</head>
<body>
    <form action method="post">
        <table border = "1" style="width: 20;">
            <tbody>
                <tr>
                    <td style= "text-align:center">100</td>
                    <td style= "text-align:center">7</td>
                    <td style= "text-align:center">107</td>
                    <td style= "text-align:center">3</td>
                    <td style= "text-align:center">104</td>
                </tr>
                <tr>
                    <td><input type="text" oninput="calRatios(this, 0)"></td>
                    <td><input type="text" oninput="calRatios(this, 1)"></td>
                    <td><input type="text" oninput="calRatios(this, 2)"></td>
                    <td><input type="text" oninput="calRatios(this, 3)"></td>
                    <td><input type="text" oninput="calRatios(this, 4)"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="clearFields()">Clear</button>
    </form>
   
</body>
</html>

<script>
    // Function Clear data
    function clearFields(){
        document.querySelectorAll("input[type='text'").forEach(input => input.value = "");
    }
    // Check Index input data and Calculate Ratios
    function calRatios(Input,index){
        const factors = [100, 7, 107, 3, 104];
        const inputs = document.querySelectorAll("input[type='text']");
        const baseValue = parseFloat(Input.value);

        // Check value input 
        if (!isNaN(baseValue)) {
                factors.forEach((factor, i) => {
                    // check index 
                    if (i !== index) {
                        inputs[i].value = (baseValue / factors[index] * factor).toFixed(2);
                    }
                });
            }
    }
</script>