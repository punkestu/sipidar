<!DOCTYPE html>
<html lang="en">

@include('components.head', ['useTable' => true])

<body class="bg-gray-100">
    @include('components.header')
    <section class="border p-4 m-4 bg-white rounded-md">
        <h1 class="text-2xl font-semibold">Hello {{ auth()->user()->name }}</h1>
        <section class="grid grid-cols-2">
            <aside>
                <h2>Top 3 Kendaraan yang dipinjam</h2>
                <div id="top3"></div>
            </aside>
            <aside>
                <table id="vehicles">
                    <thead>
                        <th>Kendaraan</th>
                        <th>Total Dipinjam</th>
                        <th>Jadwal Service</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item["type"] }} | {{ $item["model"] }}</td>
                                <td>{{ $item["total"] }}</td>
                                <td>{{ $item["service_date"] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </aside>
        </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/script/chart.js"></script>
    <script>
        let table = new DataTable('#vehicles');
        const top3 = @json($list);
        if (top3.length < 3) {
            for (let i = top3.length; i < 3; i++) {
                top3.push({
                    type: "-",
                    model: "-",
                    total: 0,
                    service_date: ""
                });
            }
        }else{
            top3.splice(3);
        }
        createBarChart("#top3", {
            series: [{
                data: top3.map((item) => item.total)
            }],
            categories: top3.map((item) => item.type + " | " + item.model)
        }, "");
    </script>
</body>

</html>
