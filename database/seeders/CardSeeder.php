<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use App\Models\CardKind;
use App\Models\CardType;
use App\Models\CardGroup;
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
        $this->generateCard($config);
    }


    private function generateCard(Array $config)
    {
        
        $cc_num = $this->generateCCNum($config);
        // Auth::user()->cards()->create(compact('cc_num'));
        $user = User::first();
        $user->cards()->create([
            'cc_num' => $cc_num,
            'card_kind_id' => CardKind::where('name', $config['cc_kind'])->first()->id,
            'card_type_id' => CardType::where('name', $config['cc_type'])->first()->id,
            'card_group_id' => CardGroup::where('name', $config['cc_group'])->first()->id,
        ]);
    }

    private function generateCCNum(Array $config) : string
    {
        $first_number = $this->generateFirstNumberForCardGroup($config);
        $other_15_digits = rand(0, 999999999999999);
        return $cc_num = $first_number . $other_15_digits   ;

    }

    private function generateFirstNumberForCardGroup($config)
    {
        switch ($config['cc_group']) {
            case 'visa':
                $first_number = '4';
                break;
            case 'master':
            case 'master card':
            case 'master_card':
                $first_number = '5';
                break;

            case 'amex':
            case 'american express':
            case 'american_express':
                $first_number = '3';
                break;

            case 'discover':
                $first_number = '6';
                break;
        }
        return $first_number;
    }
}
