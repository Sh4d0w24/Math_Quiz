<?php
session_start();

if (!isset($_SESSION['score'])) {
    header("Location: index.php");
    exit();
}

$score = $_SESSION['score'];
$total = count($_SESSION['quiz']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="all">
        <h1>Quiz Results</h1>
        <p>You scored <?php echo $score; ?> out of <?php echo $total; ?>!</p>
        <p><?php echo $score >= ($total / 2) ? "Great job!" : "Better luck next time!"; ?></p>
        <form method="GET" action="index.php">
            <button class="btn" type="submit">Restart</button>
        </form>
    </div>
</body>
</html>