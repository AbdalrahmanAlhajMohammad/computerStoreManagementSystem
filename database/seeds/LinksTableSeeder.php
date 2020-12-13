<?php

use Illuminate\Database\Seeder;
use App\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $link = Link::create(['title'=>'Categories','icon'=>'icon-folder-alt','parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);
        // First Menu Categories childrens
        Link::create(['title'=>'Categories','url'=>'/categories', 'route'=>'categories.index','parent_id'=>$link->id,'new_window'=>1]);
        Link::create(['title'=>'Create Category','url'=>'/categories/create', 'route'=>'categories.create',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Edit Category','url'=>'/categories/{id}/edit', 'route'=>'categories.edit',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Delete Category','url'=>'/categories/{id}/delete', 'route'=>'categories.delete',
            'parent_id'=>$link->id, 'new_window'=>0]);

        $link = Link::create(['title'=>'Manufactories','icon'=>'icon-badge','parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);
        Link::create(['title'=>'Manufactories','url'=>'/manufactories', 'route'=>'manufactories.index','parent_id'=>$link->id,'new_window'=>1]);
        Link::create(['title'=>'Create Manufactory','url'=>'/manufactories/create', 'route'=>'manufactories.create',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Edit Manufactories','url'=>'/manufactories/{id}/edit', 'route'=>'manufactories.edit',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Delete Manufactories','url'=>'/manufactories/{id}/delete', 'route'=>'manufactories.delete',
            'parent_id'=>$link->id, 'new_window'=>0]);

        $link = Link::create(['title'=>'Products','icon'=>'icon-social-dropbox','parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);
        Link::create(['title'=>'Products','url'=>'/products', 'route'=>'products.index','parent_id'=>$link->id,'new_window'=>1]);
        Link::create(['title'=>'Create Products','url'=>'/products/create', 'route'=>'products.create',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Edit Product','url'=>'/products/{id}/edit', 'route'=>'products.edit',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Delete Products','url'=>'/products/{id}/delete', 'route'=>'products.delete',
            'parent_id'=>$link->id, 'new_window'=>0]);

        $link = Link::create(['title'=>'Accounts','icon'=>'icon-users','parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);
        Link::create(['title'=>'Accounts','url'=>'/accounts', 'route'=>'accounts.index','parent_id'=>$link->id,'new_window'=>1]);
        Link::create(['title'=>'Create Account','url'=>'/accounts/create', 'route'=>'accounts.create',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Edit Account','url'=>'/accounts/{id}/edit', 'route'=>'accounts.edit',
            'parent_id'=>$link->id, 'new_window'=>1]);
        Link::create(['title'=>'Delete Accounts','url'=>'/accounts/{id}/delete', 'route'=>'accounts.delete',
            'parent_id'=>$link->id, 'new_window'=>0]);



    }
}
