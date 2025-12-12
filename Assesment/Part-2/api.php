<?php
require_once 'TaskLog.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if ($data['action'] === 'save') {
        $log = new TaskLog($data['task'], $data['duration']);
        $log->save();
        echo json_encode(['success' => true]);
    }
} else {
    $action = $_GET['action'] ?? '';
    $log = new TaskLog('', 0);
    
    if ($action === 'logs') {
        echo json_encode(['logs' => $log->loadLogs()]);
    } elseif ($action === 'totals') {
        echo json_encode(['totals' => $log->getTotalsByTask()]);
    }
}
