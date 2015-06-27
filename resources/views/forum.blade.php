@extends('app')

@section('content')
	<div class="container">

		<h1 class="text-center">Forum</h1>
		<hr/>

		<table class="table table-striped" style="width:100%">
		  <tr>
		    <th><a href="#">Title</a></th>
		    <th><a href="#">Username</a></th>
		    <th><a href="#">Topic</a></th> 
		    <th><a href="#">Publish Date</a></th>
		    <th><a href="#">Score</a></th>
		  </tr>
		  <tr>
		    <td>TestPost1</td>
		    <td>User1</td> 
		    <td>Miscellaneous</td>
		    <td>June 22nd, 2015</td>
		    <td>123</td>
		  </tr>
		  <tr>
		    <td>TestPost2</td>
		    <td>User2</td> 
		    <td>4</td>
		    <td>June 22nd, 2015</td>
		    <td>101</td>
		  </tr>
		  <tr>
		    <td>TestPost2</td>
		    <td>User3</td> 
		    <td>2</td>
		    <td>June 22nd, 2015</td>
		    <td>14</td>
		  </tr>
		</table>

		<div class="text-center">
			<nav>
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>
@stop