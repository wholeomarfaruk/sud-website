<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/admin.scss', 'resources/css/admin.css', 'resources/js/admin.js'])
    @livewireStyles
    @stack('styles')
    <style>
        .swal2-container.swal2-top-end .swal2-popup {
            margin-top: 10px;
        }
    </style>
</head>

<body x-data="{ visibleClass: 'sm:block' }" class=" mx-auto antialiased flex justify-between">


    <!-- Mobile Menu Toggle -->
    <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
        class="sm:hidden absolute top-5 right-5 focus:outline-none">
        <!-- Menu Icons -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" x-bind:class="$store.sidebar.navOpen ? 'hidden' : ''"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>

        <!-- Close Menu -->
        <svg x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
            x-bind:class="$store.sidebar.navOpen ? '' : 'hidden'" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div class="h-screen z-10  bg-gray-900 transition-all duration-300 space-y-2 fixed sm:sticky flex justify-around  flex-col"
        x-bind:class="{
            'w-64': $store.sidebar.full,
            'w-64 sm:w-20': !$store.sidebar.full,
            'top-0 left-0': $store.sidebar
                .navOpen,
            'top-0 -left-64 sm:left-0': !$store.sidebar.navOpen
        }">
        <div>
            <h1 class="text-white font-black py-4"
                x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 xm:px-2'">Admin</h1>
        </div>
        <div class="px-4 space-y-2">

            <!-- SideBar Toggle -->
            <button @click="$store.sidebar.full = !$store.sidebar.full"
                class="hidden sm:block focus:outline-none absolute p-1 -right-3 top-10 bg-gray-900 rounded-full shadow-md cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-all duration-300 text-white transform"
                    x-bind:class="$store.sidebar.full ? 'rotate-90' : '-rotate-90 '" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <!-- Sales Point -->

            <div class="h-[70vh]  scrollbar scrollbar-thumb-gray-900  scrollbar-thin scrollbar-track-transparent"
                :class="$store.sidebar.full ? 'overflow-y-scroll' : ''">

                <!-- Quick Action -->
                {{-- <div class="mt-4 mb-1">
                     <h2 class="text-gray-500 text-md font-semibold" :class="{ 'hidden': !$store.sidebar.full }"
                        x-transition>Quick Action</h2>
                </div>
                <a href="#" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false" @click="$store.sidebar.active = 'pos' "
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400 mb-6
                    {{ Route::currentRouteName() == 'admin.pos' ? 'text-gray-200 bg-gray-800' : '' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>

                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Dashboard</h1>
                </a> --}}
                <!-- General  -->
                <div class="mt-4 mb-1">
                    <h2 class="text-gray-500 text-md font-semibold" :class="{ 'hidden': !$store.sidebar.full }"
                        x-transition> General</h2>
                </div>
                <!-- Home -->
                <a href="{{ route('admin.dashboard') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.dashboard' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ?
                            'sm:hidden' : ''">
                        Dashboard</h1>
                </a>
                <!-- User -->
                {{-- <a href="{{ route('admin.user.list') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.user.list' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Users</h1>
                </a> --}}
                <!-- Customer -->
                {{-- <a href="{{ route('admin.customer.list') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.customer.list' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>


                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Customers</h1>
                </a> --}}
                <!-- Products -->
                {{-- <a href="{{ route('admin.product.list') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.product.list' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>



                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Products</h1>
                </a> --}}
                <!-- Invoices -->
                <a href="{{ route('admin.uploads') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.uploads' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Uploads</h1>
                </a>
                <!-- Stock -->
                <a href="{{ route('admin.sliders') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.sliders' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>




                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Sliders</h1>
                </a>
                <!-- partners -->
                <a href="{{ route('admin.partners') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.partners' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor"
                        stroke-width="2">

                        <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                        <path
                            d="M20.24 4.76c-2.3-2.29-5.87-2.35-8.24-.19-2.37-2.16-5.93-2.09-8.24.2-2.36 2.37-2.36 6.07 0 8.43l7.53 7.52c.2.19.45.29.71.29s.51-.1.71-.29l7.53-7.52c2.36-2.36 2.36-6.06 0-8.43ZM12 18.59l-6.82-6.81a3.92 3.92 0 0 1 0-5.6C5.97 5.39 6.98 5 7.99 5s2.02.39 2.8 1.18l.5.5-2.38 2.39c-.51.52-.51 1.36 0 1.88.49.49 1.13.73 1.77.73s1.28-.24 1.77-.73l1.64-1.64 3.59 3.59-1.04 1.04-2.3-2.3-.71.71 2.3 2.3-.79.79-2.3-2.3-.71.71 2.3 2.3-.79.79-2.29-2.29-.71.71 2.29 2.29-.94.94Zm6.82-6.81-.42.42-3.59-3.59 1.24-1.24-.71-.71-3.59 3.59c-.58.58-1.54.58-2.12 0a.33.33 0 0 1 0-.47l3.42-3.44.16-.16c1.57-1.57 4.04-1.57 5.62 0 1.57 1.58 1.57 4.04 0 5.6Z">
                        </path>
                    </svg>

                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Partners</h1>
                </a>
                <!-- offers -->
                <a href="{{ route('admin.offers') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.offers' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m8.99 14.993 6-6m6 3.001c0 1.268-.63 2.39-1.593 3.069a3.746 3.746 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043 3.745 3.745 0 0 1-3.068 1.593c-1.268 0-2.39-.63-3.068-1.593a3.745 3.745 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.297 3.746 3.746 0 0 1-1.593-3.068c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 0 1 1.043-3.297 3.745 3.745 0 0 1 3.296-1.042 3.745 3.745 0 0 1 3.068-1.594c1.268 0 2.39.63 3.068 1.593a3.745 3.745 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.297 3.746 3.746 0 0 1 1.593 3.068ZM9.74 9.743h.008v.007H9.74v-.007Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm4.125 4.5h.008v.008h-.008v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>


                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Offers</h1>
                </a>
                <!-- blogs -->
                <a href="{{ route('admin.blogs') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.blogs' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>


                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Blogs</h1>
                </a>
                <!-- inbox -->
                <a href="{{ route('admin.inbox') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.inbox' ? 'text-gray-200 bg-gray-800' : '' }}

                    ">


              
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
</svg>



                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Inbox</h1>
                </a>
                <!-- Reports -->
                <div x-data="dropdown" class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('users')" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{
                            'justify-start': $store.sidebar.full,
                            'sm:justify-center': !$store.sidebar
                                .full,
                            'text-gray-200 bg-gray-800': $store.sidebar.active == 'Reports',
                            'text-gray-400 ': $store
                                .sidebar.active != 'Reports'
                        }">
                        <div class="relative flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>




                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ?
                                    'sm:hidden' : ''">
                                User Management</h1>
                        </div>

                        <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 size-6" viewBox="0 0 20 20"
                            stroke-width="1.5" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open" @click.outside="open=false"
                        x-bind:class="$store.sidebar.full && show ? expandedClass : shrinkedClass"
                        class="text-gray-400 space-y-3 ">
                        <a href="{{ route('admin.users') }}" class="hover:text-gray-200 cursor-pointer">Users</a>
                    </div>
                </div>
                <!-- property management -->
                <div x-data="dropdown" class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('properties')" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{
                            'justify-start': $store.sidebar.full,
                            'sm:justify-center': !$store.sidebar
                                .full,
                            'text-gray-200 bg-gray-800': $store.sidebar.active == 'Reports',
                            'text-gray-400 ': $store
                                .sidebar.active != 'Reports'
                        }">
                        <div class="relative flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>


                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ?
                                    'sm:hidden' : ''">
                                Property Manage</h1>
                        </div>

                        <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 size-6" viewBox="0 0 20 20"
                            stroke-width="1.5" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open" @click.outside="open=false"
                        x-bind:class="$store.sidebar.full && show ? expandedClass : shrinkedClass"
                        class="text-gray-400 space-y-3 ml-3">
                        <a href="{{ route('admin.properties.locations') }}"
                            class="hover:text-gray-200 cursor-pointer">Locations</a><br>
                        <a href="{{ route('admin.properties') }}" class="hover:text-gray-200 cursor-pointer">All
                            Properties</a><br>
                        <a href="{{ route('admin.properties.create') }}"
                            class="hover:text-gray-200 cursor-pointer">Add Property</a><br>
                        <a href="{{ route('admin.properties.featured') }}"
                            class="hover:text-gray-200 cursor-pointer">Featued Properties</a>

                    </div>
                </div>



                <!-- Settings -->
                <div class="mt-4 mb-1">
                    <h2 class="text-gray-500 text-md font-semibold" :class="{ 'hidden': !$store.sidebar.full }"
                        x-transition>Settings</h2>
                </div>

                <!-- Settings -->
                <!-- Role and permissions -->
                <a href="{{ route('admin.roles.list') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.roles.list' || Route::currentRouteName() == 'admin.roles.create' || Route::currentRouteName() == 'admin.roles.edit' ? 'text-gray-200 bg-gray-800' : '' }}
                    ">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>

                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full ?
                            'sm:hidden' : ''">
                        Permissions</h1>

                </a>
                <!-- Role and permissions -->
                {{-- <a href="{{ route('admin.admin.profile') }}" x-data="tooltip"
                    x-on:mouseover="show = true" x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.admin.profile' ? 'text-gray-200 bg-gray-800' : '' }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>


                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        admin Profile</h1>

                </a>
                <a href="{{ route('admin.user.profile') }}" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer justify-start text-gray-400
                    {{ Route::currentRouteName() == 'admin.user.profile' ? 'text-gray-200 bg-gray-800' : '' }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                    </svg>



                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Profile</h1>

                </a> --}}
                <!-- Ui elements -->
                {{-- <div class="mt-4 mb-1">
                    <h2 class="text-gray-500 text-md font-semibold" :class="{ 'hidden': !$store.sidebar.full }"
                        x-transition>Ui Elements</h2>
                </div>

                <!-- UI Elements -->
                <div x-data="dropdown" class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('uielements')" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{
                            'justify-start': $store.sidebar.full,
                            'sm:justify-center': !$store.sidebar
                                .full,
                            'text-gray-200 bg-gray-800': $store.sidebar.active == 'uielements',
                            'text-gray-400 ': $store
                                .sidebar.active != 'uielements'
                        }">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                            </svg>

                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                    'sm:hidden' : ''">
                                Elements</h1>
                        </div>
                        <svg x-cloak x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 size-6" viewBox="0 0 20 20"
                            stroke-width="1.5" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open" @click.outside="open=false"
                        x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                        class="text-gray-400 space-y-3">

                        <!-- Sub Dropdown  -->
                        <div x-data="sub_dropdown" class="relative w-full ">
                            <div @click="sub_toggle()" class="flex items-center justify-between cursor-pointer">
                                <h1 class="hover:text-gray-200 cursor-pointer">Pages</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div x-show="sub_open" @click.outside="sub_open = false"
                                x-bind:class="$store.sidebar.full ? sub_expandedClass : sub_shrinkedClass">
                                <a class="block" href="{{ route('admin.page-template') }}"
                                    class="hover:text-gray-200 cursor-pointer ">Page Template</a>

                                <a class="block" href="{{ route('admin.blank-page') }}"
                                    class="hover:text-gray-200 cursor-pointer ">Blank Page</a>

                            </div>
                        </div>

                    </div>
                </div> --}}
            </div>

        </div>
        <div>

            <hr class="border-gray-700 mt-4">
            <!-- Schedules -->
            <div x-data @click="$refs.logoutForm.submit()" x-on:mouseover="show = true"
                x-on:mouseleave="show = false"
                class="relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar.full,
                    'text-gray-200 bg-gray-800': $store.sidebar.active == 'logout',
                    'text-gray-400': $store.sidebar.active != 'logout'
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>

                    <span x-cloak
                        x-bind:class="!$store.sidebar.full ? visibleClass : (!$store.sidebar.full ? 'sm:hidden' : '')">
                        Logout
                    </span>
                </div>

                <!-- Hidden Logout Form -->
                <form x-ref="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

            </div>


        </div>
    </div>
    <div class="min-h-screen flex-1  w-full p-6 bg-gray-100 " comment="Page Content">

        {{ $slot }}
    </div>


    <script>
        document.addEventListener('livewire:init', () => {
            // php code
            //      $this->dispatch('toast', [
            //     'type' => 'success',
            //     'message' => 'Item deleted successfully!'
            // ]);
            Livewire.on('toast', data => {
                // console.log(data);
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: data[0].type,
                    title: data[0].message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });


            })
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let data = @json(session()->get('toast'));
            if (data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: data.type,
                    title: data.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }


        });
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            // Stores variable globally
            Alpine.store('sidebar', {
                full: true,
                active: 'pos',
                navOpen: false,
            });
            Alpine.store('pageName', {
                slug: '',
                name: '',

            });
            // Creating component Dropdown
            Alpine.data('dropdown', () => ({
                open: false,
                toggle(tab) {
                    this.open = !this.open;
                    Alpine.store('sidebar').active = tab;
                },
                visibleClass: 'sm:block',
                activeClass: 'bg-gray-800 text-gray-200',
                expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));
            // Creating component Sub Dropdown
            Alpine.data('sub_dropdown', () => ({
                sub_open: false,
                sub_toggle() {
                    this.sub_open = !this.sub_open;
                },
                sub_expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                sub_shrinkedClass: 'sm:absolute top-0 left-28 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));
            // Creating tooltip
            Alpine.data('tooltip', () => ({
                show: false,
                visibleClass: 'block sm:absolute -top-7 sm:border border-gray-800 left-5 sm:text-sm sm:bg-gray-900 sm:px-2 sm:py-1 sm:rounded-md'
            }))

        })
    </script>
    <script>
        document.addEventListener('livewire:init', () => {

            function initVideoPreviews() {

                document.querySelectorAll('.replace-video-preview').forEach(img => {

                    // prevent running twice
                    if (img.dataset.previewLoaded) return;
                    img.dataset.previewLoaded = true;

                    const videoUrl = img.getAttribute('src');

                    const video = document.createElement('video');
                    video.src = videoUrl;
                    video.crossOrigin = "anonymous";
                    video.muted = true;
                    video.playsInline = true;
                    video.preload = "metadata";

                    video.addEventListener('loadedmetadata', () => {
                        video.currentTime = Math.min(2, video.duration * 0.25);
                    });


                    video.addEventListener('seeked', () => {

                        const canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;

                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                        img.src = canvas.toDataURL('image/png');

                    });

                });

            }

            // first run
            initVideoPreviews();

            // run again after Livewire updates DOM
            Livewire.hook('morph.updated', () => {
                initVideoPreviews();
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            Fancybox.bind("[data-fancybox]", {

            })
        })
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
