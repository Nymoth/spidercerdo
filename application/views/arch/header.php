<!doctype html>
<head>
    <title><?php echo (isset($_title) ? $title : 'spidercerdo'); ?></title>
    
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/spidercerdo.css">
</head>
<body>
    
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Spidercerdo</a>
      </div>
      
      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <form class="navbar-form navbar-right" action="/crawl" method="get">
          <div class="form-group">
            <input class="form-control" name="u" type="text" placeholder="Url">
          </div>
          <button type="submit" class="btn btn-success">Empezar</button>
        </form>
      </div>
    </div>
  </nav>
  
  <div class="container" id="main">
    