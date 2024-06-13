<!DOCTYPE html>
<html lang="en">
@include('components.head', ['subtitle' => 'Dashboard'])

<body class="bg-gray-100">
    @include('components.header')
    <form action="/order/create" method="post" class="grid grid-cols-6 gap-4 border p-4 m-4 bg-white rounded-md">
        <h1 class="font-semibold text-xl col-span-6">Buat Peminjaman Baru</h1>
        <hr class="col-span-6">
        @csrf
        @if (session('success'))
            <div class="col-span-6 bg-blue-100 p-2 rounded-sm">
                <h1 class="text-blue-500 font-medium">Success</h1>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="col-span-6 bg-red-100 p-2 rounded-sm">
                <h1 class="text-red-500 font-medium">Error</h1>
                <ul class="list-disc ms-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label class="col-span-3 md:col-span-2">
            <h2 class="font-medium mb-2">Nama Peminjam</h2>
            <input type="text" name="orderer_name" placeholder="Nama Peminjam..."
                class="w-full px-2 py-1 rounded-md border" value="{{ old('orderer_name') }}">
        </label>
        <label class="col-span-3 md:col-span-2">
            <h2 class="font-medium mb-2">Telepon Peminjam</h2>
            <input type="text" name="orderer_phone" placeholder="Telepon Peminjam..."
                class="w-full px-2 py-1 rounded-md border" value="{{ old('orderer_phone') }}">
        </label>
        <label class="col-span-6 md:col-span-2">
            <h2 class="font-medium mb-2">Nomor Identitas Peminjam</h2>
            <input type="text" name="orderer_id" placeholder="Nomor Identitas Peminjam..."
                class="w-full px-2 py-1 rounded-md border" value="{{ old('orderer_id') }}">
        </label>
        <label class="col-span-3">
            <h2 class="font-medium mb-2">Kendaraan</h2>
            <select name="vehicle_id" id="vehicle" class="w-full px-2 py-1 rounded-md border">
                <option value>--- Pilih Kendaraan ---</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id') === $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->type }} |
                        {{ $vehicle->model }}</option>
                @endforeach
            </select>
        </label>
        <label class="col-span-3">
            <h2 class="font-medium mb-2">Supir</h2>
            <select name="driver_id" id="driver" class="w-full px-2 py-1 rounded-md border">
                <option value>--- Pilih Supir ---</option>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ old('driver_id') === $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="col-span-3">
            <h2 class="font-medium mb-2">Pimpinan Level 1</h2>
            <select name="accepter_level1_id" id="accepter_level1" class="w-full px-2 py-1 rounded-md border">
                <option value>--- Pilih Pimpinan Level 1 ---</option>
                @foreach ($accepterslv1 as $accepter)
                    <option value="{{ $accepter->id }}"
                        {{ old('accepter_level1_id') === $accepter->id ? 'selected' : '' }}>{{ $accepter->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <label class="col-span-3">
            <h2 class="font-medium mb-2">Pimpinan Level 2</h2>
            <select name="accepter_level2_id" id="accepter_level2" class="w-full px-2 py-1 rounded-md border">
                <option value>--- Pilih Pimpinan Level 2 ---</option>
                @foreach ($accepterslv2 as $accepter)
                    <option value="{{ $accepter->id }}"
                        {{ old('accepter_level2_id') === $accepter->id ? 'selected' : '' }}>{{ $accepter->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <label class="col-span-3">
            <h2 class="font-medium mb-2">Tanggal Penggunaan</h2>
            <input type="date" name="start_date" id="start_date" class="w-full px-2 py-1 rounded-sm border"
                value="{{ old('start_date') }}">
        </label>
        <label class="col-span-3">
            <h2 class="font-medium mb-2">Tanggal Pengembalian</h2>
            <input type="date" name="end_date" id="end_date" class="w-full px-2 py-1 rounded-sm border"
                value="{{ old('end_date') }}">
        </label>
        <label class="col-span-6">
            <h2 class="font-medium mb-2">Alasan Peminjaman (Opsional)</h2>
            <textarea name="reason" id="reason" cols="10" rows="3"
                class="w-full px-2 py-1 rounded-md border resize-none" placeholder="Alasan ...">{{ old('reason') }}</textarea>
        </label>
        <button type="submit" class="font-semibold col-span-6 bg-[#2602FF] text-white py-2 rounded-md">Buat
            Peminjaman</button>
    </form>
</body>

</html>
