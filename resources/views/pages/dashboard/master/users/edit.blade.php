<x-layout.dashboard>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="card-title">
                    <h4>Edit User</h4>
                </div>
                <div class="divider"></div>
                <div class="">
                    <label for="" class="form-control">
                        <div class="label">
                            <span class="label-text">
                                Name
                            </span>
                        </div>
                        <input type="text" class="input input-bordered" value="{{ $user->name }}" name="name" id="">
                    </label>
                    <label for="" class="form-control">
                        <div class="label">
                            <span class="label-text">
                                Email
                            </span>
                        </div>
                        <input type="email" class="input input-bordered" value="{{ $user->email }}" name="email" id="">
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
                    <button class="btn btn-primary" data-action="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</x-layout.dashboard>
