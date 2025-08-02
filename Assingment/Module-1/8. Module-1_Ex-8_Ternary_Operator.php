<!DOCTYPE html>
<html>
<head>
  <title>Age Checker</title>
  <style>
    body 
    { 
      font-family: Arial, sans-serif; 
      margin: 20px; 
    }
    .output 
    { 
      margin-top: 15px; 
      font-weight: bold; 
      color: #333; 
    }
  </style>
</head>
<body>

  <h2>Check if You're an Adult</h2>

  <form onsubmit="checkAge(event)">
    <label for="age">Enter your Age:</label>
    <input type="number" id="age" name="age" required min="0" required max="125">
    <button type="submit">Submit</button>
  </form>

  <div class="output" id="result"></div>

  <script>
    function checkAge(event) 
    {
      event.preventDefault(); // prevent form from reloading the page
      
      const age = document.getElementById("age").value;
      const result = age > 18 
        ? "✅ You are Over 18 – an Adult!" 
        : "🚫 You are 18 or Younger.";
      
      document.getElementById("result").textContent = result;
    }
  </script>

</body>
</html>