<x-layout.dashboard>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="card-title">
                    <h4>Create New User</h4>
                </div>
                <div class="divider"></div>
                <div class="">
                    <label for="" class="form-control">
                        <div class="label">
                            <span class="label-text">
                                Name
                            </span>
                        </div>
                        <input type="text" class="input input-bordered" name="name" id="">
                    </label>
                    <label for="" class="form-control">
                        <div class="label">
                            <span class="label-text">
                                Email
                            </span>
                        </div>
                        <input type="email" class="input input-bordered" name="email" id="">
                    </label>
                    <label for="" class="form-control">
                        <div class="label">
                            <span class="label-text">
                                Password
                            </span>
                        </div>
                        <input type="password" class="input input-bordered" name="password" id="">
                    </label>
                    <label for="" class="form-control">
                        <div class="label">
                            <span class="label-text">
                                Profile
                            </span>
                        </div>
                        <input type="file" class="file-input file-input-bordered" name="profile" id="" accept=".jpg, .png, .jpeg">
                    </label>
                </div>
                <div class="card-actions justify-between">
                    <a href="{{ route('users.index') }}" class="btn btn-outline btn-error">Batal</a>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</x-layout.dashboard>
