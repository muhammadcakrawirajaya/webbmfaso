<!-- vertically centered -->
<div class="mb-5" x-data="modal">
    <!-- button -->
    <div class="flex items-center justify-center">
        <button type="button" class="btn btn-info" @click="toggle">Launch modal</button>
    </div>

    <!-- modal -->
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
                    {{-- Role Divison --}}
                    <div class="dropdown inline-flex mt-2" x-data="dropdown" @click.outside="open = false">
                        <button type="button"
                            class="btn btn-dark ltr:rounded-r-none rtl:rounded-l-none">Division</button>
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
</div>
