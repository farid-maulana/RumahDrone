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
        $shipments = Shipment::orderByDesc('order_date')->get();
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
        $validated = $request->validated();
        $item = Item::find($validated['item_id']);

        if ($validated['type'] == 'in') {
            $item->update(['quantity' => $item->quantity + $validated['quantity']]);
        } else {
            $item->update(['quantity' => $item->quantity - $validated['quantity']]);
        }

        Shipment::create($validated);
        return to_route('shipments.index')->with('success', 'Data pengiriman berhasil dicatat');
    }

    /**
     * @param Shipment $shipment
     */
    public function show(Shipment $shipment)
    {
        // Get items in the shipment
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
        $item = Item::find($validated['item_id']);

        if ($validated['type'] != $shipment->type) {
            if ($validated['type'] == 'in') {
                $item->update(['quantity' => $item->quantity + ($validated['quantity'] * 2)]);
            } else {
                $item->update(['quantity' => $item->quantity - ($validated['quantity'] * 2)]);
            }
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
