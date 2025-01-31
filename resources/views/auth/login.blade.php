<!doctype html>
<html lang="en">

<head>

    <title>Login - Telescout</title>
    @include('includes.head')

</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">

    <!-- App preloader-->
    @include('includes.preloader')

    <!-- Main Content Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">

        <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
            <a href="#" class="flex items-center space-x-2">
                <img class="size-12" src="{{ asset('assets/images/logo-brand.png') }}" alt="logo">
                <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
                    Telescout
                </p>
            </a>
        </div>

        <div class="hidden w-full place-items-center lg:grid">
            <div class="w-full max-w-lg p-6">
                <img class="w-full" x-show="!$store.global.isDarkModeEnabled"
                    src="{{ asset('assets/images/illustrations/dashboard-check.svg') }}" alt="image">
                <img class="w-full" x-show="$store.global.isDarkModeEnabled"
                    src="{{ asset('assets/images/illustrations/dashboard-check-dark.svg') }}" alt="image">
            </div>
        </div>

        <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">

            <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
                <div class="text-center">
                    <div class="w-full max-w-lg p-6">
                        <img class="w-full" x-show="!$store.global.isDarkModeEnabled"
                            src="{{ asset('assets/images/light_login.svg') }}" alt="image">
                        <img class="w-full" x-show="$store.global.isDarkModeEnabled"
                            src="{{ asset('assets/images/dark_login.svg') }}" alt="image">
                    </div>
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                            Welcome
                        </h2>
                        <p class="text-slate-400 dark:text-navy-300">
                            Please sign in to continue
                        </p>
                    </div>
                </div>
                <div class="mt-16">
                    <form action="" method="POST">
                        @csrf
                        <div class="call-text">
                            @if ($errors->any())
                                @foreach ($errors->all() as $item)
                                    <span class="text-tiny+ text-error">{{ $item }}</span>
                                @endforeach
                            @endif
                        </div>
                        <label class="relative flex">
                            <input
                                @if ($errors->any()) class="form-input peer w-full rounded-lg border border-error bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            @else
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" @endif
                                placeholder="Username" id="username" name="username" type="text"
                                value="{{ old('username') }}">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                        </label>
                        <label class="relative mt-4 flex">
                            <input
                                @if ($errors->any()) class="form-input peer w-full rounded-lg border border-error bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                        @else
                        class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" @endif
                                placeholder="Password" type="password" id="password" name="password" type="password">
                            <button type="button"
                                class="absolute inset-y-0 right-0 px-2 flex items-center justify-center"
                                onclick="togglePasswordVisibility('password')">
                                <span id="passwordIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </span>
                        </label>
                        <div class="mt-5 flex items-center justify-between space-x-2">
                            <label class="inline-flex items-center space-x-2">
                                <input name="remember" type="checkbox"
                                    class="form-checkbox is-outline size-5 rounded border-slate-400/70 bg-slate-100 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent">
                                <span class="line-clamp-1">Remember me</span>
                            </label>
                            <a href="#"
                                class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100">Forgot
                                Password?</a>
                        </div>
                        <button type="submit"
                            class="btn mt-8 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Sign In
                        </button>
                    </form>
                </div>
            </div>

            <div class="my-5 flex justify-center text-xs text-slate-400 dark:text-navy-300">
                Copyright © <span id="footer-year">2024</span>. BMF ASO Witel Sidoarjo
            </div>

        </main>
    </div>

    <!-- This is a place for Alpine.js Teleport feature -->
    <div id="x-teleport-target"></div>

    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>

</body>

</html>
