<x-app title="Create Articles">
    <div class="container">
        <x-card title="New" subtitle="Create new article">
            <form method="post" action="/articles">
                @csrf
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </x-card>
    </div>
</x-app>