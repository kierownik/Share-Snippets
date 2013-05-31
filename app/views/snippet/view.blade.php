@section('title')
View Snippet
@stop

@section('content')
<?php
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

$source = $snippet->snippet;

$language = $snippet->language;

//
// Create a GeSHi object
//
 
$geshi = new GeSHi($source, $language);
$geshi->set_header_type(GESHI_HEADER_PRE);
$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 3);
$geshi->set_tab_width('2');
//
// And echo the result!
//
echo $geshi->parse_code(); ?>
<pre class="prettyprint linenums lang-{{ $snippet->language }}">
  {{ e( $snippet->snippet ) }}
</pre>
  <div class="navbar">
    <div class="btn-group nav">
      {{ HTML::linkRoute('fork_snippet', 'Fork Snippet', $snippet->id, ['class' => 'btn btn-warning']) }}
      {{ HTML::linkRoute('new_snippet', 'New Snippet', array(), ['class' => 'btn btn-success']) }}
    </div>
      {{ Form::input('text', 'name', $snippet->name, [ 'placeholder' => 'Name', 'disabled']) }}
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