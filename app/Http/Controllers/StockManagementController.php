<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class StockManagementController extends Controller
{
    public function __invoke()
    {
        $items = Item::select('items.*')
            ->selectSub(function ($query) {
                $query->select(DB::raw('SUM(quantity)'))
                    ->from('shipments')
                    ->whereColumn('shipments.item_id', 'items.id')
                    ->where('shipments.type', 'in')
                    ->where('shipments.status', 'delivered');
            }, 'total_barang_masuk')
            ->selectSub(function ($query) {
                $query->select(DB::raw('SUM(quantity)'))
                    ->from('shipments')
                    ->whereColumn('shipments.item_id', 'items.id')
                    ->where('shipments.type', 'out')
                    ->whereNot('shipments.status', 'pending');
            }, 'total_barang_keluar')
            ->orderBy('quantity')
            ->get();

        return view('transaction.stock-management.index', compact('items'));
    }
}
