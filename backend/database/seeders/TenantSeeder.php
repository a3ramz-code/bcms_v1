<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::firstOrCreate([
            'name' => 'PT. Trira Inti Utama',
        ], [
            'brand_name' => 'Maroon-NET',
            'primary_color' => '#800000',
            'secondary_color' => '#111827',
            'timezone' => 'Asia/Jakarta',
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['description' => 'Administrator']);
        Role::firstOrCreate(['name' => 'staff'], ['description' => 'Staff']);

        User::firstOrCreate([
            'email' => 'admin@maroon-net.test'
        ], [
            'company_id' => $company->id,
            'role_id' => $adminRole->id,
            'name' => 'Admin Maroon-NET',
            'password' => Hash::make('password'),
        ]);
    }
}
