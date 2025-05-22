<x-app title="Edit User">
    <div class="container">
        <x-card title="Edit" subtitle="Edit existing user">
            <form method="POST" action="/users/{{ $users->id }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $users->name) }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $users->email) }}">
                </div>

                <div class="mb-4">
                    <label for="email_verified_at" class="form-label">Date</label>
                    <input type="datetime-local" name="email_verified_at" id="email_verified_at" class="form-control"
                        value="{{ old('email_verified_at', $users->email_verified_at ? \Carbon\Carbon::parse($users->email_verified_at)->format('Y-m-d\TH:i') : '') }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password <small>(Leave blank if not
                            changing)</small></label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-card>
    </div>
</x-app>