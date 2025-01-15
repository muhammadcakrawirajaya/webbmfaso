<div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
    <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar size-12">
        <img class="rounded-full" src="{{ asset(session('foto')) }}" alt="avatar">
        <span
            class="{{ session('role') == 'team leader' ? 'absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700' : 'absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-success dark:border-navy-700' }}"></span>
    </button>

    <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
        <div
            class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
            <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                <div class="avatar size-14">
                    <img class="rounded-full" src="{{ asset(session('foto')) }}" alt="avatar">
                </div>
                <div>
                    <a href="asdas"
                        class="text-base font-medium text-slate-700 text-capitalize hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                        {{ session('nama') }}
                    </a>
                    <p class="text-xs text-slate-400 text-capitalize dark:text-navy-300">
                        {{ session('division') }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col pt-2 pb-5">
                <a href="#"
                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                    <div class="flex size-8 items-center justify-center rounded-lg bg-warning text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                            </path>
                        </svg>
                    </div>

                    <div>
                        <h2
                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Profile
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            View or Edit Profile
                        </div>
                    </div>
                </a>
                <a href="{{ route('telkomsel.index') }}"
                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                    <div class="flex size-8 items-center justify-center rounded-lg bg-info text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>

                    </div>

                    <div>
                        <h2
                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            <img class="rounded-full w-5 h-5 mr-0.5 mb-1 inline-flex"
                                src="{{ asset('assets/images/logo-brand.svg') }}" alt="avatar">Telkomsel
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Switch to Telkomsel
                        </div>
                    </div>
                </a>
                <div class="mt-3 px-4">
                    <a href="{{ route('logout') }}">
                        <button
                            class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
