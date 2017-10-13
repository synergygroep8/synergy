<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = \App\Project::all();
        $factory = \Faker\Factory::create();
        \App\Invoice::create(array(
            'pId'     =>  rand($project->first()->id,$project->last()->id),
            'invoiceNr'          =>  rand(1, 99999999),
            'date'    => \Carbon\Carbon::now()->addDays(rand(0,100))->toDateString(),
            'invoiceTotal'    => rand(50,999999),
            'paid'=> rand(0,1),
            'description' => $factory->paragraph(1),
            'btw'=> '21.0',
            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000,99999999)
        ));
    }
}
