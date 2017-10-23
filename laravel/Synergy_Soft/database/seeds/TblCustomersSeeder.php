<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class TblCustomersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $factory = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $result = $this->splitAddress($factory->address);
            if ($i < 5) {
                \App\Customer::create(array(
                    'CompanyName' => "Company A",
                    'isActive' => 1,
                    'Email' => $factory->companyEmail,
                    'Phone1' => $factory->phoneNumber,
                    'Residence1' => $factory->city,
                    'Address1' => $result[0],
                    'HouseNumber1' => $result[1][0] . $result[1][1] . $result[1][2],
                    'ZipCode1' => $factory->postcode,
                    'ContactPerson' => $factory->name,
                    'FaxNumber' => '8329473427',
                    'initals' => 'JGF',
                    'BankaccountNumber' => $factory->bankAccountNumber,
                    'BTWCode' => '93284309jfioejfw'
                ));
            }
            else {
                \App\Customer::create(array(
                    'CompanyName' => "Company A",
                    'isActive' => 1,
                    'Email' => $factory->companyEmail,
                    'Phone1' => $factory->phoneNumber,
                    'Residence1' => $factory->city,
                    'Address1' => $result[0],
                    'HouseNumber1' => $result[1][0] . $result[1][1] . $result[1][2],
                    'ZipCode1' => $factory->postcode,
                    'ContactPerson' => $factory->name,
                    'FaxNumber' => '8329473427',
                    'initals' => 'JGF',
                    'bkr' => 0,
                    'BankaccountNumber' => $factory->bankAccountNumber,
                    'BTWCode' => '93284309jfioejfw'
                ));
            }
        }
        for ($i = 0; $i < 40; $i++) {
            if ($i < 5) {
                $result = $this->splitAddress($factory->address);
                \App\Customer::create(array(
                    'CompanyName' => $factory->company,
                    'isActive' => 1,
                    'Email' => $factory->companyEmail,
                    'Phone1' => $factory->phoneNumber,
                    'Residence1' => "Breda",
                    'Address1' => $result[0],
                    'HouseNumber1' => $result[1][0] . $result[1][1] . $result[1][2],
                    'ZipCode1' => $factory->postcode,
                    'ContactPerson' => $factory->name,
                    'FaxNumber' => '8329473427',
                    'initals' => 'JGF',
                    'BankaccountNumber' => $factory->bankAccountNumber,
                    'BTWCode' => '9328430945ioejfw'
                ));
            }
            elseif ($i < 10) {
                $result = $this->splitAddress($factory->address);
                \App\Customer::create(array(
                    'CompanyName' => $factory->company,
                    'isActive' => 1,
                    'Email' => $factory->companyEmail,
                    'Phone1' => $factory->phoneNumber,
                    'Residence1' => "Breda",
                    'Address1' => $result[0],
                    'HouseNumber1' => $result[1][0] . $result[1][1] . $result[1][2],
                    'ZipCode1' => $factory->postcode,
                    'ContactPerson' => $factory->name,
                    'FaxNumber' => '8329473427',
                    'initals' => 'JGF',
                    'bkr' => 0,
                    'BankaccountNumber' => $factory->bankAccountNumber,
                    'BTWCode' => '9328430945ioejfw'
                ));
            }
            else {
                $result = $this->splitAddress($factory->address);
                \App\Customer::create(array(
                    'CompanyName' => $factory->company,
                    'isActive' => 1,
                    'Email' => $factory->companyEmail,
                    'Phone1' => $factory->phoneNumber,
                    'Residence1' => "Breda",
                    'Address1' => $result[0],
                    'HouseNumber1' => $result[1][0] . $result[1][1] . $result[1][2],
                    'ZipCode1' => $factory->postcode,
                    'ContactPerson' => $factory->name,
                    'FaxNumber' => '8329473427',
                    'initals' => 'JGF',
                    'bkr' => 1,
                    'BankaccountNumber' => $factory->bankAccountNumber,
                    'BTWCode' => '9328430945ioejfw'
                ));
            }
        }
        for ($i = 0; $i < 20; $i++) {
            $result = $this->splitAddress($factory->address);
            \App\Customer::create(array(
                'CompanyName' => $factory->company,
                'isActive' => 1,
                'Email' => $factory->companyEmail,
                'Phone1' => $factory->phoneNumber,
                'Residence1' => "Oosterhout",
                'Address1' => $result[0],
                'HouseNumber1' => $result[1][0] . $result[1][1] . $result[1][2],
                'ZipCode1' => $factory->postcode,
                'ContactPerson' => $factory->name,
                'FaxNumber' => '8329473427',
                'initals' => 'JGF',
                'bkr' => 1,
                'BankaccountNumber' => $factory->bankAccountNumber,
                'BTWCode' => '9328430945ioejfw'
            ));
        }
        for ($i = 0; $i < 5; $i++) {
            \App\Customer::create(array(
                'CompanyName' => $factory->company,
                'isActive' => 1,
                'Email' => $factory->companyEmail,
                'Phone1' => $factory->phoneNumber,
                'Residence1' => $factory->city,
                'Address1' => "RandomStreet",
                'HouseNumber1' => rand(1,300),
                'ZipCode1' => $factory->postcode,
                'ContactPerson' => $factory->name,
                'FaxNumber' => rand(9999,9999999),
                'initals' => 'JGF',
                'bkr' => 1,
                'BankaccountNumber' => $factory->bankAccountNumber,
                'BTWCode' => '9328430945ioejfw'
            ));

        }
        for ($i = 0; $i < 175; $i++) {
            $result = $this->splitAddress($factory->address);
            \App\Customer::create(array(
                'CompanyName'     =>  $factory->company,
                'isActive'          =>  1,
                'Email'    => $factory->companyEmail,
                'Phone1'    => $factory->phoneNumber,
                'Residence1'=> $factory->city,
                'Address1' => $result[0],
                'HouseNumber1'=> $result[1][0] . $result[1][1] . $result[1][2],
                'ZipCode1' => $factory->postcode,
                'ContactPerson' => $factory->name,
                'FaxNumber' => '8329473427',
                'initals' => 'JGF',
                'bkr' => 1,
                'BankaccountNumber' => $factory->bankAccountNumber,
                'BTWCode' => '93284309jfioejfw'
            ));
        }
    }

    public function splitAddress($input)
    {
        $address = "";
        $stringid = 0;
        $houseNumber = "";
        $numberid = 0;
        $split1 = "0123456789";
        for ($i = 0; $i < strlen($input); $i++)
        {
            $isNum = false;
            for ($j = 0; $j < strlen($split1); $j++) {
                if ($input[$i] == $split1[$j]) {
                    $isNum = true;
                    break;
                }
            }
            if ($isNum) {
                $houseNumber[$numberid] = $input[$i];
                $numberid++;
            }
            else {
                $address[$stringid] = $input[$i];
                $stringid++;
            }
        }
        $address = join($address);
        $houseNumber = join($houseNumber);
        return array($address, $houseNumber);
    }
}
