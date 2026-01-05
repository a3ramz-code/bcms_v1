<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Router;
use App\Models\Service;
use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first();
        if (!$company) return;

        $service = Service::firstOrCreate([
            'company_id' => $company->id,
            'name' => 'Internet 50Mbps',
        ], [
            'price' => 250000,
            'billing_cycle' => 'monthly',
        ]);

        $router = Router::firstOrCreate([
            'company_id' => $company->id,
            'name' => 'Mikrotik-Stub-1',
        ], [
            'host' => '192.0.2.1',
            'port' => 8728,
            'username' => 'stub',
            'password_enc' => 'stubbed',
            'status' => 'active',
        ]);

        for ($i=1; $i<=5; $i++) {
            $customer = Customer::firstOrCreate([
                'company_id' => $company->id,
                'customer_code' => 'CUST-'.str_pad((string)$i, 4, '0', STR_PAD_LEFT),
            ], [
                'name' => 'Customer '.$i,
                'email' => 'customer'.$i.'@example.test',
                'phone' => '080000000'.$i,
                'status' => 'active',
            ]);

            Invoice::firstOrCreate([
                'company_id' => $company->id,
                'customer_id' => $customer->id,
                'period' => '2026-01',
            ], [
                'invoice_no' => 'INV-'.Str::upper(Str::random(8)),
                'amount' => $service->price,
                'status' => 'unpaid',
                'due_date' => now()->addDays(14)->toDateString(),
            ]);

            Ticket::firstOrCreate([
                'company_id' => $company->id,
                'customer_id' => $customer->id,
                'subject' => 'Install request #'.$i,
            ], [
                'description' => 'Dummy ticket',
                'priority' => 'normal',
                'status' => 'open'
            ]);
        }
    }
}
