@foreach( $categories as $category )
    <option value="{{ $category->id or "" }}"
        @isset($article->id)

           @foreach( $article->categories as $category_article)
               @if($category->id == $category_article->id)
                   selected=""
               @endif
           @endforeach
        @endisset
    >
        {!! $delimiter or "" !!} {{ $category_list->title or "" }}
    </option>

    @if(count($category_list->children) > 0 )
        @include('admin.articles.partials.categories',[
            'categories'    => $category->children,
            'delimiter'     => ' - ' . $delimiter
        ])
    @endif
@endforeach