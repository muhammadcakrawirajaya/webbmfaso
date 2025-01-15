<div class="sidebar print:hidden">
    <!-- Main Sidebar -->
    @include('telkomsel.includes.mainSidebar')

    <!-- Sidebar Panel -->
    <div class="sidebar-panel">
        <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
            <!-- Sidebar Panel Header -->
            <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                    Dashboard - Telkomsel
                </p>
                <button @click="$store.global.isSidebarExpanded = false"
                    class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Sidebar Panel Body -->
            <div x-data="{ expandedItem: null }" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-init="$el._x_simplebar = new SimpleBar($el);">
                <ul class="flex flex-1 flex-col px-4 font-inter">

                    <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>

                    <li>
                        <a x-data="navLink" href="{{ route('telkomsel.index') }}"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 20"
                                stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>


                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a x-data="navLink" href="{{ route('dashboardMenu3.index') }}"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 20"
                                stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                                <path fill-rule="evenodd"
                                    d="M10 1c3.866 0 7 1.79 7 4s-3.134 4-7 4-7-1.79-7-4 3.134-4 7-4Zm5.694 8.13c.464-.264.91-.583 1.306-.952V10c0 2.21-3.134 4-7 4s-7-1.79-7-4V8.178c.396.37.842.688 1.306.953C5.838 10.006 7.854 10.5 10 10.5s4.162-.494 5.694-1.37ZM3 13.179V15c0 2.21 3.134 4 7 4s7-1.79 7-4v-1.822c-.396.37-.842.688-1.306.953-1.532.875-3.548 1.369-5.694 1.369s-4.162-.494-5.694-1.37A7.009 7.009 0 0 1 3 13.179Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Data Master
                        </a>
                    </li>

                    <li>
                        <a x-data="navLink" href="{{ route('dashboardMenu2.index') }}"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                viewBox="0 0 24 20" stroke-width="1.5" stroke="none" class="size-4 mr-2">
                                class="size-5">
                                <path
                                    d="M10.75 2.75a.75.75 0 0 0-1.5 0v8.614L6.295 8.235a.75.75 0 1 0-1.09 1.03l4.25 4.5a.75.75 0 0 0 1.09 0l4.25-4.5a.75.75 0 0 0-1.09-1.03l-2.955 3.129V2.75Z" />
                                <path
                                    d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" />
                            </svg>

                            Upload Excel
                        </a>
                    </li>

                    <li>
                        <a x-data="navLink" href="{{ route('dashboardMenu4.index') }}"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 20"
                                stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                                <path fill-rule="evenodd"
                                    d="M3 3.5A1.5 1.5 0 0 1 4.5 2h6.879a1.5 1.5 0 0 1 1.06.44l4.122 4.12A1.5 1.5 0 0 1 17 7.622V16.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 3 16.5v-13Zm10.857 5.691a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 0 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Check Complete
                        </a>
                    </li>

                    {{-- <li>
                        <a x-data="navLink" href="{{ route('dashboardMenu5') }}"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 20" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                              </svg>

                            Migrate
                        </a>
                    </li> --}}

                </ul>
                <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                {{-- <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li x-data="accordionItem('menu-item-1')">
                        <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' :
                            'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out"
                            href="javascript:void(0);">
                            <span>Menu 1</span>
                            <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-slate-400 transition-transform ease-in-out" fill="none"
                                viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                        <ul x-collapse="" x-show="expanded">
                            <li>
                                <a x-data="navLink" href="{{ route('dashboardMenu6') }}"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                        'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="size-1.5 rounded-full border border-current opacity-40"></div>
                                        <span>Menu 1 v1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a x-data="navLink" href="{{ route('dashboardMenu7') }}"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                        'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="size-1.5 rounded-full border border-current opacity-40"></div>
                                        <span>Menu 1 v2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="accordionItem('menu-item-2')">
                        <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' :
                            'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out"
                            href="javascript:void(0);">
                            <span>Menu 2</span>
                            <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-slate-400 transition-transform ease-in-out" fill="none"
                                viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                        <ul x-collapse="" x-show="expanded">
                            <li>
                                <a x-data="navLink" href="dashboards-banking-1.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                        'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="size-1.5 rounded-full border border-current opacity-40"></div>
                                        <span>Menu 2 v1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a x-data="navLink" href="dashboards-banking-2.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                        'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="size-1.5 rounded-full border border-current opacity-40"></div>
                                        <span>Menu 2 v2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a x-data="navLink" href="dashboards-personal.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                            Menu 3
                        </a>
                    </li>

                </ul>
                <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li>
                        <a x-data="navLink" href="dashboards-widget-ui.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                            Another menu 1
                        </a>
                    </li>
                    <li>
                        <a x-data="navLink" href="dashboards-widget-contacts.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                            Another Menu 2
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
