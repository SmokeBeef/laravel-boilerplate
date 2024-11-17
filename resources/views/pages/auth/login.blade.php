<x-layout.layout>
    <div class="flex justify-center items-center min-h-[100svh]">
        <div class="card max-w-[40rem] w-[40rem] shadow-md card-bordered ">
            <div class="card-body">
                <div class="card-title text-3xl text-center justify-center">Login</div>
                @error('message')
                    <div class="card-subtitle text-center text-error">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('auth.login.post') }}" method="POST" class="space-y-4">
                    @csrf

                    <label for="email" class="form-control">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input type="email" class="input input-bordered" value="{{ old('email') }}" id="email"
                            name="email" autocomplete="username">
                        <div class="label">
                            @error('email')
                                <span class="label-text text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <label for="password" class="form-control">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input type="password" value="{{ old('password') }}" class="input input-bordered "
                            id="password" name="password" autocomplete="current-password">
                        @error('password')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </label>
                    <div class="form-control">
                        <label for="remember" class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" name="remember" id="remember" class="checkbox">
                            <span class="label-text">Remember me</span>
                        </label>
                    </div>
                    <div class="card-actions">
                        <button type="submit" class="btn w-full btn-primary" data-action="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.layout>
