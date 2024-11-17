<x-layout.dashboard>
    <div class="card bg-base-200">
        <div class="card-body">
            <div class="card-title items-start sm:items-center sm:justify-between flex-col sm:flex-row">
                <h4>
                    Users List
                </h4>
                <div class="flex gap-4 ">
                    <form action="{{ route('users.index') }}" method="GET" class="join">
                        <label class="join-item input input-bordered input-sm flex items-center gap-2">
                            <input type="search" name="search" value="{{ Request::query('search') }}" class="grow"
                                placeholder="Search" />
                        </label>
                        <button type="submit" class="join-item btn btn-primary btn-sm rounded-md">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm rounded-md">Add <i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $loop->index + 1 + $users->perPage() * ($users->currentPage() - 1) }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->profile)
                                        <img class="max-w-14 rounded-full object-cover" src="{{ $user->profile }}" alt="">
                                    @else
                                        <i class="fas fa-user-circle fa-4x"></i>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d F Y') }}</td>
                                <td class="">
                                    <button class="btn btn-error btn-outline"
                                        onclick="modal{{ $user->id }}.showModal()">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <dialog id="modal{{ $user->id }}" class="modal">
                                        <div class="modal-box">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">
                                                    <i class="fas fa-xmark"></i>
                                                </button>
                                              </form>
                                            <h3 class="text-lg font-bold">Delete User?</h3>
                                            <p class="py-4">
                                                User <strong>{{ $user->name }}</strong> akan di hapus
                                            </p>
                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <button class="btn btn-primary btn-outline">
                                                        <i class="fas fa-x"></i>
                                                        Batal
                                                    </button>
                                                </form>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-error btn-outline" data-action="submit">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-square btn-info">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!-- pagination -->
                    <!-- end pagination -->
                </table>
            </div>
            <div class="card-actions justify-center">
                {{ $users->links('vendor.pagination.default') }}
                {{-- {{ $users-> }} --}}
            </div>
        </div>
        {{-- @dump($users) --}}
    </div>
</x-layout.dashboard>
