<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentRequest;
use App\Models\Item;
use App\Models\ItemShipment;
use App\Models\Shipment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ShipmentController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $shipments = Shipment::all();
        return view('transaction.shipments.index', compact('shipments'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $items = Item::all();
        return view('transaction.shipments.create', compact('items'));
    }

    /**
     * @param ShipmentRequest $request
     * @return RedirectResponse
     */
    public function store(ShipmentRequest $request): RedirectResponse
    {
        Shipment::create($request->validated());
        return to_route('shipments.index')->with('success', 'Data pengiriman berhasil dicatat');
    }

    /**
     * @param Shipment $shipment
     * @return View
     */
    public function show(Shipment $shipment): View
    {
        return view('transaction.shipments.show', compact('shipment'));
    }

    /**
     * @param Shipment $shipment
     * @return View
     */
    public function edit(Shipment $shipment): View
    {
        $items = Item::all();
        return view('transaction.shipments.edit', compact('shipment', 'items'));
    }

    /**
     * @param ShipmentRequest $request
     * @param Shipment $shipment
     * @return RedirectResponse
     */
    public function update(ShipmentRequest $request, Shipment $shipment): RedirectResponse
    {
        $validated = $request->validated();
        if ($validated['status'] == 'pending') {
            $validated['shipment_date'] = null;
            $validated['delivery_date'] = null;
        } elseif ($validated['status'] == 'in transit') {
            $validated['delivery_date'] = null;
        }

        $shipment->update($validated);

        return to_route('shipments.index')->with('success', 'Data pengiriman berhasil diperbarui');
    }

    /**
     * @param Shipment $shipment
     * @return RedirectResponse
     */
    public function destroy(Shipment $shipment): RedirectResponse
    {
        $shipment->delete();

        return back()->with('success', 'Data pengiriman berhasil dihapus');
    }
}
