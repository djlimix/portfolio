<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model {
    protected $fillable = ['slug', 'title', 'text', 'views', 'bg', 'thumb', 'active', 'created_at'];

    public function published(): Attribute {
        return Attribute::make(get: function($value, $data) {
            return Carbon::parse($data['created_at'])->diffForHumans();
        });
    }

    public function getStrippedTextAttribute() {
        return trim(strip_tags($this->text));
    }

    public function getShortAttribute() {
        return Str::limit($this->stripped_text, 25);
    }

    public function getReadingTimeAttribute() {
        return floor(str_word_count($this->stripped_text) / 200) ?: 1;
    }

    public function getReadingTimeHtmlAttribute() {
        return $this->reading_time.trans_choice('minutes', $this->reading_time);
    }

    public function getIsNewAttribute() {
        $published_at = $this->created_at->timestamp;
        $two_weeks    = 60 * 60 * 24 * 14; // 60 seconds * 60 minutes * 24 hours * 14 days

        return (time() - $published_at) <= $two_weeks;
    }
}
