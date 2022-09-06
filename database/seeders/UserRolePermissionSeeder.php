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
    // DB::BeginTransaction();
    // Try{
        $staff = User::create(array_merge([
            'name' => 'staff',
            'npk' => '000002',
            'email' => 'staff@aiia.co.id'
        ], $default_user_value));

        $admin = User::create(array_merge([
            'name' => 'itd',
            'npk' => '000001',
            'email' => 'itd@aiia.co.id'
        ], $default_user_value));

        $role_staff = Role::create(['name' => 'staff']);
        $role_itd = Role::create(['name' => 'itd']);

        $permission = Permission::create(['name' => 'read role']);
        $permission = Permission::create(['name' => 'create role']);
        $permission = Permission::create(['name' => 'update role']);
        $permission = Permission::create(['name' => 'delete role']);

        $staff->assignRole('staff');
        $staff->assignRole('itd');
        // DB::commit();

    // } catch(\Throwable $th){
    //         DB::rollback();
    // }
        
       

    }
}
