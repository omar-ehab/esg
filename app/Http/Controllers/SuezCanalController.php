<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Page;
use App\Models\SuezCanalEams;
use App\Models\SuezCanalMooringAndLights;
use App\Models\SuezCanalOtherAuthority;
use App\Models\SuezCanalPilotageDues;
use App\Models\SuezCanalPortAuthority;
use App\Models\SuezCanalSdrRate;
use App\Models\SuezCanalShippingAgencyFees;
use App\Models\SuezCanalShipType;
use App\Models\SuezCanalTiers;
use App\Models\SuezCanalUsufruct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuezCanalController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $page = Page::where('slug', 'suez-canal')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        return view('suez_canal.index', compact('banner'));
    }

    /**
     * @return Factory|View|Application
     */
    public function about(): Factory|View|Application
    {
        $page = Page::where('slug', 'about-suez-canal')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        return view('suez_canal.about', compact('banner'));
    }

    /**
     * @return Factory|View|Application
     */
    public function convoy(): Factory|View|Application
    {
        $page = Page::where('slug', 'suez-canal-convoy')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        return view('suez_canal.convoy', compact('banner'));

    }


    /**
     * @return Factory|View|Application
     */
    public function calculator(): Factory|View|Application
    {
        $types = SuezCanalShipType::orderBy('id')->get();
        $tiers = SuezCanalTiers::all();
        $total = "";
        $req = array();
        $totalScnt = "";
        $pilotageDueVal = "";
        $totalScntAfterSdr = "";
        $totalScntAftertier = "";
        $tier = array();
        $mooringTotal = '';
        $totalEamsWithGrt = '';
        $totalOtherAuthorities = '';
        $portAuthorityVal = '';
        $otherAuthorities = array();
        $tierPercentage = "";
        $date = date("Y/m/d");
        $sdr = DB::table('suez_canal_sdr_rates')
            ->whereDate('date', '=', $date)
            ->first();
        if ($sdr) {
            $sdrRate = round($sdr->rate, 2);
        } else {
            $endpoint = 'live';
            $access_key = '5ec9ad4a8fc22faf927b06f15c7aa03a';
            $ch = curl_init('http://api.currencylayer.com/' . $endpoint . '?access_key=' . $access_key);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $exchangeRates = json_decode($json, true);
            $sdrR = 1 / $exchangeRates['quotes']['USDXDR'];
            SuezCanalSdrRate::create(['date' => $date, 'rate' => $sdrR]);
            $sdrRate = round($sdrR, 2);
        }

        return view('suez_canal.calculator', compact(
            'types',
            'tiers',
            'total',
            'req',
            'totalScnt',
            'pilotageDueVal',
            'totalScntAfterSdr',
            'totalScntAftertier',
            'tier',
            'sdrRate',
            'mooringTotal',
            'totalEamsWithGrt',
            'totalOtherAuthorities',
            'portAuthorityVal',
            'otherAuthorities',
            'tierPercentage'
        ));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function calculate(Request $request): Factory|View|Application
    {
        $status = $request->get('ship_status');
        $scnt = $request->get('SCNT');
        $typeId = $request->get('ship_type_id');
        $sdrRequest = $request->get('SDR');
        $scnt2 = $request->get('SCNT');
        $direction = $request->get('ship_direction');
        $type = SuezCanalShipType::find($typeId);
        $costs = $type->costs;
        $arrVals = array(5000, 5000, 10000, 20000, 30000, 50000, 120000);
        $pilotageDues = SuezCanalPilotageDues::all();
        $lastPilotageDues = SuezCanalPilotageDues::orderBy('id', 'desc')->first();
        $types = SuezCanalShipType::all();
        $tiers = SuezCanalTiers::all();
        $tier = SuezCanalTiers::find($request->get('ship_tier'));
        $tierPercentage = 0;
        $i = 0;
        $y = 0;
        foreach ($arrVals as $val) {
            if ($scnt > $val) {
                $scnt -= $val;
                $i++;
            }
        }
        $reminder = $scnt;
        $typeCost = 0;
        if ($status == "Laden") {
            foreach ($costs as $j => $cost) {
                if ($j < $i) {

                    $typeCost += ($costs[$j]->laden_cost * (($costs[$j]->scnt_to - $costs[$j]->scnt_from) + 1));
                }

                $reminderCost = $reminder * $costs[$i]->laden_cost;
            }
            $totalScnt = $typeCost + $reminderCost;
            dd($totalScnt);
        } elseif ($status == "Ballast") {
            foreach ($costs as $j => $cost) {
                if ($j < $i) {

                    $typeCost += ($costs[$j]->ballest_cost * (($costs[$j]->scnt_to - $costs[$j]->scnt_from) + 1));
                }

                $reminderCost = $reminder * $costs[$i]->ballest_cost;
            }
            $totalScnt = $typeCost + $reminderCost;
        }
        if ($direction == "Northbound") {
            if ($tier) {
                $tierPercentage = $tier->northbound_percentage;
            }
            foreach ($pilotageDues as $pilotageDue) {
                if ($scnt2 >= $pilotageDue->scnt_from && $scnt2 <= $pilotageDue->scnt_to) {
                    $pilotageDueVal = $pilotageDue->north_val1;
                } elseif ($scnt2 > 60000) {
                    $pilotageDueVal = $lastPilotageDues->north_val1;
                }
            }
        } elseif ($direction == "Southbound") {
            if ($tier) {
                $tierPercentage = $tier->southbound_percentage;
            }
            foreach ($pilotageDues as $pilotageDue) {
                if ($scnt2 >= $pilotageDue->scnt_from && $scnt2 <= $pilotageDue->scnt_to) {
                    $pilotageDueVal = $pilotageDue->south_val1;
                } elseif ($scnt2 > 60000) {
                    $pilotageDueVal = $lastPilotageDues->south_val1;
                }
            }
        }
        if ($tier) {
            $tierExist = 1;
            $totalScntAftertier = ($totalScnt * (1 + $tierPercentage) * $tierExist);
        } else {
            $tierExist = 0;
            $totalScntAftertier = $totalScnt;
        }

        if ($sdrRequest) {
            $sdrRate = $sdrRequest;
        } else {
            $date = date("Y/m/d");
            $sdr = DB::table('egmar_sc_sdr_rate')
                ->whereDate('sdr_rate_date', '=', $date)
                ->first();
            if ($sdr) {
                $sdrRate = round($sdr->sdr_rate_val, 2);;
            } else {
                $endpoint = 'live';
                $access_key = '5ec9ad4a8fc22faf927b06f15c7aa03a';
                $ch = curl_init('http://api.currencylayer.com/' . $endpoint . '?access_key=' . $access_key);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($ch);
                curl_close($ch);
                $exchangeRates = json_decode($json, true);
                $sdrR = 1 / $exchangeRates['quotes']['USDXDR'];
                SuezCanalSdrRate::create(['date' => $date, 'rate' => $sdrR]);
                $sdrRate = round($sdrR, 2);
            }
        }
        $totalScntAfterSdr = ($totalScntAftertier * $sdrRate);

        $total = $totalScntAfterSdr + $pilotageDueVal;

        //grt
        $grt = $request->get('GRT');

        //Mooring & Lights
        $mooring = SuezCanalMooringAndLights::where('grt_from', '<=', $grt)
            ->where('grt_to', '>=', $grt)
            ->first();

        $mooringTotal = $mooring->launch + $mooring->projector;
        //eams
        $eamsGrt = SuezCanalEams::first();
        $eamsGrtVal = $grt * ($eamsGrt->tariif);
        $allEams = SuezCanalEams::all();
        $totalEams = 0;
        foreach ($allEams as $eam) {
            if ($eam->id != $eamsGrt->id) {
                $totalEams += $eam->tariif;
            }
        }
        $totalEamsWithGrt = $totalEams + $eamsGrtVal;

        //Other Authorities
        $totalOtherAuthorities = 0;
        $otherAuthorities = SuezCanalOtherAuthority::all();
        foreach ($otherAuthorities as $otherAuthority) {
            $totalOtherAuthorities += $otherAuthority->tariif;
        }

        //Port Authority
        $portAuthorityGrt = SuezCanalPortAuthority::first();

        $portAuthorityGrtVal = $portAuthorityGrt->tariif * $grt;

        $portAuthorities = SuezCanalPortAuthority::whereNotNull('tariif')->get();
        $totalPortAuthorities = 0;
        foreach ($portAuthorities as $portAuthority) {
            if ($portAuthority->id != $portAuthorityGrt->id) {
                $totalPortAuthorities += $portAuthority->tariif;
            }
        }

        //shippingAgencyFees
        //passenger

        if ($type->ship_type_name == 'Passenger Ships') {
            $shippingAgencyFees = SuezCanalShippingAgencyFees::where('type', 'passenger')
                ->where('from', '<=', $grt)
                ->where('to', '>=', $grt)
                ->first();
            if ($shippingAgencyFees) {
                $shippingAgencyFeesVal = $shippingAgencyFees->tariif;
            }
            $totalShippingAgencyFeesVal = $shippingAgencyFeesVal;
        } else {
            if ($grt <= 40000) {
                $shippingAgencyFees = SuezCanalShippingAgencyFees::where('type', 'all')
                    ->where('from', '<=', $grt)
                    ->where('to', '>=', $grt)
                    ->first();
                if ($shippingAgencyFees) {
                    $shippingAgencyFeesVal = $shippingAgencyFees->tariif;
                }
                $totalShippingAgencyFeesVal = $shippingAgencyFeesVal;
            }
            if ($grt > 40000) {
                $shippingAgencyFees = SuezCanalShippingAgencyFees::where('type', 'all')
                    ->where('from', '<=', '20001')
                    ->where('to', '>=', '40000')
                    ->first();
                if ($shippingAgencyFees) {
                    $shippingAgencyFeesVal = $shippingAgencyFees->tariif;
                }
                $res = $grt - 40000;
                $tarrif = SuezCanalShippingAgencyFees::whereNull('from')
                    ->whereNull('to')
                    ->first()->tariif;
                $reminderTarrif = ($res * $tarrif) / 10000;
                $totalShippingAgencyFeesVal = $shippingAgencyFeesVal + $reminderTarrif;
            }
        }
        //usufruct
        $usufruct = SuezCanalUsufruct::where('from', '<=', $grt)
            ->where('to', '>=', $grt)
            ->first();
        $usufructVal = $usufruct->tariif;
        $portAuthorityVal = $totalShippingAgencyFeesVal + $usufructVal + $totalPortAuthorities + $portAuthorityGrtVal;

        return view('suez_canal.calculator', [
            'types' => $types,
            'tiers' => $tiers,
            'total' => $total,
            'req' => $request,
            'totalScnt' => $totalScnt,
            'pilotageDueVal' => $pilotageDueVal,
            'totalScntAfterSdr' => $totalScntAfterSdr,
            'totalScntAftertier' => $totalScntAftertier,
            'tierSelected' => $tier,
            'sdrRate' => $sdrRate,
            'mooringTotal' => $mooringTotal,
            'totalEamsWithGrt' => $totalEamsWithGrt,
            'totalOtherAuthorities' => $totalOtherAuthorities,
            'portAuthorityVal' => $portAuthorityVal,
            'otherAuthorities' => $otherAuthorities,
            'tierPercentage' => $tierPercentage,
        ]);
    }
}
