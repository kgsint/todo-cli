<?php

namespace App\Commands;

use App\Todo;
use LaravelZero\Framework\Commands\Command;

class AddTaskCommand extends Command
{
    protected $signature = 'create {task}';

    protected $description = 'Add a task';

    public function handle()
    {
        Todo::create(['task' => $this->argument('task')]);

        $this->info('A task has been added successfully.');
    }
}
