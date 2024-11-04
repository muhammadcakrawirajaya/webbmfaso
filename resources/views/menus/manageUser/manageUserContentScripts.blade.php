<script>
    document.addEventListener('alpine:init', () => {
        // main section
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));

        // theme customization
        Alpine.data('customizer', () => ({
            showCustomizer: false,
        }));

        // sidebar section
        Alpine.data('sidebar', () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));

        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                    .location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [{
                    id: 1,
                    profile: 'user-profile.jpeg',
                    message: '<strong class="text-sm mr-1">StarCode Kh</strong>invite you to <strong>Prototyping</strong>',
                    time: '45 min ago',
                },
                {
                    id: 2,
                    profile: 'profile-34.jpeg',
                    message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                    time: '9h Ago',
                },
                {
                    id: 3,
                    profile: 'profile-16.jpeg',
                    message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                    time: '9h Ago',
                },
            ],

            messages: [{
                    id: 1,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'Congratulations!',
                    message: 'Your OS has been updated.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'Did you know?',
                    message: 'You can switch between artboards.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'Something went wrong!',
                    message: 'Send Reposrt',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'Warning',
                    message: 'Your password strength is low.',
                    time: '5days',
                },
            ],

            languages: [{
                    id: 1,
                    key: 'Khmer',
                    value: 'kh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));

        //invoice list
        Alpine.data('invoiceList', () => ({
            selectedRows: [],
            items: [{
                    id: 1,
                    invoice: '081451',
                    name: 'Laurie Fox',
                    email: 'lauriefox@company.com',
                    date: '15 Dec 2020',
                    amount: '2275.45',
                    status: 'Paid',
                    action: 1,
                },
                {
                    id: 2,
                    invoice: '081452',
                    name: 'Alexander Gray',
                    email: 'alexGray3188@gmail.com',
                    date: '20 Dec 2020',
                    amount: '1044.00',
                    status: 'Paid',
                    action: 2,
                },
                {
                    id: 3,
                    invoice: '081681',
                    name: 'James Taylor',
                    email: 'jamestaylor468@gmail.com',
                    date: '27 Dec 2020',
                    amount: '20.00',
                    status: 'Pending',
                    action: 3,
                },
                {
                    id: 4,
                    invoice: '082693',
                    name: 'Grace Roberts',
                    email: 'graceRoberts@company.com',
                    date: '31 Dec 2020',
                    amount: '344.00',
                    status: 'Paid',
                    action: 4,
                },
                {
                    id: 5,
                    invoice: '084743',
                    name: 'Donna Rogers',
                    email: 'donnaRogers@hotmail.com',
                    date: '03 Jan 2021',
                    amount: '405.15',
                    status: 'Paid',
                    action: 5,
                },
                {
                    id: 6,
                    invoice: '086643',
                    name: 'Amy Diaz',
                    email: 'amy968@gmail.com',
                    date: '14 Jan 2020',
                    amount: '100.00',
                    status: 'Paid',
                    action: 6,
                },
                {
                    id: 7,
                    invoice: '086773',
                    name: 'Nia Hillyer',
                    email: 'niahillyer666@comapny.com',
                    date: '20 Jan 2021',
                    amount: '59.21',
                    status: 'Pending',
                    action: 7,
                },
                {
                    id: 8,
                    invoice: '087916',
                    name: 'Mary McDonald',
                    email: 'maryDonald007@gamil.com',
                    date: '25 Jan 2021',
                    amount: '79.00',
                    status: 'Pending',
                    action: 8,
                },
                {
                    id: 9,
                    invoice: '089472',
                    name: 'Andy King',
                    email: 'kingandy07@company.com',
                    date: '28 Jan 2021',
                    amount: '149.00',
                    status: 'Paid',
                    action: 9,
                },
                {
                    id: 10,
                    invoice: '091768',
                    name: 'Vincent Carpenter',
                    email: 'vincentcarpenter@gmail.com',
                    date: '30 Jan 2021',
                    amount: '400',
                    status: 'Paid',
                    action: 10,
                },
                {
                    id: 11,
                    invoice: '095841',
                    name: 'Kelly Young',
                    email: 'youngkelly@hotmail.com',
                    date: '06 Feb 2021',
                    amount: '49.00',
                    status: 'Pending',
                    action: 11,
                },
                {
                    id: 12,
                    invoice: '098424',
                    name: 'Alma Clarke',
                    email: 'alma.clarke@gmail.com',
                    date: '10 Feb 2021',
                    amount: '234.40',
                    status: 'Paid',
                    action: 12,
                },
            ],
            searchText: '',
            datatable: null,
            dataArr: [],

            init() {
                this.setTableData();
                this.initializeTable();
                this.$watch('items', (value) => {
                    this.datatable.destroy();
                    this.setTableData();
                    this.initializeTable();
                });
                this.$watch('selectedRows', (value) => {
                    this.datatable.destroy();
                    this.setTableData();
                    this.initializeTable();
                });
            },

            initializeTable() {
                this.datatable = new simpleDatatables.DataTable('#myTable', {
                    data: {
                        headings: [
                            '<input type="checkbox" class="form-checkbox" :checked="checkAllCheckbox" :value="checkAllCheckbox" @change="checkAll($event.target.checked)"/>',
                            'Invoice',
                            'Name',
                            'Email',
                            'Date',
                            'Amount',
                            'Status',
                            'Actions',
                        ],
                        data: this.dataArr,
                    },
                    perPage: 10,
                    perPageSelect: [10, 20, 30, 50, 100],
                    columns: [{
                            select: 0,
                            sortable: false,
                            render: function(data, cell, row) {
                                return `<input type="checkbox" class="form-checkbox mt-1" :id="'chk' + ${data}" :value="(${data})" x-model.number="selectedRows" />`;
                            },
                        },
                        {
                            select: 1,
                            render: function(data, cell, row) {
                                return (
                                    '<a href="apps-invoice-preview.html" class="text-primary underline font-semibold hover:no-underline">#' +
                                    data +
                                    '</a>'
                                );
                            },
                        },
                        {
                            select: 2,
                            render: function(data, cell, row) {
                                return `<div class="flex items-center font-semibold"><div class="p-0.5 bg-white-dark/30 rounded-full w-max ltr:mr-2 rtl:ml-2"><img class="h-8 w-8 rounded-full object-cover" src="assets/images/profile-${
                                    row.dataIndex + 1
                                }.jpeg" /></div>${data}</div>`;
                            },
                        },
                        {
                            select: 5,
                            render: function(data, cell, row) {
                                return '<div class="font-semibold">$' + data +
                                    '</div>';
                            },
                        },
                        {
                            select: 6,
                            render: function(data, cell, row) {
                                let styleClass = data == 'Paid' ?
                                    'badge-outline-success' :
                                    'badge-outline-danger';
                                return '<span class="badge ' + styleClass + '">' +
                                    data + '</span>';
                            },
                        },
                        {
                            select: 7,
                            sortable: false,
                            render: function(data, cell, row) {
                                return `<div class="flex gap-4 items-center" x-data="modal">
                                    <button type="button" class="hover:text-primary" @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                                            <path
                                                opacity="0.5"
                                                d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            ></path>
                                            <path
                                                d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            ></path>
                                            <path
                                                opacity="0.5"
                                                d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            ></path>
                                        </svg>
                                    </button>
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.300
                class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                <div class="p-5">
                    {{-- Section Title --}}
                    <h1 class="mb-3" style="font-size: 15px"><b>Edit User</b></h1>
                    {{-- Photo --}}
                    <div class="flex">
                        <img class="mb-3 w-20 h-20 rounded-md overflow-hidden object-cover"
                            src="{{ asset('assets/images/user-profile.jpeg') }}" alt="image" />
                    </div>
                    {{-- Form --}}
                    <form class="space-y-2">
                        <div>
                            <input type="text" placeholder="Username" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                        <div>
                            <input type="text" placeholder="Name" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                        <div>
                            <input type="text" placeholder="E-mail" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                        <div>
                            <input type="text" placeholder="Telegram" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                    </form>
                                        {{-- Division Dropdown --}}
                    <div class="dropdown inline-flex mt-2" x-data="dropdown" @click.outside="open = false">
                        <button type="button" class="btn btn-dark ltr:rounded-r-none rtl:rounded-l-none">Division</button>
                        <button type="button"
                            class="btn dropdown-toggle btn-dark ltr:rounded-l-none rtl:rounded-r-none border-l-[#4468fd] before:border-[5px] before:border-l-transparent before:border-r-transparent before:border-t-inherit before:border-b-0 before:inline-block before:border-t-white-light"
                            @click="toggle">
                            <span class="sr-only">Toggle dropdown</span>
                        </button>
                        <ul role="menu" x-cloak x-show="open" x-transition x-transition.duration.300ms
                            class="ltr:right-10 rtl:left-0 top-full whitespace-nowrap">
                            <li><a href="javascript:;" @click="toggle">Optima</a></li>
                            <li><a href="javascript:;" @click="toggle">ASO</a></li>
                            <li><a href="javascript:;" @click="toggle">PSB</a></li>
                        </ul>
                    </div>
                    {{-- Role Dropdown --}}
                    <div class="dropdown inline-flex mt-2" x-data="dropdown" @click.outside="open = false">
                        <button type="button" class="btn btn-dark ltr:rounded-r-none rtl:rounded-l-none">Role</button>
                        <button type="button"
                            class="btn dropdown-toggle btn-dark ltr:rounded-l-none rtl:rounded-r-none border-l-[#4468fd] before:border-[5px] before:border-l-transparent before:border-r-transparent before:border-t-inherit before:border-b-0 before:inline-block before:border-t-white-light"
                            @click="toggle">
                            <span class="sr-only">Toggle dropdown</span>
                        </button>
                        <ul role="menu" x-cloak x-show="open" x-transition x-transition.duration.300ms
                            class="ltr:right-10 rtl:left-0 top-full whitespace-nowrap">
                            <li><a href="javascript:;" @click="toggle">Team Leader</a></li>
                            <li><a href="javascript:;" @click="toggle">Admin</a></li>
                        </ul>
                    </div>
                    {{-- Submit Button --}}
                    <div class="flex justify-end items-center mt-8">
                        <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                        <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

                                    <button type="button" class="hover:text-danger" @click="deleteRow(${data})">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            ></path>
                                            <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                opacity="0.5"
                                                d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            ></path>
                                        </svg>
                                    </button>
                                </div>`;
                            },
                        },
                    ],
                    firstLast: true,
                    firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    labels: {
                        perPage: "<span class='ml-2'>{select}</span>",
                        noRows: 'No data available',
                    },
                    layout: {
                        top: '{search}',
                        bottom: '{info}{select}{pager}',
                    },
                });
            },

            checkAllCheckbox() {
                if (this.items.length && this.selectedRows.length === this.items.length) {
                    return true;
                } else {
                    return false;
                }
            },

            checkAll(isChecked) {
                if (isChecked) {
                    this.selectedRows = this.items.map((d) => {
                        return d.id;
                    });
                } else {
                    this.selectedRows = [];
                }
            },

            setTableData() {
                this.dataArr = [];
                for (let i = 0; i < this.items.length; i++) {
                    this.dataArr[i] = [];
                    for (let p in this.items[i]) {
                        if (this.items[i].hasOwnProperty(p)) {
                            this.dataArr[i].push(this.items[i][p]);
                        }
                    }
                }
            },

            searchInvoice() {
                return this.items.filter(
                    (d) =>
                    (d.invoice && d.invoice.toLowerCase().includes(this.searchText)) ||
                    (d.name && d.name.toLowerCase().includes(this.searchText)) ||
                    (d.email && d.email.toLowerCase().includes(this.searchText)) ||
                    (d.date && d.date.toLowerCase().includes(this.searchText)) ||
                    (d.amount && d.amount.toLowerCase().includes(this.searchText)) ||
                    (d.status && d.status.toLowerCase().includes(this.searchText))
                );
            },

            deleteRow(item) {
                if (confirm('Are you sure want to delete selected row ?')) {
                    if (item) {
                        this.items = this.items.filter((d) => d.id != item);
                        this.selectedRows = [];
                    } else {
                        this.items = this.items.filter((d) => !this.selectedRows.includes(d.id));
                        this.selectedRows = [];
                    }
                }
            },
        }));
    });
</script>

