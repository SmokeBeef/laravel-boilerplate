<x-layout.layout>
    <div class="flex">
        <div class="drawer lg:drawer-open">
            <input id="sidebar-toggle" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col ">
                <!-- Page content here -->
                <x-ui.navbar />
                <div class="breadcrumbs text-sm mx-4 mt-4">
                    <ul>
                        @foreach (explode('/', Request::path()) as $path)
                            <li class="capitalize">{{ $path }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="m-4">
                    {{ $slot }}
                </div>
            </div>
            <div class="drawer-side">
                <label for="sidebar-toggle" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                    <div class="py-8 w-full text-center flex justify-center items-center gap-4">
                        <i class="fas fa-dashboard fa-2x"></i>
                        <h1 class="text-xl font-bold">Dashboard</h1>
                    </div>
                    <!-- Sidebar list content here -->
                    <li class="">
                        <h2 class="menu-title ">Home</h2>
                        <ul>
                            <li class="">
                                <a class="@if (Request::is('dashboard')) active @endif" href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i>
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h2 class="menu-title">Master</h2>
                        <ul>
                            <li>
                                <a class="@if (Request::is('master/users')) active @endif"
                                    href="{{ route('users.index') }}">
                                    <i class="fas fa-users"></i>
                                    Users
                                </a>
                            </li>
                            <li>
                                <a class="@if (Request::is('master/users'))  @endif"
                                    href="{{ route('users.index') }}">
                                    <i class="fas fa-users"></i>
                                    Users
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h2 class="menu-title">Account</h2>
                        <ul>
                            <li>
                                <a class="@if (Request::is('account/profile')) active @endif"
                                    href="{{ route('account.profile') }}">
                                    <i class="fas fa-user"></i>
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layout.layout>
