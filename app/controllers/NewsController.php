<?php

class NewsController extends BaseController{

    public function save ()
    {
        $new_news = array(
            'title'  => Input::get('title'),
            'content'=> Input::get('content'),
        );

        $rules = array(
            'title'  => 'required',
            'content'=> 'required',
        );

        $v = Validator::make($new_news, $rules);
        if($v->fails()){
            return Redirect::action('UserController@index')->withErrors($v)->withInput();
        }
        $news = new News();
        $news -> title = $new_news['title'];
        $news -> content = $new_news['content'];
        $news -> user_id = Auth::user()->id;
        $news -> author = Auth::user()->username;
        $news -> save();
        return Redirect::action('UserController@index');
    }
    
    public function delete($id)
    {
        $news = News::find($id);
        News::destroy($id);
        return Redirect::action('UserController@index');
    }
    

}