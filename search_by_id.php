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
        <h1 class="blog-title">Searching by ID/Title</h1>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">The first of two search types.</h2>
 

            <p> The search by ID or Title option allows you to search by title (yep) or by IMDB identification number. Conducting a search by title with the title "Airplane" like this
		<div id="code">
			<code>
			http://www.omdbapi.com/?t=airplane&plot=short&r=json
			</code>
		</div>
		<br>
		returns this result: 
		<br>
		<div id="code">
			<code>
			{"Title":"Airplane","Year":"1999","Rated":"N/A","Released":"15 Aug 1999","Runtime":"60 min","Genre":"Action, Comedy, Sci-Fi","Director":"Josh Pate","Writer":"Josh Pate",
			"Actors":"Clayton Rohner, Richard Brooks, Googy Gress, Marshall Bell","Plot":"N/A","Language":"N/A","Country":"N/A","Awards":"N/A",
			"Poster":"http://ia.media-imdb.com/images/M/MV5BMTgzNTIwMDA0M15BMl5BanBnXkFtZTcwMzk0ODM3Mw@@._V1_SX300.jpg","Metascore":"N/A","imdbRating":"7.4","imdbVotes":"11",
			"imdbID":"tt0584812","Type":"episode","Response":"True"}
			</code>
		</div>
		<br>
		If you were looking for the comedy satire Airplane! you would probably be disappointed in this result since this refers to an episode of a television show that was released about 20 years
		after the movie. You'll get better results if you know the release year: 
		<br>
		<div id="code">
			<code>
			http://www.omdbapi.com/?t=airplane&y=1980&plot=short&r=json
			</code>
		</div>
		<br>
		Which gives the right data:
		<br>
		<div id="code">
			<code>
			 {"Title":"Airplane!","Year":"1980","Rated":"PG","Released":"02 Jul 1980","Runtime":"88 min","Genre":"Comedy","Director":"Jim Abrahams, David Zucker, Jerry Zucker",
			"Writer":"Jim Abrahams (written for the screen by), David Zucker (written for the screen by), Jerry Zucker (written for the screen by)",
			"Actors":"Kareem Abdul-Jabbar, Lloyd Bridges, Peter Graves, Julie Hagerty","Plot":"An airplane crew takes ill. Surely the only person capable of 
			landing the plane is an ex-pilot afraid to fly. But don't call him Shirley.","Language":"English","Country":"USA","Awards":"Nominated for 1 Golden Globe. 
			Another 2 wins & 5 nominations.","Poster":"http://ia.media-imdb.com/images/M/MV5BNDU2MjE4MTcwNl5BMl5BanBnXkFtZTgwNDExOTMxMDE@._V1_SX300.jpg","Metascore":"N/A",
			"imdbRating":"7.8","imdbVotes":"137,289","imdbID":"tt0080339","Type":"movie","Response":"True"}
			</code> 
		</div>
		<h2>Search Parameters</h2>
		<p>Now that we've seen the search types and the whole chunks of data we get back, let's look at the individual search parameters and how they are used.</p>
		<h4>By ID or Title</h4>
		<h6>i, t</h6>
		<p>The API tells us that both i and t are optional, but that at least one argument is required. With no arguments, our search crashes and burns so it's a good idea
			to have either the title or IMDB identification number in there.</p>
		
		<p>We've seen what happens if we enter a title by itself. The results are a little unpredictable if we are searching by title and no have no other information. 
		 What happens in the title field is blank? We get back <code>{"Response":"False","Error":"Object reference not set to an instance of an object."}</code>! So you will want
		 to make sure you don't have empty search fields when you submit your request. </p>
		 
		 <p>If we search by ID while using an invalid number we get back a more useful response. Submitting the search <code>httpRequest.open("GET", "http://www.omdbapi.com/?i=12345", true)</code> 
		 gives us back <code> {"Response":"False","Error":"Incorrect IMDb ID"}</code>. A highly useful reply that we can use to alert the user.</p>
		
		<h6>type</h6>
		<p>'Type' is a really useful parameter to narrow down your search. Suppose we search for "Where the Wild Things Are." by title: 
		<code>http://www.omdbapi.com/?t=Where+the+Wild+Things+Are&y=&plot=short&r=json</code> That returns the most likely suspect: The 2009 movie. But there is 
		also an episode of Buffy the Vampire Slayer by the same name. Trying to find that episode in the database turns out to be kind of tricky. Suppose you submit 
		<code>httpRequest.open("GET", "http://www.omdbapi.com/?t='where the wild things are'&type=episode", true);</code>. Suprisingly, you get back 
		<div id="code">
		<code> {"Title":"The Mob Reviews: 'Where the Wild Things Are' and 'Law Abiding Citizen'","Year":"2009","Rated":"N/A","Released":"17 Oct 2009","Runtime":"30 min","Genre":"Reality-TV, Talk-Show",
		"Director":"N/A","Writer":"N/A","Actors":"Megan Albertus, Angie Griffin, Andre Meadows, Chad Nikolaus","Plot":"N/A","Language":"N/A","Country":"N/A","Awards":"N/A","Poster":"N/A",
		"Metascore":"N/A","imdbRating":"N/A","imdbVotes":"N/A","imdbID":"tt1535247","Type":"episode","Response":"True"}</code>
		</div>
		<p>No one seems to care much about this show since there is so much missing information. To get the Buffy episode, we want to use the search 
		<code>httpRequest.open("GET", "http://www.omdbapi.com/?t=where+the+wild+things+are&type=episode", true);</code> </p>
		<p>Now we get: </p>
		<div id="code"> 
		<code> {"Title":"Where the Wild Things Are","Year":"2000","Rated":"TV-PG","Released":"25 Apr 2000","Runtime":"60 min","Genre":"Action, Drama, Fantasy","Director":"David Solomon","Writer":
		"Joss Whedon (creator), Tracey Forbes","Actors":"Sarah Michelle Gellar, Nicholas Brendon, Alyson Hannigan, Marc Blucas","Plot":"Buffy and Riley's passionate lovemaking energizes supernatural
		elements inside a frat house.","Language":"English","Country":"USA","Awards":"N/A","Poster":"http://ia.media-imdb.com/images/M/MV5BMjA5MTczMzY4N15BMl5BanBnXkFtZTYwMzE4NDk5._V1_SX300.jpg",
		"Metascore":"N/A","imdbRating":"5.9","imdbVotes":"815","imdbID":"tt0533524","Type":"episode","Response":"True"}</code>
		</div>
		<p>When you designing your search interface, you will have to decide which format to use for the title strings. The results are quite different depending which method you use. </p>
		
		<h6>y, v</h6>
		<p>The year of release parameter isn't terribly interesting. The API version parameter is still reserved for future use. </p>
		<h6>r</h6>
		<p>The type of data you want to return will depend on your particular application. Click <a href="http://www.json.org/xml.html">here</a> for an explanation of JSON vs. XML response types (quite biased toward JSON of course). There is also 
		<a href="http://stackoverflow.com/questions/5615352/xml-and-json-advantages-and-disadvantages">this</a> discussion of how XML might work better for your application. </p>
		<h6>tomatoes</h6>
		<p>Our last parameter in the search by title/ID is the Rotten Tomatoes rating. You can leave this out and it won't hurt anything.</p>
		<h6>callback</h6>
		<p>Click <a href="http://json-jsonp-tutorial.craic.com/index.html">here</a> for a great explanation of JSON callbacks.</p>
		
		<p>
		We can cast a wider net with OMDb's other search type. We will look at that next. 
		</p>
          </div><!-- /.blog-post -->

       

          <nav>
            <ul class="pager">
              <li><a href="setup.php">Previous</a></li>
			  <li><a href="search_by_search.php">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Jump to Section</h4>
            <ol class="list-unstyled">
              <li><a href="setup.php">Setup</a></li>
              <li><a href="#">Search by ID/Title</a></li>
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
