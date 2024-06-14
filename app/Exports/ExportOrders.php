<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class ExportOrders implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Peminjam', 'Kendaraan', 'Supir', 'Dari', 'Sampai'
        ];
    }
    public function collection()
    {
        $readyToExport = DB::select("select orders.orderer_name, CONCAT(v.type,' | ',v.model) as kendaraan, d.name, orders.start_date, orders.end_date from orders join vehicles v on (orders.vehicle_id = v.id) join drivers d on (orders.driver_id = d.id) where orders.status = \"selesai\" or orders.status = \"disetujui\" and start_date >= DATE_SUB(NOW(),INTERVAL 1 YEAR) order by start_date;");
        return collect($readyToExport);
    }
}
