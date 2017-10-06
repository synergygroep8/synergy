<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Factory::create();
        \App\Customer::create(array(
            'CompanyName'     =>  $factory->company,
            'Active'          =>  1,
            'Email'    => $factory->companyEmail,
            'Phone'    => $factory->phoneNumber,
            'Residence'=> $factory->city,
            'Address' => 'RandomAddress',
            'HouseNumber'=> '1',
            'ZipCode' => $factory->postcode,
            'ContactPerson' => $factory->name,
            'FaxNumber' => '8329473427',
            'Initials' => 'JGF',
            'BankaccountNumber' => $factory->bankAccountNumber,
            'Balance' => 200,
            'Invoices' => 2,
            'Profit' => 200,
            'BTWCode' => '93284309jfioejfw'
        ));
    }
}
