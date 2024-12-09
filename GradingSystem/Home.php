<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            text-align: center;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Grade Calculator</h1>
    <form method="post">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required>

        <label for="score">Enter the score (0-100):</label>
        <input type="number" id="score" name="score" min="0" max="100" required>

        <input type="submit" value="Calculate Grade">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name'])); 
        $score = $_POST['score'];

        function getLetterGrade($score) {
            if ($score >= 90 && $score <= 100) {
                return 'A';
            } elseif ($score >= 80 && $score < 90) {
                return 'B';
            } elseif ($score >= 70 && $score < 80) {
                return 'C';
            } elseif ($score >= 60 && $score < 70) {
                return 'D';
            } elseif ($score < 60 && $score >= 0) {
                return 'F';
            } else {
                return null; 
            }
        }

        if (!is_numeric($score) || $score < 0 || $score > 100) {
            echo '<div class="result error">Error: Invalid score. Please enter a score between 0 and 100.</div>';
        } else {
            $grade = getLetterGrade($score);
            echo "<div class='result'>The student $name has a score of $score, and the grade is $grade.</div>";
        }
    }
    ?>
</div>

</body>
</html>