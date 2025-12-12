let startTime = 0;
let elapsedTime = 0;
let timerInterval = null;

const taskInput = document.getElementById('taskInput');
const timerDisplay = document.getElementById('timer');
const startBtn = document.getElementById('startBtn');
const stopBtn = document.getElementById('stopBtn');

startBtn.addEventListener('click', startTimer);
stopBtn.addEventListener('click', stopTimer);

function startTimer() {
    if (!taskInput.value.trim()) {
        alert('Please enter a task name');
        return;
    }
    startTime = Date.now() - elapsedTime;
    timerInterval = setInterval(updateTimer, 1000);
    startBtn.disabled = true;
    stopBtn.disabled = false;
    taskInput.disabled = true;
}

function stopTimer() {
    clearInterval(timerInterval);
    startBtn.disabled = false;
    stopBtn.disabled = true;
    taskInput.disabled = false;
    
    const duration = Math.floor(elapsedTime / 1000);
    saveLog(taskInput.value, duration);
    
    elapsedTime = 0;
    timerDisplay.textContent = '00:00:00';
}

function updateTimer() {
    elapsedTime = Date.now() - startTime;
    const seconds = Math.floor(elapsedTime / 1000);
    const hrs = Math.floor(seconds / 3600);
    const mins = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;
    timerDisplay.textContent = 
        `${String(hrs).padStart(2, '0')}:${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

function saveLog(task, duration) {
    fetch('api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'save', task, duration })
    })
    .then(res => res.json())
    .then(() => {
        loadLogs();
        loadTotalHours();
    });
}

function loadLogs() {
    fetch('api.php?action=logs')
        .then(res => res.json())
        .then(data => {
            const logsDiv = document.getElementById('logs');
            logsDiv.innerHTML = data.logs.map(log => 
                `<div class="log-entry">
                    <strong>${log.task}</strong> - ${formatDuration(log.duration)} - ${log.date}
                </div>`
            ).join('');
        });
}

function loadTotalHours() {
    fetch('api.php?action=totals')
        .then(res => res.json())
        .then(data => {
            const totalsDiv = document.getElementById('totalHours');
            totalsDiv.innerHTML = Object.entries(data.totals).map(([task, seconds]) => 
                `<div><strong>${task}:</strong> ${formatDuration(seconds)}</div>`
            ).join('') || 'No logs yet';
        });
}

function formatDuration(seconds) {
    const hrs = Math.floor(seconds / 3600);
    const mins = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;
    return `${hrs}h ${mins}m ${secs}s`;
}

window.addEventListener('beforeunload', () => {
    if (timerInterval) {
        localStorage.setItem('activeTask', JSON.stringify({
            task: taskInput.value,
            elapsed: elapsedTime
        }));
    }
});

window.addEventListener('load', () => {
    loadLogs();
    loadTotalHours();
    
    const saved = localStorage.getItem('activeTask');
    if (saved) {
        const { task, elapsed } = JSON.parse(saved);
        if (confirm(`Resume task "${task}"?`)) {
            taskInput.value = task;
            elapsedTime = elapsed;
            startTimer();
        }
        localStorage.removeItem('activeTask');
    }
});
