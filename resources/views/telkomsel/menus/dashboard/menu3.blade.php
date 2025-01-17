<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - Telescout</title>
    @include('includes.head')
</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    @include('includes.preloader')

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
        <!-- Sidebar -->
        @include('telkomsel.menus.dashboard.dashboardMenus')

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
                <!-- Alerts akan di-inject melalui JavaScript -->
            </div>

            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Data Master
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

                            <span>Telkomsel</span>
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

                            <span>Data Master</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                <!-- Collapsible  Table -->
                <div x-data="{ isFilterExpanded: false }">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            {{-- Generate Button --}}
                            <button id="multiEditButton" style="display: none;">
                                <label
                                    class="mr-4 btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-pen"></i>
                                        <span>Edit</span>
                                    </div>
                                </label>
                            </button>

                            {{-- Edit Button --}}
                            <div id="multiEditModal"
                                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                <div class="absolute inset-0 bg-black bg-opacity-80"></div>
                                <div class="bg-white rounded-lg shadow-lg w-[28rem] p-6 relative z-10">
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('assets/images/logo-brand.png') }}" alt="User Photo"
                                            class="w-20 h-20 rounded-full border-4 border-white shadow-md">
                                    </div>
                                    <h3 class="text-center text-xl font-semibold mb-2">Edit Feedback PIC</h3>
                                    <form id="multiEditForm" class="space-y-4">
                                        <div class="text-left mt-5">
                                            <span>Pilih
                                                Kendala:</span>
                                            <label class="mt-1.5 flex -space-x-px">
                                                <div
                                                    class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                    <span class="-mt-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 20" stroke-width="1.5" stroke="currentColor"
                                                            class="size-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                                        </svg>

                                                    </span>
                                                </div>
                                                <select id="kendalaSelect" name="id_feedback"
                                                    class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                    <option value="" disabled selected>Pilih Salah Satu Kendala
                                                    </option>
                                                    @foreach ($kendalas as $kendala)
                                                        <optgroup label="{{ $kendala->uic }}">
                                                            @foreach ($kendala->feedbacks as $feedback)
                                                                <option value="{{ $feedback->id }}">
                                                                    {{ $feedback->feedback_pic }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <p class="mt-8 text-slate-500 dark:text-navy-200">Are you sure you want to
                                                <b class="text-info">modify</b> this data ?<br>this action cannot be
                                                undone.
                                            </p>
                                        </div>
                                        <div class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500"></div>
                                        <div class="flex justify-center items-center space-x-4 mt-6">
                                            <button type="button" data-modal="multiEditModal"
                                                class="closeModalButton"
                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="btn min-w-[7rem] rounded-full bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 dark:hover:bg-info-focus dark:focus:bg-info-focus">
                                                Modify
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Delete Button --}}
                            <button id="multiDeleteButton" style="display: none;">
                                <label
                                    class="mr-4 btn relative bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 dark:active:bg-accent/90">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-trash"></i>
                                        <span>Delete</span>
                                    </div>
                                </label>
                            </button>
                            {{-- Delete Modal --}}
                            <div id="multiDeleteModal"
                                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                <div class="absolute inset-0 bg-black bg-opacity-80"></div>
                                <div class="bg-white rounded-lg shadow-lg w-[28rem] p-6 relative z-10">
                                    <div class="flex justify-center mb-4">
                                        <img src="{{ asset('assets/images/logo-brand.png') }}" alt="User Photo"
                                            class="w-20 h-20 rounded-full border-4 border-white shadow-md">
                                    </div>
                                    <h3 class="text-center text-xl font-semibold mb-2">Delete Data</h3>
                                    <form id="multiDeleteForm" class="space-y-4">
                                        <div class="mt-4">
                                            <p class="mt-2">
                                                Are you sure you want to <b class="text-error">delete</b> the
                                                selected data?
                                                <br> this action cannot be undone!
                                            </p>
                                        </div>
                                        <div class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500"></div>
                                        <div class="flex justify-center items-center space-x-4 mt-6">
                                            <button type="button" data-modal="multiDeleteModal"
                                                class="closeModalButton"
                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="btn min-w-[7rem] rounded-full bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 dark:hover:bg-warning-focus dark:focus:bg-warning-focus">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            {{-- Search Button --}}
                            <div class="flex items-center" x-data="{ isInputActive: false }">
                                <form action="{{ route('dashboardMenu3.index') }}" method="GET">
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

                            {{-- Multiple Button --}}
                            <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="isShowPopper && (isShowPopper = false)"
                                class="inline-flex">
                                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                        </path>
                                    </svg>
                                </button>
                                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                    <div
                                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                        <ul>
                                            <li>
                                                <form method="GET" action="{{ route('dashboardMenu3.export') }}">
                                                    <input type="hidden" name="search"
                                                        value="{{ request('search') }}">
                                                    <input type="hidden" name="start_date"
                                                        value="{{ request('start_date') }}">
                                                    <input type="hidden" name="end_date"
                                                        value="{{ request('end_date') }}">
                                                    <input type="hidden" name="sto"
                                                        value="{{ request('sto') }}">
                                                    <input type="hidden" name="so"
                                                        value="{{ request('so') }}">
                                                    <input type="hidden" name="telda"
                                                        value="{{ request('telda') }}">
                                                    <input type="hidden" name="segmen"
                                                        value="{{ request('segmen') }}">
                                                    <input type="hidden" name="uic"
                                                        value="{{ request('uic') }}">
                                                    <input type="hidden" name="pic"
                                                        value="{{ request('pic') }}">
                                                    <input type="hidden" name="status"
                                                        value="{{ request('status') }}">
                                                    <input type="hidden" name="month"
                                                        value="{{ request('month') }}">
                                                    <input type="hidden" name="year"
                                                        value="{{ request('year') }}">

                                                    <button type="submit"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Export
                                                        Excel</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- Filter Button --}}
                            <button @click="isFilterExpanded = !isFilterExpanded"
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                    viewbox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M18 11.5H6M21 4H3m6 15h6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Filter Expanded --}}
                    <div x-show="isFilterExpanded" x-collapse="">
                        <div class="max-w-3xl py-3">
                            <form action="{{ route('dashboardMenu3.index') }}" method="GET">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
                                    {{-- Filter Bulan --}}
                                    <label class="block">
                                        <span>Bulan:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="month" id="month"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua Bulan --</option>
                                                @foreach ($months as $month)
                                                    <option value="{{ $month->month }}"
                                                        data-year="{{ $month->year }}"
                                                        {{ request('month') == $month->month && request('year') == $month->year ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::createFromDate($month->year, $month->month)->translatedFormat('F Y') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="year" id="hiddenYear">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter SO --}}
                                    <label class="block">
                                        <span>SO:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="so" id="so"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua SO --</option>
                                                @foreach ($so as $sos)
                                                    <option value="{{ $sos->id }}"
                                                        {{ request('so') == $sos->id ? 'selected' : '' }}>
                                                        {{ $sos->nama_so }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter STO --}}
                                    <label class="block">
                                        <span>STO:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="sto" id="sto"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua STO --</option>
                                                @foreach ($sto as $stos)
                                                    <option value="{{ $stos->id }}"
                                                        {{ request('sto') == $stos->id ? 'selected' : '' }}>
                                                        {{ $stos->nama_sto }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter Telda --}}
                                    <label class="block">
                                        <span>Telda:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="telda" id="telda"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua Telda --</option>
                                                @foreach ($so as $item)
                                                    <option
                                                        {{ request('telda') == $item->nama_telda ? 'selected' : '' }}>
                                                        {{ $item->nama_telda }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter Segmen --}}
                                    <label class="block">
                                        <span>Segmen:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="segmen" id="segmen"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Pilih Segmen --</option>
                                                @foreach ($segmen as $item)
                                                    <option value="{{ $item->segmen }}"
                                                        {{ request('segmen') == $item->segmen ? 'selected' : '' }}>
                                                        {{ $item->segmen }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter UIC --}}
                                    <label class="block">
                                        <span>UIC:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="uic" id="uic"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua UIC --</option>
                                                @foreach ($seacruic as $ui)
                                                    <option value="{{ $ui->id }}"
                                                        {{ request('uic') == $ui->id ? 'selected' : '' }}>
                                                        {{ $ui->uic }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter Feedback PIC --}}
                                    <label class="block">
                                        <span>Feedback PIC:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="pic" id="pic"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua Feedback PIC --</option>
                                                @foreach ($kendalas as $kendala)
                                                    <optgroup label="{{ $kendala->uic }}">
                                                        @forelse ($kendala->feedbacks as $feedback)
                                                            <option value="{{ $feedback->id }}"
                                                                {{ $feedback->id == request('uic') ? 'selected' : '' }}>
                                                                {{ $feedback->feedback_pic }}
                                                            </option>
                                                        @empty
                                                            <option disabled>Tidak ada jenis kendala
                                                            </option>
                                                        @endforelse
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter Status Kendala --}}
                                    <label class="block">
                                        <span>Status Kendala:</span>
                                        <div class="relative mt-1.5 flex">
                                            <select name="status" id="status"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                onchange="toggleClearButton()">
                                                <option value="">-- Semua Status Kendala --</option>
                                                @foreach ($status as $statu)
                                                    <option value="{{ $statu->id }}"
                                                        {{ request('status') == $statu->id ? 'selected' : '' }}>
                                                        {{ $statu->status_kendala }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    {{-- Filter Tanggal --}}
                                    {{-- <label class="block">
                                        <span>From:</span>
                                        <div class="relative mt-1.5 flex">
                                            <input x-init="$el._x_flatpickr = flatpickr($el)"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Choose start date..." type="text" name="start_date"
                                                oninput="toggleClearButton()" value="{{ request('start_date') }}">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                    </label>
                                    <label class="block">
                                        <span>To:</span>
                                        <div class="relative mt-1.5 flex">
                                            <input x-init="$el._x_flatpickr = flatpickr($el)"
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Choose start date..." type="text" name="end_date"
                                                oninput="toggleClearButton()" value="{{ request('end_date') }}">
                                            <div
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-5 transition-colors duration-200" fill="none"
                                                    viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </label> --}}
                                </div>
                                <div class="mt-4 space-x-1 text-right">
                                    <button @click="isFilterExpanded = ! isFilterExpanded"
                                        class="btn font-medium text-slate-700 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        Cancel
                                    </button>

                                    <button type="button" id="clearButton" style="display: none;"
                                        onclick="clearFields()"
                                        class="btn bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Clear
                                    </button>

                                    <button @click="isFilterExpanded = ! isFilterExpanded" type="submit"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Apply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-3">
                        @if ($data->count())
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="w-full text-center">
                                    <thead>
                                        <tr>
                                            <th
                                                class="whitespace-nowrap bg-slate-150 px-2 py-1 rounded-tl-lg font-medium text-white">
                                                <label class="inline-flex items-center">
                                                    <input
                                                        class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                        type="checkbox" id="selectAll">
                                                </label>
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                No
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                tanggal
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                bulan
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                track id myir
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                trackid
                                            </th>
                                            {{-- <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                status duplicate
                                            </th> --}}
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                nomor sc
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                nama pelanggan
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                alamat pelanggan
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                cp
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                tipe transaksi
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                layanan
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                jenis layanan
                                            </th>
                                            <th  style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                sto
                                            </th>
                                            <th  style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                mitra
                                            </th>
                                            <th  style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                team
                                            </th>
                                            <th  style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                kategori
                                            </th>
                                            <th  style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                detail progres
                                            </th>
                                            <th style="background-color: purple"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                kendala
                                            </th>
                                            {{-- <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                ket detail
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                chanel
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                agency
                                            </th> --}}
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                label odp
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                label odp alternatif
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                ket label odp
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                kap odp
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                port odp
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                sisa port odp
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                tagging lokasi odp
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                tagging lokasi pelanggan
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                status tagging pelanggan
                                            </th>
                                            <th  style="background-color: gold"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                id valins
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Segmen
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                so
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Telda
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                umur kendala
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                uic
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                status kendala
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Feedback PIC
                                            </th>
                                            <th style="background-color: red"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Detail Feedback pic
                                            </th>
                                            <th style="background-color: lightgreen"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                rab sdi
                                            </th>
                                            <th style="background-color: lightgreen"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                rab aanwijzing
                                            </th>
                                            <th style="background-color: lightgreen"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                bges mbb approval
                                            </th>
                                            <th style="background-color: lightgreen"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                bges mbb note
                                            </th>
                                            <th style="background-color: lightgreen"
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white px-2 rounded-tr-lg focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Recent Log
                                            </th>
                                        </tr>
                                    </thead>
                                    @isset($data)
                                        <tbody>
                                            @foreach ($data as $index => $row)
                                                @php $rowId = 'row-' . $index; @endphp
                                                <tr class="data-row cursor-pointer"
                                                    data-nomor-sc="{{ $row['nomor_sc'] }}"
                                                    data-nama-pelanggan="{{ $row['nama_pelanggan'] }}"
                                                    data-alamat-pelanggan="{{ $row['alamat_pelanggan'] }}"
                                                    data-sto="{{ $row->order_sto->nama_sto ?? '' }}"
                                                    data-layanan="{{ $row['layanan'] }}"
                                                    data-jenis-layanan="{{ $row['jenis_layanan'] }}"
                                                    data-uic="{{ $row->feedback_order->uic->uic ?? '' }}"
                                                    data-status-kendala="{{ $row->feedback_order->status_kendalas->status_kendala ?? '' }}"
                                                    data-feedback="{{ $row->feedback_order->feedback_pic ?? '' }}"
                                                    class="border-y border-transparent" data-index="{{ $index }}"
                                                    id="{{ $rowId }}">
                                                    <form id="rowForm-{{ $index }}"
                                                        action="{{ route('dashboardMenu3.store') }}" method="POST">
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <input type="hidden" name="data[{{ $index }}][id]"
                                                            value="{{ $row['id'] }}">
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <label class="inline-flex items-center space-x-2">
                                                                <input
                                                                    class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary hover:border-primary focus:border-primary userCheckbox"
                                                                    type="checkbox" value="{{ $row->id }}">
                                                            </label>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            {{ $data->firstItem() + $index }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][off_tanggal]"
                                                                value="{{ \Carbon\Carbon::parse($row['tanggal'])->format('d-m-Y') }}"
                                                                data-row="{{ $index }}" readonly>
                                                            <input type="text"
                                                                name="data[{{ $index }}][tanggal]"
                                                                value="{{ $row['tanggal'] }}"
                                                                data-row="{{ $index }}" hidden>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][bulan]"
                                                                value="{{ $row['bulan'] }}" class="auto-save"
                                                                data-row="{{ $index }}" readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][track_id_myir]"
                                                                value="{{ $row['track_id_myir'] }}" class="auto-save"
                                                                data-row="{{ $index }}"
                                                                @if (session('role') !== 'admin' || session('division') !== 'aso') readonly @endif>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][trackid]"
                                                                value="{{ $row['trackid'] }}" class="auto-save"
                                                                data-row="{{ $index }}"
                                                                @if (session('role') !== 'admin' || session('division') !== 'aso') readonly @endif>
                                                        </td>
                                                        {{-- <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][status_duplicate]"
                                                                value="{{ $row['status_duplicate'] }}" class="auto-save"
                                                                data-row="{{ $index }}"
                                                                @if (session('role') !== 'admin' || session('division') !== 'aso') readonly @endif>
                                                        </td> --}}
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][nomor_sc]"
                                                                value="{{ $row['nomor_sc'] }}" class="auto-save"
                                                                data-row="{{ $index }}"
                                                                @if (session('role') !== 'admin' || session('division') !== 'aso') readonly @endif>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][nama_pelanggan]"
                                                                value="{{ $row['nama_pelanggan'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][alamat_pelanggan]"
                                                                value="{{ $row['alamat_pelanggan'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][cp]"
                                                                value="{{ $row['cp'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][tipe_transaksi]"
                                                                value="{{ $row['tipe_transaksi'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][layanan]"
                                                                value="{{ $row['layanan'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][jenis_layanan]"
                                                                value="{{ $row['jenis_layanan'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <select name="data[{{ $index }}][id_sto]"
                                                                class="form-select auto-save"
                                                                data-row="{{ $index }}">
                                                                <option value="" disabled
                                                                    {{ !$row['id_sto'] ? 'selected' : '' }}>Pilih
                                                                    STO</option>
                                                                @foreach ($so as $sos)
                                                                    <optgroup label="{{ $sos->nama_so }}">
                                                                        @if ($sos->so_sto && is_iterable($sos->so_sto))
                                                                            @forelse ($sos->so_sto as $so_stos)
                                                                                <option value="{{ $so_stos->id }}"
                                                                                    {{ $so_stos->id == $row['id_sto'] ? 'selected' : '' }}>
                                                                                    {{ $so_stos->nama_sto }}
                                                                                </option>
                                                                            @empty
                                                                                <option disabled>Tidak ada jenis kendala
                                                                                </option>
                                                                            @endforelse
                                                                        @else
                                                                            <option disabled>Relasi tidak tersedia</option>
                                                                        @endif
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][mitra]"
                                                                value="{{ $row['mitra'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][team]"
                                                                value="{{ $row['team'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][kategori]"
                                                                value="{{ $row['kategori'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][detail_progres]"
                                                                value="{{ $row['detail_progres'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][kendala]"
                                                                value="{{ $row['kendala'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        {{-- <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][ket_detail]"
                                                                value="{{ $row['ket_detail'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][chanel]"
                                                                value="{{ $row['chanel'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][agency]"
                                                                value="{{ $row['agency'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td> --}}
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][label_odp]"
                                                                value="{{ $row['label_odp'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][label_odp_alternatif]"
                                                                value="{{ $row['label_odp_alternatif'] }}"
                                                                class="auto-save" data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][ket_label_odp]"
                                                                value="{{ $row['ket_label_odp'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][kap_odp]"
                                                                value="{{ $row['kap_odp'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][port_odp]"
                                                                value="{{ $row['port_odp'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][sisa_port_odp]"
                                                                value="{{ $row['sisa_port_odp'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][tagging_lokasi_odp]"
                                                                value="{{ $row['tagging_lokasi_odp'] }}"
                                                                class="auto-save" data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][tagging_lokasi_pelanggan]"
                                                                value="{{ $row['tagging_lokasi_pelanggan'] }}"
                                                                class="auto-save" data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][status_tagging_pelanggan]"
                                                                value="{{ $row['status_tagging_pelanggan'] }}"
                                                                class="auto-save" data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][id_valins]"
                                                                value="{{ $row['id_valins'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][segmen]"
                                                                value="{{ $row['segmen'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][so]"
                                                                value="{{ $row->order_sto->sto_so->nama_so }}"
                                                                class="auto-save" data-row="{{ $index }}"
                                                                readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][telda]"
                                                                value="{{ $row->order_sto->sto_so->nama_telda }}"
                                                                class="auto-save" data-row="{{ $index }}"
                                                                readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][umur]"
                                                                value="{{ $row['umur'] }} Hari" class="auto-save"
                                                                data-row="{{ $index }}" readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][uic]"
                                                                value="{{ $row->feedback_order->uic->uic ?? '' }}"
                                                                class="auto-save" data-row="{{ $index }}"
                                                                readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][status_kendala ]"
                                                                value="{{ $row->feedback_order->status_kendalas->status_kendala ?? '' }}"
                                                                class="auto-save" data-row="{{ $index }}"
                                                                readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <select name="data[{{ $index }}][id_feedback]"
                                                                class="form-select auto-save"
                                                                data-row="{{ $index }}">
                                                                <option value="" disabled
                                                                    {{ !$row['id_feedback'] ? 'selected' : '' }}>Pilih
                                                                    Salah
                                                                    Satu Pilihan</option>
                                                                @foreach ($kendalas as $kendala)
                                                                    <optgroup label="{{ $kendala->uic }}">
                                                                        @forelse ($kendala->feedbacks as $feedback)
                                                                            <option value="{{ $feedback->id }}"
                                                                                {{ $feedback->id == $row['id_feedback'] ? 'selected' : '' }}>
                                                                                {{ $feedback->feedback_pic }}
                                                                            </option>
                                                                        @empty
                                                                            <option disabled>Tidak ada jenis kendala
                                                                            </option>
                                                                        @endforelse
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][ket_feedback]"
                                                                value="{{ $row['ket_feedback'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][rab_sdi]"
                                                                value="{{ $row['rab_sdi'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][rab_aanwijzing]"
                                                                value="{{ $row['rab_aanwijzing'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][bges_mbb_approval]"
                                                                value="{{ $row['bges_mbb_approval'] }}"
                                                                class="auto-save" data-row="{{ $index }}">
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text"
                                                                name="data[{{ $index }}][bges_mbb_note]"
                                                                value="{{ $row['bges_mbb_note'] }}" class="auto-save"
                                                                data-row="{{ $index }}">
                                                        </td>
                                                    </form>
                                                    <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                        <button type="button"
                                                            onclick="toggleExpanded('{{ $rowId }}')"
                                                            class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                            <i class="fas fa-chevron-down text-sm transition-transform"
                                                                id="icon-{{ $rowId }}">
                                                            </i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="details-row border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                                                    id="details-row-{{ $rowId }}" style="display: none;">
                                                    <td colspan="100" class="p-0">
                                                        <div>
                                                            <div class="px-4 pb-4 sm:px-5 text-xs+">
                                                                <p>Log</p>
                                                                <div
                                                                    class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                                                    <table class="is-hoverable w-full text-left">
                                                                        <thead>
                                                                            <tr
                                                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                                <th
                                                                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                    NO</th>
                                                                                <th
                                                                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                    Nama</th>
                                                                                <th
                                                                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                    Tanggal Ubah</th>
                                                                                <th
                                                                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                    Waktu Ubah</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php $filteredLogs = $editLogs->where('model_id', $row->id); @endphp
                                                                            @forelse ($filteredLogs as $num => $log)
                                                                                <tr
                                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                                    <td
                                                                                        class="whitespace-nowrap px-2 py-1 text-xs border">
                                                                                        {{ $loop->iteration }}</td>
                                                                                    <td
                                                                                        class="whitespace-nowrap px-2 py-1 text-xs border">
                                                                                        {{ $log->nama }}</td>
                                                                                    <td
                                                                                        class="whitespace-nowrap px-2 py-1 text-xs border">
                                                                                        {{ \Carbon\Carbon::parse($log->created_at)->format('d-F-Y') }}
                                                                                    </td>
                                                                                    <td
                                                                                        class="whitespace-nowrap px-2 py-1 text-xs border">
                                                                                        {{ \Carbon\Carbon::parse($log->created_at)->format('H:i:s') }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="4"
                                                                                        class="text-center">No Logs Found
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="button"
                                                                        onclick="toggleExpanded('{{ $rowId }}')"
                                                                        class="btn mt-2 h-8 rounded px-3 text-xs+ font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                                        Hide
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endisset
                                </table>
                            </div>
                        @else
                            <br>
                            <p class="text-center">Tidak menemukan data yang cocok</p><br>
                        @endif
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
                                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100
                                    </option>
                                </select>
                                <span>entries</span>
                            </div>
                            <ol class="pagination flex justify-center mt-4">
                                @if ($data->lastPage() > 5)
                                    <nav role="navigation" aria-label="Pagination Navigation" class="pagination">
                                        {{-- First Page Link --}}
                                        @if ($data->currentPage() > 3)
                                            <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                                <a href="{{ $data->url(1) }}"
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
                                        @if (!$data->onFirstPage())
                                            @if ($data->currentPage() > 3)
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $data->previousPageUrl() }}"
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
                                            @else
                                                <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $data->previousPageUrl() }}"
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
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach (range(max(1, $data->currentPage() - 2), min($data->lastPage(), $data->currentPage() + 2)) as $page)
                                            @if ($page == $data->currentPage())
                                                <li class="active bg-slate-150 dark:bg-navy-500">
                                                    <a href="#"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $data->url($page) }}"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($data->hasMorePages())
                                            @if ($data->currentPage() < $data->lastPage() - 2)
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $data->nextPageUrl() }}"
                                                        class="pagination-link flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $data->nextPageUrl() }}"
                                                        class="pagination-link flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                        {{-- Last Page Link --}}
                                        @if ($data->currentPage() < $data->lastPage() - 2)
                                            <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                                <a href="{{ $data->url($data->lastPage()) }}"
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
                                    @foreach (range(1, $data->lastPage()) as $page)
                                        @if ($page == $data->currentPage())
                                            <li class="active bg-slate-150 dark:bg-navy-500">
                                                <a href="#"
                                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                <a href="{{ $data->url($page) }}"
                                                    class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ol>
                            <div class="text-xs+">
                                <b>{{ $data->count() }}</b> of <b>{{ $data->total() }}</b> entries
                            </div>
                        </div>
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

    <!-- Modal Container -->
    <div id="dataModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="modal-content bg-white rounded-lg shadow-lg relative w-4/5 max-w-2xl p-6">
            <!-- Close Button -->
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">
                &times;
            </button>

            <!-- Modal Header -->
            <div class="modal-header text-center mb-6">
                <img src="{{ asset('assets/images/logo-brand.png') }}" alt="Logo"
                    class="modal-logo mx-auto mb-4 w-12 h-12">
                <h2 class="text-2xl font-bold">Detail Data</h2>
            </div>

            <!-- Modal Body -->
            <div class="modal-body space-y-4">
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Nomor SC:</label>
                    <span id="modalNomorSC" class="block text-gray-600">[Data Nomor SC]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Nama Pelanggan:</label>
                    <span id="modalNamaPelanggan" class="block text-gray-600">[Data Nama
                        Pelanggan]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Alamat Pelanggan:</label>
                    <span id="modalAlamatPelanggan" class="block text-gray-600">[Data Alamat
                        Pelanggan]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">STO:</label>
                    <span id="modalSTO" class="block text-gray-600">[Data STO]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Layanan:</label>
                    <span id="modalLayanan" class="block text-gray-600">[Data Layanan]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Jenis Layanan:</label>
                    <span id="modalJenisLayanan" class="block text-gray-600">[Data Jenis
                        Layanan]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">UIC:</label>
                    <span id="modalUIC" class="block text-gray-600">[Data UIC]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Status Kendala:</label>
                    <span id="modalStatusKendala" class="block text-gray-600">[Data Status
                        Kendala]</span>
                </div>
                <div class="form-group">
                    <label class="block font-semibold text-gray-700">Feedback:</label>
                    <span id="modalFeedback" class="block text-gray-600">[Data Feedback]</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
    <script type="text/javascript">
        console.log('JavaStart');

        function toggleExpanded(rowId) {
            console.log(`Toggle expanded for ${rowId}`);
            const detailsRow = document.getElementById(`details-row-${rowId}`);
            const icon = document.getElementById(`icon-${rowId}`);

            if (detailsRow) {
                if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
                    detailsRow.style.display = 'table-row';
                    icon.classList.add('-rotate-180');
                } else {
                    detailsRow.style.display = 'none';
                    icon.classList.remove('-rotate-180');
                }
            } else {
                console.error(`Element with id details-row-${rowId} not found`);
            }
        }

        function changePerPage(perPage) {
            const url = new URL(window.location.href);
            url.searchParams.set('per_page', perPage);
            window.location.href = url.toString();
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".auto-save").forEach((input) => {
                input.addEventListener("change", (e) => {
                    const rowIndex = e.target.dataset.row;
                    const form = document.getElementById(`rowForm-${rowIndex}`);
                    saveRowData(form);
                });
            });
        });

        document.addEventListener('change', function(event) {
            if (event.target.id === 'month') {
                const selectedOption = event.target.options[event.target.selectedIndex];
                const year = selectedOption.getAttribute('data-year');
                const yearInput = document.getElementById('hiddenYear');

                // if (yearInput) {
                yearInput.value = year;
                // } else {
                //     console.error('Input with name="year" not found in DOM.');
                // }
            }
        });

        function toggleClearButton() {
            const month = document.getElementById('month').value;
            const year = document.getElementById('hiddenYear').value;
            const sto = document.getElementById('sto').value;
            const so = document.getElementById('so').value;
            const telda = document.getElementById('telda').value;
            const segmen = document.getElementById('segmen').value;
            const uic = document.getElementById('uic').value;
            const pic = document.getElementById('pic').value;
            const status = document.getElementById('status').value;
            // const startDate = document.querySelector('[name="start_date"]').value;
            // const endDate = document.querySelector('[name="end_date"]').value;
            const clearButton = document.getElementById('clearButton');

            if (sto || telda || month || year || so || segmen || uic || pic || status) {
                clearButton.style.display = 'inline-block';
            } else {
                clearButton.style.display = 'none';
            }
        }

        function clearFields() {
            document.getElementById('month').value = '';
            document.getElementById('year').value = '';
            document.getElementById('sto').value = '';
            document.getElementById('so').value = '';
            document.getElementById('telda').value = '';
            document.getElementById('segmen').value = '';
            document.getElementById('uic').value = '';
            document.getElementById('pic').value = '';
            document.getElementById('status').value = '';
            // document.querySelector('[name="start_date"]').value = '';
            // document.querySelector('[name="end_date"]').value = '';
            toggleClearButton();
        }

        document.addEventListener('DOMContentLoaded', toggleClearButton);

        function saveRowData(form) {
            const formData = new FormData(form);
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenMeta) {
                console.error("CSRF token meta tag not found!");
            } else {
                const csrfToken = csrfTokenMeta.content;
                fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: formData,
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            console.log("Data berhasil disimpan.");
                        } else {
                            console.error("Terjadi kesalahan:", data.message);
                        }
                    })
                    .catch((error) => {
                        console.error("Kesalahan AJAX:", error);
                    });
            }

        }
    </script>
    <script>
        console.log('Multi JavaStart');

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('dataModal');
            const closeModal = document.getElementById('closeModal');
            const dataRows = document.querySelectorAll('.data-row');

            const modalNomorSC = document.getElementById('modalNomorSC');
            const modalNamaPelanggan = document.getElementById('modalNamaPelanggan');
            const modalAlamatPelanggan = document.getElementById('modalAlamatPelanggan');
            const modalSTO = document.getElementById('modalSTO');
            const modalLayanan = document.getElementById('modalLayanan');
            const modalJenisLayanan = document.getElementById('modalJenisLayanan');
            const modalUIC = document.getElementById('modalUIC');
            const modalStatusKendala = document.getElementById('modalStatusKendala');
            const modalFeedback = document.getElementById('modalFeedback');

            dataRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    if (e.target.tagName === 'INPUT' || e.target.tagName === 'SELECT') {
                        return;
                    }

                    modalNomorSC.textContent = this.getAttribute('data-nomor-sc');
                    modalNamaPelanggan.textContent = this.getAttribute('data-nama-pelanggan');
                    modalAlamatPelanggan.textContent = this.getAttribute('data-alamat-pelanggan');
                    modalSTO.textContent = this.getAttribute('data-sto');
                    modalLayanan.textContent = this.getAttribute('data-layanan');
                    modalJenisLayanan.textContent = this.getAttribute('data-jenis-layanan');
                    modalUIC.textContent = this.getAttribute('data-uic');
                    modalStatusKendala.textContent = this.getAttribute('data-status-kendala');
                    modalFeedback.textContent = this.getAttribute('data-feedback');

                    modal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        document.querySelectorAll('.closeModalButton').forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal');
                document.getElementById(modalId).classList.add('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.querySelector('#multiEditButton');
            const deleteButton = document.querySelector('#multiDeleteButton');
            const editmodal = document.querySelector('#multiEditModal');
            const deletemodal = document.querySelector('#multiDeleteModal');
            const kendalaSelect = document.querySelector('#kendalaSelect');
            const userCheckboxes = document.querySelectorAll('.userCheckbox');
            const editform = document.querySelector('#multiEditForm');
            const deleteform = document.querySelector('#multiDeleteForm');
            const selectAllCheckbox = document.querySelector('#selectAll');

            function updateButtonVisibility() {
                const hasChecked = Array.from(userCheckboxes).some(checkbox => checkbox.checked);
                if (hasChecked) {
                    editButton.style.display = 'inline-block';
                    deleteButton.style.display = 'inline-block';
                } else {
                    editButton.style.display = 'none';
                    deleteButton.style.display = 'none';
                }
            }

            updateButtonVisibility();

            selectAllCheckbox.addEventListener('change', function() {
                userCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateButtonVisibility();
            });

            userCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateButtonVisibility);
            });

            // Multi Edit
            editButton.addEventListener('click', function() {
                const selectedIds = Array.from(userCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                if (selectedIds.length === 0) {
                    alert('Pilih setidaknya satu data untuk diedit.');
                    return;
                }

                editform.setAttribute('data-ids', JSON.stringify(selectedIds));
                editmodal.classList.remove('hidden');
            });

            // Multi Delete
            deleteButton.addEventListener('click', function() {
                const selectedIds = Array.from(userCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                if (selectedIds.length === 0) {
                    alert('Pilih setidaknya satu data untuk diedit.');
                    return;
                }

                deleteform.setAttribute('data-ids', JSON.stringify(selectedIds));
                deletemodal.classList.remove('hidden');
            });

            editform.addEventListener('submit', async function(e) {
                e.preventDefault();
                const selectedIds = JSON.parse(editform.getAttribute('data-ids'));
                const selectedFeedback = kendalaSelect.value;

                if (!selectedFeedback) {
                    showAlert('Pilih jenis kendala.', 'warning');
                    return;
                }

                try {
                    const response = await fetch('{{ route('dashboardMenu3.multiEdit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                        },
                        body: JSON.stringify({
                            ids: selectedIds,
                            id_feedback: selectedFeedback,
                        }),
                    });

                    const data = await response.json();
                    if (!response.ok) {
                        showAlert(data.message || 'Gagal memperbarui data.', 'error');
                        console.error(data.errors || data);
                        return;
                    }

                    showAlert(data.message || 'Data berhasil diperbarui.', 'success');
                    location.reload();
                } catch (error) {
                    console.error('Error:', error);
                    showAlert('Terjadi kesalahan saat mengedit data.', 'error');
                }
            });

            // Multi Delete
            deleteform.addEventListener('submit', async function(e) {
                e.preventDefault();
                const selectedIds = JSON.parse(deleteform.getAttribute('data-ids'));

                try {
                    const response = await fetch('{{ route('dashboardMenu3.multiDelete') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                        },
                        body: JSON.stringify({
                            ids: selectedIds
                        }),
                    });

                    const data = await response.json();
                    if (!response.ok) {
                        showAlert(data.message || 'Gagal menghapus data.', 'error');
                        console.error(data.errors || data);
                        return;
                    }

                    showAlert(data.message || 'Data berhasil dihapus.', 'success');
                    location.reload();
                } catch (error) {
                    console.error('Error:', error);
                    showAlert('Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        });
    </script>

</body>

</html>
