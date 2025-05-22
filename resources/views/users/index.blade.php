<x-app title="Users">
    <div class="container mt-4">
        <div class="row">
            <x-card title="Users" subtitle="Table of users">
                <div class="mt-4 text-end">
                    <a href="/users/create" class="btn btn-success">
                        + Create Article
                    </a>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
        </div>
        @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </x-card>
    </div>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
</x-app>