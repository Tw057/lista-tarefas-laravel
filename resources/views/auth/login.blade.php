<x-guest-layout>
    <div class="space-y-8" x-data="{ showPassword: false, loading: false }">
        <div class="space-y-3 text-center">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-indigo-50 text-indigo-700 text-2xl font-bold">TM</div>
            <div>
                <h1 class="text-3xl font-semibold text-slate-900">Bem-vindo de volta</h1>
                <p class="mt-2 text-slate-500">Acesse sua conta e mantenha suas tarefas organizadas com facilidade.</p>
            </div>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-[0_40px_80px_rgba(15,23,42,0.08)]">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" @submit="loading = true">
                @csrf

                <div class="space-y-6">
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="mt-3 block w-full px-5 py-4 text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between gap-4">
                            <x-input-label for="password" :value="__('Senha')" />
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Esqueci minha senha</a>
                            @endif
                        </div>

                        <div class="relative mt-3">
                            <x-text-input id="password" class="block w-full pr-28 px-5 py-4 text-sm" x-bind:type="showPassword ? 'text' : 'password'" type="password" name="password" required autocomplete="current-password" />
                            <button type="button" class="absolute inset-y-0 end-0 inline-flex items-center px-4 text-sm font-semibold text-indigo-600 hover:text-indigo-500" @click="showPassword = !showPassword">
                                <span x-text="showPassword ? 'Ocultar' : 'Mostrar'"></span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-3">
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                            <span>Lembrar-me</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <button type="submit" class="btn-primary w-full" :disabled="loading">
                            <span x-show="!loading">Entrar</span>
                            <span x-show="loading">Entrando...</span>
                        </button>
                        <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition">Criar conta</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
