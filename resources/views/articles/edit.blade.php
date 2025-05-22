<x-app title="Edit artikel: {{ $articles->title }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <x-card class="mb-4" title="Edit artikel" subtitle="{{ $articles->title }}">
                    <form method="post" action="/articles/{{ $articles->id }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" value="{{ $articles->title }}"
                                class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="body" class="form-label">Body</label>
                            <textarea name="body" id="body" class="form-control">{{ $articles->body }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</x-app>