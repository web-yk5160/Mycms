@if(isset($categoryName))
<div class="alert alert-info">
    <p>カテゴリー: <strong>{{ $categoryName }}</strong></p>
</div>
@endif

@if(isset($tagName))
<div class="alert alert-info">
    <p>タグ: <strong>{{ $tagName }}</strong></p>
</div>
@endif

@if(isset($authorName))
<div class="alert alert-info">
    <p>作成者: <strong>{{ $authorName }}</strong></p>
</div>
@endif

@if($term = request('term'))
<div class="alert alert-info">
    <p>検索結果: <strong>{{ $term }}</strong></p>
</div>
@endif