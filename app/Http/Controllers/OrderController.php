<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createView()
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $accepterslv1 = User::where('role_id', 2)->get();
        $accepterslv2 = User::where('role_id', 3)->get();
        return view('admin.create_order', compact('vehicles', 'drivers', 'accepterslv1', 'accepterslv2'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'orderer_name' => 'required',
            'orderer_phone' => 'required|numeric',
            'orderer_id' => 'required|numeric',
            'vehicle_id' => 'required|numeric|exists:vehicles,id',
            'driver_id' => 'required|numeric|exists:drivers,id',
            'accepter_level1_id' => 'required|numeric|exists:users,id',
            'accepter_level2_id' => 'required|numeric|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ],
        [
            'orderer_name.required' => 'Nama peminjam tidak boleh kosong',
            'orderer_phone.required' => 'Telepon peminjam tidak boleh kosong',
            'orderer_phone.numeric' => 'Telepon peminjam tidak valid',
            'orderer_id.required' => 'Nomor identitas peminjam tidak boleh kosong',
            'orderer_id.numeric' => 'Nomor identitas peminjam tidak valid',
            'vehicle_id.required' => 'Kendaraan tidak boleh kosong',
            'vehicle_id.numeric' => 'Kendaraan tidak valid',
            'vehicle_id.exists:vehicles,id' => 'Kendaraan tidak valid',
            'driver_id.required' => 'Sopir tidak boleh kosong',
            'driver_id.numeric' => 'Sopir tidak valid',
            'driver_id.exists:drivers,id' => 'Sopir tidak valid',
            'accepter_level1_id.required' => 'Pimpinan level 1 tidak boleh kosong',
            'accepter_level1_id.numeric' => 'Pimpinan level 1 tidak valid',
            'accepter_level1_id.exists:users,id' => 'Pimpinan level 1 tidak valid',
            'accepter_level2_id.required' => 'Pimpinan level 2 tidak boleh kosong',
            'accepter_level2_id.numeric' => 'Pimpinan level 2 tidak valid',
            'accepter_level2_id.exists:users,id' => 'Pimpinan level 2 tidak valid',
            'start_date.required' => 'Tanggal penggunaan tidak boleh kosong',
            'start_date.date' => 'Tanggal penggunaan tidak valid',
            'end_date.required' => 'Tanggal pengembalian tidak boleh kosong',
            'end_date.date' => 'Tanggal pengembalian tidak valid',
            'end_date.after' => 'Tanggal pengembalian harus setelah tanggal mulai',
        ]);
        $orderedVehicle = Order::where('vehicle_id', $request->vehicle_id)->where('status', '!=', 'selesai')->first();
        if ($orderedVehicle && ($request->start_date >= $orderedVehicle->start_date && $request->start_date <= $orderedVehicle->end_date || $request->end_date >= $orderedVehicle->start_date && $request->end_date <= $orderedVehicle->end_date)) {
            return redirect()->back()->withErrors(['error' => 'Kendaraan sedang dipinjam pada jangka waktu tersebut'])->withInput();
        }
        $order = new Order();
        $order->orderer_name = $request->orderer_name;
        $order->orderer_phone = $request->orderer_phone;
        $order->orderer_id = $request->orderer_id;
        $order->vehicle_id = $request->vehicle_id;
        $order->driver_id = $request->driver_id;
        $order->accepter_level1_id = $request->accepter_level1_id;
        $order->accepter_level2_id = $request->accepter_level2_id;
        $order->start_date = $request->start_date;
        $order->end_date = $request->end_date;
        $order->reason = $request->reason;
        $order->status = 'diajukan';
        $order->save();
        return redirect()->back()->with('success', 'Peminjaman berhasil diajukan');
    }

    public function listView()
    {
        $orders = Order::all();
        return view('list', compact('orders'));
    }

    public function detailView($id)
    {
        $order = Order::find($id);
        return view('order', compact('order'));
    }

    public function approve($id)
    {
        $order = Order::find($id);
        if ($order->status === 'ditolak') {
            return redirect()->back()->with('error', 'Peminjaman sudah ditolak');
        }
        if ($order->status === 'diajukan' && $order->accepter_level1_id === auth()->user()->id) {
            $order->status = 'disetujuilv1';
            $order->save();
            return redirect()->back()->with('success', 'Peminjaman berhasil disetujui');
        }
        if ($order->status === 'disetujuilv1' && $order->accepter_level2_id === auth()->user()->id) {
            $order->status = 'disetujui';
            $order->save();
            return redirect()->back()->with('success', 'Peminjaman berhasil disetujui');
        }
        return redirect()->route("dashboard");
    }

    public function reject($id)
    {
        $order = Order::find($id);
        if ($order->status === 'ditolak') {
            return redirect()->back()->with('error', 'Peminjaman sudah ditolak');
        }
        if (($order->status === 'diajukan' && $order->accepter_level1_id === auth()->user()->id) || ($order->status === 'disetujuilv1' && $order->accepter_level2_id === auth()->user()->id)) {
            $order->status = 'ditolak';
            $order->save();
            return redirect()->back()->with('success', 'Peminjaman berhasil ditolak');
        }
        return redirect()->route("dashboard");
    }
}
