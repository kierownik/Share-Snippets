<?php

class snippet_controller extends BaseController {

  protected $layout = 'snippet.master';
  public $restful = true;

  public function get_new()
  {
    $this->layout->content = View::make('snippet.new');
  }

  public function post_new()
  {
    // setup rules for validation
    $rules = array(
      'snippet'    => 'required'
    );
    $validation = Validator::make( Input::all(), $rules );

    // If validation fails we return to `admin/category` with the errors
    if ( $validation->fails() )
    {
      return Redirect::route( 'new_snippet' )
              ->withErrors( $validation )
              ->withInput();
    }
    else
    {
      $id = DB::table('snippets')->insertGetId(
          array('name' => Input::get('name'), 'snippet' => Input::get('snippet'), 'language' => Input::get('language'))
      );
      return Redirect::route( 'view_snippet' , array($id))->with('id', $id );
    }
  }

  public function get_view($id)
  {
    $snippet = Snippet::find($id);
    $this->layout->content = View::make('snippet.view')->with('snippet', $snippet );
  }

  public function get_fork($id)
  {
    $snippet = Snippet::find($id);
    $this->layout->content = View::make('snippet.fork')->with('snippet', $snippet );
  }

  public function get_list()
  {
    return 'List Snippets';
  }

}