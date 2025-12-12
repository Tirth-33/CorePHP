<?php
class TaskLog {
    private $task;
    private $duration;
    private $date;
    private $logFile = 'logs.json';

    public function __construct($task, $duration, $date = null) {
        $this->task = $task;
        $this->duration = $duration;
        $this->date = $date ?? date('Y-m-d H:i:s');
    }

    public function save() {
        $logs = $this->loadLogs();
        $logs[] = [
            'task' => $this->task,
            'duration' => $this->duration,
            'date' => $this->date
        ];
        file_put_contents($this->logFile, json_encode($logs, JSON_PRETTY_PRINT));
    }

    public function loadLogs() {
        if (!file_exists($this->logFile)) {
            return [];
        }
        $content = file_get_contents($this->logFile);
        return json_decode($content, true) ?? [];
    }

    public function getTotalsByTask() {
        $logs = $this->loadLogs();
        $totals = [];
        foreach ($logs as $log) {
            $task = $log['task'];
            $totals[$task] = ($totals[$task] ?? 0) + $log['duration'];
        }
        return $totals;
    }
}
