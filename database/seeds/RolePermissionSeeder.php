<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create permissions
        try
        {
            Permission::findByName('admin');
        }
        catch(\Exception $e)
        {
            if ($e->getMessage() == 'There is no permission named `admin` for guard `web`.')
            {
                Permission::create(['name' => 'admin']);
            }
        }

        //create roles
        try
        {
            Role::findByName('admin');
        }
        catch(\Exception $e)
        {
            if($e->getMessage() == 'There is no role named `admin`.')
            {
                Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
            }
        }
    }
}
