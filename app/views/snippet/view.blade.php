@section('title')
View Snippet
@stop

@section('content')
<pre class="prettyprint linenums lang-{{ $snippet->language }}">
  {{ e( $snippet->snippet ) }}
</pre>
  <div class="navbar">
    <div class="btn-group nav">
      {{ HTML::linkRoute('fork_snippet', 'Fork Snippet', $snippet->id, ['class' => 'btn btn-warning']) }}
      {{ HTML::linkRoute('new_snippet', 'New Snippet', array(), ['class' => 'btn btn-success']) }}
    </div>
      {{ Form::input('text', 'name', $snippet->name, [ 'placeholder' => 'Name', 'disabled']) }}
      {{ Form::select('language', ['' => 'Language', 'apollo' => 'Apollo', 'basic' => 'Basic', 'clj' => 'Clj', 'css' => 'Css', 'dart' => 'Dart', 'erlang' => 'Erlang', 'go' => 'Go', 'hs' => 'Hs', 'lisp' => 'Lisp', 'llvm' => 'Llvm', 'lua' => 'Lua', 'matlab' => 'Matlab', 'ml' => 'Ml', 'mups' => 'Mups', 'n' => 'N', 'pascal' => 'Pascal', 'proto' => 'Proto', 'r' => 'R', 'rd' => 'Rd', 'scala' => 'Scala', 'sql' => 'Sql', 'tcl' => 'Tcl', 'tex' => 'Tex', 'vb' => 'Vb', 'vhdl' => 'Vhdl', 'wiki' => 'Wiki', 'xq' => 'Xq', 'yaml' => 'Yaml'], $snippet->language, ['disabled'] ) }}
  </div>
@stop