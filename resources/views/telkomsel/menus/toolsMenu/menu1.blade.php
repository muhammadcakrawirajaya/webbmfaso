<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tools Menu 1 - Telescout</title>
    @include('includes.head')
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .card-header {
            background: linear-gradient(90deg, lightgreen, green);
            color: white;
            padding: 20px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .rounded-circle {
            border: 4px solid #ddd;
            transition: all 0.3s ease;
        }

        .rounded-circle:hover {
            border-color: #007bff;
            transform: scale(1.05);
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .card-body {
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .col-md-6 {
            width: 100%;
        }

        @media (min-width: 768px) {
            .col-md-6 {
                width: 48%;
            }
        }

        .text-center {
            text-align: center;
        }

        img {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body x-data="" class="is-header-blur is-sidebar-open" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    @include('includes.preloader')

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
        <!-- Sidebar -->
        @include('telkomsel.menus.toolsMenu.toolsMenus')

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
                    Web settings
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

                            <span>Web settingss</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                <div class="flex items-center justify-between">
                    <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                        Settings List
                    </h2>
                </div>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5>Data Master Settings</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('toolsMenu1.update', ['setting' => $settings->id_user]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Bulan :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="bulan" id="bulan" value="1"
                                                    {{ $settings->bulan == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">SO :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="so" id="so" value="1"
                                                    {{ $settings->so == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">STO :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="sto" id="sto" value="1"
                                                    {{ $settings->sto == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Telda :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="telda" id="telda" value="1"
                                                    {{ $settings->telda == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Segmen :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="segmen" id="segmen" value="1"
                                                    {{ $settings->segmen == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">UIC :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="uic" id="uic" value="1"
                                                    {{ $settings->uic == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Feedback PIC :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="feedback" id="feedback" value="1"
                                                    {{ $settings->feedback == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Status Kendala
                                                :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                                            <label class="switch">
                                                <input type="checkbox" name="status" id="status" value="1"
                                                    {{ $settings->status == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Search Bar :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="search" id="search" value="1"
                                                    {{ $settings->search == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between py-3">
                                            <span class="font-medium text-gray-600">Export :</span>
                                            <label class="switch">
                                                <input type="checkbox" name="export" id="export" value="1"
                                                    {{ $settings->export == 1 ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="space-x-2 text-center py-5">
                                            <button type="submit"
                                                class="btn min-w-[7rem] rounded-full bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
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
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</body>

</html>
