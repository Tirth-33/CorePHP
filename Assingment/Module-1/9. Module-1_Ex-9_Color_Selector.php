<!DOCTYPE html>
<html>
<head>
  <title>Color Selector</title>
  <style>
    body 
    { 
        font-family: Arial, sans-serif; 
        margin: 20px; 
    }
    .output 
    { 
        margin-top: 20px; 
        font-size: 1.2em; 
        font-weight: bold; 
    }
  </style>
</head>
<body>

  <h2>Choose Your Favorite Color</h2>

  <form onsubmit="showColor(event)">
    <label for="color">Enter a Color (Red, Green, or Blue):</label>
    <input type="text" id="color" name="color" required>
    <button type="submit">Submit</button>
  </form>

  <div class="output" id="result"></div>

  <script>
    function showColor(event) 
    {
      event.preventDefault(); // stop page reload

      const input = document.getElementById("color").value.trim().toLowerCase();
      let message;

      // Ternary-like logic using conditionals
      message = input === "red" ? "🔴 You selected RED!" :
                input === "green" ? "🟢 You selected GREEN!" :
                input === "blue" ? "🔵 You selected BLUE!" :
                "❌ Invalid color. Please enter red, green, or blue.";

      document.getElementById("result").textContent = message;
    }
  </script>

</body>
</html>