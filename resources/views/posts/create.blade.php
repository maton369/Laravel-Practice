<!DOCTYPE>
<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Name</h1>
    <form action="/posts" method="POST">
        @csrf
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル">
            <p class="title_error" style="color:red">{{$errors->first('post.title')}}</p>
        </div>
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も一日お疲れ様でした"></textarea>
            <p class="title_error" style="color:red">{{$errors->first('post.body')}}</p>
        </div>
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="保存">
    </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>
