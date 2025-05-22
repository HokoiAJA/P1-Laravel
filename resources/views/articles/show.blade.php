<x-app title="Articles">
    <div class="container">
        <div class="row">
            <div class="mt-4">
                <x-card title="{{ $article->title }}"
                    subtitle="{{ \Carbon\Carbon::parse($article->created_at)->format('d F, Y') }}">
                    {{ $article->body }}
                </x-card>
            </div>
        </div>
    </div>
</x-app>