<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Careers;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\DepotLocation;
use App\Models\DepotServices;
use App\Models\HusbandryImage;
use App\Models\HusbandryServices;
use App\Models\IndustriesServiceDetails;
use App\Models\Locations;
use App\Models\Meta;
use App\Models\News;
use App\Models\PortDetails;
use App\Models\ScConvoy;
use App\Models\ScServices;
use App\Models\SeaFreightServices;
use App\Models\ShipAgencyServices;
use App\Models\ShipSupplyServices;
use App\Models\TruckingServices;
use App\Models\ValueAddingServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        // dd($request);


        $meta = Meta::find(32);
        $banner = Banner::where('banner_page', 'search')->get()->first();
        $count = 0;
        $query = $request->get('searchKeyword');
        $career = '';
        $contact = '';
        $news = '';

        $about = About::where('about_title', 'LIKE', "%$query%")->orWhere('about_desc', 'LIKE', "%$query%")->get();
        if ($query == 'career' || $query == 'careers') {
            $career = 'career';
            $contact = '';
            $news = '';
        }
        if ($query == 'contact' || $query == 'contacts') {
            $contact = 'contact';
            $career = '';
            $news = '';
        }
        if ($query == 'news') {
            $news = 'news';

            $contact = '';
            $career = '';
        }


        $shipAgency = ShipAgencyServices::where('ship_agency_title', 'LIKE', "%$query%")
            ->orWhere('ship_agency_desc_title1', 'LIKE', "%$query%")
            ->orWhere('ship_agency_desc_title2', 'LIKE', "%$query%")
            ->orWhere('ship_agency_desc_paragraph', 'LIKE', "%$query%")
            ->orWhere('ship_agency_desc_list', 'LIKE', "%$query%")
            ->get();


        $shipSupply = ShipSupplyServices::where('ship_supply_title', 'LIKE', "%$query%")
            ->orWhere('ship_supply_desc_title1', 'LIKE', "%$query%")
            ->orWhere('ship_supply_desc_title2', 'LIKE', "%$query%")
            ->orWhere('ship_supply_desc_paragraph', 'LIKE', "%$query%")
            ->orWhere('ship_supply_desc_list', 'LIKE', "%$query%")
            ->get();


        $husbandry = HusbandryServices::where('husbandry_title', 'LIKE', "%$query%")
            ->orWhere('husbandry_desc_title1', 'LIKE', "%$query%")
            ->orWhere('husbandry_desc_paragraph', 'LIKE', "%$query%")
            ->orWhere('husbandry_desc_list', 'LIKE', "%$query%")
            ->orWhere('husbandry_desc_title2', 'LIKE', "%$query%")
            ->get();


        $depotServices = DepotServices::where('depot_service_title', 'LIKE', "%$query%")
            ->orWhere('depot_service_desc', 'LIKE', "%$query%")
            ->get();

        $depotLocation = DepotLocation::where('depot_location_title', 'LIKE', "%$query%")
            ->orWhere('depot_location_desc', 'LIKE', "%$query%")
            ->get();


        $seaFreight = SeaFreightServices::where('sea_freight_service_name', 'LIKE', "%$query%")
            ->orWhere('sea_freight_desc_title1', 'LIKE', "%$query%")
            ->orWhere('sea_freight_desc_paragraph', 'LIKE', "%$query%")
            ->orWhere('sea_freight_desc_title2', 'LIKE', "%$query%")
            ->orWhere('sea_freight_desc_list', 'LIKE', "%$query%")
            ->get();


        $trucking = TruckingServices::where('trucking_title', 'LIKE', "%$query%")
            ->orWhere('trucking_desc_list', 'LIKE', "%$query%")
            ->orWhere('trucking_desc_paragraph', 'LIKE', "%$query%")
            ->get();


        $valueAdding = ValueAddingServices::where('value_adding_title', 'LIKE', "%$query%")
            ->orWhere('value_adding_desc_title1', 'LIKE', "%$query%")
            ->orWhere('value_adding_desc_title2', 'LIKE', "%$query%")
            ->orWhere('value_adding_desc_list', 'LIKE', "%$query%")
            ->orWhere('value_adding_desc_paragraph', 'LIKE', "%$query%")
            ->get();


        $scServices = ScServices::where('sc_title', 'LIKE', "%$query%")
            ->orWhere('sc_desc', 'LIKE', "%$query%")
            ->get();


        $scConvoy = ScConvoy::where('sc_convoy_title', 'LIKE', "%$query%")
            ->orWhere('sc_convoy_desc_paragraph', 'LIKE', "%$query%")
            ->orWhere('sc_convoy_desc_list', 'LIKE', "%$query%")
            ->orWhere('sc_convoy_desc_table', 'LIKE', "%$query%")
            ->get();

        $industries = IndustriesServiceDetails::where('service_details_title', 'LIKE', "%$query%")
            ->orWhere('service_details_desc', 'LIKE', "%$query%")
            ->get();


        $portDetails = PortDetails::where('port_details_title', 'LIKE', "%$query%")
            ->orWhere('port_details_desc1', 'LIKE', "%$query%")
            ->orWhere('port_details_desc2', 'LIKE', "%$query%")
            ->orWhere('port_details_desc_table', 'LIKE', "%$query%")
            ->get();


