<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createLanguage {lang}';

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
        $lang=$this->argument('lang');
        Schema::table('categories', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_name")->nullable();
        });
        Schema::table('manufactories', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_name")->nullable();
        });
        Schema::table('orders_status', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_name")->nullable();
        });
        Schema::table('products', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_name")->nullable();
            $table->text("{$lang}_description")->nullable();
        });
        Schema::table('products_highlights', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_context")->nullable();
        });
        Schema::table('products_specifications', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_title")->nullable();
            $table->string("{$lang}_content")->nullable();
        });
        Schema::table('services', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_name")->nullable();
            $table->string("{$lang}_description")->nullable();
        });
        Schema::table('links', function (Blueprint $table) use ($lang) {
            $table->string("{$lang}_title")->nullable();
        });



    }
}
