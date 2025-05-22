<x-app title="Articles">
  <div class="container mt-4">
    <div class="row">
      <div class="card">
        <div class="text-end">
          <a href="/articles/create" class="btn btn-success">
            + Create Article
          </a>
        </div>
      </div>

      @forelse ($articles as $article)
      <x-card title="{{ $article->title }}"
      subtitle="{{ \Carbon\Carbon::parse($article->created_at)->format('d F, Y') }}">
      {{ $article->body }}
      <div class="mt-2 d-flex flex-column gap-2">
        <a href="/articles/{{ $article->id }}" class="btn btn-primary">
        Read more
        </a>
        <a href="/articles/{{ $article->id }}/edit" class="btn btn-warning">
        Edit
        </a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline"
        onsubmit="return confirm('Yakin ingin menghapus Artikel ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
          Delete
        </button>
        </form>
      </div>
      </x-card>
    @empty
      <div class="alert alert-info mt-4">Tidak ada data</div>
    @endforelse
    </div>
    @if (session('success'))
    <script>
      alert("{{ session('success') }}");
    </script>
  @endif
  </div>
</x-app>