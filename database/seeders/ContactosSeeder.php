<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contactos')->insert([
            [
            "direccion" => "cra 8 #8-101",
            "telefono1"=> "3013772079",
            "telefono2"=> "3186157178",
            "email"=> "fundacionpachosclub@outlook.com",
            "horario"=> "Lunes a Viernes 8:00 AM - 12:00 PM - DE 2:00 PM - 6:00 PM",
            "horarioextras"=> "Sábados 8:00 AM - 12:00 PM",
            "embebido"=> "https://www.google.com/maps/embed?pb=!4v1744157878941!6m8!1m7!1s1ACcJlzibcoiuRmxs8UAOA!2m2!1d8.304805676780639!2d-73.62666916106214!3f85.25628592770805!4f4.654949059101455!5f0.9891491240026099",
            "urlfacebook"=> "https://www.facebook.com/groups/244426589009928/",
            "urlx"=> "876786",
            "urlinstagram"=> "867868767",
            ]
        ]);
                    
    }
}
