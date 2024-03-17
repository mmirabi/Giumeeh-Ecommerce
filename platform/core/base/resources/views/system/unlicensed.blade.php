<x-core::layouts.base body-class="d-flex flex-column" :body-attributes="['data-bs-theme' => 'dark']">
    <x-slot:title>
        @yield('title')
    </x-slot:title>

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                @include('core/base::partials.logo')
            </div>

            <x-core::card size="md">
                <x-core::card.body>
                    <h2 class="mb-3 text-center">{{ __('hello admin') }}</h2>

                    <p class="text-secondary mb-4">
                       {{ __('You are logged in correctly') }}
                    </p>

{{--                    <div class="my-2">--}}
{{--                        <x-core::button--}}
{{--                            color="primary"--}}
{{--                            class="w-100"--}}
{{--                            data-bs-toggle="modal"--}}
{{--                            data-bs-target="#quick-activation-license-modal"--}}
{{--                            aria-label="close"--}}
{{--                        >--}}
{{--                            Activate License--}}
{{--                        </x-core::button>--}}
{{--                    </div>--}}

                    <div class="my-2">
                        <form
                            action="{{ route('unlicensed.skip') }}"
                            method="POST"
                        >
                            @csrf


                            <x-core::button
                                type="submit"
                                class="w-100"
                                color="primary"
                            >{{ __('Go to dashboard') }}</x-core::button>
                        </form>
                    </div>
                </x-core::card.body>
            </x-core::card>
        </div>
    </div>

    @include('core/base::system.partials.license-activation-modal')
</x-core::layouts.base>
