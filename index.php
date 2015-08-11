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

    <title>How-To Guide for Using the OMBb Web API</title>

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
          <a class="blog-nav-item active" href="#">Home</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">How to Use the OMBb Web API</h1>
        <p class="lead blog-description">by Dustin Chase</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">About This Guide</h2>
 

            <p>Welcome to my How-To guide for the OMBb Web API.</p>
   
            <p>
			The OMBb Web API is a way to access information about film and television shows. Examples of the data you can access are year of release, plot summary, and actors. 
			In this guide we will look at the types of searches ou can do and what sorts of data these searches return. There is also a demonstration page which shows an example of what
			you can do with this data.
			</p>
            
            <p>
			The OMBb Web API returns data in either JSON or XML objects returned from search queries. We will use JavaScript to retrieve these search results so we can 
			avoid re-loading the page to return search results. For simplicity we will just be looking at JSON results but the XML format might serve your purpose better. 
			</p>
			
			<p>
			The API is relatively simple. There only a couple of ways to search for data and no complex JSON calls. We will examine the two types of searches:
			</p>
            <ul>
              <li>Search By ID/Title</li>
              <li>Search By Search</li>
            </ul>
            <p>Click below to get started.</p>
          </div><!-- /.blog-post -->

       

          <nav>
            <ul class="pager">
              <li><a href="setup.php">Forward!</a></li>
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
