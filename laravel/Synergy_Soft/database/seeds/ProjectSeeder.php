<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $customer = \App\Customer::all();
//        $factory = \Faker\Factory::create();
//        \App\Project::create(array(
//            'Cid'     =>  rand($customer->first()->id,$customer->last()->id),
//            'projectName'          =>  $factory->words(3, true),
//            'isMaintained'    => rand(0,1),
//            'software'    => $factory->paragraph(1),
//            'hardware'=> $factory->paragraph(1),
//            'OS' => $factory->word . ' OS',
//            'lastContact'=> $factory->firstName . ' ' . $factory->lastName,
//            'contactClient' => $factory->paragraph(1),
//            'creditLimit' => rand(1000,999999)
//        ));
        $factory = \Faker\Factory::create();
        $customers = \App\Customer::where('bkr', 1)->get();
        for ($i = 0; $i < count($customers); $i++)
        {
            if ($i < 30) {
                \App\Project::create(array(
                    'Cid' => $customers[$i]->id,
                    'projectName' => $factory->words(3, true),
                    'isMaintained' => rand(0, 1),
                    'software' => $factory->paragraph(1),
                    'hardware' => $factory->paragraph(1),
                    'OS' => $factory->word . ' OS',
                    'lastContact' => $factory->firstName . ' ' . $factory->lastName,
                    'contactClient' => $factory->paragraph(1),
                    'creditLimit' => 500
                ));
            }
            elseif ($i < 80) {
                \App\Project::create(array(
                    'Cid' => $customers[$i]->id,
                    'projectName' => $factory->words(3, true),
                    'isMaintained' => rand(0, 1),
                    'software' => $factory->paragraph(1),
                    'hardware' => $factory->paragraph(1),
                    'OS' => $factory->word . ' OS',
                    'lastContact' => $factory->firstName . ' ' . $factory->lastName,
                    'contactClient' => $factory->paragraph(1),
                    'creditLimit' => 500
                ));
                \App\Project::create(array(
                    'Cid' => $customers[$i]->id,
                    'projectName' => $factory->words(3, true),
                    'isMaintained' => rand(0, 1),
                    'software' => $factory->paragraph(1),
                    'hardware' => $factory->paragraph(1),
                    'OS' => $factory->word . ' OS',
                    'lastContact' => $factory->firstName . ' ' . $factory->lastName,
                    'contactClient' => $factory->paragraph(1),
                    'creditLimit' => 500
                ));
            }
        }
    }
}
