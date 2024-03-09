<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Factories\AdminFactory;

class GetRateFromProvider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sp:get-rate-from-provider';

    /**
     * The console command description.
     *     * @var string
     */
    protected $description = 'Get rate from provider';

    protected $cardProvider;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->cardProvider = AdminFactory::cardProviderCommandRepository();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->cardProvider->getRateFromProvider();
    }
}
