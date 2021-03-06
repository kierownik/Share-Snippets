@section( 'title' )
View Snippet
@stop

@section( 'content' )
<?php
//
// Include the GeSHi library
//
include_once app_path().'/geshi/geshi.php';

  // Get all the languages
  $languages = array();
  $dir = app_path().'/geshi/geshi';
  if ( $language_dir = opendir( $dir ) )
  {
    while ( false !== ( $language = readdir( $language_dir ) ) )
    {
      if ( $language != "." OR $language != ".." )
      {
        $languages[] = $language;
      }
    }
    closedir( $language_dir );
  }
  asort( $languages );
?>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <ul class="nav">
        <li>
          {{ HTML::linkRoute( 'new_snippet', 'New Snippet' ) }}
        </li>
        <li>
          {{ HTML::linkRoute( 'list_snippets', 'List Snippets' ) }}
        </li>
        {{ Form::open( array( 'route' => 'new_snippet', 'class' => 'navbar-form pull-right' ) ) }}
        {{ Form::input( 'text', 'name', e( $snippet->name ), array( 'placeholder' => 'Name', 'disabled' ) ) }}
        <select id="language" name="language" disabled>
          @foreach ( $languages as $languages )
            @if ( substr( $languages, 0, -4 ) == $snippet->language ) )
              <option value="{{ substr( $languages, 0, -4 ) }}" selected="selected">
                {{ substr( $languages, 0, -4 ) }}
              </option>
            @else
              <option value="{{ substr( $languages, 0, -4 ) }}">
                {{ substr( $languages, 0, -4 ) }}
              </option>
            @endif
          @endforeach
        </select>
        {{ HTML::linkRoute( 'fork_snippet', 'Fork Snippet', $snippet->id, array( 'class' => 'btn btn-warning' ) ) }}
        {{ Form::close() }}
      </ul>
    </div>
  </div>
<?php

// Create a GeSHi object
$geshi = new GeSHi( $snippet->snippet, $snippet->language );
$geshi->set_header_type( GESHI_HEADER_PRE );
$geshi->enable_line_numbers( GESHI_FANCY_LINE_NUMBERS, 3 );
$geshi->set_tab_width( '2' );

// And echo the result!
echo $geshi->parse_code();
?>
@stop