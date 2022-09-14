<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        
    DB::BeginTransaction();
    Try{
    
        Role::create(['name' => 'operator']);
        Role::create(['name' => 'leader']);
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'grup manager']);
        Role::create(['name' => 'direktur']);
        Role::create(['name' => 'hrd']);



        $permission = Permission::create(['name' => 'read']);
        $permission = Permission::create(['name' => 'datadiri']);
        $permission = Permission::create(['name' => 'admin ']);
        $permission = Permission::create(['name' => 'delete name']);

        // $role_hrd->givePermissionTo('read');
        // $role_hrd->givePermissionTo('datadiri');


       
        DB::commit();

    } catch(\Throwable $th){
            DB::rollback();
    }
        
       

    }
}
