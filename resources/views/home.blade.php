<x-layout>
    <style>
        .blogtags{
            display: flex;
            gap: 1rem;
            list-style: none;
            align-items: center;
            margin-top: 2rem;
        }
        .blogtags span{
            font-size: 1rem;
        }
        .tag{
            padding: 2px 10px;
            border: 1px solid #fff;
            border-radius: 25px;
        }
        .tag a{
            color: #fff;
            font-size: 1rem;
            text-decoration: none;
        }
    </style>
    @foreach($blogs as $blog)
        <div style="display: flex; flex-direction: column; max-width: 600px; padding: 1rem; border: 1px solid #fff; border-radius: 15px; margin: auto auto 40px;">
            <div class="blogheader" style="display: flex; justify-content: center">
                <h3> {{ $blog['title'] }}</h3>
            </div>
            <p> {{ $blog['content'] }} </p>
            <hr>
            <div class="blogfooter" style="display: flex; justify-content: space-between">
                <a href="/author/{{ $blog->author->id }}">{{ $blog->author->name }}</a>
                <em> {{ $blog->created_at->format('d M, Y') }}</em>
            </div>
            @if($blog->tags->isNotEmpty())
                <div class="blogtags">
                    <span>Tags:</span>
                    @foreach($blog->tags as $tag)
                        <li class="tag">
                            <a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </div>
            @else
{{--                <p>No Tags</p>--}}
            @endif

        </div>
    @endforeach
    <div>
        {{ $blogs->links() }}
    </div>
</x-layout>
