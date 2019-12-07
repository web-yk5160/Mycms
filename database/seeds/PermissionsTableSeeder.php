<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        $updateOthersPost = new Permission();
        $updateOthersPost->name = "update-others-post";
        $updateOthersPost->save();

        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);

        $editor->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
        $editor->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);

        $author->detachPermissions([$crudPost]);
        $author->attachPermissions([$crudPost]);

    }
}
