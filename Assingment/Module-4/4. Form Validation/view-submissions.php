<?php
$submissions = [];
if (file_exists('submissions.txt')) {
    $lines = file('submissions.txt', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if (!empty($line)) {
            $submissions[] = json_decode($line, true);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Submissions</title>
    <style>
        .container { max-width: 800px; margin: 50px auto; padding: 20px; }
        .submission { border: 1px solid #ddd; margin-bottom: 20px; padding: 15px; border-radius: 4px; }
        .meta { color: #666; font-size: 14px; margin-bottom: 10px; }
        .back { margin-bottom: 20px; }
        .back a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="back"><a href="index.php">← Back to Contact Form</a></div>
        <h2>Contact Submissions</h2>
        
        <?php if (empty($submissions)): ?>
            <p>No submissions yet.</p>
        <?php else: ?>
            <?php foreach (array_reverse($submissions) as $submission): ?>
                <div class="submission">
                    <div class="meta">
                        <strong>Date:</strong> <?= htmlspecialchars($submission['date']) ?> | 
                        <strong>From:</strong> <?= htmlspecialchars($submission['name']) ?> 
                        (<?= htmlspecialchars($submission['email']) ?>)
                    </div>
                    <div><strong>Subject:</strong> <?= htmlspecialchars($submission['subject']) ?></div>
                    <div><strong>Message:</strong><br><?= nl2br(htmlspecialchars($submission['message'])) ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>