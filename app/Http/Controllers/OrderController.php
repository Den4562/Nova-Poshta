<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Country;
use App\Models\Region;
use App\Models\Populate_area;
use App\Models\Payment;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('client', 'country', 'region', 'populatedArea', 'payment', 'status')->get();
        return view('autorized.super_admin.orders_index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $clients = Client::all();
    $countries = Country::all();
    $regions = Region::all();
    $populate_areas = Populate_area::all();
    $payments =Payment::all();
    $statuses = Status::all();

    // Для отладки


    return view('autorized.super_admin.create_order', compact('clients', 'countries', 'regions', 'populate_areas', 'payments', 'statuses'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'countries_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'populated_areas_id' => 'required|exists:populate_areas,id',
            'payments_id' => 'required|exists:payments,id',
            'statuses_id' => 'required|exists:statuses,id',
            'comentar' => 'nullable|string',
        ]);

        $order = new Order($request->all());
        $order->save();

        return redirect()->route('create_order')->with('success', 'Order created successfully.');
    }


    public function createAdmin()
    {
        $clients = Client::all();
    $countries = Country::all();
    $regions = Region::all();
    $populate_areas = Populate_area::all();
    $payments =Payment::all();
    $statuses = Status::all();
    
        // Для отладки
    
    
        return view('autorized.admin.create_order', compact('clients', 'countries', 'regions', 'populate_areas', 'payments', 'statuses'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'countries_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'populated_areas_id' => 'required|exists:populate_areas,id',
            'payments_id' => 'required|exists:payments,id',
            'statuses_id' => 'required|exists:statuses,id',
            'comentar' => 'nullable|string',
        ]);

        $order = new Order($request->all());
        $order->ttn= now()->format('YmdHis') . Str::random(8);
        $order->save();

        return redirect()->route('admin_create_order')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('client', 'country', 'region', 'populatedArea', 'payment', 'status')->findOrFail($id);
        return view('autorized.super_admin.show_order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $countries = Country::all();
        $regions = Region::all();
        $populate_areas = Populate_area::all();
        $payments = Payment::all();
        $statuses = Status::all();

        return view('autorized.super_admin.edit_order', compact('order', 'clients', 'countries', 'regions', 'populate_areas', 'payments', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'countries_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'populated_areas_id' => 'required|exists:populate_areas,id',
            'payments_id' => 'required|exists:payments,id',
            'statuses_id' => 'required|exists:statuses,id',
            'comentar' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }


    public function indexAdmin()
    {
        $orders = Order::with('client', 'country', 'region', 'populatedArea', 'payment', 'status')->get();
        return view('autorized.admin.orders_index', compact('orders'));
    }
    
    public function showAdmin($id)
    {
        $order = Order::with('client', 'country', 'region', 'populatedArea', 'payment', 'status')->findOrFail($id);
        return view('autorized.admin.show_order', compact('order'));
    }
    
    public function editAdmin($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $countries = Country::all();
        $regions = Region::all();
        $populate_areas = Populate_area::all();
        $payments = Payment::all();
        $statuses = Status::all();
    
        return view('autorized.admin.edit_order', compact('order', 'clients', 'countries', 'regions', 'populate_areas', 'payments', 'statuses'));
    }
    
    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'countries_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'populated_areas_id' => 'required|exists:populate_areas,id',
            'payments_id' => 'required|exists:payments,id',
            'statuses_id' => 'required|exists:statuses,id',
            'comentar' => 'nullable|string',
        ]);
    
        $order = Order::findOrFail($id);
        $order->update($request->all());
    
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }
    
    public function destroyAdmin($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }




}
