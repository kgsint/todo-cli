<?php

namespace App\Commands;

use App\Todo;
use Illuminate\Console\View\Components\Task;
use LaravelZero\Framework\Commands\Command;

class ToggleTaskStatusCommand extends Command
{
    protected $signature = 'toggle-check {id}';

    protected $description =  'Check or Uncheck a task';

    public function handle()
    {
        $todo = Todo::find($this->argument('id'));

        if(! $todo) {
            $this->info("Cannot find task with an id of {$this->argument('id')}");
        }

        $this->toggleCheck($todo);

        $this->info('A task has been checked successfully.');
    }

    public function toggleCheck(Todo $todo)
    {
        $todo->update([
            'completed_at' => $todo->completed_at ? null : now(),
        ]);
    }
}
