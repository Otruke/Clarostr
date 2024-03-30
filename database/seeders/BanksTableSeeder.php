<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $banks = [
                [
                    'name' => 'Access Bank',
                    'sort_code' => '044',
                ],
                [
                    'name' => 'Fidelity Bank',
                    'sort_code' => '070',
                ],
                [
                    'name' => 'First City Monument Bank',
                    'sort_code' => '214',
                ],
                [
                    'name' => 'First Bank of Nigeria',
                    'sort_code' => '011',
                ],
                [
                    'name' => 'Guaranty Trust Bank Plc',
                    'sort_code' => '058',
                ],
                [
                    'name' => 'Union Bank of Nigeria',
                    'sort_code' => '032',
                ],
                [
                    'name' => 'United Bank for Africa',
                    'sort_code' => '033',
                ],
                [
                    'name' => 'Zenith Bank',
                    'sort_code' => '057',
                ],
                [
                    'name' => 'Citi Bank',
                    'sort_code' => '023',
                ],
                [
                    'name' => 'Ecobank',
                    'sort_code' => '050',
                ],
                [
                    'name' => 'Heritage Bank',
                    'sort_code' => '030',
                ],
                [
                    'name' => 'Keystone Bank',
                    'sort_code' => '082',
                ],
                [
                    'name' => 'Optimus Bank',
                    'sort_code' => '107',
                ],
                [
                    'name' => 'Polaris Bank',
                    'sort_code' => '076',
                ],
                [
                    'name' => 'Stanbic IBTC Bank',
                    'sort_code' => '221',
                ],
                [
                    'name' => 'Standard Chartered',
                    'sort_code' => '068',
                ],
                [
                    'name' => 'Sterling Bank',
                    'sort_code' => '232',
                ],
                [
                    'name' => 'Titan Trust bank',
                    'sort_code' => '301',
                ],
                [
                    'name' => 'Unity Bank Plc',
                    'sort_code' => '215',
                ],
                [
                    'name' => 'Wema Bank Plc',
                    'sort_code' => '035',
                ],
            
                [
                    'name' => 'Globus Bank',
                    'sort_code' => '103',
                ],
                [
                    'name' => 'Parallex Bank',
                    'sort_code' => '104',
                ],
                [
                    'name' => 'PremiumTrust Bank',
                    'sort_code' => '105',
                ],
                [
                    'name' => 'Providus Bank',
                    'sort_code' => '101',
                ],
                [
                    'name' => 'SunTrust Bank Nigeria',
                    'sort_code' => '100',
                ],
                [
                    'name' => 'Jaiz Bank',
                    'sort_code' => '301',
                ],
                [
                    'name' => 'Lotus Bank',
                    'sort_code' => '303',
                ],
                [
                    'name' => 'TAJ Bank',
                    'sort_code' => '302',
                ],
                [
                    'name' => 'Mutual Trust Microfinance Bank',
                    'sort_code' => 'B17',
                ],
                [
                    'name' => 'Rephidim Microfinance Bank',
                    'sort_code' => 'B51',
                ],
                [
                    'name' => 'Shepherd Trust Microfinance Bank',
                    'sort_code' => 'C41',
                ],
                [
                    'name' => 'Empire Trust Microfinance Bank',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'Finca Microfinance Bank',
                    'sort_code' => 'C38',
                ],
                [
                    'name' => 'Fina Trust Microfinance Bank',
                    'sort_code' => '608',
                ],
                [
                    'name' => 'Accion Microfinance Bank',
                    'sort_code' => '603',
                ],
                [
                    'name' => 'Peace Microfinance Bank',
                    'sort_code' => 'C40',
                ],
                [
                    'name' => 'Infinity Microfinance Bank',
                    'sort_code' => 'A91',
                ],
                [
                    'name' => 'Pearl Microfinance Bank',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'Covenant Microfinance Bank',
                    'sort_code' => '551',
                ],
                [
                    'name' => 'Advans La Fayette Microfinance Bank',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'FairMoney Microfinance Bank',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'Sparkle Bank',
                    'sort_code' => 'B59',
                ],
                [
                    'name' => 'Kuda Bank',
                    'sort_code' => 'A98',
                ],
                [
                    'name' => 'Moniepoint Microfinance Bank',
                    'sort_code' => 'C39',
                ],
                [
                    'name' => 'Opay',
                    'sort_code' => 'C03',
                ],
                [
                    'name' => 'Dot Microfinance Bank',
                    'sort_code' => 'C84',
                ],
                [
                    'name' => 'Palmpay',
                    'sort_code' => 'B99',
                ],
                [
                    'name' => 'Rubies Bank',
                    'sort_code' => '587',
                ],
                [
                    'name' => 'VFD Microfinance Bank',
                    'sort_code' => 'B69',
                ],
                [
                    'name' => 'Mint Finex MFB',
                    'sort_code' => 'B13',
                ],
                [
                    'name' => 'Mkobo MFB',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'Raven bank',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'Rex Microfinance Bank',
                    'sort_code' => '000',
                ],
                [
                    'name' => 'Coronation Merchant Bank',
                    'sort_code' => '426',
                ],
                [
                    'name' => 'FBNQuest Merchant Bank',
                    'sort_code' => '427',
                ],
                [
                    'name' => 'FSDH Merchant Bank',
                    'sort_code' => '428',
                ],
                [
                    'name' => 'Greenwich Merchant Bank',
                    'sort_code' => '429',
                ],
                [
                    'name' => 'Rand Merchant Bank',
                    'sort_code' => 'C16',
                ],
                [
                    'name' => 'Nova Merchant Bank',
                    'sort_code' => '561',
                ],
                [
                    'name' => 'SunTrust Bank Nigeria',
                    'sort_code' => '100',
                ],
                [
                    'name' => 'Stanbic Ibtc',
                    'sort_code' => '039',
                ],
                [
                    'name' => 'e-Naira',
                    'sort_code' => '434',
                ],
            ];
            
    
            // Loop through the banks array and insert each bank into the database
            foreach ($banks as $bank) {
                DB::table('banks')->insert([$bank]);
            }
        }
    }
}
