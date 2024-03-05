<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:inventory.index')->only('index');
        $this->middleware('permission:inventory.create')->only('create', 'store');
        $this->middleware('permission:inventory.edit')->only('edit', 'update');
        $this->middleware('permission:inventory.destroy')->only('destroy');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $items = Item::all();
        return view('master.items.index', compact('items'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('master.items.create');
    }

    /**
     * @param ItemRequest $request
     * @return RedirectResponse
     */
    public function store(ItemRequest $request): RedirectResponse
    {
        Item::create($request->validated());
        return to_route('items.index')->with('success', 'Data barang berhasil disimpan');
    }

    /**
     * @param Item $item
     * @return Application|Factory|View
     */
    public function edit(Item $item): View|Factory|Application
    {
        return view('master.items.edit', compact('item'));
    }

    /**
     * @param ItemRequest $request
     * @param Item $item
     * @return RedirectResponse
     */
    public function update(ItemRequest $request, Item $item): RedirectResponse
    {
        $item->update($request->validated());
        return to_route('items.index')->with('success', 'Data barang berhasil diubah');
    }

    /**
     * @param Item $item
     * @return RedirectResponse
     */
    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();
        return back()->with('success', 'Data barang berhasil dihapus');
    }
}
