<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published_at', 'category_id', 'image'];
    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createTags($tagString)
    {
        $tags = explode(",", $tagString);
        $tagIds = [];

        foreach ($tags as $tag)
        {
            $newTag = Tag::firstOrCreate(
                ['slug' => str_slug($tag)], ['name' => trim($tag)]
            );
            $newTag->name = ucwords(trim($tag));
            $newTag->slug = str_slug($tag);
            $newTag->save();

            $tagIds[] = $newTag->id;
        }

        $this->tags()->detach();
        $this->tags()->attach($tagIds);
        $this->tags()->sync($tagIds);
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('name');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsNumber($label = 'コメント')
    {
        $commentsNumber = $this->comments->count();

        return $commentsNumber . " " . $label;
    }

    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if (! is_null($this->image))
        {
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->image);
        }

        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if (! is_null($this->image))
        {
            $directory = config('cms.image.directory');
            $ext = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }

        return $imageUrl;
    }

    public function getDateAttribute($value)
    {
        Carbon::setLocale('ja');
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getTagsHtmlAttribute($value)
    {
        $anchors = [];
        foreach($this->tags as $tag) {
            $anchors[] = '<a href="' . route('tag', $tag->slug) . '">' . $tag->name . '</a>';
        }

        return implode(", ", $anchors);
    }

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . "H:i:s";
        return $this->created_at->format($format);
    }

    public function publicationLabel()
    {
        if (! $this->published_at) {
            return '<span class="label label-warning">下書き</span>';
        } elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">予約投稿</span>';
        } else {
            return '<span class="label label-success">公開済み</span>';
        }
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    public static function archives()
    {
        if (env("DB_CONNECTION") === 'pgsql') {
            return static::selectRaw('count(id) as post_count, extract(year from published_at) as year, extract(month from published_at) as month')
                        ->published()
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(published_at) desc')
                        ->get();
        }
        else {
            return static::selectRaw('count(id) as post_count, year(published_at) year, month(published_at) month')
                        ->published()
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(published_at) desc')
                        ->get();
        }
    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['month']) && $month = $filter['month']) {
            if(env("DB_CONNECTION") === 'pgsql') {
                $query->whereRaw('extract(month from published_at) = ?', [$month]);
            }
            else {
                $query->whereRaw('month(published_at) = ?', [$month]);
            }

        }

        if(isset($filter['year']) && $year = $filter['year']) {
            if(env('DB_CONNECTION') === 'pgsql') {
                $query->whereRaw('extract(year from published_at) = ?', [$year]);
            }
            else {
                $query->whereRaw('year(published_at) = ?', [$year]);
            }
        }

        if(isset($filter['term']) && $term = $filter['term']) {
            $query->where(function($q) use ($term) {
                // $q->whereHas('author', function($qr) use ($term) {
                //     $qr->where('name', 'LIKE', "%{$term}%");
                // });
                // $q->whereHas('category', function($qr) use ($term) {
                //     $qr->where('title', 'LIKE', "%{$term}%");
                // });
                $q->orWhereRaw('title', 'LIKE', ["%{$term}%"]);
                $q->orWhereRaw('excerpt', 'LIKE', ["%{$term}%"]);
            });
        }
    }
}
