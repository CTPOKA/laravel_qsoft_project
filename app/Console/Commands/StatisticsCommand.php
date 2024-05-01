<?php

namespace App\Console\Commands;

use App\Contracts\Services\StatisticsCommandServiceContract;
use Illuminate\Console\Command;

class StatisticsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(StatisticsCommandServiceContract $service)
    {
        $this->table(null, $service->generalStatistics());

        $this->table(['', 'название', 'id новости', 'длина новости в символах'], $service->articlesLenghtStatistics());

        $this->table(['', 'название', 'id новости', 'количество тегов'], $service->mostTaggableArticle());

        return Command::SUCCESS;
    }
}
