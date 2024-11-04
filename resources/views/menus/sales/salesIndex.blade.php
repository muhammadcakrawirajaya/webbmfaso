<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sales - Telescout</title>
    @include('includes.header')

</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">

    <!-- ======= Sidebar Menu Overlay ======= -->
    <div x-cloak="" class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        @click="$store.app.toggleSidebar()">
    </div>
    <!-- End of Sidebar Menu Overlay -->

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
        @include('menus.sales.salesSidebar')
        <!-- End of Sidebar -->

        <div class="main-content flex min-h-screen flex-col">

            <!-- ======= Navbar ======= -->
            @include('includes.navbar')
            <!-- End of Navbar -->

            <div class="animate__animated p-6" :class="[$store.app.animation]">

                <!-- ======= Main Content ======= -->
                @include('menus.sales.salesMainContent')
                <!-- End of Main Content -->
            </div>

            <!-- ======= Footer ======= -->
            @include('includes.footer')
            <!-- End of Footer -->
        </div>
    </div>

    <!-- ======= Scripts ======= -->
    @include('menus.sales.salesContentScripts')
    <!-- End of Scripts -->

</body>

</html>
