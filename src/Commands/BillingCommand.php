<?php

namespace Cierrateam\Billing\Commands;

use Illuminate\Console\Command;

class BillingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'billing:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows the billing package information';

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
     * @return mixed
     */
    public function handle()
    {
        $this->line('Billing made easy: Billing package by cierra.');
    }
}
