<?php

class snippet_controller extends BaseController {

  protected $layout = 'snippet.master';
  public $restful   = true;
  public $timestamps = true;

  public function get_new()
  {
    $this->layout->content = View::make( 'snippet.new' );
  }

  public function post_save_snippet()
  {
    // setup rules for validation
    $rules = array(
      'snippet' => 'required',
      'name'    => 'required|max:50'
    );
    $validation = Validator::make( Input::all(), $rules );

    if ( $validation->fails() )
    {
      return Redirect::route( 'new_snippet' )
              ->withErrors( $validation )
              ->withInput();
    }
    else
    {
      $id = DB::table( 'snippets' )->insertGetId(
          array( 'name' => Input::get( 'name' ), 'snippet' => Input::get( 'snippet' ), 'language' => Input::get( 'language' ), 'created_at' => time() )
      );
      return Redirect::route( 'view_snippet' , array( $id ) )->with( 'id', $id );
    }
  }

  public function get_view( $id )
  {
    $snippet = Snippet::find( $id );
    $this->layout->content = View::make( 'snippet.view' )->with( 'snippet', $snippet );
  }

  public function get_fork( $id )
  {
    $snippet = Snippet::find( $id );
    $this->layout->content = View::make( 'snippet.fork' )->with( 'snippet', $snippet );
  }

  public function get_list()
  {
    $this->layout->content = View::make( 'snippet.list' );
  }

}