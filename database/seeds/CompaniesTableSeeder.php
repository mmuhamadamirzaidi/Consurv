<?php

use App\Rig;
use App\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'Company A',
                'address' => 'Shah Alam',
            ], [
                'name' => 'Company B',
                'address' => 'Kuala Lumpur'
            ],
        ];

        foreach ($companies as $company) {
            $c = Company::updateOrCreate([
                'name' => $company['name'],
                'address' => $company['address'],
            ]);

            Rig::updateOrCreate([
                'company_id' => $c->id,
                'name' => 'Rig A',
            ]);

            Rig::updateOrCreate([
                'company_id' => $c->id,
                'name' => 'Rig B',
            ]);

            Rig::updateOrCreate([
                'company_id' => $c->id,
                'name' => 'Rig C',
            ]);
        }
    }
}