//        $news = News::where('news_title', 'LIKE', "%$query%")
//                ->orWhere('news_desc', 'LIKE', "%$query%")
//                ->get();


        if ($portDetails != "") {
            foreach ($portDetails as $obj) {
                $count += 1;
            }
        }
        if ($industries != "") {
            foreach ($industries as $obj) {
                $count += 1;
            }
        }

        if ($scConvoy != "") {
            foreach ($scConvoy as $obj) {
                $count += 1;
            }
        }

        if ($scServices != "") {
            foreach ($scServices as $obj) {
                $count += 1;
            }
        }

        if ($valueAdding != "") {
            foreach ($valueAdding as $obj) {
                $count += 1;
            }
        }

        if ($trucking != "") {
            foreach ($trucking as $obj) {
                $count += 1;
            }
        }

        if ($seaFreight != "") {
            foreach ($seaFreight as $obj) {
                $count += 1;
            }
        }

        if ($depotLocation != "") {
            foreach ($depotLocation as $obj) {
                $count += 1;
            }
        }

        if ($depotServices != "") {
            foreach ($depotServices as $obj) {
                $count += 1;
            }
        }

        if ($husbandry != "") {
            foreach ($husbandry as $obj) {
                $count += 1;
            }
        }

        if ($shipSupply != "") {
            foreach ($shipSupply as $obj) {
                $count += 1;
            }
        }
        if ($shipAgency != "") {
            foreach ($shipAgency as $obj) {
                $count += 1;
            }
        }
        if ($about != "") {
            foreach ($about as $obj) {
                $count += 1;
            }
        }
        if ($career != '') {

            $count += 1;
        }
        if ($contact != "") {
            $count += 1;
        }
        if ($news != '') {

            $count += 1;
        }

        return view('search.result', [
            'about' => $about,
            'meta' => $meta,
            'banner' => $banner,
            'shipAgency' => $shipAgency,
            'query' => $query,
            'shipSupply' => $shipSupply,
            'husbandry' => $husbandry,
            'depotServices' => $depotServices,
            'depotLocation' => $depotLocation,
            'seaFreight' => $seaFreight,
            'trucking' => $trucking,
            'valueAdding' => $valueAdding,
            'scServices' => $scServices,
            'scConvoy' => $scConvoy,
            'industries' => $industries,
            'portDetails' => $portDetails,
            'news' => $news,
            'count' => $count,
            'career' => $career,
            'contact' => $contact,
//            'news' => $news,
            // 'meta->meta_description' => $meta->meta_description,
        ]);
    }

}
