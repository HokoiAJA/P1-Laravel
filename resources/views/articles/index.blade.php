<x-app title="Articles">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        @forelse ($articles as $article)
      <x-card title="{{ $article->title }}"
        subtitle="{{ \Carbon\Carbon::parse($article->created_at)->format('d F, Y') }}">
        {{ $article->body }}
        <div class="mt-2">
        <a href="/articles/{{ $article->id }}" class="btn btn-primary">
          Read more
        </a>
        </div>
      </x-card>
    @empty
    <div class="alert alert-info">Tidak ada data</div>
  @endforelse
      </div>
    </div>
  </div>
</x-app>