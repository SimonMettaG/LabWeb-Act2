<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Coin;

class ListCoins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello-world:coins:list {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the coins on the system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->option('name');

        if($name !== 'all') {
            $coins = Coin::where('name', $name)->get();
        }
        else {
            $coins = Coin::all();
        }

        $this->info($coins);
        return 0;
    }
}
