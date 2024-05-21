<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                The Post
            </h1>
        </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">


            @foreach ($articles as $article)
            @if ($article->category_id)
            @php
                $varCategory= $article->category->name;
                $varUrlCategory =  route('article.byCategory', ['category' => $article->category->id]);
            @endphp

            @else
            @php
            $varCategory= "" ;
            $varUrlCategory =  "#";
            @endphp
            @endif
            <div class="col-12 col-md-3">


                <x-card :tags="$article->tags" :title="$article->title" :subtitle="$article->subtitle" :image="$article->image" :data="$article->created_at->format('d/m/Y')"
                :user="$article->user->name" :url="route('article.show', compact('article'))"

                :category="$varCategory"
                :urlCategory="$varUrlCategory"
                urlWriter="{{ route('article.byWriter', ['user' => $article->user->id]) }}"
                readDuration="{{ $article->readDuration()}}"
                    />
                </div>
                @endforeach
            </div>
        </div>
        @if ($articles instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-end my-4 me-3">
            <div class="pagination">
                @if ($articles->onFirstPage())
                <span class="disabled me-2">&laquo;</span>
                @else
                <a class="me-2" href="{{ $articles->previousPageUrl() }}">&laquo;</a>
                @endif
                @php
                $currentPage = $articles->currentPage();
                $lastPage = $articles->lastPage();
                $start = max($currentPage - 2, 1);
                $end = min($currentPage + 2, $lastPage);
                @endphp

                @if ($start > 1)
                <a style="color: #2c2c2c;text-decoration:none; " class="mx-1" href="{{ $articles->url(1) }}">1</a>
                @if ($start > 2)
                <span class="mx-1">...</span>
                @endif
                @endif
                @for ($i = $start; $i <= $end; $i++)
                @if ($i == $currentPage)
                <span class="active mx-3 text-danger">{{ $i }}</span>
                @else
                <a style="color: #2c2c2c;text-decoration:none; " class="mx-1"
                href="{{ $articles->url($i) }}">{{ $i }}</a>
                @endif
                @endfor
                @if ($end < $lastPage)
                @if ($end < $lastPage - 1)
                <span class="mx-1">...</span>
                @endif
                <a style="color: #2c2c2c;text-decoration:none; " class="mx-1"
                href="{{ $articles->url($lastPage) }}">{{ $lastPage }}</a>
                @endif
                @if ($articles->hasMorePages())
                <a style="color: #2c2c2c;text-decoration:none; " class="ms-2"
                href="{{ $articles->nextPageUrl() }}">&raquo;</a>
                @else
                <span class="disabled ms-2">&raquo;</span>
                @endif
            </div>
        </div>
        @endif
    </x-layout>
