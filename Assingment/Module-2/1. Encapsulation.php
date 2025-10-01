<!DOCTYPE html>
<html>
<head>
    <title>Person Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            background: #e6ffe6;
            padding: 15px;
            border-left: 5px solid #28a745;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Enter Your Details</h2>
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Age:</label>
        <input type="number" name="age" required>

        <input type="submit" value="Submit">
    </form>

    <?php
    class Person {
        private $name;
        private $age;

        public function __construct($name, $age) {
            $this->setName($name);
            $this->setAge($age);
        }

        public function setName($name) {
            if (!empty($name)) {
                $this->name = htmlspecialchars($name);
            }
        }

        public function setAge($age) {
            if (is_numeric($age) && $age > 0 && $age < 100) {
                $this->age = (int)$age;
            }
        }

        public function getName() {
            return $this->name;
        }

        public function getAge() {
            return $this->age;
        }

        public function introduce() {
            return "Hi, I'm {$this->name} and I'm {$this->age} years old.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];

        $person = new Person($name, $age);
        echo "<div class='result'><strong>Result:</strong><br>" . $person->introduce() . "</div>";
    }
    ?>
</body>
</html>