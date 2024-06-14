<header class="flex flex-col md:flex-row justify-between items-center gap-2 p-4 bg-white sticky top-0 z-20">
    <a href="/" class="w-1/3 md:w-1/12"><img src="/Logo.svg" alt="Logo"></a>
    <nav class="md:text-sm font-medium">
        <ul class="flex gap-4">
            @auth
                <li><a href="/">Dashboard</a></li>
                @if (auth()->user()->role->name == 'admin')
                    <li><a href="/order/create">Pinjam</a></li>
                @endif
                <li><a href="/order/list">List</a></li>
                <li><a href="/logout" class="text-red-500">Logout</a></li>
            @else
                <li><a href="/login">Login</a></li>
            @endauth
        </ul>
    </nav>
</header>
