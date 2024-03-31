<section class="flex flex-col md:flex-row">
    <div class="w-full md:w-1/2">
        <div class="container mt-4">
            @if ($profile_image)
                <img src="{{ asset('profile_image/' . $profile_image) }}" alt="Profile Image" class="rounded-circle mt-5" style="width: 250px; height: 250px;">
            @endif

            <div class="md:ml-8 mt-6">
                <x-input-label for="picture" :value="__('Profile Picture')" />
                <input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full" accept="image/*" />
                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 md:pl-8 flex justify-center items-center">
        <div>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Profile Information') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </header>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div class="flex justify-between">
                    <div class="w-full">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full md:w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full md:w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>

                    <div class="w-full pl-4">
                        <!-- Address Field -->
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full md:w-full" :value="$address" autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>

                        <!-- Age Field -->
                        <div class="mt-4">
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full md:w-full" :value="$age" autocomplete="age" />
                            <x-input-error class="mt-2" :messages="$errors->get('age')" />
                        </div>

                        <!-- Phone Number Field -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" name="phone_number" type="number" class="mt-1 block w-full md:w-full" :value="$phone_number" autocomplete="tel" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4 mt-6">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>