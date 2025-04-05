<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Adjust the model namespace as needed
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ModelHasRolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('model_has_roles')->insert([
            ['role_id' => 1, 'model_type' => 'App\Models\Admin', 'model_id' => 1],
//            ['role_id' => 11, 'model_type' => 'App\Models\Admin', 'model_id' => 1],
//            ['role_id' => 5, 'model_type' => 'App\Models\Admin', 'model_id' => 13],
//            ['role_id' => 2, 'model_type' => 'App\Models\Admin', 'model_id' => 15],
        ]);
    }
}
