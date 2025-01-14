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
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    MENU 3
                </h2>
                <div class="hidden h-full py-1 sm:flex">
                    <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                </div>
                <ul class="flex flex-wrap items-center space-x-2">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('telkomsel') }}">
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
                            href="{{ route('manageDataMenu1') }}">
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
                <!-- Collapsible  Table -->
                <div x-data="{ isFilterExpanded: false }">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            {{-- Import Button --}}
                            <label
                                class="mr-4 btn relative bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 dark:active:bg-accent/90">
                                <input tabindex="-1" type="file"
                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0" />
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-file-excel"></i>
                                    <span>Import Excel</span>
                                </div>
                            </label>
                            {{-- Generate Button --}}
                            <label
                                class="mr-4 btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <input tabindex="-1" type="file"
                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0" />
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                    <span>Generate File</span>
                                </div>
                            </label>
                            {{-- Delete Button --}}
                            <div x-data="{ showModal: false }">
                                <button @click="showModal = true"
                                    class="btn relative bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 dark:active:bg-accent/90">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-trash"></i>
                                        <span>Delete</span>
                                    </div>
                                </button>
                                <template x-teleport="#x-teleport-target">
                                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                        x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                        <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                            @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"></div>
                                        <div class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                                            x-show="showModal" x-transition:enter="ease-out"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="inline size-28 text-error">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>


                                            <div class="mt-4">
                                                <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                                    Delete ?
                                                </h2>
                                                <p class="mt-2">
                                                    Are you sure you want to <b class="text-error">delete</b> the
                                                    selected data?
                                                    <br> this action cannot be undone!
                                                </p>
                                                <button @click="showModal = false"
                                                    class="btn mr-4 mt-6 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                    Cancel
                                                </button>
                                                <button @click="showModal = false"
                                                    class="btn mt-6 bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="flex">
                            {{-- Search Button --}}
                            <div class="flex items-center" x-data="{ isInputActive: false }">
                                <label class="block">
                                    <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                        :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                        class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                        placeholder="Search here..." type="text">
                                </label>
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
                                            <li x-data="{ showModal: false }" x-ref="popperRef"
                                                @click="isShowPopper = !isShowPopper">
                                                <button @click="showModal = true"
                                                    class="flex h-8 items-center space-x-3 px-3 pr-9 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-4.5">
                                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span> View Log Info</span>
                                                </button>
                                                <template x-teleport="#x-teleport-target">
                                                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                                        x-show="showModal" role="dialog"
                                                        @keydown.window.escape="showModal = false">
                                                        <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                            @click="showModal = false" x-show="showModal"
                                                            x-transition:enter="ease-out"
                                                            x-transition:enter-start="opacity-0"
                                                            x-transition:enter-end="opacity-100"
                                                            x-transition:leave="ease-in"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0"></div>
                                                        <div class="relative w-full max-w-2xl origin-bottom rounded-lg bg-white pb-4 transition-all duration-300 dark:bg-navy-700"
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
                                                                    Log Info
                                                                </h3>
                                                                <button @click="showModal = !showModal"
                                                                    class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="size-4.5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        stroke-width="2">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div
                                                                class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                                                <table class="w-full text-left">
                                                                    <thead>
                                                                        <tr
                                                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                            <th
                                                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                #
                                                                            </th>
                                                                            <th
                                                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                Name
                                                                            </th>
                                                                            <th
                                                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                Role
                                                                            </th>
                                                                            <th
                                                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                                Status
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                1</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Cy Ganderton
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Admin</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                <div
                                                                                    class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                                                    <div
                                                                                        class="size-2 rounded-full bg-current">
                                                                                    </div>
                                                                                    <span>Online</span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                2</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                StarCodeKh
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Teacher</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                <div
                                                                                    class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                                                    <div
                                                                                        class="size-2 rounded-full bg-current">
                                                                                    </div>
                                                                                    <span>Online</span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                3</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Konnor Guzman
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Moderator</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                <div
                                                                                    class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                                                    <div
                                                                                        class="size-2 rounded-full bg-current">
                                                                                    </div>
                                                                                    <span>Online</span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                4</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Alfredo Elliott
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Admin</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                <div
                                                                                    class="badge space-x-2.5 rounded-full bg-warning/10 text-warning dark:bg-warning/15">
                                                                                    <div
                                                                                        class="size-2 rounded-full bg-current">
                                                                                    </div>
                                                                                    <span>Offline</span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                5</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Derrick Simmons
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                Teacher</td>
                                                                            <td
                                                                                class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                                <div
                                                                                    class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                                                    <div
                                                                                        class="size-2 rounded-full bg-current">
                                                                                    </div>
                                                                                    <span>Offline</span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div
                                                                class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                                                                <div class="flex items-center space-x-2 text-xs+">
                                                                    <span>Show</span>
                                                                    <label class="block">
                                                                        <select
                                                                            class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                            <option>5</option>
                                                                            <option>10</option>
                                                                            <option>15</option>
                                                                        </select>
                                                                    </label>
                                                                    <span>entries</span>
                                                                </div>

                                                                <ol class="pagination">
                                                                    <li
                                                                        class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="size-4" fill="none"
                                                                                viewbox="0 0 24 24"
                                                                                stroke="currentColor"
                                                                                stroke-width="2">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M15 19l-7-7 7-7">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                    <li class="bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">1</a>
                                                                    </li>
                                                                    <li class="bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">2</a>
                                                                    </li>
                                                                    <li class="bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">3</a>
                                                                    </li>
                                                                    <li class="bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">4</a>
                                                                    </li>
                                                                    <li class="bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">5</a>
                                                                    </li>
                                                                    <li
                                                                        class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                                                        <a href="#"
                                                                            class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="size-4" fill="none"
                                                                                viewbox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2" d="M9 5l7 7-7 7">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    </li>
                                                                </ol>

                                                                <div class="text-xs+">1 - 5 of 5 entries</div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button
                                                                    class="btn mt-4 border border-primary/30 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:border-accent-light/30 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                                    Show All
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </li>
                                            <li x-data="{ showModal: false }" x-ref="popperRef"
                                                @click="isShowPopper = !isShowPopper">
                                                <button @click="showModal = true"
                                                    class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide text-success outline-none transition-all hover:bg-success/20 focus:bg-success/20">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-4.5">
                                                        <path fill-rule="evenodd"
                                                            d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                                                            clip-rule="evenodd" />
                                                        <path
                                                            d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                                    </svg>

                                                    <span> Generate .xlsx</span>
                                                </button>
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
                        <div class="max-w-2xl py-3">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                                <label class="block">
                                    <span>Employer name:</span>
                                    <div class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter Employer Name" type="text">
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="size-4.5 transition-colors duration-200" fill="none"
                                                viewbox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="1.5"
                                                    d="M5 19.111c0-2.413 1.697-4.468 4.004-4.848l.208-.035a17.134 17.134 0 015.576 0l.208.035c2.307.38 4.004 2.435 4.004 4.848C19 20.154 18.181 21 17.172 21H6.828C5.818 21 5 20.154 5 19.111zM16.083 6.938c0 2.174-1.828 3.937-4.083 3.937S7.917 9.112 7.917 6.937C7.917 4.764 9.745 3 12 3s4.083 1.763 4.083 3.938z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                </label>
                                <label class="block">
                                    <span>Project name:</span>
                                    <div class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter Project Name" type="text">
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
                                <label class="block">
                                    <span>From:</span>
                                    <div class="relative mt-1.5 flex">
                                        <input x-init="$el._x_flatpickr = flatpickr($el)"
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Choose start date..." type="text">
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
                                            placeholder="Choose start date..." type="text">
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
                                </label>
                                <div class="sm:col-span-2">
                                    <span>Project Status:</span>
                                    <div class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-5 lg:gap-6">
                                        <label class="inline-flex items-center space-x-2">
                                            <input
                                                class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:border-secondary checked:bg-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:checked:border-secondary-light dark:checked:bg-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                                                type="checkbox">
                                            <span>Upcoming</span>
                                        </label>
                                        <label class="inline-flex items-center space-x-2">
                                            <input
                                                class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                                type="checkbox">
                                            <span>In Progress</span>
                                        </label>
                                        <label class="inline-flex items-center space-x-2">
                                            <input checked=""
                                                class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                                                type="checkbox">
                                            <span>Complete</span>
                                        </label>
                                        <label class="inline-flex items-center space-x-2">
                                            <input checked=""
                                                class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:!border-error checked:bg-error hover:!border-error focus:!border-error dark:border-navy-400"
                                                type="checkbox">
                                            <span>Cancelled</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 space-x-1 text-right">
                                <button @click="isFilterExpanded = ! isFilterExpanded"
                                    class="btn font-medium text-slate-700 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    Cancel
                                </button>

                                <button @click="isFilterExpanded = ! isFilterExpanded"
                                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr>
                                        <th
                                            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            <label class="inline-flex items-center space-x-2">
                                                <input
                                                    class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                    type="checkbox" />
                                            </label>
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            #
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Avatar
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Name
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Phone
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Level
                                        </th>
                                        <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Stack
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5 text-xs+">
                                            Recent Log
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody x-data="{ expanded: false }">
                                    <tr class="border-y border-transparent">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <label class="inline-flex items-center space-x-2">
                                                <input
                                                    class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                    type="checkbox" />
                                            </label>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">1</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div class="avatar flex">
                                                <img class="rounded-full" src="images/avatar/avatar-3.jpg"
                                                    alt="avatar">
                                            </div>
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5 text-xs+">
                                            John Doe
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-xs+">
                                            443-893-2316
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-xs+">
                                            Level 1
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <button @click="expanded = !expanded"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <i :class="expanded && '-rotate-180'"
                                                    class="fas fa-chevron-down text-sm transition-transform"></i>
                                            </button>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
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
                                                            <li x-data="{ showModal: false }" x-ref="popperRef"
                                                                @click="isShowPopper = !isShowPopper">
                                                                <button @click="showModal = true"
                                                                    class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="size-4.5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        stroke-width="1.5">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                    <span> Modify Data </span>
                                                                </button>
                                                                <template x-teleport="#x-teleport-target">
                                                                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
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
                                                                            x-transition:leave-end="opacity-0"></div>
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
                                                                                    src="{{ asset('assets/images/avatar/avatar-3.jpg') }}"
                                                                                    alt="avatar" />
                                                                                <div
                                                                                    class="absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1 px-4 sm:px-12">
                                                                                <h3
                                                                                    class="text-lg text-slate-800 dark:text-navy-50">
                                                                                    John Doe
                                                                                </h3>

                                                                                <div class="text-left mt-5">
                                                                                    <span>Modify Division</span>
                                                                                    <label
                                                                                        class="mt-1.5 flex -space-x-px">
                                                                                        <div
                                                                                            class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                                            <span class="-mt-1">
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
                                                                                            class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                            <option>BMF</option>
                                                                                            <option>ASO</option>
                                                                                            <option>PSB</option>
                                                                                            <option>MDF</option>
                                                                                            <option>OPTIMA</option>
                                                                                            <option>WOC</option>
                                                                                        </select>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="text-left mt-5">
                                                                                    <span>Modify Role</span>
                                                                                    <label
                                                                                        class="mt-1.5 flex -space-x-px">
                                                                                        <div
                                                                                            class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                                            <span class="-mt-1">
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
                                                                                            class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                            <option>Admin</option>
                                                                                            <option>Super Admin</option>
                                                                                        </select>
                                                                                    </label>
                                                                                </div>

                                                                                <p
                                                                                    class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                    Are you sure you want to <b
                                                                                        class="text-info">modify </b>
                                                                                    this
                                                                                    user ?
                                                                                    <br>
                                                                                    this action cannot be undone.
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500">
                                                                            </div>

                                                                            <div class="space-x-3">
                                                                                <button @click="showModal = false"
                                                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                    Cancel
                                                                                </button>
                                                                                <div class="inline-flex"
                                                                                    @click="$notification({text:'The user information has been modified',variant:'info',position:'center-top'})">
                                                                                    <button @click="showModal = false"
                                                                                        class="btn min-w-[7rem] rounded-full bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 dark:hover:bg-info-focus dark:focus:bg-info-focus">
                                                                                        Modify
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </li>
                                                            <li x-data="{ showModal: false }" x-ref="popperRef"
                                                                @click="isShowPopper = !isShowPopper">
                                                                <button @click="showModal = true"
                                                                    class="flex h-8 items-center space-x-4 px-3 pr-8 font-medium tracking-wide text-error outline-none transition-all hover:bg-error/20 focus:bg-error/20">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="size-4.5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        stroke-width="1.5">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                    <span> Delete Data</span>
                                                                </button>
                                                                <template x-teleport="#x-teleport-target">
                                                                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
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
                                                                            x-transition:leave-end="opacity-0"></div>
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
                                                                                    src="{{ asset('assets/images/avatar/avatar-3.jpg') }}"
                                                                                    alt="avatar" />
                                                                                <div
                                                                                    class="absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1 px-4 sm:px-12">
                                                                                <h3
                                                                                    class="text-lg text-slate-800 dark:text-navy-50">
                                                                                    John Doe
                                                                                </h3>
                                                                                <p
                                                                                    class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                    Are you sure you want to <b
                                                                                        class="text-error">delete </b>
                                                                                    this
                                                                                    user ?
                                                                                    <br>
                                                                                    this action cannot be undone.
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500">
                                                                            </div>

                                                                            <div class="space-x-3">
                                                                                <button @click="showModal = false"
                                                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                    Cancel
                                                                                </button>
                                                                                <div class="inline-flex"
                                                                                    @click="$notification({text:'The user has been deleted',variant:'error',position:'center-top'})">
                                                                                    <button @click="showModal = false"
                                                                                        class="btn min-w-[7rem] rounded-full bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 dark:hover:bg-error-focus dark:focus:bg-error-focus">
                                                                                        Delete
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td colspan="100" class="p-0">
                                            <div x-show="expanded" x-collapse="">
                                                <div class="px-4 pb-4 sm:px-5">
                                                    <p>
                                                        Lorem ipsum dolor, sit amet consectetur
                                                        adipisicing elit. Aut amet sunt repudiandae!
                                                    </p>
                                                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                                        <table class="is-hoverable w-full text-left">
                                                            <thead>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        #
                                                                    </th>
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        Name
                                                                    </th>
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        Job
                                                                    </th>
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        Favorite Color
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        1
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Cy Ganderton
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Quality Control Specialist
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Blue
                                                                    </td>
                                                                </tr>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        2
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Hart Hagerty
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Desktop Support Technician
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Purple
                                                                    </td>
                                                                </tr>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        3
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Brice Swyre
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Tax Accountant
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Red
                                                                    </td>
                                                                </tr>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        4
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Marjy Ferencz
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Office Assistant I
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Crimson
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="text-right">
                                                        <button @click="expanded = false"
                                                            class="btn mt-2 h-8 rounded px-3 text-xs+ font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                            Hide
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody x-data="{ expanded: false }">
                                    <tr class="border-y border-transparent">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <label class="inline-flex items-center space-x-2">
                                                <input
                                                    class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                    type="checkbox" />
                                            </label>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">2</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div class="avatar flex">
                                                <img class="rounded-full" src="images/avatar/avatar-8.jpg"
                                                    alt="avatar">
                                            </div>
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                            Sabina Mores
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            684-4161-8911
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            Level 2
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <button @click="expanded = !expanded"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <i :class="expanded && '-rotate-180'"
                                                    class="fas fa-chevron-down text-sm transition-transform"></i>
                                            </button>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
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
                                                            <li x-data="{ showModal: false }" x-ref="popperRef"
                                                                @click="isShowPopper = !isShowPopper">
                                                                <button @click="showModal = true"
                                                                    class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="size-4.5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        stroke-width="1.5">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                    <span> Modify Data </span>
                                                                </button>
                                                                <template x-teleport="#x-teleport-target">
                                                                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
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
                                                                            x-transition:leave-end="opacity-0"></div>
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
                                                                                    src="{{ asset('assets/images/avatar/avatar-3.jpg') }}"
                                                                                    alt="avatar" />
                                                                                <div
                                                                                    class="absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1 px-4 sm:px-12">
                                                                                <h3
                                                                                    class="text-lg text-slate-800 dark:text-navy-50">
                                                                                    John Doe
                                                                                </h3>

                                                                                <div class="text-left mt-5">
                                                                                    <span>Modify Division</span>
                                                                                    <label
                                                                                        class="mt-1.5 flex -space-x-px">
                                                                                        <div
                                                                                            class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                                            <span class="-mt-1">
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
                                                                                            class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                            <option>BMF</option>
                                                                                            <option>ASO</option>
                                                                                            <option>PSB</option>
                                                                                            <option>MDF</option>
                                                                                            <option>OPTIMA</option>
                                                                                            <option>WOC</option>
                                                                                        </select>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="text-left mt-5">
                                                                                    <span>Modify Role</span>
                                                                                    <label
                                                                                        class="mt-1.5 flex -space-x-px">
                                                                                        <div
                                                                                            class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                                                                                            <span class="-mt-1">
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
                                                                                            class="form-select w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                                                                            <option>Admin</option>
                                                                                            <option>Super Admin</option>
                                                                                        </select>
                                                                                    </label>
                                                                                </div>

                                                                                <p
                                                                                    class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                    Are you sure you want to <b
                                                                                        class="text-info">modify </b>
                                                                                    this
                                                                                    user ?
                                                                                    <br>
                                                                                    this action cannot be undone.
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500">
                                                                            </div>

                                                                            <div class="space-x-3">
                                                                                <button @click="showModal = false"
                                                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                    Cancel
                                                                                </button>
                                                                                <div class="inline-flex"
                                                                                    @click="$notification({text:'The user information has been modified',variant:'info',position:'center-top'})">
                                                                                    <button @click="showModal = false"
                                                                                        class="btn min-w-[7rem] rounded-full bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 dark:hover:bg-info-focus dark:focus:bg-info-focus">
                                                                                        Modify
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </li>
                                                            <li x-data="{ showModal: false }" x-ref="popperRef"
                                                                @click="isShowPopper = !isShowPopper">
                                                                <button @click="showModal = true"
                                                                    class="flex h-8 items-center space-x-4 px-3 pr-8 font-medium tracking-wide text-error outline-none transition-all hover:bg-error/20 focus:bg-error/20">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="size-4.5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        stroke-width="1.5">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                    <span> Delete Data</span>
                                                                </button>
                                                                <template x-teleport="#x-teleport-target">
                                                                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
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
                                                                            x-transition:leave-end="opacity-0"></div>
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
                                                                                    src="{{ asset('assets/images/avatar/avatar-3.jpg') }}"
                                                                                    alt="avatar" />
                                                                                <div
                                                                                    class="absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-secondary dark:border-navy-700">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-1 px-4 sm:px-12">
                                                                                <h3
                                                                                    class="text-lg text-slate-800 dark:text-navy-50">
                                                                                    John Doe
                                                                                </h3>
                                                                                <p
                                                                                    class="mt-8 text-slate-500 dark:text-navy-200">
                                                                                    Are you sure you want to <b
                                                                                        class="text-error">delete </b>
                                                                                    this
                                                                                    user ?
                                                                                    <br>
                                                                                    this action cannot be undone.
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500">
                                                                            </div>

                                                                            <div class="space-x-3">
                                                                                <button @click="showModal = false"
                                                                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                    Cancel
                                                                                </button>
                                                                                <div class="inline-flex"
                                                                                    @click="$notification({text:'The user has been deleted',variant:'error',position:'center-top'})">
                                                                                    <button @click="showModal = false"
                                                                                        class="btn min-w-[7rem] rounded-full bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 dark:hover:bg-error-focus dark:focus:bg-error-focus">
                                                                                        Delete
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td colspan="100" class="p-0">
                                            <div x-show="expanded" x-collapse="">
                                                <div class="px-4 pb-4 sm:px-5">
                                                    <p>
                                                        Lorem ipsum dolor, sit amet consectetur
                                                        adipisicing elit. Aut amet sunt repudiandae!
                                                    </p>
                                                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                                        <table class="is-hoverable w-full text-left">
                                                            <thead>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        #
                                                                    </th>
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        Name
                                                                    </th>
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        Job
                                                                    </th>
                                                                    <th
                                                                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                                        Favorite Color
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        1
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Cy Ganderton
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Quality Control Specialist
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Blue
                                                                    </td>
                                                                </tr>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        2
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Hart Hagerty
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Desktop Support Technician
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Purple
                                                                    </td>
                                                                </tr>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        3
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Brice Swyre
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Tax Accountant
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Red
                                                                    </td>
                                                                </tr>
                                                                <tr
                                                                    class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        4
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Marjy Ferencz
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Office Assistant I
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                        Crimson
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="text-right">
                                                        <button @click="expanded = false"
                                                            class="btn mt-2 h-8 rounded px-3 text-xs+ font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                            Hide
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- Table Pagination --}}
                        <div
                            class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                            <div class="flex items-center space-x-2 text-xs+">
                                <span>Show</span>
                                <label class="block">
                                    <select
                                        class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                        <option>10</option>
                                        <option>30</option>
                                        <option>50</option>
                                    </select>
                                </label>
                                <span>entries</span>
                            </div>

                            <ol class="pagination">
                                <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">1</a>
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">2</a>
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">3</a>
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">4</a>
                                </li>
                                <li class="bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">5</a>
                                </li>
                                <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                    <a href="#"
                                        class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ol>

                            <div class="text-xs+">1 - 10 of 10 entries</div>
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
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</body>

</html>
