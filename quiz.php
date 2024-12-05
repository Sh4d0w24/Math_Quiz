<?php
session_start();

if (!isset($_SESSION['quiz']) || !isset($_SESSION['current'])) {
    header("Location: index.php");
    exit();
}

$current = $_SESSION['current'];
$questions = $_SESSION['quiz'];
$totalQuestions = count($questions);

if ($current >= $totalQuestions) {
    header("Location: result.php");
    exit();
}

$question = $questions[$current];
$questionText = $question['question'];
$choices = $question['choices'];
$answer = $question['answer'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected = $_POST['choice'];

    if ($selected == $answer) {
        $_SESSION['score']++;
    }
    $_SESSION['current']++;

    header("Location: quiz.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Mathematics Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="all">
        <h1>Simple Mathematics Quiz</h1>
        <p><?php echo ($current + 1) . ".) " . $questionText; ?></p>
        <form method="POST" class="choices">
            <?php foreach ($choices as $choice): ?>
                <button type="submit" name="choice" value="<?php echo $choice; ?>">
                    <?php echo $choice; ?>
                </button>
            <?php endforeach; ?>
        </form>
            <p>Score: <?php echo $_SESSION['score']; ?> / <?php echo $current; ?></p>
        <form method="GET" action="index.php">
            <button class="btn" type="submit">End</button>
        </form>
    </div>
</body>
</html>