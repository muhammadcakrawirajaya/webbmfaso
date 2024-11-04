<div class="panel">
    <div class="mb-5 flex items-center justify-between">
        <h5 class="text-lg font-semibold dark:text-white-light">Vertically Centered</h5>
        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600" href="javascript:;" @click="toggleCode('code2')">
            <span class="flex items-center">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                    <path d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
                Code
            </span>
        </a>
    </div>
    <div class="mb-5" x-data="modal">
        <div class="flex items-center justify-center">
            <button type="button" class="btn btn-info" @click="toggle">Launch modal</button>
        </div>
        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
            <div class="flex min-h-screen items-center justify-center px-4" @click.self="open = false">
                <div x-show="open" x-transition="" x-transition.duration.300="" class="panel my-8 w-full max-w-lg overflow-hidden rounded-lg border-0 p-0">
                    <div class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                        <h5 class="text-lg font-bold">Modal Title</h5>
                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5">
                        <div class="text-base font-medium text-[#1f2937] dark:text-white-dark/70">
                            <p>
                                Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit
                                sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.
                            </p>
                        </div>
                        <div class="mt-8 flex items-center justify-end">
                            <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <template x-if="codeArr.includes('code2')">
        <pre class="code overflow-auto rounded-md !bg-[#191e3a] p-4 text-white">
&lt;!-- vertically centered --&gt;
&lt;div class=&quot;mb-5&quot; x-data=&quot;modal&quot;&gt;
&lt;!-- button --&gt;
&lt;div class=&quot;flex items-center justify-center&quot;&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-info&quot; @click=&quot;toggle&quot;&gt;Launch modal&lt;/button&gt;
&lt;/div&gt;

&lt;!-- modal --&gt;
&lt;div class=&quot;fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto&quot; :class=&quot;open &amp;&amp; '!block'&quot;&gt;
&lt;div class=&quot;flex items-center justify-center min-h-screen px-4&quot; @click.self=&quot;open = false&quot;&gt;
    &lt;div x-show=&quot;open&quot; x-transition x-transition.duration.300 class=&quot;panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8&quot;&gt;
        &lt;div class=&quot;flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3&quot;&gt;
            &lt;h5 class=&quot;font-bold text-lg&quot;&gt;Modal Title&lt;/h5&gt;
            &lt;button type=&quot;button&quot; class=&quot;text-white-dark hover:text-dark&quot; @click=&quot;toggle&quot;&gt;
                &lt;svg&gt; ... &lt;/svg&gt;
            &lt;/button&gt;
        &lt;/div&gt;
        &lt;div class=&quot;p-5&quot;&gt;
            &lt;div class=&quot;dark:text-white-dark/70 text-base font-medium text-[#1f2937]&quot;&gt;
                &lt;p&gt;Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi.&lt;/p&gt;
            &lt;/div&gt;
            &lt;div class=&quot;flex justify-end items-center mt-8&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-danger&quot; @click=&quot;toggle&quot;&gt;Discard&lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:ml-4 rtl:mr-4&quot; @click=&quot;toggle&quot;&gt;Save&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
Alpine.data(&quot;modal&quot;, (initialOpenState = false) =&gt; ({
    open: initialOpenState,

    toggle() {
        this.open = !this.open;
    },
}));
});
&lt;/script&gt;
</pre>
    </template>
</div>
