<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <title>Manage User - Telescout</title>
    @include('includes.header')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/custom.css') }}">

</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak="" class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        @click="$store.app.toggleSidebar()"></div>

    <!-- ======= Screen Loader ======= -->
    @include('includes.screenLoader')
    <!-- End of Screen Loader-->

    <!-- ======= Back to Top Button ======= -->
    @include('includes.backToTop')
    <!-- End of Back to Top Button-->

    <!-- ======= Theme Customizer Section ======= -->
    @include('includes.themeCustomizerSection')
    <!-- End of Theme Customizer Section -->

    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">

        <!-- ======= Sidebar ======= -->
        @include('includes.sidebar')
        <!-- End of Sidebar Section -->

        <div class="main-content flex flex-col min-h-screen">

            <!-- ======= Navbar ======= -->
            @include('includes.navbar')
            <!-- End of Navbar -->

            <div class="animate__animated p-6" :class="[$store.app.animation]">

                <!-- ======= Main Content ======= -->
                @include('menus.manageUser.manageUserMainContent')
                <!-- End of Main Content -->

            </div>

            <!-- ======= Footer ======= -->
            @include('includes.footer')
            <!-- End of Footer -->
        </div>
    </div>

    <!-- ======= Scripts ======= -->
    @include('includes.scripts')
    <!-- End of Scripts -->

    <!-- ======= Content Scripts ======= -->
    @include('menus.manageUser.manageUserContentScripts')
    <!-- End of Content Scripts -->

</body>

</html>
