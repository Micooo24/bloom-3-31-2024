<style>
    .adjustable-logo {
        margin-top: 5px;
        width: 50px;
        height: 50px;
    }

    .bg-header {
        background-color: #004236;
        height: 120px; /* Adjust the height as needed */
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100%;
    }

    .search-box {
        width: 250px;
        height: 30px;
        padding: 0 10px;
         margin-top: 5px; */
    }

    .search-icon {
        margin-right: 8px;
    }

    .cart-icon {
        margin-left: 8px;

    }
    .custom-nav {
    background-color: #004236; /* Background color */
    border-bottom: 1px solid #ccc; /* Border color */
    /* Add more styles here as needed */
    }
    .search-btn {
        background-color: #007bff; /* Button background color */
        color: #fff; /* Button text color */
        border: none; /* Remove default button border */
        padding: 5px 10px; /* Adjust padding as needed */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out; /* Smooth transition for background color and text color */
    }
    .search-btn:hover {
        background-color: #0056b3; /* Change background color on hover */
    }
</style>

<nav x-data="{ open: false }" class="custom-nav">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Search Box -->
            <div class="header-content">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('logo/bloom.png') }}" class="adjustable-logo" />
                    </a>
                </div>

                <!-- Search Box -->
             
                    <form method = "get" action = /search>
                    <div class = "input-group">
                        <input class = "form-control" name = "search" placeholder = "Search..." value ="{{isset($search)? $search : ''}}">
                        <button type="submit" class="search-btn">Search</button>
                    </div>
                </form>
             
 
                <!-- Cart Icon -->
                <div class="cart-icon">
                    <!-- Cart icon -->
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 md:-my-px md:ms-10 md:flex"style="color: #FFFFFF;">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>
            
            @if(Auth::user()->usertype == 'admin')       
            <div class="hidden space-x-8 md:-my-px md:ms-10 md:flex" style="color: #FFFFFF;">
                <x-nav-link :href="route('products.list')" :active="request()->routeIs('products.list')">
                    {{ __('Products') }}
                </x-nav-link>
            </div>
            @endif

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>