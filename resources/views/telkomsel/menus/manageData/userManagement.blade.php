<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Management - Telescout</title>
    @include('includes.head')
</head>

<body x-data="" x-bind="$store.global.documentBody" class="is-header-blur is-sidebar-open">
    <!-- App preloader-->
    @include('includes.preloader')

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
        <!-- Sidebar -->
        @include('telkomsel.menus.manageData.manageDataMenus')

        <!-- App Header Wrapper-->
        @include('includes.navbar')

        <!-- Mobile Searchbar -->
        @include('includes.searchBar')

        <!-- Right Sidebar -->
        @include('includes.rightSidebar')

        <!-- Main Content Wrapper -->
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div id="custom-alert-container"
                class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-opacity-90 z-50 space-y-2">
                @if (session('success') || session('error') || session('warning') || session('info'))
                    @foreach (['success', 'error', 'warning', 'info'] as $type)
                        @if (session($type))
                            <div class="custom-alert bg-opacity-90 px-6 py-3 rounded-lg text-white text-center shadow-lg"
                                style="display: none; background-color: {{ $type === 'success' ? '#4CAF50' : ($type === 'error' ? '#F44336' : ($type === 'warning' ? '#FF9800' : '#2196F3')) }};">
                                {{ session($type) }}
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    User Management
                </h2>
                <div class="hidden h-full py-1 sm:flex">
                    <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                </div>
                <ul class="flex flex-wrap items-center space-x-2">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('telkomsel.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                        <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li class="flex items-center space-x-2">
                        <a class="flex items-center space-x-1.5 text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('telkomsel.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>

                            <span>Manage Data</span>
                        </a>
                        <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>

                            <span>User Management</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

                <!-- User List Table -->
                <div>
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            User List
                        </h2>
                        <div class="flex mr-4">
                            <div class="flex items-center mr-4" x-data="{ isInputActive: false }">
                                <form action="{{ route('userManagement.index') }}" method="GET">
                                    <label class="block">
                                        <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                            :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                            class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                            placeholder="Search here..." type="text" name="search"
                                            value="{{ request('search') }}">
                                    </label>
                                </form>
                                <button @click="isInputActive = !isInputActive"
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>

                            @if (session('role') === 'admin')
                                <div x-data="{ showModal: false }">
                                    <button x-tooltip.duration.500="'Add New'" @click="showModal = true"
                                        class="btn size-9 bg-success p-0 font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                    <template x-teleport="#x-teleport-target">
                                        <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                            x-show="showModal" role="dialog"
                                            @keydown.window.escape="showModal = false">
                                            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                @click="showModal = false" x-show="showModal"
                                                x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100" x-transition:leave="ease-in"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"></div>
                                            <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                                x-show="showModal" x-transition:enter="easy-out"
                                                x-transition:enter-start="opacity-0 scale-95"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="easy-in"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-95">
                                                <div
                                                    class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                                    <h3
                                                        class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                        Add New
                                                    </h3>
                                                    <button @click="showModal = !showModal"
                                                        class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form id="addUserForm" method="POST"
                                                    action="{{ route('userManagement.store') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="px-4 py-4 sm:px-5">
                                                        <div class=" space-y-4">
                                                            <div>
                                                                <span>Name</span>
                                                                <label class="mt-1.5 flex -space-x-px">
                                                                    <div
                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                        <span class="-mt-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 20"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-3">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                                            </svg>

                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Enter Name" type="text"
                                                                        id="nama" name="nama" required />
                                                                    @error('nama')
                                                                        <span
                                                                            class="text-red-500 text-xs">{{ $message }}</span>
                                                                    @enderror
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <span>Username</span>
                                                                <label class="mt-1.5 flex -space-x-px">
                                                                    <div
                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                        <span class="-mt-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 20"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-3">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                                                            </svg>

                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Enter Username" type="text"
                                                                        id="username" name="username" required />
                                                                    @error('username')
                                                                        <span
                                                                            class="text-red-500 text-xs">{{ $message }}</span>
                                                                    @enderror
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <span>Telegram</span>
                                                                <label class="mt-1.5 flex -space-x-px">
                                                                    <div
                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                        <span class="-mt-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 20"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-3">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Enter Telegram" type="text"
                                                                        id="telegram" name="telegram" required />
                                                                    @error('telegram')
                                                                        <span
                                                                            class="text-red-500 text-xs">{{ $message }}</span>
                                                                    @enderror
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <span>Choose Division</span>
                                                                <label class="mt-1.5 flex -space-x-px">
                                                                    <div
                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                        <span class="-mt-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 20"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-3">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                                                            </svg>

                                                                        </span>
                                                                    </div>
                                                                    <select
                                                                        class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        id="division" name="division" required>
                                                                        <option value="bmf"
                                                                            {{ old('division') == 'bmf' ? 'selected' : '' }}>
                                                                            BMF</option>
                                                                        <option value="aso"
                                                                            {{ old('division') == 'aso' ? 'selected' : '' }}>
                                                                            ASO</option>
                                                                        <option value="psb"
                                                                            {{ old('division') == 'psb' ? 'selected' : '' }}>
                                                                            PSB</option>
                                                                        <option value="mdf"
                                                                            {{ old('division') == 'mdf' ? 'selected' : '' }}>
                                                                            MDF</option>
                                                                        <option value="optima"
                                                                            {{ old('division') == 'optima' ? 'selected' : '' }}>
                                                                            OPTIMA</option>
                                                                        <option value="woc"
                                                                            {{ old('division') == 'woc' ? 'selected' : '' }}>
                                                                            WOC</option>
                                                                    </select>
                                                                    @error('division')
                                                                        <span
                                                                            class="text-red-500 text-xs">{{ $message }}</span>
                                                                    @enderror
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <span>Password</span>
                                                                <label class="mt-1.5 flex -space-x-px">
                                                                    <div
                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                        <span class="-mt-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 20"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-3">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                                                            </svg>


                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Enter Password" type="password"
                                                                        id="password" name="password" required />
                                                                    @error('password')
                                                                        <span
                                                                            class="text-red-500 text-xs">{{ $message }}</span>
                                                                    @enderror
                                                                </label>
                                                            </div>

                                                            <div>
                                                                <span>Confirm Password</span>
                                                                <label class="mt-1.5 flex -space-x-px">
                                                                    <div
                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                        <span class="-mt-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 20"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-3">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Confirm Password" type="password"
                                                                        id="confirm" name="confirm" required />
                                                                    @error('confirm')
                                                                        <span
                                                                            class="text-red-500 text-xs">{{ $message }}</span>
                                                                    @enderror
                                                                </label>
                                                            </div>


                                                            <label class="block">
                                                                <label class="inline-flex items-center space-x-1 mr-3">
                                                                    <input checked
                                                                        class="form-radio is-basic size-5 rounded-full border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                                                                        name="role" id="admin" value="admin"
                                                                        type="radio" />
                                                                    <p>Admin</p>
                                                                </label>

                                                                <label class="inline-flex items-center space-x-1">
                                                                    <input
                                                                        class="form-radio is-basic size-5 rounded-full border-slate-400/70 checked:border-secondary checked:bg-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:checked:border-secondary-light dark:checked:bg-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                                                                        name="role" id="team leader"
                                                                        value="team leader" type="radio" />
                                                                    <p>Team Leader</p>
                                                                </label>

                                                            </label>

                                                            <label
                                                                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 mr-3">
                                                                <input tabindex="-1" type="file"
                                                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                                                    id="foto" name="foto" />
                                                                <div class="flex items-center space-x-2">
                                                                    <i
                                                                        class="fa-solid fa-cloud-arrow-up text-base"></i>
                                                                    <span>Choose Photo</span>
                                                                </div>
                                                            </label>
                                                            <span id="preview">photo_file_name.jpg</span>

                                                            <div class="space-x-2 text-right">
                                                                <button @click="showModal = false"
                                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                    Cancel
                                                                </button>
                                                                <div class="inline-flex">
                                                                    <button @click="showModal = false"
                                                                        class="btn min-w-[7rem] rounded-full bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus">
                                                                        Submit
                                                                    </button>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-center">
                                {{-- Head --}}
                                <thead>
                                    <tr>
                                        <th
                                            class="whitespace-nowrap p-2 rounded-tl-lg bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus">
                                            No
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                            Photo
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                            Name
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                            Division
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                            Telegram
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white @if (session('role') !== 'admin') rounded-tr-lg @endif focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                            Role
                                        </th>
                                        @if (session('role') === 'admin')
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white px-2 rounded-tr-lg focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                            </th>
                                        @endif
                                    </tr>
                                </thead>

                                {{-- LIST --}}
                                @foreach ($users as $index => $data)
                                    <tr class="border-y border-transparent">
                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                            {{ $users->firstItem() + $index }}</td>
                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                            <div class="avatar d-flex justify-content-center">
                                                {{-- <img class="rounded-full"
                                                    src="{{ Storage::exists('public/' . $data->karyawan->foto) ? asset('storage/' . $data->karyawan->foto) : asset('assets/images/logo-brand.png') }}"
                                                    alt="avatar"> --}}
                                                @if ($data->karyawan->foto)
                                                    <img class="rounded-full"
                                                        src="{{ asset('storage/' . $data->karyawan->foto) }}"
                                                        alt="avatar">
                                                @else
                                                    <img class="rounded-full"
                                                        src="{{ asset('assets/images/logo-brand.png') }}"
                                                        alt="avatar">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                            {{ $data->karyawan->nama ?? '-' }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                            style="text-transform: uppercase;">
                                            {{ $data->division ?? '-' }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                            {{ $data->karyawan->telegram ?? '-' }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                            <div class="flex space-x-2" style="text-transform: capitalize;">
                                                @if ($data->role == 'team leader')
                                                    <div
                                                        class="badge rounded-full border border-secondary text-secondary dark:border-secondary-light dark:text-secondary-light">
                                                        {{ $data->role ?? '-' }}
                                                    </div>
                                                @else
                                                    <div class="badge rounded-full border border-success text-success">
                                                        {{ $data->role ?? '-' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        @if (session('role') === 'admin')
                                            <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })"
                                                    @click.outside="isShowPopper && (isShowPopper = false)"
                                                    class="inline-flex">
                                                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                                            </path>
                                                        </svg>
                                                    </button>

                                                    <div x-ref="popperRoot" class="popper-root"
                                                        :class="isShowPopper && 'show'">
                                                        <div
                                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                                            <ul>
                                                                <div x-data="{ showModal: false, userId: null }" x-ref="popperRef"
                                                                    @click="isShowPopper = !isShowPopper">
                                                                    <li>
                                                                        <a href="#editUserModal"
                                                                            data-user-id="{{ $data->id }}"
                                                                            @click.prevent="userId = {{ $data->id }}; showModal = true"
                                                                            class="edit">
                                                                            <button @click="showModal = true"
                                                                                class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="size-4.5" fill="none"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="1.5">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                                </svg>
                                                                                <span> Modify User </span>
                                                                            </button>
                                                                        </a>
                                                                        <template x-teleport="#x-teleport-target">
                                                                            <div id="editUserModal"
                                                                                class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                                                                x-show="showModal" role="dialog"
                                                                                @keydown.window.escape="showModal = false">
                                                                                <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                                                    @click="showModal = false"
                                                                                    x-show="showModal"
                                                                                    x-transition:enter="ease-out"
                                                                                    x-transition:enter-start="opacity-0"
                                                                                    x-transition:enter-end="opacity-100"
                                                                                    x-transition:leave="ease-in"
                                                                                    x-transition:leave-start="opacity-100"
                                                                                    x-transition:leave-end="opacity-0">
                                                                                </div>
                                                                                <div class="relative max-w-md rounded-lg bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700"
                                                                                    x-show="showModal"
                                                                                    x-transition:enter="easy-out"
                                                                                    x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                                                                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                                                                    x-transition:leave="easy-in"
                                                                                    x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
                                                                                    x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]">
                                                                                    <form
                                                                                        action="{{ route('userManagement.update', $data->id) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden"
                                                                                            id="edit_user_id_{{ $data->id }}"
                                                                                            name="edit_user_id"
                                                                                            value="{{ $data->id }}">
                                                                                        <div class="avatar size-20">
                                                                                            <img class="rounded-full"
                                                                                                @if ($data->karyawan->foto) src="{{ asset('storage/' . $data->karyawan->foto) }}"
                                                                                                @else
                                                                                                    src="{{ asset('assets/images/logo-brand.png') }}" @endif
                                                                                                id="edit_preview_{{ $data->id }}"
                                                                                                alt="Foto Karyawan" />
                                                                                            <div
                                                                                                class="{{ $data->role == 'team leader' ? 'absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700' : 'absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-success dark:border-navy-700' }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mt-1 px-4 sm:px-12">
                                                                                            <h3 class="text-lg text-slate-800 dark:text-navy-50"
                                                                                                id="edit_nama_{{ $data->id }}"
                                                                                                name="nama">
                                                                                            </h3>

                                                                                            <div
                                                                                                class="text-left mt-5">
                                                                                                <span>Modify
                                                                                                    Division</span>
                                                                                                <label
                                                                                                    class="mt-1.5 flex -space-x-px">
                                                                                                    <div
                                                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                                                        <span
                                                                                                            class="-mt-1">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                fill="none"
                                                                                                                viewBox="0 0 24 20"
                                                                                                                stroke-width="1.5"
                                                                                                                stroke="currentColor"
                                                                                                                class="size-3">
                                                                                                                <path
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                                                                                            </svg>

                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <select
                                                                                                        id="edit_division_{{ $data->id }}"
                                                                                                        name="division"
                                                                                                        required
                                                                                                        class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                                        <option
                                                                                                            value="bmf"
                                                                                                            {{ $data->division === 'bmf' ? 'selected' : '' }}>
                                                                                                            BMF
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="aso"
                                                                                                            {{ $data->division === 'aso' ? 'selected' : '' }}>
                                                                                                            ASO
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="psb"
                                                                                                            {{ $data->division === 'psb' ? 'selected' : '' }}>
                                                                                                            PSB
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="mdf"
                                                                                                            {{ $data->division === 'mdf' ? 'selected' : '' }}>
                                                                                                            MDF
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="optima"
                                                                                                            {{ $data->division === 'optima' ? 'selected' : '' }}>
                                                                                                            OPTIMA
                                                                                                        </option>
                                                                                                    </select>

                                                                                                </label>
                                                                                            </div>
                                                                                            <div
                                                                                                class="text-left mt-5">
                                                                                                <span>Modify Role</span>
                                                                                                <label
                                                                                                    class="mt-1.5 flex -space-x-px">
                                                                                                    <div
                                                                                                        class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                                                        <span
                                                                                                            class="-mt-1">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                fill="none"
                                                                                                                viewBox="0 0 24 20"
                                                                                                                stroke-width="1.5"
                                                                                                                stroke="currentColor"
                                                                                                                class="size-3">
                                                                                                                <path
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                                                            </svg>

                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <select
                                                                                                        id="edit_role_{{ $data->id }}"
                                                                                                        name="role"
                                                                                                        required
                                                                                                        class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                                        <option
                                                                                                            value="admin"
                                                                                                            {{ $data->role === 'admin' ? 'selected' : '' }}>
                                                                                                            Admin
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="team leader"
                                                                                                            {{ $data->role === 'team leader' ? 'selected' : '' }}>
                                                                                                            Team Leader
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </label>
                                                                                            </div>

                                                                                            <p
                                                                                                class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                                Are you sure you want to
                                                                                                <b class="text-info">modify
                                                                                                </b>
                                                                                                this
                                                                                                user ?
                                                                                                <br>
                                                                                                this action cannot be
                                                                                                undone.
                                                                                            </p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500">
                                                                                        </div>

                                                                                        <div class="space-x-3">
                                                                                            <button
                                                                                                @click="showModal = false"
                                                                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                                                                                type="button">
                                                                                                Cancel
                                                                                            </button>
                                                                                            <div class="inline-flex">
                                                                                                <button
                                                                                                    class="btn min-w-[7rem] rounded-full bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 dark:hover:bg-info-focus dark:focus:bg-info-focus"
                                                                                                    type="submit">
                                                                                                    Modify
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </template>
                                                                    </li>
                                                                </div>
                                                                <div x-data="{ showModal: false, userId: null }" x-ref="popperRef"
                                                                    @click="isShowPopper = !isShowPopper">
                                                                    <li>
                                                                        <a href="#"
                                                                            data-user-id="{{ $data->id }}"
                                                                            @click.prevent="userId = {{ $data->id }}; showModal = true"
                                                                            class="delete">
                                                                            <button @click="showModal = true"
                                                                                class="flex h-8 items-center space-x-4 px-3 pr-8 font-medium tracking-wide text-error outline-none transition-all hover:bg-error/20 focus:bg-error/20">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="size-4.5" fill="none"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="1.5">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                </svg>
                                                                                <span> Delete User</span>
                                                                            </button>
                                                                        </a>
                                                                        <template x-teleport="#x-teleport-target">
                                                                            <div id="deleteUserModal"
                                                                                class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                                                                x-show="showModal" role="dialog"
                                                                                @keydown.window.escape="showModal = false">
                                                                                <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                                                    @click="showModal = false"
                                                                                    x-show="showModal"
                                                                                    x-transition:enter="ease-out"
                                                                                    x-transition:enter-start="opacity-0"
                                                                                    x-transition:enter-end="opacity-100"
                                                                                    x-transition:leave="ease-in"
                                                                                    x-transition:leave-start="opacity-100"
                                                                                    x-transition:leave-end="opacity-0">
                                                                                </div>
                                                                                <div class="relative max-w-md rounded-lg bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700"
                                                                                    x-show="showModal"
                                                                                    x-transition:enter="easy-out"
                                                                                    x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
                                                                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                                                                    x-transition:leave="easy-in"
                                                                                    x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
                                                                                    x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]">
                                                                                    <div class="avatar size-20">
                                                                                        <img class="rounded-full"
                                                                                            @if ($data->karyawan->foto) src="{{ asset('storage/' . $data->karyawan->foto) }}"
                                                                                                @else
                                                                                                    src="{{ asset('assets/images/logo-brand.png') }}" @endif
                                                                                            id="edit_preview_{{ $data->id }}"
                                                                                            alt="Foto Karyawan" />
                                                                                        <div
                                                                                            class="{{ $data->role == 'team leader' ? 'absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700' : 'absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-success dark:border-navy-700' }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mt-1 px-4 sm:px-12">
                                                                                        <h3 class="text-lg text-slate-800 dark:text-navy-50"
                                                                                            id="delete_nama_{{ $data->id }}"
                                                                                            name="nama">
                                                                                        </h3>
                                                                                        <p
                                                                                            class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                            Are you sure you want to <b
                                                                                                class="text-error">delete
                                                                                            </b>
                                                                                            this
                                                                                            user ?
                                                                                            <br>
                                                                                            this action cannot be
                                                                                            undone.
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500">
                                                                                    </div>

                                                                                    <div class="space-x-3">
                                                                                        <button
                                                                                            @click="showModal = false"
                                                                                            class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                            Cancel
                                                                                        </button>
                                                                                        <div class="inline-flex">
                                                                                            <form
                                                                                                action="{{ route('userManagement.destroy', $data->id) }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button
                                                                                                    data-id="{{ $data->id }}"
                                                                                                    class="btn delete-confirm-btn min-w-[7rem] rounded-full bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 dark:hover:bg-error-focus dark:focus:bg-error-focus">
                                                                                                    Delete
                                                                                                </button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </template>
                                                                    </li>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        @isset($users)
                            <div
                                class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                                <div class="flex items-center space-x-2 text-xs+">
                                    <span>Show</span>
                                    <select
                                        class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        id="perPage" onchange="changePerPage(this.value)"
                                        class="ml-2 px-3 py-1 rounded">
                                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10
                                        </option>
                                        <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30
                                        </option>
                                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50
                                        </option>
                                    </select>
                                    <span>entries</span>
                                </div>
                                <ol class="pagination flex justify-center mt-4">
                                    @if ($users->lastPage() > 5)
                                        <nav role="navigation" aria-label="Pagination Navigation" class="pagination">
                                            {{-- First Page Link --}}
                                            @if ($users->currentPage() > 3)
                                                <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $users->url(1) }}"
                                                        class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" class="size-5">
                                                            <path fill-rule="evenodd"
                                                                d="M4.72 9.47a.75.75 0 0 0 0 1.06l4.25 4.25a.75.75 0 1 0 1.06-1.06L6.31 10l3.72-3.72a.75.75 0 1 0-1.06-1.06L4.72 9.47Zm9.25-4.25L9.72 9.47a.75.75 0 0 0 0 1.06l4.25 4.25a.75.75 0 1 0 1.06-1.06L11.31 10l3.72-3.72a.75.75 0 0 0-1.06-1.06Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif
                                            {{-- Previous Page Link --}}
                                            @if (!$users->onFirstPage())
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $users->previousPageUrl() }}"
                                                        class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 19l-7-7 7-7">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach (range(max(1, $users->currentPage() - 2), min($users->lastPage(), $users->currentPage() + 2)) as $page)
                                                @if ($page == $users->currentPage())
                                                    <li class="active bg-slate-150 dark:bg-navy-500">
                                                        <a href="#"
                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                    </li>
                                                @else
                                                    <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                        <a href="{{ $users->url($page) }}"
                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($users->hasMorePages())
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $users->nextPageUrl() }}"
                                                        class="pagination-link flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif
                                            {{-- Last Page Link --}}
                                            @if ($users->currentPage() < $users->lastPage() - 2)
                                                <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $users->url($users->lastPage()) }}"
                                                        class="pagination-link flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" class="size-5">
                                                            <path fill-rule="evenodd"
                                                                d="M15.28 9.47a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L13.69 10 9.97 6.28a.75.75 0 0 1 1.06-1.06l4.25 4.25ZM6.03 5.22l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L8.69 10 4.97 6.28a.75.75 0 0 1 1.06-1.06Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif
                                        </nav>
                                    @else
                                        {{-- Default Pagination --}}
                                        @foreach (range(1, $users->lastPage()) as $page)
                                            @if ($page == $users->currentPage())
                                                <li class="active bg-slate-150 dark:bg-navy-500">
                                                    <a href="#"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $users->url($page) }}"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ol>
                                <div class="text-xs+">
                                    <b>{{ $users->count() }}</b> of <b>{{ $users->total() }}</b> entries
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>

    <script>
        $(document).ready(function() {
            const $inputFoto = $('#foto');
            const $previewSpan = $('#preview');

            if ($inputFoto.length && $previewSpan.length) {
                $inputFoto.on('change', function() {
                    const fileName = this.files && this.files[0] ? this.files[0].name : 'No file chosen';
                    $previewSpan.text(fileName);
                });
            } else {
                console.error('Element inputFoto atau previewSpan tidak ditemukan!');
            }
        });
    </script>


</body>

</html>
