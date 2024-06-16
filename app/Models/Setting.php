<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name','value'
    ];
    public static function siteName(){
        return (new static)::where('name','Site Name')->first()->value ?? 'Site Name';
    }
    public static function phone(){
        return (new static)::where('name','Phone')->first()->value ?? '+1111111111';
    }
    public static function email(){
        return (new static)::where('name','Email')->first()->value ?? 'dummy@mail.com';
    }
    public static function facebook(){
        return (new static)::where('name','Facebook')->first()->value ?? 'facebook.com';
    }
    public static function twitter(){
        return (new static)::where('name','Twitter')->first()->value ?? 'twitter.com';
    }
    public static function youtube(){
        return (new static)::where('name','Youtube')->first()->value ?? 'youtube.com';
    }
    public static function instagram(){
        return (new static)::where('name','Instagram')->first()->value ?? 'instagram.com';
    }
    public static function address(){
        return (new static)::where('name','Address')->first()->value ?? 'Dummy Address';
    }
    public static function template(){
        return (new static)::where('name','Template')->first() ? (new static)::where('name','Template')->first()->value : 'expert-template';
    }
}
