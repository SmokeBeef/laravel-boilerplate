<div class="navbar bg-base-100 border-b border-base-300 dark:border-gray-800">
    <div class="flex-none">
        <label for="sidebar-toggle" class="btn btn-ghost drawer-button lg:hidden">
            <i class="fas fa-bars"></i>
        </label>

    </div>
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">daisyUI</a>
    </div>
    <div class="flex-none">
        <x-ui.theme-toggle />
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost rounded-full">
                @if (Auth::user()->profile)
                    <img src="{{ Auth::user()->profile }}" alt="" class="w-12 rounded-full object-cover h-12">
                @else
                    <i class="fas fa-user-circle fa-2x"> </i>
                @endif
            </div>
            <div tabindex="0"
                class="dropdown-content card card-bordered card-compact bg-base-300 z-[1] w-64 p-2 shadow">
                <div class="card-body">
                    <div class="card-title justify-center flex-col text-center">
                        @if (Auth::user()->profile)
                            <img src="{{ Auth::user()->profile }}" alt="" class="w-14 rounded-full object-cover h-14">
                        @else
                            <i class="fas fa-user-circle fa-2x"> </i>
                        @endif
                        {{ Auth::user()->name }}
                    </div>
                    <div class="divider"></div>
                    <ul class="menu rounded-box m-0 p-0">
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">
                                    <i class="fas fa-sign-out"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
