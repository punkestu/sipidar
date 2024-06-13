<!DOCTYPE html>
<html lang="en">

@include('components.head', ['subtitle' => 'Login'])

<body class="bg-gray-100">
    @include('components.header')
    <form action="/login" method="post" class="flex flex-col gap-4 border p-4 m-4 bg-white rounded-md">
        <h1 class="font-semibold text-xl">Login</h1>
        <hr>
        @csrf
        @if ($errors->any())
            <div class="bg-red-100 p-2 rounded-sm">
                <h1 class="text-red-500 font-medium">Error</h1>
                <ul class="list-disc ms-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label>
            <h2 class="font-medium mb-2">Email</h2>
            <input type="email" name="email" id="email" class="w-full px-2 py-1 rounded-md border"
                placeholder="Email ..." value="{{ old('email') }}">
        </label>
        <label>
            <h2 class="font-medium mb-2">Password</h2>
            <input type="password" name="password" id="password" class="w-full px-2 py-1 rounded-md border"
                placeholder="Password ...">
        </label>
        <button class="font-semibold bg-[#2602FF] text-white py-2 rounded-md">Login</button>
    </form>
</body>

</html>
