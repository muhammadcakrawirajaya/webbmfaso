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
                    Check Complete
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
                    {{-- <li class="flex items-center space-x-2">
                        <a class="flex items-center space-x-1.5 text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('telkomsel.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>

                            <span>Dashboard - Telkomsel</span>
                        </a>
                        <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li> --}}
                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4.5">
                                <path fill-rule="evenodd"
                                    d="M3 3.5A1.5 1.5 0 0 1 4.5 2h6.879a1.5 1.5 0 0 1 1.06.44l4.122 4.12A1.5 1.5 0 0 1 17 7.622V16.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 3 16.5v-13Zm10.857 5.691a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 0 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span>Check Complete</span>
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
                            <form id="uploadForm" action="{{ route('dashboardMenu4.preview') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label
                                    class="mr-4 btn relative bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 dark:active:bg-accent/90">
                                    <input tabindex="-1" type="file" name="file" id="file" required
                                        accept=".xls,.xlsx,.csv"
                                        class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                        onchange="submituploadForm()" />
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-file-excel"></i>
                                        <span>Import</span>
                                    </div>
                                </label>
                            </form>
                            {{-- Generate Button --}}
                            @isset($data)
                                <button id="saveButton">
                                    <label
                                        class="mr-4 btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        <div class="flex items-center space-x-2">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                            <span>Save</span>
                                        </div>
                                    </label>
                                </button>
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
                                                x-transition:leave-end="opacity-0">
                                            </div>
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
                                                        Delete Data ?
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
                                                    <button @click="showModal = false" id="deleteSelected"
                                                        class="btn mt-6 bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            @endisset
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr>
                                        <th
                                            class="whitespace-nowrap p-2 rounded-tl-lg bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus">
                                            <label class="inline-flex items-center">
                                                <input
                                                    class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                    type="checkbox" id="selectAll">
                                            </label>
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs+ text-xs font-semibold uppercase">
                                            No
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs+ text-xs font-semibold uppercase">
                                            Nomer SC
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs+ text-xs font-semibold uppercase">
                                            sto
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs+ text-xs font-semibold uppercase">
                                            order date
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs+ text-xs font-semibold uppercase">
                                            customer name
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-primary-focus font-medium text-white rounded-tr-lg focus:bg-primary-focus dark:bg-accent dark:focus:bg-accent-focus text-xs+ text-xs font-semibold uppercase">
                                            status resume
                                        </th>
                                    </tr>
                                </thead>
                                @isset($data)
                                    <form id="uploadDatabase" action="{{ route('dashboardMenu4.store') }}"
                                        method="POST">
                                        @csrf
                                        @foreach ($data as $index => $row)
                                            <tbody x-data="{ expanded: false }">
                                                <tr class="border-y border-transparent" data-index="{{ $index }}">
                                                    <td class="whitespace-nowrap px-2 py-1 border">
                                                        <label class="inline-flex items-center space-x-2">
                                                            <input
                                                                class="form-checkbox is-basic size-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                                type="checkbox" class="userCheckbox"
                                                                name="selected_ids[]" value="">
                                                            <label for="checkbox"></label>
                                                        </label>
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-1 border">{{ $index + 1 }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-1 border">
                                                        <input type="text" name="data[{{ $index }}][order_id]"
                                                            value="{{ $row['order_id'] }}">
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-1 border">
                                                        <input type="text" name="data[{{ $index }}][sto]"
                                                            value="{{ $row['sto'] }}">
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-1 border">
                                                        <input type="text"
                                                            name="data[{{ $index }}][order_date]"
                                                            value="{{ $row['order_date'] }}">
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-1 border">
                                                        <input type="text"
                                                            name="data[{{ $index }}][customer_name]"
                                                            value="{{ $row['customer_name'] }}">
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-1 border">
                                                        <input type="text"
                                                            name="data[{{ $index }}][status_resume]"
                                                            value="{{ $row['status_resume'] }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </form>
                                @endisset
                            </table>
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
    <script type="text/javascript">
        console.log('JavaStart');

        function submituploadForm() {
            document.getElementById("uploadForm").submit();
        }

        document.getElementById('saveButton').addEventListener('click', function() {
            document.getElementById('uploadDatabase').submit();
        });

        document.getElementById('selectAll').addEventListener('change', function() {
            const isChecked = this.checked;
            const checkboxes = document.querySelectorAll('table input[type="checkbox"]:not(#selectAll)');

            checkboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        });

        document.body.addEventListener('click', function(event) {
            if (event.target.id === 'deleteSelected') {
                const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                console.log(selectedCheckboxes);
                if (selectedCheckboxes.length === 0) {
                    alert('Pilih setidaknya satu data untuk dihapus.');
                    return;
                }

                selectedCheckboxes.forEach(function(checkbox) {
                    const row = checkbox.closest('tr');
                    console.log(row);
                    if (row) {
                        row.remove();
                    } else {
                        console.error('Baris tidak ditemukan untuk checkbox:', checkbox);
                    }
                });
            }
        });
    </script>
</body>

</html>
