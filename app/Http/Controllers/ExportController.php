<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:report.index')->only('index');
        $this->middleware('permission:report.download')->only('download');
    }

    public function index()
    {
        $reports = Report::orderByDesc('created_at')->get();

        return view('report.inventory.index', compact('reports'));
    }

    /**
     * @return Response
     */
    public function download(): Response
    {
        $directory = 'report';
        Storage::makeDirectory($directory);

        $data = Item::select('items.*')
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

        $pdf = Pdf::loadView('report.inventory.pdf', compact('data'));
        $filename = 'pelaporan_inventaris_gudang_' . Carbon::now()->format('d_m_Y') . '.pdf';
        $filePath = 'storage/' . $directory . '/' . $filename;
        $pdf->save($filePath);

        Report::create([
            'name' => $filename,
            'file' => $filePath,
        ]);

        return $pdf->download($filePath);
    }
}
