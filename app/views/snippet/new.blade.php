@section('title')
New Snippet
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
?>
{{ Form::open(array('route' => 'new_snippet')) }}
  {{ Form::textarea('snippet', '', array('id' => 'snippet')) }}
  <div class="navbar">
    <div class="btn-group nav">
      {{ HTML::linkRoute('new_snippet', 'Start Over', array(), ['class' => 'btn btn-danger']) }}
      {{ Form::submit('Save Snippet', ['class' => 'btn btn-success']) }}
    </div>
      {{ Form::input('text', 'name', Input::old( 'name' ), [ 'placeholder' => 'Name']) }}
        <select id="language" name="language">
          @foreach ( $languages as $languages )
            @if ( $languages == Input::old( 'language' ) )
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
{{ Form::close() }}
@stop