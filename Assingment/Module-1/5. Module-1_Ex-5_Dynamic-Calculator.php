<!-- calculator.html -->
<form method="post">
    <input type="number" name="num1" placeholder="Enter first number" required><br><br>
    <select name="operator">
        <option value="+">+</option>
        <option value="-">−</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select><br><br>
    <input type="number" name="num2" placeholder="Enter second number" required><br><br>
    <input type="submit" name="calculate" value="Calculate">
</form>

<?php
if (isset($_POST['calculate'])) 
{
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    if ($operator == "+") 
    {
        $result = $num1 + $num2;
        echo "Result: $num1 + $num2 = $result";
    } 
    elseif ($operator == "-") 
    {
        $result = $num1 - $num2;
        echo "Result: $num1 - $num2 = $result";
    } 
    elseif ($operator == "*") 
    {
        $result = $num1 * $num2;
        echo "Result: $num1 × $num2 = $result";
    } 
    elseif ($operator == "/") 
    {
        if ($num2 != 0) 
        {
            $result = $num1 / $num2;
            echo "Result: $num1 ÷ $num2 = $result";
        } 
        else 
        {
            echo "Error: Division by zero!";
        }
    } 
    else 
    {
        echo "Invalid operator selected.";
    }
}
?>