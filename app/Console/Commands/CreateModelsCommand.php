<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createModels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $models=array('Product','Category','ProductsSpecifications','Manufactory',
            'Customer','Order','OrdersCart');
        foreach ($models as $model)
        {
            echo "creating $model model";
            Artisan::call("make:model $model");
            echo "$model model was created successfuly";
        }

    }
}
