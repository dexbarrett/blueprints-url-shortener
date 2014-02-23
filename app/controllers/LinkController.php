<?php

use Blueprint\Services\Validation\LinkValidator as Validator;

class LinkController extends BaseController
{
    protected $validator;
  
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function showUrl($hash)
    {
        $link = Link::where('hash', '=', $hash)->first();

        if ($link) {
            return Redirect::to($link->url);
        }

        return Redirect::to('/')
        ->with('message', 'Invalid Link');
    }

    public function createUrl()
    {
          
        if (!$this->validator->validate(Input::all())) {
            return Redirect::to('/')
            ->withInput()
            ->withErrors($this->validator->errors());
        }

        $link = Link::where('url', '=', Input::get('link'))->first();

        if ($link) {
            return Redirect::to('/')
            ->withInput()
            ->with('link', $link->hash);
        }

        $link       = new Link;
        $link->url  = Input::get('link');
        $link->hash = Link::generateHash(Input::get('link'));
        $link->save();

        return Redirect::to('/')
        ->withInput()
        ->with('link', $link->hash);
        
    }
}