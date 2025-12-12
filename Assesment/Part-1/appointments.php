<?php
require_once 'db_config.php';

$sql = "SELECT * FROM appointments ORDER BY preferred_date ASC, preferred_time ASC";
$stmt = $pdo->query($sql);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Appointments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 1000px;">
        <h1>All Appointments</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="message success">Appointment request submitted successfully!</div>
        <?php endif; ?>
        
        <?php if (count($appointments) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($appointment['id']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['name']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['phone']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['email']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['department']); ?></td>
                            <td><?php echo date('M d, Y', strtotime($appointment['preferred_date'])); ?></td>
                            <td><?php echo date('h:i A', strtotime($appointment['preferred_time'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center; color: #666;">No appointments found.</p>
        <?php endif; ?>
        
        <div class="link">
            <a href="index.html">Book New Appointment</a>
        </div>
    </div>
</body>
</html>
