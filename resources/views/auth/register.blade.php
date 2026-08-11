<x-guest-layout>
    <div class="space-y-8" x-data="{ showPassword: false, password: '', strength: 'Fraca' }" x-effect="strength = password.length > 9 ? 'Forte' : password.length > 6 ? 'Média' : 'Fraca'">
        <div class="space-y-3 text-center">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-indigo-50 text-indigo-700 text-2xl font-bold">TM</div>
            <div>
                <h1 class="text-3xl font-semibold text-slate-900">Crie sua conta</h1>
                <p class="mt-2 text-slate-500">Comece a organizar seu dia com uma interface moderna e simples.</p>
            </div>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-[0_40px_80px_rgba(15,23,42,0.08)]">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="space-y-6">
                    <div>
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" class="mt-3 block w-full px-5 py-4 text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="mt-3 block w-full px-5 py-4 text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between gap-4">
                            <x-input-label for="password" :value="__('Senha')" />
                            <span class="text-sm font-semibold text-slate-500" x-text="strength"></span>
                        </div>
                        <div class="relative mt-3">
                            <x-text-input id="password" class="block w-full pr-28 px-5 py-4 text-sm" x-bind:type="showPassword ? 'text' : 'password'" type="password" name="password" x-model="password" required autocomplete="new-password" />
                            <button type="button" class="absolute inset-y-0 end-0 inline-flex items-center px-4 text-sm font-semibold text-indigo-600 hover:text-indigo-500" @click="showPassword = !showPassword">
                                <span x-text="showPassword ? 'Ocultar' : 'Mostrar'"></span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmação de senha')" />
                        <x-text-input id="password_confirmation" class="mt-3 block w-full px-5 py-4 text-sm" x-bind:type="showPassword ? 'text' : 'password'" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="space-y-4">
                        <x-primary-button class="w-full">Criar conta</x-primary-button>
                        <a href="{{ route('login') }}" class="inline-flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition">Já tenho uma conta</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
