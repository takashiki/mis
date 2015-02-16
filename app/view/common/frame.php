<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <title><?php echo $title ?></title>

</head>

<body>

  <div class="article">

    <h1><?php echo $title ?></h1>

    <div class="content">
    
    {yield=content}
    
    </div>

  </div>

</body>

</html>