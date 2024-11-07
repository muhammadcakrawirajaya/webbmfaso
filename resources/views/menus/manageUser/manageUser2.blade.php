<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Manage User 2 - Telescout</title>
    @include('includes.head')
  </head>

  <body x-data="" x-bind="$store.global.documentBody" class="is-header-blur is-sidebar-open">
    <!-- App preloader-->
    @include('includes.preloader')

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
      <!-- Sidebar -->
      @include('menus.manageUser.manageUserMenus')

      <!-- App Header Wrapper-->
      @include('includes.navbar')

      <!-- Mobile Searchbar -->
      @include('includes.searchBar')

      <!-- Right Sidebar -->
      @include('includes.rightSidebar')

      <!-- Main Content Wrapper -->
      <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
        >
          Origin Top
        </button>
        <template x-teleport="#x-teleport-target">
          <div
            class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
            x-show="showModal"
            role="dialog"
            @keydown.window.escape="showModal = false"
          >
            <div
              class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
              @click="showModal = false"
              x-show="showModal"
              x-transition:enter="ease-out"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="ease-in"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
            ></div>
            <div
              class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
              x-show="showModal"
              x-transition:enter="easy-out"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="easy-in"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
            >
              <div
                class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5"
              >
                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                  Edit Pin
                </h3>
                <button
                  @click="showModal = !showModal"
                  class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-4.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"
                    ></path>
                  </svg>
                </button>
              </div>
              <div class="px-4 py-4 sm:px-5">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Assumenda incidunt
                </p>
                <div class="mt-4 space-y-4">
                  <label class="block">
                    <span>Choose category :</span>
                    <select
                      class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                      <option>Laravel</option>
                      <option>Node JS</option>
                      <option>Django</option>
                      <option>Other</option>
                    </select>
                  </label>
                  <label class="block">
                    <span>Description:</span>
                    <textarea
                      rows="4"
                      placeholder=" Enter Text"
                      class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    ></textarea>
                  </label>
                  <label class="block">
                    <span>Website Address:</span>
                    <input
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="URL Address"
                      type="text"
                    />
                  </label>
                  <label class="inline-flex items-center space-x-2">
                    <input
                      class="form-switch is-outline h-5 w-10 rounded-full border border-slate-400/70 bg-transparent before:rounded-full before:bg-slate-300 checked:border-primary checked:before:bg-primary dark:border-navy-400 dark:before:bg-navy-300 dark:checked:border-accent dark:checked:before:bg-accent"
                      type="checkbox"
                    />
                    <span>Public pin</span>
                  </label>
                  <div class="space-x-2 text-right">
                    <button
                      @click="showModal = false"
                      class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      Cancel
                    </button>
                    <button
                      @click="showModal = false"
                      class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                      Apply
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </template>
      </div>
      <div x-data="{showModal:false}">
        <button
          @click="showModal = true"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
        >
          Origin bottom
        </button>
        <template x-teleport="#x-teleport-target">
          <div
            class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
            x-show="showModal"
            role="dialog"
            @keydown.window.escape="showModal = false"
          >
            <div
              class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
              @click="showModal = false"
              x-show="showModal"
              x-transition:enter="ease-out"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="ease-in"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
            ></div>
            <div
              class="relative w-full max-w-2xl origin-bottom rounded-lg bg-white pb-4 transition-all duration-300 dark:bg-navy-700"
              x-show="showModal"
              x-transition:enter="easy-out"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="easy-in"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
            >
              <div
                class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5"
              >
                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                  Users Status
                </h3>
                <button
                  @click="showModal = !showModal"
                  class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-4.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"
                    ></path>
                  </svg>
                </button>
              </div>
              <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="w-full text-left">
                  <thead>
                    <tr
                      class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                    >
                      <th
                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                      >
                        #
                      </th>
                      <th
                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                      >
                        Name
                      </th>
                      <th
                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                      >
                        Role
                      </th>
                      <th
                        class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"
                      >
                        Status
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                    >
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">1</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        Cy Ganderton
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">Admin</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div
                          class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                        >
                          <div class="size-2 rounded-full bg-current"></div>
                          <span>Online</span>
                        </div>
                      </td>
                    </tr>
                    <tr
                      class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                    >
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">2</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        StarCodeKh
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">Teacher</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div
                          class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                        >
                          <div class="size-2 rounded-full bg-current"></div>
                          <span>Online</span>
                        </div>
                      </td>
                    </tr>
                    <tr
                      class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                    >
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">3</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        Konnor Guzman
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">Moderator</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div
                          class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                        >
                          <div class="size-2 rounded-full bg-current"></div>
                          <span>Online</span>
                        </div>
                      </td>
                    </tr>
                    <tr
                      class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                    >
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">4</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        Alfredo Elliott
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">Admin</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div
                          class="badge space-x-2.5 rounded-full bg-warning/10 text-warning dark:bg-warning/15"
                        >
                          <div class="size-2 rounded-full bg-current"></div>
                          <span>Offline</span>
                        </div>
                      </td>
                    </tr>
                    <tr
                      class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                    >
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">5</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        Derrick Simmons
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">Teacher</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div
                          class="badge space-x-2.5 rounded-full bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"
                        >
                          <div class="size-2 rounded-full bg-current"></div>
                          <span>Offline</span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="text-center">
                <button
                  class="btn mt-4 border border-primary/30 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:border-accent-light/30 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                >
                  Show All
                </button>
              </div>
            </div>
          </div>
        </template>
      </div>
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
