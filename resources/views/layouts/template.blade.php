
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ToDoApp</title>

  <script src="http://127.0.0.1:8000/js/app.js" defer></script>
  <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
 
</head>

<body>

  @include('layouts.nav')

  <!-- Page Content -->
  <div class="container">

   


    <div class="row">
      <div class="col-lg-12">
       @yield('content')
      </div>
    </div>
  </div>



</body>

</html>
