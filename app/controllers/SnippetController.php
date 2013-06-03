<?php

class SnippetController extends BaseController {

  protected $layout = 'snippet.master';
  public $timestamps = true;

  public function getIndex()
  {
    $this->layout->content = View::make( 'snippet.new' );
  }

  public function getNew()
  {
    $this->layout->content = View::make( 'snippet.new' );
  }

  public function postSaveSnippet()
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

  public function getView( $id )
  {
    $snippet = Snippet::find( $id );
    $this->layout->content = View::make( 'snippet.view' )->with( 'snippet', $snippet );
  }

  public function getFork( $id )
  {
    $snippet = Snippet::find( $id );
    $this->layout->content = View::make( 'snippet.fork' )->with( 'snippet', $snippet );
  }

  public function getList()
  {
    $this->layout->content = View::make( 'snippet.list' );
  }

}