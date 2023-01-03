@extends('admin.layout')

@section('register_account')
    <div class="grid grid-cols-2 gap-4">
        <div class="p-4">
            <h3 class="flex justify-center text-lg text-gray-800 uppercase">Tạo tài khoản</h3>
            <form method="POST" action="{{ route('admin.create_account') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Họ tên')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Mật khẩu')" />

                    <x-text-input id="password" class="block mt-1 w-full bg-gray-200" type="password" name="password" required
                    readonly  autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4" id="btn-create_account">
                        {{ __('Tạo mới') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
