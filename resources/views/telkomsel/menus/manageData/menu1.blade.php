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
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Log Data Management
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

                            <span>Log Data Management</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

                <!-- User List Table -->
                <div>
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            Log List
                        </h2>
                        <div class="flex mr-4">
                            <div class="flex items-center" x-data="{ isInputActive: false }">
                                <form action="{{ route('manageDataMenu1.index') }}" method="GET">
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
                        </div>
                    </div>
                    <div class="card mt-3">
                        @if ($editLogs->count())
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
                                                Nama Table
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                isi Edit
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Dedit oleh
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Tanggal Edit
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-primary-focus font-medium text-white px-2 rounded-tr-lg focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs border font-semibold uppercase">
                                                Waktu Edit
                                            </th>
                                        </tr>
                                    </thead>
                                    @isset($editLogs)
                                        <tbody>
                                            {{-- LIST --}}
                                            @isset($editLogs)
                                                @foreach ($editLogs as $index => $log)
                                                    <tr class="border-y border-transparent">
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            {{ $editLogs->firstItem() + $index }}</td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            {{ $log['model_type'] }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            <input type="text" name="data[{{ $index }}][edit_data]"
                                                                value="{{ print_r($log['edit_data'], true) }}"
                                                                class="auto-save" data-row="{{ $index }}" readonly>
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            {{ $log['updated_by'] ?? 'Unknown' }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            {{ $log['date'] }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-2 py-1 text-xs border">
                                                            {{ $log['time'] }}
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    @endisset
                                </table>
                            </div>
                        @else
                            <br>
                            <p class="text-center">Tidak menemukan data yang cocok</p><br>
                        @endif

                        @isset($editLogs)
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
                                    @if ($editLogs->lastPage() > 5)
                                        <nav role="navigation" aria-label="Pagination Navigation" class="pagination">
                                            {{-- First Page Link --}}
                                            @if ($editLogs->currentPage() > 3)
                                                <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $editLogs->url(1) }}"
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
                                            @if (!$editLogs->onFirstPage())
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $editLogs->previousPageUrl() }}"
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
                                            @foreach (range(max(1, $editLogs->currentPage() - 2), min($editLogs->lastPage(), $editLogs->currentPage() + 2)) as $page)
                                                @if ($page == $editLogs->currentPage())
                                                    <li class="active bg-slate-150 dark:bg-navy-500">
                                                        <a href="#"
                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                    </li>
                                                @else
                                                    <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                        <a href="{{ $editLogs->url($page) }}"
                                                            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($editLogs->hasMorePages())
                                                <li class="bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $editLogs->nextPageUrl() }}"
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
                                            @if ($editLogs->currentPage() < $editLogs->lastPage() - 2)
                                                <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $editLogs->url($editLogs->lastPage()) }}"
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
                                        @foreach (range(1, $editLogs->lastPage()) as $page)
                                            @if ($page == $editLogs->currentPage())
                                                <li class="active bg-slate-150 dark:bg-navy-500">
                                                    <a href="#"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="pagination-link bg-slate-150 dark:bg-navy-500">
                                                    <a href="{{ $editLogs->url($page) }}"
                                                        class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ol>
                                <div class="text-xs+">
                                    <b>{{ $editLogs->count() }}</b> of <b>{{ $editLogs->total() }}</b> entries
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
