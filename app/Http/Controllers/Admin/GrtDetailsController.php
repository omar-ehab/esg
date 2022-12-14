<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EamsRequest;
use App\Http\Requests\MooringAndLightsRequest;
use App\Http\Requests\OtherAuthoritiesRequest;
use App\Http\Requests\PortAuthoritiesRequest;
use App\Http\Requests\ShippingAgencyFeesRequest;
use App\Http\Requests\UsufructRequest;
use App\Models\SuezCanalEams;
use App\Models\SuezCanalMooringAndLights;
use App\Models\SuezCanalOtherAuthority;
use App\Models\SuezCanalPortAuthority;
use App\Models\SuezCanalShippingAgencyFees;
use App\Models\SuezCanalUsufruct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GrtDetailsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $mooringAndLights = SuezCanalMooringAndLights::all();
        $eams = SuezCanalEams::all();
        $ports = SuezCanalPortAuthority::all();
        $allShippingAgencyFees = SuezCanalShippingAgencyFees::where('type', 'all')->get();
        $passengerShippingAgencyFees = SuezCanalShippingAgencyFees::where('type', 'passenger')->get();
        $usufructs = SuezCanalUsufruct::all();
        $others = SuezCanalOtherAuthority::all();
        return view('admin.grt_details.index', compact(
            'mooringAndLights',
            'eams',
            'ports',
            'allShippingAgencyFees',
            'passengerShippingAgencyFees',
            'usufructs',
            'others'
        ));
    }

    /**
     * @param SuezCanalMooringAndLights $mooring_and_lights
     * @return Factory|View|Application
     */
    public function mooring_and_lights(SuezCanalMooringAndLights $mooring_and_lights): Factory|View|Application
    {
        return view('admin.grt_details.edit_mooring_and_lights', compact('mooring_and_lights'));
    }

    /**
     * @param MooringAndLightsRequest $request
     * @param SuezCanalMooringAndLights $mooring_and_lights
     * @return RedirectResponse
     */
    public function update_mooring_and_lights(MooringAndLightsRequest $request, SuezCanalMooringAndLights $mooring_and_lights): RedirectResponse
    {
        $mooring_and_lights->update([
            'launch' => $request->get('launch'),
            'projector' => $request->get('projector'),
        ]);
        session()->flash('success', 'Mooring & Projector Data Updated Successfully!');
        return redirect()->route('admin.grt_details.index');
    }

    /**
     * @param SuezCanalEams $eam
     * @return Factory|View|Application
     */
    public function eams(SuezCanalEams $eam): Factory|View|Application
    {
        return view('admin.grt_details.edit_eams', compact('eam'));
    }

    /**
     * @param EamsRequest $request
     * @param SuezCanalEams $eam
     * @return RedirectResponse
     */
    public function update_eams(EamsRequest $request, SuezCanalEams $eam): RedirectResponse
    {
        $eam->update($request->validated());
        session()->flash('success', 'Eams Data Updated Successfully!');
        return redirect()->route('admin.grt_details.index');
    }

    /**
     * @param SuezCanalPortAuthority $port_authority
     * @return Factory|View|Application
     */
    public function port_authorities(SuezCanalPortAuthority $port_authority): Factory|View|Application
    {
        return view('admin.grt_details.port_authorities', compact('port_authority'));
    }

    /**
     * @param PortAuthoritiesRequest $request
     * @param SuezCanalPortAuthority $port_authority
     * @return RedirectResponse
     */
    public function update_port_authorities(PortAuthoritiesRequest $request, SuezCanalPortAuthority $port_authority): RedirectResponse
    {
        $port_authority->update($request->validated());
        session()->flash('success', 'Port Authority Data Updated Successfully!');
        return redirect()->route('admin.grt_details.index');
    }

    /**
     * @param SuezCanalShippingAgencyFees $shipping_agency_fee
     * @return Factory|View|Application
     */
    public function shipping_agency_fees(SuezCanalShippingAgencyFees $shipping_agency_fee): Factory|View|Application
    {
        return view('admin.grt_details.edit_shipping_agency_fees', compact('shipping_agency_fee'));
    }

    /**
     * @param ShippingAgencyFeesRequest $request
     * @param SuezCanalShippingAgencyFees $shipping_agency_fee
     * @return RedirectResponse
     */
    public function update_shipping_agency_fees(ShippingAgencyFeesRequest $request, SuezCanalShippingAgencyFees $shipping_agency_fee): RedirectResponse
    {
        $shipping_agency_fee->update($request->validated());
        session()->flash('success', 'Shipping Agency Fees Data Updated Successfully!');
        return redirect()->route('admin.grt_details.index');
    }

    /**
     * @param SuezCanalUsufruct $usufruct
     * @return Factory|View|Application
     */
    public function usufruct(SuezCanalUsufruct $usufruct): Factory|View|Application
    {
        return view('admin.grt_details.edit_ucufruct', compact('usufruct'));
    }

    /**
     * @param UsufructRequest $request
     * @param SuezCanalUsufruct $usufruct
     * @return RedirectResponse
     */
    public function update_usufruct(UsufructRequest $request, SuezCanalUsufruct $usufruct): RedirectResponse
    {
        $usufruct->update($request->validated());
        session()->flash('success', 'Usufruct Data Updated Successfully!');
        return redirect()->route('admin.grt_details.index');
    }

    /**
     * @param SuezCanalOtherAuthority $other_authority
     * @return Factory|View|Application
     */
    public function other_authorities(SuezCanalOtherAuthority $other_authority): Factory|View|Application
    {
        return view('admin.grt_details.edit_other_authority', compact('other_authority'));
    }

    /**
     * @param OtherAuthoritiesRequest $request
     * @param SuezCanalOtherAuthority $other_authority
     * @return RedirectResponse
     */
    public function update_other_authorities(OtherAuthoritiesRequest $request, SuezCanalOtherAuthority $other_authority): RedirectResponse
    {
        $other_authority->update($request->validated());
        session()->flash('success', 'Other Authority Data Updated Successfully!');
        return redirect()->route('admin.grt_details.index');
    }
}
