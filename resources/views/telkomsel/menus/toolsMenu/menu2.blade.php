<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tools Menu 2 - Telescout</title>
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
            background: linear-gradient(90deg, #007bff, #0056b3);
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
                    User Profile
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

                            <span>User Profile</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5>User Profile</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('toolsMenu2.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Foto Profil -->
                                        <div class="text-center mb-4 py-2">
                                            <img src="{{ asset('storage/'.$user->karyawan->foto ?? 'assets/images/logo-brand.png') }}"
                                                alt="Foto Profil" class="rounded-circle border" width="150"
                                                height="150">
                                            <div class="mt-3">
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Grid Layout -->
                                        <div class="row">
                                            <!-- Nama -->
                                            <div class="col-md-6 mb-3">
                                                <label for="nama" class="label">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                                <input type="text" name="nama" id="nama" class="form-control"
                                                    value="{{ $user->karyawan->nama }}" required>
                                            </div>

                                            <!-- Telegram -->
                                            <div class="col-md-6 mb-3">
                                                <label for="telegram" class="label">Telegram &nbsp;:</label>
                                                <input type="text" name="telegram" id="telegram"
                                                    class="form-control" value="{{ $user->karyawan->telegram }}">
                                            </div>

                                            <!-- Division -->
                                            <div class="col-md-6 mb-3">
                                                <label for="division" class="label">Division &nbsp;&nbsp;&nbsp;:</label>
                                                <input type="text" name="division" id="division"
                                                    class="form-control" value="{{ $user->division }}" readonly>
                                            </div>

                                            <!-- Role -->
                                            <div class="col-md-6 mb-3">
                                                <label for="role" class="label">Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                                <input type="text" name="role" id="role"
                                                    class="form-control" value="{{ $user->role }}" readonly>
                                            </div>

                                            <!-- Username -->
                                            <div class="col-md-6 mb-3">
                                                <label for="username" class="label">Username :</label>
                                                <input type="text" name="username" id="username"
                                                    class="form-control" value="{{ $user->username }}" required>
                                            </div>

                                            <!-- Password -->
                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="label">Password :</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="******">
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-success">Submit</button>
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
