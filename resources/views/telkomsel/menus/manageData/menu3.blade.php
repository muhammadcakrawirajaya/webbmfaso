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

            @if (session('confirm_delete'))
                <div id="confirm-alert"
                    class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-warning px-6 py-3 rounded-lg text-white text-center shadow-lg z-50">
                    <p>Data STO masih digunakan di tabel order. Apakah Anda yakin ingin melanjutkan dan menghapusnya?
                    </p>
                    <div class="mt-4 space-x-3">
                        <a href="{{ route('sto.confirmDestroy', session('sto_id')) }}"
                            class="btn bg-error text-white px-4 py-2 rounded-lg">Lanjutkan</a>
                        <button onclick="document.getElementById('confirm-alert').style.display='none'"
                            class="btn bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</button>
                    </div>
                </div>
            @endif

            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    STO Data Management
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

                            <span>Dashboard</span>
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

                            <span>STO Data Management</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

                <!-- User List Table -->
                <div>
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            STO List
                        </h2>
                        <div class="flex mr-4">
                            <div class="flex items-center" x-data="{ isInputActive: false }">
                                <form action="{{ route('manageDataMenu3.index') }}" method="GET">
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

                            @if (session('role') === 'team leader')
                                <div x-data="{ showModal: false }">
                                    <button x-tooltip.duration.500="'Add New'" @click="showModal = true"
                                        class="btn size-9 bg-success p-0 font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
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
                                                x-transition:leave-end="opacity-0">
                                            </div>
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
                                                <form id="addSOForm" method="POST"
                                                    action="{{ route('manageDataMenu3.store') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="px-4 py-4 sm:px-5">
                                                        <div class="space-y-4">
                                                            <!-- Nama STO Input -->
                                                            <div>
                                                                <span>Nama STO</span>
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
                                                                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Masukkan Nama STO" type="text"
                                                                        id="nama_sto" name="nama_sto" required />
                                                                </label>
                                                            </div>
                                                            <!-- Nama SO Input -->
                                                            <div>
                                                                <span>Nama SO</span>
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
                                                                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <select name="so" id="so" required
                                                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                        <option value="">-- Semua SO --</option>
                                                                        @foreach ($so as $sos)
                                                                            <option value="{{ $sos->id }}"
                                                                                {{ request('so') == $sos->id ? 'selected' : '' }}>
                                                                                {{ $sos->nama_so }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </label>
                                                            </div>
                                                            <!-- Nama TL Input -->
                                                            <div>
                                                                <span>Nama TL</span>
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
                                                                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <input
                                                                        class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                        placeholder="Masukkan Nama TL" type="text"
                                                                        id="namatl" name="namatl" required />
                                                                </label>
                                                            </div>
                                                            <!-- Buttons -->
                                                            <div class="space-x-2 text-right">
                                                                <button type="button" @click="showModal = false"
                                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit"
                                                                    class="btn min-w-[7rem] rounded-full bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus">
                                                                    Submit
                                                                </button>
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
                        @if ($Sto->count())
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="w-full text-left">
                                    {{-- Head --}}
                                    <thead>
                                        <tr>
                                            <th
                                                class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                No
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Nama StO
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Nama SO
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Nama tl
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Dibuat Oleh
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Tanggal Buat
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Waktu Buat
                                            </th>
                                            @if (session('role') === 'team leader')
                                                <th
                                                    class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                </th>
                                            @endif
                                        </tr>
                                    </thead>

                                    {{-- LIST --}}
                                    @isset($Sto)
                                        @foreach ($Sto as $index => $log)
                                            <tr class="border-y border-transparent">
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $Sto->firstItem() + $index }}</td>
                                                <td
                                                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                    {{ $log['nama_sto'] }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                    {{ $log['nama_so'] }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                    {{ $log['nama_tl'] }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $log['created_by'] }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $log['date'] }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $log['time'] }}
                                                </td>
                                                @if (session('role') === 'team leader')
                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })"
                                                            @click.outside="isShowPopper && (isShowPopper = false)"
                                                            class="inline-flex">
                                                            <button x-ref="popperRef"
                                                                @click="isShowPopper = !isShowPopper"
                                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                    fill="none" viewbox="0 0 24 24"
                                                                    stroke="currentColor" stroke-width="2">
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
                                                                                    data-user-id="{{ $log['id'] }}"
                                                                                    @click.prevent="userId = {{ $log['id'] }}; showModal = true"
                                                                                    class="edit">
                                                                                    <button @click="showModal = true"
                                                                                        class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="size-4.5"
                                                                                            fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                                        </svg>
                                                                                        <span> Modify Data </span>
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
                                                                                                action="{{ route('manageDataMenu3.update', $log['id']) }}"
                                                                                                method="POST"
                                                                                                enctype="multipart/form-data">
                                                                                                @csrf
                                                                                                @method('PUT')
                                                                                                <input type="hidden"
                                                                                                    id="edit_user_id_{{ $log['id'] }}"
                                                                                                    name="edit_user_id"
                                                                                                    value="{{ $log['id'] }}">
                                                                                                <div
                                                                                                    class="avatar size-20">
                                                                                                    <img class="rounded-full"
                                                                                                        src="{{ asset('assets/images/logo-brand.svg') }}"
                                                                                                        alt="Logo Perusahaan" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mt-1 px-4 sm:px-12">

                                                                                                    <div
                                                                                                        class="text-left mt-5">
                                                                                                        <span>Modify
                                                                                                            Division</span>
                                                                                                        <!-- Nama STO Input -->
                                                                                                        <div>
                                                                                                            <span>Nama
                                                                                                                STO</span>
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
                                                                                                                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                                                                        </svg>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <input
                                                                                                                    class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                                                                    placeholder="Masukkan Nama STO"
                                                                                                                    type="text"
                                                                                                                    id="nama_sto"
                                                                                                                    value="{{ $log['nama_sto'] }}"
                                                                                                                    name="nama_sto"
                                                                                                                    required />
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <!-- Nama SO Input -->
                                                                                                        <div>
                                                                                                            <span>Nama
                                                                                                                SO</span>
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
                                                                                                                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                                                                        </svg>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <select
                                                                                                                    name="so"
                                                                                                                    id="so"
                                                                                                                    required
                                                                                                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                                                    <option
                                                                                                                        value="">
                                                                                                                        --
                                                                                                                        Semua
                                                                                                                        SO
                                                                                                                        --
                                                                                                                    </option>
                                                                                                                    @foreach ($so as $sos)
                                                                                                                        <option
                                                                                                                            value="{{ $sos->id }}"
                                                                                                                            {{ $sos->id == $log['id_so'] ? 'selected' : '' }}>
                                                                                                                            {{ $sos->nama_so }}
                                                                                                                        </option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <!-- Nama TL Input -->
                                                                                                        <div>
                                                                                                            <span>Nama
                                                                                                                TL</span>
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
                                                                                                                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                                                                                        </svg>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <input
                                                                                                                    class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                                                                    placeholder="Masukkan Nama TL"
                                                                                                                    type="text"
                                                                                                                    id="nama_tl"
                                                                                                                    name="nama_tl"
                                                                                                                    value="{{ $log['nama_tl'] }}"
                                                                                                                    required />
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <p
                                                                                                        class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                                        Are you sure you
                                                                                                        want to
                                                                                                        <b
                                                                                                            class="text-info">modify
                                                                                                        </b>
                                                                                                        this
                                                                                                        user ?
                                                                                                        <br>
                                                                                                        this action cannot
                                                                                                        be
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
                                                                                                    <div
                                                                                                        class="inline-flex">
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
                                                                                    data-user-id="{{ $log['id'] }}"
                                                                                    @click.prevent="userId = {{ $log['id'] }}; showModal = true"
                                                                                    class="delete">
                                                                                    <button @click="showModal = true"
                                                                                        class="flex h-8 items-center space-x-4 px-3 pr-8 font-medium tracking-wide text-error outline-none transition-all hover:bg-error/20 focus:bg-error/20">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="size-4.5"
                                                                                            fill="none"
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
                                                                                                    src="{{ asset('assets/images/logo-brand.svg') }}"
                                                                                                    alt="Logo Perusahaan" />
                                                                                            </div>
                                                                                            <div
                                                                                                class="mt-1 px-4 sm:px-12">
                                                                                                <p
                                                                                                    class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                                    Are you sure you want to
                                                                                                    <b class="text-error">delete
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
                                                                                                        action="{{ route('manageDataMenu3.destroy', $log['id']) }}"
                                                                                                        method="POST">
                                                                                                        @csrf
                                                                                                        @method('DELETE')
                                                                                                        <button
                                                                                                            data-id="{{ $log['id'] }}"
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
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            </tr>
                                        @endforeach
                                    @endisset
                                </table>
                            </div>
                        @else
                            <br>
                            <p class="text-center">Tidak menemukan data yang cocok</p><br>
                        @endif

                        @isset($Sto)
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
                                    @if ($Sto->lastPage() > 5)
                                        <nav role="navigation" aria-label="Pagination Navigation" class="pagination">
                                            {{-- First Page Link --}}
                                            @if ($Sto->currentPage() > 3)
                                                <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $Sto->url(1) }}"
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
                                            @if (!$Sto->onFirstPage())
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $Sto->previousPageUrl() }}"
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
                                            @foreach (range(max(1, $Sto->currentPage() - 2), min($Sto->lastPage(), $Sto->currentPage() + 2)) as $page)
                                                @if ($page == $Sto->currentPage())
                                                    <li class="active bg-slate-150 dark:bg-navy-500">
                                                        <a href="#"
                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                    </li>
                                                @else
                                                    <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                        <a href="{{ $Sto->url($page) }}"
                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($Sto->hasMorePages())
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $Sto->nextPageUrl() }}"
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
                                            @if ($Sto->currentPage() < $Sto->lastPage() - 2)
                                                <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $Sto->url($Sto->lastPage()) }}"
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
                                        @foreach (range(1, $Sto->lastPage()) as $page)
                                            @if ($page == $Sto->currentPage())
                                                <li class="active bg-slate-150 dark:bg-navy-500">
                                                    <a href="#"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $Sto->url($page) }}"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ol>
                                <div class="text-xs+">
                                    <b>{{ $Sto->count() }}</b> of <b>{{ $Sto->total() }}</b> entries
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

</body>

</html>
