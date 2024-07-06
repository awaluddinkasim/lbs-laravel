<div id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-[60] hidden w-64 -translate-x-full transform overflow-y-auto border-e border-default-200 bg-white transition-all duration-300 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">
    <div class="sticky top-0 flex items-center justify-center h-16 px-6">
        <a href="index.html">
            <img src="assets/images/logo-dark.png" alt="logo" class="flex h-6 dark:hidden" />
            <img src="assets/images/logo-light.png" alt="logo" class="hidden h-6 dark:flex" />
        </a>
    </div>

    <div class="hs-accordion-group h-[calc(100%-72px)] p-4 ps-0" data-simplebar>
        <ul class="admin-menu flex w-full flex-col gap-1.5">

            @foreach (config('menu') as $menu)
                <li class="menu-item">
                    <a href="{{ $menu['url'] }}"
                        class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                        <i
                            class="text-2xl font-light transition-all material-symbols-rounded group-hover:fill-1">{{ $menu['icon'] }}</i>
                        <span class="menu-text"> {{ $menu['title'] }} </span>
                    </a>
                </li>
            @endforeach

            {{-- <li class="hs-accordion menu-item">
                <a href="javascript:void(0)"
                    class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i
                        class="text-2xl font-light transition-all material-symbols-rounded group-hover:fill-1">description</i>
                    <span class="menu-text"> Forms </span>
                    <span
                        class="text-sm transition-all ti ti-chevron-right ms-auto hs-accordion-active:rotate-90"></span>
                </a>

                <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                    <ul class="mt-2 space-y-2">
                        <li class="menu-item">
                            <a href="forms-inputs.html"
                                class="flex items-center gap-x-3.5 rounded-e-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                <span class="menu-text">Inputs</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-check-radio.html"
                                class="flex items-center gap-x-3.5 rounded-e-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                <span class="menu-text">Checkbox & Radio</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-masks.html"
                                class="flex items-center gap-x-3.5 rounded-e-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                <span class="menu-text">Input Masks</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-editor.html"
                                class="flex items-center gap-x-3.5 rounded-e-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                <span class="menu-text">Editor</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-validation.html"
                                class="flex items-center gap-x-3.5 rounded-e-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                <span class="menu-text">Validation</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-layout.html"
                                class="flex items-center gap-x-3.5 rounded-e-full px-5 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                                <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                <span class="menu-text">Form Layout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}


        </ul>
    </div>
</div>
