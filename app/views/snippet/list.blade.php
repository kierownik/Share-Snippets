@section( 'title' )
List Snippets
@stop

@section( 'content' )
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <ul class="nav">
        <li>
          {{ HTML::linkRoute( 'new_snippet', 'New Snippet' ) }}
        </li>
        <li class="active">
          {{ HTML::linkRoute( 'list_snippets', 'List Snippets' ) }}
        </li>
      </ul>
    </div>
  </div>
<?php
  $snippets = DB::table('snippets')->paginate(10);
  ?>
  <div class="text-center">{{ $snippets->links() }}</div>
  <table class="table table-hover table-bordered">
    <tr>
      <td style="width: 25%">ID</td>
      <td style="width: 32.5%">NAME</td>
      <td style="width: 32.5%">LANGUAGE</td>
    </tr>
    <tbody>
      @foreach( $snippets as $snippet )
      <tr>
        <td>{{ HTML::linkRoute( 'view_snippet', $snippet->id, $snippet->id ) }}</td>
        <td>{{ e( $snippet->name ) }}</td>
        <td>{{ e( $snippet->language ) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">{{ $snippets->links() }}</div>
@stop