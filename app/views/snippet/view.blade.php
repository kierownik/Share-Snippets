@section('title')
View Snippet
@stop

@section('content')
<?php
// Get all the languages
$languages = array();
$dir = app_path().'/geshi/geshi';
if ( $language_dir = opendir( $dir ) )
{
  while ( false !== ( $language = readdir( $language_dir ) ) )
  {
    if ( $language != "." && $language != ".." )
    {
        $languages[] = $language;
    }
  }
  closedir( $language_dir );
}

// Create a GeSHi object
$geshi = new GeSHi($snippet->snippet, $snippet->language);
$geshi->set_header_type(GESHI_HEADER_PRE);
$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 3);
$geshi->set_tab_width('2');
//
// And echo the result!
//
echo $geshi->parse_code();
?>
  <div class="navbar-fixed-top">
    <div class="btn-group nav">
      {{ HTML::linkRoute('fork_snippet', 'Fork Snippet', $snippet->id, ['class' => 'btn btn-warning']) }}
      {{ HTML::linkRoute('new_snippet', 'New Snippet', array(), ['class' => 'btn btn-success']) }}
    </div>
      {{ Form::input('text', 'name', e($snippet->name), [ 'placeholder' => 'Name', 'disabled']) }}
    <select id="language" name="language" disabled>
      @foreach ( $languages as $languages )
        @if ( $languages == $snippet->language. '.php' ) )
          <option value="{{ substr($languages, 0, -4 ) }}" selected="selected">
            {{ substr($languages, 0, -4 ) }}
          </option>
        @else
          <option value="{{ substr($languages, 0, -4 ) }}">
            {{ substr($languages, 0, -4 ) }}
          </option>
        @endif
      @endforeach
    </select>
  </div>
@stop