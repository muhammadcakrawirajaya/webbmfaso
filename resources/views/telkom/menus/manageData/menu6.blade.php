<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Data Menu 6 - Telescout</title>
    @include('includes.head')
</head>

<body x-data="" class="is-header-blur is-sidebar-open" x-bind="$store.global.documentBody">
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
    <main class="main-content w-full pb-8 flex justify-center">
        <h2 class="text-base font-medium tracking-wide text-slate-800 line-clamp-1 dark:text-navy-100">
            Manage Data Menu 6
          </h2>
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
