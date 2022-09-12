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
         $default_user_value= [
        'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)

    ];
    DB::BeginTransaction();
    Try{
        $users = User::create(array_merge([
            'name' => 'Produksi',
            'role' => 'user',
            'avatar' => 'avatar.jpg',
            'npk' => '000002',
            'email' => 'user@aiia.co.id'
        ], $default_user_value));

        $hrd = User::create(array_merge([
            'name' => 'hrd',
            'role' => 'hr',
            'avatar' => 'avatar.jpg',
            'npk' => '000001',
            'email' => 'hrd@aiia.co.id'
        ], $default_user_value));

        $atasan = User::create(array_merge([
            'name' => 'Leader',
            'role' => 'atasan1',
            'avatar' => 'avatar.jpg',
            'npk' => '000003',
            'email' => 'atasan1@aiia.co.id'
        ], $default_user_value));

        $role_user = Role::create(['name' => 'user']);
        $role_atasan1 = Role::create(['name' => 'atasan1']);
        $role_hrd = Role::create(['name' => 'hr']);



        $permission = Permission::create(['name' => 'read']);
        $permission = Permission::create(['name' => 'datadiri']);
        $permission = Permission::create(['name' => 'admin ']);
        $permission = Permission::create(['name' => 'delete name']);

        $role_hrd->givePermissionTo('read');
        $role_hrd->givePermissionTo('datadiri');


        $users->assignRole('user');
        $hrd->assignRole('hr');
        $atasan->assignRole('atasan1');
        DB::commit();

    } catch(\Throwable $th){
            DB::rollback();
    }
        
       

    }
}
