<!-- HTML Form -->
<form method="post">
    <label for="dish">Choose a Dish:</label>
    <select name="dish" id="dish">
        <option value="Select">---Select---</option>
        <option value="Spring Rolls">Spring Rolls</option>
        <option value="Garlic Bread">Garlic Bread</option>
        <option value="Pizza">Pizza</option>
        <option value="Butter Paneer">Butter Paneer</option>
        <option value="Gulab Jamun">Gulab Jamun</option>
        <option value="Ice Cream">Ice Cream</option>
    </select>
    <input type="submit" value="Find Category">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $dish = $_POST["dish"];

    switch ($dish) 
    {
        case "Spring Rolls":
        case "Garlic Bread":
            echo "$dish belongs to the *Starter* category.";
            break;
        case "Pizza":
        case "Butter Paneer":
            echo "$dish belongs to the *Main Course* category.";
            break;
        case "Gulab Jamun":
        case "Ice Cream":
            echo "$dish belongs to the *Dessert* category.";
            break;
        default:
            echo "Sorry, we don't recognize the dish: $dish.";
    }
}
?>

