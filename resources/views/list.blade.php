<!DOCTYPE html>
<html lang="en">

@include('components.head', ['useTable' => true])

<body class="bg-gray-100">
    @include('components.header')

    <main class="flex flex-col gap-4 border p-4 m-4 bg-white rounded-md min-h-[80vh]">
        <h1 class="font-semibold text-xl">List Peminjaman</h1>
        <hr>
        @if (session('success'))
            <div class="col-span-6 bg-blue-100 p-2 rounded-sm">
                <h1 class="text-blue-500 font-medium">Success</h1>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table id="orderlist">
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Kendaraan</th>
                        <th>Supir</th>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Status</th>
                        <th class="flex justify-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->orderer_name }}</td>
                            <td>{{ $order->vehicle->type }} | {{ $order->vehicle->model }}</td>
                            <td>{{ $order->driver->name }}</td>
                            <td>{{ $order->start_date }} </td>
                            <td>{{ $order->end_date }}</td>
                            <td>
                                <p
                                    class="mx-2 px-4 py-1 text-white text-center rounded-full {{ $order->status === 'diajukan' ? 'bg-blue-500' : ($order->status === 'disetujui' || $order->status === 'disetujuilv1' ? 'bg-green-500' : 'bg-red-500') }}">
                                    {{ $order->status }}</p>
                            </td>
                            <td>
                                <span class="flex justify-end gap-2">
                                    <a href="/order/{{ $order->id }}"
                                        class="font-semibold bg-[#2602FF] text-white py-1 px-2 rounded-md">Detail</a>
                                    @if (
                                        ($order->status == 'diajukan' && auth()->user()->id === $order->accepter_level1_id) ||
                                            ($order->status == 'disetujuilv1' && auth()->user()->id === $order->accepter_level2_id))
                                        <a href="/order/{{ $order->id }}/approve"
                                            class="font-semibold bg-[#00CF15] text-white py-1 px-2 rounded-md">Approve</a>
                                        <a href="/order/{{ $order->id }}/reject"
                                            class="font-semibold bg-red-500 text-white py-1 px-2 rounded-md">Reject</a>
                                    @endif
                                    @if (auth()->user()->role->name === 'admin' && $order->status === 'disetujui')
                                        <a href="/order/{{ $order->id }}/return"
                                            class="font-semibold bg-[#00CF15] text-white py-1 px-2 rounded-md">Dikembalikan</a>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        let table = new DataTable('#orderlist');
    </script>
</body>

</html>
