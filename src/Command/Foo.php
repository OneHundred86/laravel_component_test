<?php


namespace Oh86\Test\Command;


use Illuminate\Console\Command;

class Foo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:foo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test foo';

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
        echo sprintf("%s - %s\n", __METHOD__, "foo");
    }
}