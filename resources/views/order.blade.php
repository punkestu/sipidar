<!DOCTYPE html>
<html lang="en">

@include('components.head', ['subtitle' => 'Login'])

<body class="bg-gray-100">
    @include('components.header')
    <main class="grid grid-cols-6 gap-4 border p-4 m-4 bg-white rounded-md">
        <h1 class="col-span-6 font-semibold text-xl">Detail Peminjaman</h1>
        <hr class="col-span-6">
        @if (session('success'))
            <div class="col-span-6 bg-blue-100 p-2 rounded-sm">
                <h1 class="text-blue-500 font-medium">Success</h1>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <label class="col-span-6">
            <h2 class="font-medium mb-2 text-center">Status</h2>
            <p
                class="w-full px-2 py-1 text-white text-center rounded-full {{ $order->status === 'diajukan' ? 'bg-blue-500' : ($order->status === 'disetujui' || $order->status === 'disetujuilv1' ? 'bg-green-500' : 'bg-red-500') }}">
                {{ $order->status }}</p>
        </label>
        <label class="col-span-3 md:col-span-2">
            <h2 class="font-medium mb-2">Nama Peminjam</h2>
            <p class="w-full py-1">{{ $order->orderer_name }}</p>
        </label>
        <label class="col-span-3 md:col-span-2">
            <h2 class="font-medium mb-2">Telepon Peminjam</h2>
            <p class="w-full py-1">{{ $order->orderer_phone }}</p>
        </label>
        <label class="col-span-6 md:col-span-2">
            <h2 class="font-medium mb-2">Nomor Identitas Peminjam</h2>
            <p class="w-full py-1">{{ $order->orderer_id }}</p>
        </label>
        <label class="col-span-3 md:col-span-2">
            <h2 class="font-medium mb-2">Kendaraan</h2>
            <p class="w-full py-1">{{ $order->vehicle->type }} | {{ $order->vehicle->model }}</p>
        </label>
        <label class="col-span-3 md:col-span-4">
            <h2 class="font-medium mb-2">Supir</h2>
            <p class="w-full py-1">{{ $order->driver->name }}</p>
        </label>
        <label class="col-span-3 md:col-span-2">
            <h2 class="font-medium mb-2">Pimpinan Level 1</h2>
            <p class="w-full py-1">{{ $order->accepterLevel1->name }}</p>
        </label>
        <label class="col-span-3 md:col-span-4">
            <h2 class="font-medium mb-2">Pimpinan Level 2</h2>
            <p class="w-full py-1">{{ $order->accepterLevel2->name }}</p>
        </label>
        <label class="col-span-6">
            <h2 class="font-medium mb-2">Tanggal Penggunaan</h2>
            <p class="w-full py-1">{{ $order->start_date }}</p>
        </label>
        <label class="col-span-6">
            <h2 class="font-medium mb-2">Alasan Peminjaman</h2>
            <p class="w-full py-1">{{ $order->reason !== null ? $order->reason : '-' }}</p>
        </label>
        @if (
            ($order->status == 'diajukan' && auth()->user()->id === $order->accepter_level1_id) ||
                ($order->status == 'disetujuilv1' && auth()->user()->id === $order->accepter_level2_id))
            <a href="/order/{{ $order->id }}/approve"
                class="text-center col-span-3 font-semibold bg-[#00CF15] text-white py-1 px-2 rounded-md">Approve</a>
            <a href="/order/{{ $order->id }}/reject"
                class="text-center col-span-3 font-semibold bg-red-500 text-white py-1 px-2 rounded-md">Reject</a>
        @endif
    </main>
</body>

</html>
