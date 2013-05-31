@section('title')
Fork Snippet
@stop

@section('content')
{{ Form::open(array('url' => '/')) }}
  {{ Form::textarea('snippet', $snippet->snippet, array('id' => 'snippet')) }}
  <div class="navbar">
    <div class="btn-group nav">
      {{ HTML::linkRoute('new_snippet', 'Start Over', array(), ['class' => 'btn btn-danger']) }}
      {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
    </div>
      {{ Form::input('text', 'name', $snippet->name, [ 'placeholder' => 'Name']) }}
      {{ Form::select('language', ['' => 'Language', 'apollo' => 'Apollo', 'basic' => 'Basic', 'clj' => 'Clj', 'css' => 'Css', 'dart' => 'Dart', 'erlang' => 'Erlang', 'go' => 'Go', 'hs' => 'Hs', 'lisp' => 'Lisp', 'llvm' => 'Llvm', 'lua' => 'Lua', 'matlab' => 'Matlab', 'ml' => 'Ml', 'mups' => 'Mups', 'n' => 'N', 'pascal' => 'Pascal', 'proto' => 'Proto', 'r' => 'R', 'rd' => 'Rd', 'scala' => 'Scala', 'sql' => 'Sql', 'tcl' => 'Tcl', 'tex' => 'Tex', 'vb' => 'Vb', 'vhdl' => 'Vhdl', 'wiki' => 'Wiki', 'xq' => 'Xq', 'yaml' => 'Yaml'], $snippet->language ) }}
  </div>
{{ Form::close() }}
@stop