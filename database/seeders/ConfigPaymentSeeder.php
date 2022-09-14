<?php

namespace Database\Seeders;


use App\Models\MasterData\ConfigPayment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    // * @return void
    public function run()
    {
        $config_payment = [
            [
                'fee' => '150000',
                'vat' => '20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], 
        ]; 

        //untuk insert ke table specialist
        ConfigPayment::insert($config_payment);
    }
}
