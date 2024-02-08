<?php

namespace App\Commands;

use App\Todo;
use LaravelZero\Framework\Commands\Command;

class DeleteTaskCommand extends Command
{
    protected $signature = 'delete {id}';

    protected $description = 'Delete a task';

    public function handle()
    {
        $todo = Todo::find($this->argument('id'));

        if(! $todo) {
            $this->info("Cannot find task with an id of {$this->argument('id')}");
        }

        $todo->delete();

        $this->info('A task has been deleted.');
    }
}
