<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <script>
            function deletePost(id) {
                'use strict';

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </head>
    <body>
        <header>
            <h1>Blog Name</h1>
            <nav>
                <a href="/posts/create" class="create-post-link">新しい投稿を作成</a>
            </nav>
        </header>

        <main>
            <section class="posts">
                @foreach ($posts as $post)
                    <article class="post">
                        <h2 class="post-title">
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
                        <p class="post-body">{{ $post->body }}</p>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})" class="delete-button">削除</button>
                        </form>
                    </article>
                @endforeach
            </section>

            <div class="pagination">
                {{ $posts->links() }}
            </div>
        </main>
    </body>
</html>
