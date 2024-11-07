<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage User - Telescout</title>
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
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Table Advanced
                </h2>
                <div class="hidden h-full py-1 sm:flex">
                    <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                </div>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="#">Components</a>
                        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                            viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </li>
                    <li>Table Advanced</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

                <!-- User List Table -->
                <div>
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            User List
                        </h2>
                        <div class="flex mr-4">
                            <div class="flex items-center mr-4" x-data="{ isInputActive: false }">
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

                            <div x-data="{showModal:false}">
                                <button
                                    x-tooltip.duration.500="'Add New'"
                                    @click="showModal = true"
                                class="btn size-9 bg-success p-0 font-medium text-white hover:bg-success-focus hover:shadow-lg hover:shadow-success/50 focus:bg-success-focus focus:shadow-lg focus:shadow-success/50 active:bg-success-focus/90"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                              </svg>

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
                                        Add New
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
                                      <div class=" space-y-4">
                                        <label class="block">
                                            <span>Name:</span>
                                            <input
                                              class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              placeholder="Enter Name"
                                              type="text"
                                            />
                                          </label>
                                        <label class="block">
                                            <span>Username:</span>
                                            <input
                                              class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              placeholder="Enter Username"
                                              type="text"
                                            />
                                          </label>
                                        <label class="block">
                                            <span>Telegram:</span>
                                            <input
                                              class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              placeholder="Enter Username"
                                              type="text"
                                            />
                                          </label>

                                        <label class="block">
                                          <span>Choose Division :</span>
                                          <select
                                            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                          >
                                            <option>BMF</option>
                                            <option>ASO</option>
                                            <option>PSB</option>
                                            <option>MDF</option>
                                            <option>OPTIMA</option>
                                          </select>
                                        </label>

                                        <label class="block">
                                            <span>Password:</span>
                                            <input
                                              class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              placeholder="Enter Username"
                                              type="password"
                                            />
                                          </label>

                                        <label class="block">
                                            <span>Confirm Password :</span>
                                            <input
                                              class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              placeholder="Enter Password"
                                              type="password"
                                            />
                                          </label>

                                          <label class="block">
                                              <label class="inline-flex items-center space-x-1 mr-3">
                                                <input
                                                checked
                                                  class="form-radio is-basic size-5 rounded-full border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                                                  name="basic"
                                                  type="radio"
                                                />
                                                <p>Admin</p>
                                              </label>

                                              <label class="inline-flex items-center space-x-1">
                                                <input
                                                  class="form-radio is-basic size-5 rounded-full border-slate-400/70 checked:border-secondary checked:bg-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:checked:border-secondary-light dark:checked:bg-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                                                  name="basic"
                                                  type="radio"
                                                />
                                                <p>Super Admin</p>
                                              </label>

                                          </label>

                                          <label
                                          class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 mr-3"
                                        >
                                          <input
                                            tabindex="-1"
                                            type="file"
                                            class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                          />
                                          <div class="flex items-center space-x-2">
                                            <i class="fa-solid fa-cloud-arrow-up text-base"></i>
                                            <span>Choose Photo</span>
                                          </div>
                                        </label>
                                        <span>photo_file_name.jpg</span>

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
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-left">
                                {{-- Head --}}
                                <thead>
                                    <tr>
                                        <th
                                            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            No
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Photo
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Name
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Division
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telegram
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Role
                                        </th>
                                        <th
                                            class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">

                                        </th>
                                    </tr>
                                </thead>

                                {{-- LIST --}}
                                {{-- List - 1 --}}
                                <tr class="border-y border-transparent">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">1</td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="avatar flex">
                                            <img class="rounded-full"
                                                src="{{ asset('assets/images/avatar/avatar-3.jpg') }}" alt="avatar">
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                        John Doe
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        443-893-2316
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        Level 1
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex space-x-2">
                                            <div
                                                class="badge rounded-full border border-secondary text-secondary dark:border-secondary-light dark:text-secondary-light">
                                                Super Admin
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })"
                                            @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                                    viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                                                        <li>
                                                            <a href="#"
                                                                class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="size-4.5" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="1.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                                <span> Edit</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide text-error outline-none transition-all hover:bg-error/20 focus:bg-error/20">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="size-4.5" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="1.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                <span> Delete item</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"></tr>

                                {{-- List - 2 --}}
                                <tr class="border-y border-transparent">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">2</td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="avatar flex">
                                            <img class="rounded-full"
                                                src="{{ asset('assets/images/avatar/avatar-4.jpg') }}" alt="avatar">
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                        John Doe
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        443-893-2316
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        Level 1
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex space-x-2">
                                            <div class="badge rounded-full border border-success text-success">
                                                Admin
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })"
                                            @click.outside="isShowPopper && (isShowPopper = false)"
                                            class="inline-flex">
                                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                                    viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                                                        <li>
                                                            <a href="#"
                                                                class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="size-4.5" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="1.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                                <span> Edit</span></a>
                                                        </li>

                                                        <li>
                                                            <a href="#"
                                                                class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide text-error outline-none transition-all hover:bg-error/20 focus:bg-error/20">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="size-4.5" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="1.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                <span> Delete item</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"></tr>
                            </table>
                        </div>

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
