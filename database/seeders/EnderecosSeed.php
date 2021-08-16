<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adress;

class EnderecosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert([
            [
                'logradouro' => 'Rua A',
                'nº' => 2211,
                'bairro' => 'Jardim Porto Madero',
                'cidade' => 'Umuarama',
                'Estado' => 'PR',
                'user_id' => 1
            ]
        ]);
    }
}
