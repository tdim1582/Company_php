<?php

use Illuminate\Database\Seeder;
use App\Employe;

class EmployesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        employe::create([
            'first_name' => 'Balint',
            'last_name' => 'Csaba',
            'email' => 'csababa@gmail.com',
            'phonenumber' => '0764445814',
            'company_id' => 12,
        ]);
    }
}
//Arpi Antal Sandor Denes Tibor Matron Andras Attila Peter Istvan Gergo
//Anna Maria Margit Virag Eniko Adel Annamaria Agota Emo Kinga Lilla
// Szakacs Balint Varro Kiss Nagy Andras Imre Forro Sebestyen Szabo Peter Simo Elekes Kovacs Horvath Molnar Nemeth