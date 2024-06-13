<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $list = array_map(function ($item) {
            return [
                'type' => $item->type,
                'model' => $item->model,
                'service_date' => Carbon::parse($item->service_date)->format('M-d'),
                'total' => $item->total,
            ];
        }, DB::select('SELECT type, model, service_date, COUNT(vehicle_id) as total FROM orders JOIN vehicles ON (orders.vehicle_id = vehicles.id) GROUP BY vehicle_id ORDER BY COUNT(vehicle_id) DESC'));
        return view('dashboard', compact('list'));
    }
}
