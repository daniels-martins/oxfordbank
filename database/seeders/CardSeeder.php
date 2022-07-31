<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = [
            'cc_type' => 'debit', //constant
            'cc_kind' => 'virtual', //constant 
            'cc_group' => 'visa' //variable
        ];
        $cc_num = $this->generateCCNum($config);
        // Auth::user()->cards()->create(compact('cc_num'));
        $user = User::first();
        $user->cards()->create([
            'cc_num' => $cc_num,
            'card_kind_id' => 1,
            'card_type_id' => 1,
            'card_group_id' => 1
        ]);
    }

    public function generateCCNum(Array $config) : string
    {
        $first_letter = $this->getFirstLetter($config);
        $other_13_digits = rand(0, 9999999999999);
        return $cc_num = $first_letter . $other_13_digits;

    }

    public function getFirstLetter($config)
    {
        switch ($config['cc_group']) {
            case 'visa':
                $first_letter = '4';
                break;
            case 'master':
            case 'master card':
            case 'master_card':
                $first_letter = '5';
                break;

            case 'amex':
            case 'american express':
            case 'american_express':
                $first_letter = '3';
                break;

            case 'discover':
                $first_letter = '6';
                break;
        }
        return $first_letter;
    }
}
