<?php

use Illuminate\Database\Seeder;
use App\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->createPermissionForClient('view_own_profile', 'View only own profile.');
        $this->createPermissionForClient('search_provider', 'Search for a service provider.');

    }

    private function createPermissionForClient($name, $description)
    {
        $permission = new Permission;
        $permission->name = $name;
        $permission->description = $description;
        $permission->save();
        $permission->roles()->sync(2);
    }

}
