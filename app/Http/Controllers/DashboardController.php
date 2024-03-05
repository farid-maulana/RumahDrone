<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Shipment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $item = Item::count();
        $menipis = Item::where('quantity', '<=', DB::raw('minimum_stock'))->count();
        $habis = Item::where('quantity', '=', 0)->count();
        $shipment = Shipment::count();

        $data = [
            'item' => $item,
            'shipment' => $shipment,
            'menipis' => $menipis,
            'habis' => $habis,
        ];

        return view('dashboard.index', compact('data'));
    }
}
