@section( 'title' )
New Snippet
@stop

@section( 'content' )
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
?>
  <div class="navbar-fixed-top">
    <ul class="nav nav-tabs">
      <li>
        <a href="#">Share Your Snippets</a>
      </li>
      <li class="active">
        {{ HTML::linkRoute( 'new_snippet', 'New Snippet' ) }}
      </li>
      <li>
        {{ HTML::linkRoute( 'list_snippets', 'List Snippets' ) }}
      </li>
      {{ Form::open( array( 'route' => 'new_snippet', 'class' => 'navbar-form pull-right' ) ) }}
      {{ Form::input( 'text', 'name', Input::old( 'name' ), [ 'placeholder' => 'Name'] ) }}
      <select id="language" name="language">
        @foreach ( $languages as $language )
          @if ( substr( $language, 0, -4 ) == Input::old( 'language' ) )
            <option value="{{ substr( $language, 0, -4 ) }}" selected="selected">
              {{ substr( $language, 0, -4 ) }}
            </option>
          @else
            <option value="{{ substr( $language, 0, -4 ) }}">
              {{ substr( $language, 0, -4 ) }}
            </option>
          @endif
        @endforeach
      </select>
    {{ Form::submit( 'Save Snippet', ['class' => 'btn btn-success'] ) }}
    </ul>
  </div>
  {{ Form::textarea( 'snippet', '', array( 'id' => 'snippet' ) ) }}
{{ Form::close() }}
@stop