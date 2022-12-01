<?php

namespace Database\Seeders;

use App\Models\SuezCanalCost;
use App\Models\SuezCanalEams;
use App\Models\SuezCanalMooringAndLights;
use App\Models\SuezCanalOtherAuthority;
use App\Models\SuezCanalPilotageDues;
use App\Models\SuezCanalPortAuthority;
use App\Models\SuezCanalShippingAgencyFees;
use App\Models\SuezCanalShipType;
use App\Models\SuezCanalTiers;
use App\Models\SuezCanalUsufruct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuezCanalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::transaction(function () {
            $ship_types = ['Tankers of Crude Oil',
                'Tankers of Petroleum Products',
                'Dry Bulk Carriers',
                'LPG Carriers',
                'LNG Carriers',
                'Chemical Carriers & Other Liquid Bulk Carriers',
                'Containers Ships',
                'General Cargo Ships',
                'Ro/Ro Ships',
                'Vehicle Carriers',
                'Passenger Ships',
                'Army Units',
                'Special Floating Units',
                'Others'
            ];
            foreach ($ship_types as $ship_type) {
                SuezCanalShipType::create([
                    'name' => $ship_type
                ]);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_costs = json_decode(Storage::disk('public')->get('seeder/suez_canal_cost.json'))->data;
            foreach ($suez_canal_costs as $canal_cost) {
                SuezCanalCost::create([
                    'ship_type_id' => $canal_cost->ship_type_id,
                    'scnt_from' => $canal_cost->suez_canal_cost_scnt_from,
                    'scnt_to' => $canal_cost->suez_canal_cost_scnt_to,
                    'slice' => $canal_cost->suez_canal_cost_slice,
                    'laden_cost' => $canal_cost->suez_canal_cost_laden_cost,
                    'ballest_cost' => $canal_cost->suez_canal_cost_ballest_cost,
                ]);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_eamses = [
                ['name' => 'رسم المنائر', 'tariif' => 0.075],
                ['name' => 'نوبتجية الإيرادات', 'tariif' => 240],
                ['name' => 'نوباتجية التفتيش البحري', 'tariif' => 240],
                ['name' => 'تصريح السفر', 'tariif' => 1.5],
                ['name' => 'متنوع', 'tariif' => 25],
            ];
            foreach ($suez_canal_eamses as $canal_eams) {
                SuezCanalEams::create($canal_eams);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_mooring_lights = [
                [
                    'grt_from' => 1,
                    'grt_to' => 2500,
                    'launch' => 1095,
                    'projector' => 751.5,
                ],
                [
                    'grt_from' => 2501,
                    'grt_to' => 10000000,
                    'launch' => 1837.5,
                    'projector' => 751.5,
                ],
            ];
            foreach ($suez_canal_mooring_lights as $canal_mooring_light) {
                SuezCanalMooringAndLights::create($canal_mooring_light);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_other_authorities = [
                ['title' => 'Quarantine', 'tariif' => 66],
                ['title' => 'Port Police and Immigration', 'tariif' => 100],
                ['title' => 'Sunders', 'tariif' => 275],
            ];
            foreach ($suez_canal_other_authorities as $canal_other_authority) {
                SuezCanalOtherAuthority::create($canal_other_authority);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_pilotage_dues = json_decode(Storage::disk('public')->get('seeder/suez_canal_pilotage_dues.json'))->data;
            foreach ($suez_canal_pilotage_dues as $canal_pilotage_due) {
                SuezCanalPilotageDues::create([
                    'scnt_from' => $canal_pilotage_due->pilotage_dues_scnt_from,
                    'scnt_to' => $canal_pilotage_due->pilotage_dues_scnt_to,
                    'north_val1' => $canal_pilotage_due->pilotage_dues_north_val1,
                    'north_val2' => $canal_pilotage_due->pilotage_dues_north_val2,
                    'south_val1' => $canal_pilotage_due->pilotage_dues_south_val1,
                    'south_val2' => $canal_pilotage_due->pilotage_dues_south_val2,
                ]);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_port_authorities = [
                ['name' => 'رسم الميناء', 'tariif' => 0.03],
                ['name' => 'اتعاب الوكاله الملاحية', 'tariif' => null],
                ['name' => 'مقابل انتفاع', 'tariif' => null],
                ['name' => 'نادي البحارة', 'tariif' => 25],
                ['name' => 'ترخيص سفر', 'tariif' => 34.75],
                ['name' => 'رسم تصريح السفر', 'tariif' => 6],
                ['name' => 'رسم النوبتجية', 'tariif' => 150],
                ['name' => 'رسم نظافة عابر', 'tariif' => 1.5],
                ['name' => 'دمغة', 'tariif' => 3],
            ];
            foreach ($suez_canal_port_authorities as $canal_port_authority) {
                SuezCanalPortAuthority::create($canal_port_authority);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_shipping_agency_fees = [
                ['type' => 'all', 'title' => 'Vessels up to 3000 tons', 'from' => 1, 'to' => 3000, 'tariif' => 900.41],
                ['type' => 'all', 'title' => 'Vessels over 3000 tons and up to 5000 tons', 'from' => 3001, 'to' => 5000, 'tariif' => 1012.96],
                ['type' => 'all', 'title' => 'Vessels over 5000 tons and up to 10000 tons', 'from' => 5001, 'to' => 10000, 'tariif' => 1350.61],
                ['type' => 'all', 'title' => 'Vessels over 10,000 tons and up to 20,000 tons', 'from' => 10001, 'to' => 20000, 'tariif' => 1688.26],
                ['type' => 'all', 'title' => 'Vessels over 20,000 tons and up to 40,000 tons', 'from' => 20001, 'to' => 40000, 'tariif' => 2025.92],
                ['type' => 'passenger', 'title' => 'Vessels up to 15000 tons', 'from' => 1, 'to' => 15000, 'tariif' => 1012.96],
                ['type' => 'passenger', 'title' => 'Vessels over 15000 tons', 'from' => 15001, 'to' => 200000000, 'tariif' => 2025.92],
                ['type' => 'all', 'title' => 'Vessels over 40,000 tons for every 10,000 extra ton', 'from' => null, 'to' => null, 'tariif' => 281.38],
            ];
            foreach ($suez_canal_shipping_agency_fees as $canal_shipping_agency_fee) {
                SuezCanalShippingAgencyFees::create($canal_shipping_agency_fee);
            }

            /* ------------------------------------------------------------------------------------- */

            $suez_canal_tiers = [
                ['number' => 1, 'southbound_percentage' => 0, 'northbound_percentage' => 0],
                ['number' => 2, 'southbound_percentage' => 0.07, 'northbound_percentage' => 0.1],
                ['number' => 3, 'southbound_percentage' => 0.11, 'northbound_percentage' => 0.19],
                ['number' => 4, 'southbound_percentage' => 0.15, 'northbound_percentage' => 0.27],
                ['number' => 5, 'southbound_percentage' => 0.23, 'northbound_percentage' => 0.45],
                ['number' => 6, 'southbound_percentage' => 0.3, 'northbound_percentage' => 0.53],
                ['number' => 7, 'southbound_percentage' => 0.34, 'northbound_percentage' => 0.61],
                ['number' => 8, 'southbound_percentage' => 0.36, 'northbound_percentage' => 0.68],
                ['number' => 9, 'southbound_percentage' => 0.38, 'northbound_percentage' => 0.74],
                ['number' => 10, 'southbound_percentage' => 0.4, 'northbound_percentage' => 0.79],
                ['number' => 11, 'southbound_percentage' => 0.42, 'northbound_percentage' => 0.83],
                ['number' => 12, 'southbound_percentage' => 0.44, 'northbound_percentage' => 0.86],
            ];

            foreach ($suez_canal_tiers as $canal_tier) {
                SuezCanalTiers::create($canal_tier);
            }

            /* ------------------------------------------------------------------------------------- */
            $suez_canal_usufructs = [
                ['title' => 'GRT Up to 10000 tons', 'from' => 1, 'to' => 10000, 'tariif' => 393.93],
                ['title' => 'GRT over 10 000 tons up to 60 000 tons', 'from' => 10001, 'to' => 60000, 'tariif' => 506.48],
                ['title' => 'GRT over 60 000 tons', 'from' => 60000, 'to' => 200000000, 'tariif' => 787.86]
            ];
            foreach ($suez_canal_usufructs as $canal_usufruct) {
                SuezCanalUsufruct::create($canal_usufruct);
            }
        });
    }
}
