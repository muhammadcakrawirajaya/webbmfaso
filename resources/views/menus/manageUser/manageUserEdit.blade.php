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
                    <label for="Photo">Photo</label>
                    {{-- Photo --}}
                    <div class="flex">
                        <img class="mb-3 w-20 h-20 rounded-md overflow-hidden object-cover"
                            src="{{ asset('assets/images/user-profile.jpeg') }}" alt="image" />
                    </div>
                    {{-- Form --}}
                    <form class="space-y-2">
                        <div>
                            <label for="Username">Username</label>
                            <input type="text" placeholder="Username" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                        <div>
                            <label for="Name">Name</label>
                            <input type="text" placeholder="Name" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                        <div>
                            <label for="email">E-mail</label>
                            <input type="text" placeholder="E-mail" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                        <div>
                            <label for="telegram">Telegram</label>
                            <input type="text" placeholder="Telegram" class="form-input" readonly
                                style="background: lightgrey" />
                        </div>
                    </form>

                    {{-- Divison Dropdown --}}
                    <form class="mt-2 mb-2">
                        <label for="division">Division</label>
                        <div>
                            <select class="form-select text-white-dark">
                                <option>Optima</option>
                                <option>ASO</option>
                                <option>PSB</option>
                                <option>MDF</option>
                                <option>BMF</option>
                            </select>
                        </div>
                    </form>

                    {{-- Role Dropdown --}}
                    <form class="mt-2 mb-2">
                        <label for="Role">Role</label>
                        <div>
                            <select class="form-select text-white-dark">
                                <option>Team Leader</option>
                                <option>Admin</option>
                            </select>
                        </div>
                    </form>

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
