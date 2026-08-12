<nav x-data="{ mobileOpen: false }" class="lg:fixed lg:inset-y-0 lg:left-0 lg:z-50 lg:flex lg:w-80 lg:flex-col lg:border-r lg:border-slate-200 lg:bg-white lg:p-6">
    <div class="hidden lg:flex lg:flex-col lg:h-full">
        <div class="mb-10">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-4">
                <div class="inline-flex h-14 w-14 items-center justify-center rounded-3xl bg-indigo-50 text-indigo-700 font-bold text-lg">TM</div>
                <div>
                    <p class="text-xl font-semibold text-slate-900">Task Manager</p>
                    <p class="text-sm text-slate-500">Gerencie suas tarefas com foco.</p>
                </div>
            </a>
        </div>

        <div class="space-y-2">
            <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'menu-item-active' : '' }} block px-4 py-4 text-sm font-semibold">Dashboard</a>
            <a href="{{ route('tarefas.index') }}" class="menu-item {{ request()->routeIs('tarefas.index') ? 'menu-item-active' : '' }} block px-4 py-4 text-sm font-semibold">Minhas tarefas</a>
            <a href="{{ route('tarefas.create') }}" class="menu-item {{ request()->routeIs('tarefas.create') ? 'menu-item-active' : '' }} block px-4 py-4 text-sm font-semibold">Nova tarefa</a>
            <a href="{{ route('profile.edit') }}" class="menu-item {{ request()->routeIs('profile.edit') ? 'menu-item-active' : '' }} block px-4 py-4 text-sm font-semibold">Perfil</a>
        </div>

        <div class="mt-auto rounded-[28px] border border-slate-200 bg-slate-50 p-5">
            <div class="flex items-center gap-4">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <p class="font-semibold text-slate-900">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-5">
                @csrf
                <button type="submit" class="btn-secondary w-full">Logout</button>
            </form>
        </div>
    </div>

    <div class="lg:hidden border-b border-slate-200 bg-white px-4 py-4">
        <div class="flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-700 font-bold">TM</div>
                <div>
                    <p class="font-semibold text-slate-900">Task Manager</p>
                    <p class="text-sm text-slate-500">Dashboard</p>
                </div>
            </a>
            <button @click="mobileOpen = !mobileOpen" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 text-slate-700 hover:bg-slate-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div x-show="mobileOpen" x-transition class="mt-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'menu-item-active' : '' }} block px-4 py-3 font-semibold">Dashboard</a>
            <a href="{{ route('tarefas.index') }}" class="menu-item {{ request()->routeIs('tarefas.index') ? 'menu-item-active' : '' }} block px-4 py-3 font-semibold">Minhas tarefas</a>
            <a href="{{ route('tarefas.create') }}" class="menu-item {{ request()->routeIs('tarefas.create') ? 'menu-item-active' : '' }} block px-4 py-3 font-semibold">Nova tarefa</a>
            <a href="{{ route('profile.edit') }}" class="menu-item {{ request()->routeIs('profile.edit') ? 'menu-item-active' : '' }} block px-4 py-3 font-semibold">Perfil</a>
            <form method="POST" action="{{ route('logout') }}" class="px-4 py-3">
                @csrf
                <button type="submit" class="btn-secondary w-full">Logout</button>
            </form>
        </div>
    </div>
</nav>
