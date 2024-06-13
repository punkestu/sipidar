<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/LogoOnly.svg" type="image/x-icon">
    @if (isset($useTable))
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    @endif
    <title>Sipidar @isset($subtitle)
            | {{ $subtitle }}
        @endisset
    </title>
</head>
