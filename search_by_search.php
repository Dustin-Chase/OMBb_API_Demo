<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>How-To Guide for Using the OMDb Web API</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Searching by Search</h1>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">Casting a Wider Search Net</h2>
 

            <p>
			If you aren't exactly sure what you are looking for, you can cast a wider net with the 'By Search' option. This allows you to just enter a title and get back 
			any film or TV series that roughly matches that title. 
			</p>
			
			<p>
			Suppose we enter the following query: 
			</p>
		<div id="code">
			<code> 
			http://www.omdbapi.com/?s=airplane
			</code>
		</div>
		<br>
		We get these rows which have a similar title:
		</br>
		<div id="code">
			<code>
			 {"Search":[{"Title":"Airplane!","Year":"1980","imdbID":"tt0080339","Type":"movie"},{"Title":"Airplane II: The Sequel","Year":"1982","imdbID":"tt0083530","Type":"movie"},
			 {"Title":"Airplane vs Volcano","Year":"2014","imdbID":"tt3417334","Type":"movie"},{"Title":"Mr. Monk and the Airplane","Year":"2002","imdbID":"tt0650624","Type":"episode"},
			 {"Title":"Paper Airplane","Year":"2013","imdbID":"tt2669744","Type":"episode"},{"Title":"Airplane Repo","Year":"2010–","imdbID":"tt1808720","Type":"series"},
			 {"Title":"Fly Jefferson Airplane","Year":"2004","imdbID":"tt0427256","Type":"movie"},{"Title":"Love Is in the Airplane","Year":"2005","imdbID":"tt0748823","Type":"episode"},
			 {"Title":"Airplane on Conveyor Belt","Year":"2008","imdbID":"tt1177693","Type":"episode"},{"Title":"Airplane Hour","Year":"2007","imdbID":"tt1157191","Type":"episode"}]}
			</code>
		</div>
		</p>
		
		
		<h4>By Search</h4>
		<h6>i, t</h6>
		<p>This search type and parameters are really useful if you aren't sure what you are looking for, but do we have the same kinds of search formatting issues with titles as before? Let's try this search:
		<code>httpRequest.open("GET", "http://www.omdbapi.com/?s=where+the+wild+things+are&type=episode", true);</code> This search turns up:</p>
		<div id="code">
		<code>
		 {"Search":[{"Title":"Where the Wild Things Are","Year":"2000","imdbID":"tt0533524","Type":"episode"},{"Title":"Where the Wild Things Are","Year":"2008","imdbID":"tt1002871","Type":"episode"},
		 {"Title":"Where the Wild Things Are","Year":"2009","imdbID":"tt1383797","Type":"episode"},{"Title":"Where the Wild Things Are","Year":"2009","imdbID":"tt1524591","Type":"episode"},
		 {"Title":"The Mob Reviews: 'Where the Wild Things Are' and 'Law Abiding Citizen'","Year":"2009","imdbID":"tt1535247","Type":"episode"},
		 {"Title":"Where the Wild Things Are/Paranormal Activity/Law Abiding Citizen","Year":"2009","imdbID":"tt1539917","Type":"episode"},
		 {"Title":"Where the Wild Things Are","Year":"2009","imdbID":"tt1800443","Type":"episode"},
		 {"Title":"Couples Retreat/The Vampire's Assistant/Where the Wild Things Are","Year":"2009","imdbID":"tt2135150","Type":"episode"},
		 {"Title":"Where the Wild Things Are","Year":"2012","imdbID":"tt2209490","Type":"episode"},{"Title":"Where the Wild Things Are","Year":"2009","imdbID":"tt3013474","Type":"episode"}]}
		</code>
		</div>
		 <p>If we do the search <code>httpRequest.open("GET", "http://www.omdbapi.com/?s='where the wild things are'&type=episode", true);</code>we get......exactly the same thing. So we
		 don't have to worry about which way we submit the search with this method.</p>
		
		<p>That's the different search types and parameters. From here you can pull data from the database and use it however you like! On the next page we will
		look at an example. </p>
         </div><!-- /.blog-post -->

       

          <nav>
            <ul class="pager">
              <li><a href="search_by_id.php">Previous</a></li>
			  <li><a href="demonstration.php">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Jump to Section</h4>
            <ol class="list-unstyled">
              <li><a href="setup.php">Setup</a></li>
              <li><a href="search_by_id.php">Search by ID/Title</a></li>
              <li><a href="search_by_search.php">Search by...Search</a></li>
              <li><a href="demonstration.php">Demonstration</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Built using <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
