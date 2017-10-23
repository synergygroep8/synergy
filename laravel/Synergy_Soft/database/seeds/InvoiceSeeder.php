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
//        $project = \App\Project::all();
        $factory = \Faker\Factory::create();
//        \App\Invoice::create(array(
//            'pId'     =>  rand($project->first()->id,$project->last()->id),
//            'invoiceNr'          =>  rand(1, 99999999),
//            'date'    => \Carbon\Carbon::now()->addDays(rand(0,100))->toDateString(),
//            'invoiceTotal'    => 100,
//            'paid'=> rand(0,1),
//            'description' => $factory->paragraph(1),
//            'btw'=> '21.0',
//            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000,99999999)
//        ));
        $projects = \App\Project::with('customer')->get();
        $customers = \App\Customer::all();
        $oneprojects = array();
        $twoprojects = array();
        $j = 0;
        $k = 0;

        /*for ($i = 0; $i < count($projects); $i++)
        {

                if ($projects[$i]->customer->projects->count() == 1) {
                    $oneprojects[$j] = $projects[$i];
                    $j++;
                }
                elseif ($projects[$i]->customer->projects->count() == 2) {
                    $twoprojects[$k] = $projects[$i];
                    $k++;
                }
        }*/
        for ($i = 0; $i < count($customers); $i++)
        {

            if ($customers[$i]->projects->count() == 1) {
                $oneprojects[$j] = $customers[$i];
                $j++;
            }
            elseif ($customers[$i]->projects->count() == 2) {
                $twoprojects[$k] = $customers[$i];
                $k++;
            }
        }
        for ($i = 0; $i < count($oneprojects); $i++) {
            if ($i < 5) {
                for ($j = 0; $j < 24; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 125,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 10) {
                for ($j = 0; $j < 5; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 125,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 15) {
                for ($j = 0; $j < 2; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 100,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($j = 0; $j < 3; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 200,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 20) {
                for ($j = 0; $j < 3; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 100,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($j = 0; $j < 2; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 250,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 25) {
                for ($j = 0; $j < 4; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $oneprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 100,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                \App\Invoice::create(array(
                    'pId' => $oneprojects[$i]->projects[0]->id,
                    'invoiceNr' => rand(1, 99999999),
                    'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                    'invoiceTotal' => 100,
                    'paid' => 0,
                    'description' => $factory->paragraph(1),
                    'btw' => '21.0',
                    'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                ));
            }
        }

        for ($i = 0; $i < count($twoprojects); $i++) {
            if ($i < 5) {
                for ($j = 0; $j < 5; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 99,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 10) {
                for ($j = 0; $j < 5; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 99,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 15) {
                for ($j = 0; $j < 2; $j++) {
                    for ($k = 0; $k < 5; $k++) {
                        \App\Invoice::create(array(
                            'pId' => $twoprojects[$i]->projects[1]->id,
                            'invoiceNr' => rand(1, 99999999),
                            'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                            'invoiceTotal' => 99,
                            'paid' => 1,
                            'description' => $factory->paragraph(1),
                            'btw' => '21.0',
                            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                        ));
                    }
                }
            }
            elseif ($i < 20) {
                for ($j = 0; $j < 2; $j++) {
                    for ($k = 0; $k < 5; $k++) {
                        \App\Invoice::create(array(
                            'pId' => $twoprojects[$i]->projects[1]->id,
                            'invoiceNr' => rand(1, 99999999),
                            'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                            'invoiceTotal' => 99,
                            'paid' => 0,
                            'description' => $factory->paragraph(1),
                            'btw' => '21.0',
                            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                        ));
                    }
                }
            }
            elseif ($i < 25) {
                for ($j = 0; $j < 2; $j++) {
                    for ($k = 0; $k < 5; $k++) {
                        \App\Invoice::create(array(
                            'pId' => $twoprojects[$i]->projects[1]->id,
                            'invoiceNr' => rand(1, 99999999),
                            'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                            'invoiceTotal' => 101,
                            'paid' => 0,
                            'description' => $factory->paragraph(1),
                            'btw' => '21.0',
                            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                        ));
                    }
                }
            }
            elseif ($i < 30) {
                for ($j = 0; $j < 2; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 3; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 5; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 30) {
                for ($j = 0; $j < 2; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 3; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 5; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 35) {
                for ($j = 0; $j < 2; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 3; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($j = 0; $j < 3; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 2; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            elseif ($i < 35) {
                for ($j = 0; $j < 2; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 3; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[1]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($j = 0; $j < 3; $j++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 1,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
                for ($k = 0; $k < 2; $k++) {
                    \App\Invoice::create(array(
                        'pId' => $twoprojects[$i]->projects[0]->id,
                        'invoiceNr' => rand(1, 99999999),
                        'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                        'invoiceTotal' => 101,
                        'paid' => 0,
                        'description' => $factory->paragraph(1),
                        'btw' => '21.0',
                        'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                    ));
                }
            }
            if ($i < 40) {
                for ($j = 0; $j < 2; $j++) {
                    for ($k = 0; $k < 2; $k++) {
                        \App\Invoice::create(array(
                            'pId' => $twoprojects[$i]->projects[$j]->id,
                            'invoiceNr' => rand(1, 99999999),
                            'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                            'invoiceTotal' => 101,
                            'paid' => 1,
                            'description' => $factory->paragraph(1),
                            'btw' => '21.0',
                            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                        ));
                    }
                    for ($k = 0; $k < 3; $k++) {
                        \App\Invoice::create(array(
                            'pId' => $twoprojects[$i]->projects[$j]->id,
                            'invoiceNr' => rand(1, 99999999),
                            'date' => \Carbon\Carbon::now()->addDays(rand(0, 100))->toDateString(),
                            'invoiceTotal' => 101,
                            'paid' => 0,
                            'description' => $factory->paragraph(1),
                            'btw' => '21.0',
                            'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000, 99999999)
                        ));
                    }
                }
            }
        }

        /*for ($i = 0; $i < 5; $i++)
        {
            \App\Invoice::create(array(
                'pId'     =>  rand($project->first()->id,$project->last()->id),
                'invoiceNr'          =>  rand(1, 99999999),
                'date'    => \Carbon\Carbon::now()->addDays(rand(0,100))->toDateString(),
                'invoiceTotal'    => 100,
                'paid'=> rand(0,1),
                'description' => $factory->paragraph(1),
                'btw'=> '21.0',
                'ledgerNumber' => 'NL58 RAB1 ' . rand(10000000,99999999)
            ));
        }*/
    }
}
