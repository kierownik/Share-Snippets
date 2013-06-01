@section('title')
Fork Snippet
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
      if ( $language != "." OR $language != ".." )
      {
        $languages[] = $language;
      }
    }
    closedir( $language_dir );
  }
?>
  <div class="navbar-fixed-top">
    <ul class="nav nav-tabs">
      <li>
        {{ HTML::linkRoute( 'new_snippet', 'New Snippet' ) }}
      </li>
      <li>
        {{ HTML::linkRoute( 'list_snippets', 'List Snippets' ) }}
      </li>
      {{ Form::open( array( 'url' => '/', 'class' => 'navbar-form pull-right' ) ) }}
      {{ Form::input('text', 'name', $snippet->name, [ 'placeholder' => 'Name']) }}
      <select id="language" name="language">
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
      {{ Form::submit('Save Snippet', ['class' => 'btn btn-success']) }}
    </ul>
  </div>
  {{ Form::textarea('snippet', $snippet->snippet, array('id' => 'snippet')) }}
{{ Form::close() }}
@stop