<?php

namespace App\Console\Commands;

use App\Link;
use App\User;
use Illuminate\Console\Command;

class InsertLinksToSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insertLinksToSuperAdmin';

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
        $user=User::where('super_admin',1)->first();
        if ($user)
        {
            $links=Link::all();
            foreach ($links as $link)
            {
                echo "inserting $link->title";
                $user->links()->attach($link->id);
                $user->save();
                echo "$link->title was inserted";
            }
        }
        else
        {
            echo 'there are no super admin in users table';
        }

    }
}
