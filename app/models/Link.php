<?php
class Link extends Eloquent
{
    protected $fillable = array('url', 'hash');

    public static function generateHash($url)
    {
        $newHash     = Str::random(6);
        $existentHash = Link::where('hash', '=', $newHash)->first();

        if ($existentHash) {
            return self::generateHash($url);
        } 

        return $newHash;
    }
}