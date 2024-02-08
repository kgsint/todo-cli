<?php

namespace App\Commands;

use App\Todo;
use LaravelZero\Framework\Commands\Command;

class ListTasksCommand extends Command
{
    protected $signature = 'all';

    protected $description = 'List of tasks';

    public function handle()
    {
        $tasks = Todo::all();

        $this->table(['ID', 'Task', 'Status', 'Created at'], $tasks->map(fn($todo) => [
            $todo->id,
            $todo->task,
            $todo->completed_at ? 'Completed✅' : '--',
            $todo->created_at->diffForHumans(),
        ]));
    }
}
