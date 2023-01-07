<section>
    <header>
        <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
            {{ __('Thông tin cá nhân') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Cập nhật thông tin email, chức vụ, học vị, ...') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="chuc_vu" :value="__('Chức vụ')" />
            <x-text-input id="chuc_vu" name="chuc_vu" type="text" class="mt-1 block w-full" :value="old('chuc_vu', $user->chuc_vu)"
                required autocomplete="chuc_vu" />
            <x-input-error class="mt-2" :messages="$errors->get('chuc_vu')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        <div>
            <x-input-label for="hoc_vi" :value="__('Học vị')" />
            <x-text-input id="hoc_vi" name="hoc_vi" type="text" class="mt-1 block w-full" :value="old('hoc_vi', $user->hoc_vi)"
                required autocomplete="hoc_vi" />
            <x-input-error class="mt-2" :messages="$errors->get('hoc_vi')" />
        </div>
        <div>
            <x-input-label for="sdt" :value="__('Số điện thoại')" />
            <x-text-input id="sdt" name="sdt" type="text" class="mt-1 block w-full" :value="old('sdt', $user->sdt)"
                required autocomplete="sdt" />
            <x-input-error class="mt-2" :messages="$errors->get('sdt')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Cập nhật') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-blue-600 dark:text-blue-400">{{ __('Đã cập nhật.') }}</p>
            @endif
        </div>
    </form>
</section>
