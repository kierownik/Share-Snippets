@section( 'title' )
List Snippets
@stop

@section( 'content' )
  <div class="navbar-fixed-top">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#">Share Your Snippets</a>
      </li>
      <li>
        {{ HTML::linkRoute( 'new_snippet', 'New Snippet' ) }}
      </li>
      <li>
        {{ HTML::linkRoute( 'list_snippets', 'List Snippets' ) }}
      </li>
    </ul>
  </div>
<?php
  $snippets = Snippet::all();
  ?>
  <table class="table table-hover table-bordered">
    <tr>
      <td>ID</td>
      <td>NAME</td>
      <td>LANGUAGE</td>
    </tr>
    <tbody>
      @foreach( $snippets as $snippet )
      <tr>
        <td>{{ $snippet->id }}</td>
        <td>{{ $snippet->name }}</td>
        <td>{{ $snippet->language }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop