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
            'BankaccountNumber' => $factory->bankAccountNumber,
            'Balance' => 200,
            'Invoices' => 2,
            'Profit' => 200,
            'BTWCode' => '93284309jfioejfw'

        ));
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
