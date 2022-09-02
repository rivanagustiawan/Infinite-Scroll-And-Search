<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">

   
    <title>Infinite Scroll And Search</title>
  </head>
  <body>

    <div class="container mt-4">
        <h1 class="mb-3 text-center"> </h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pencarian.." id="search" >
                    <button class="btn btn-primary" id="btnSearch" >Search</button>
                  </div>
        </div>
    </div>

    <div class="container">
        <div class="row" id="infinite">

        
        </div>
        <div id="loader" style="display:none !important" class='d-flex justify-content-center'>Loading...</div>
    </div>

    </div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  
    <script>
        var page = 0;
        var loading = false;
        $(document).ready(function(){
            infinite()
        })
        $(window).scroll(function() {
            if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10 && loading == false) {
            infinite();
            }
        });
        $('#btnSearch').click(function() {
            page = 0;
            $("#infinite").html("");
            infinite();
        });

        function infinite(){
            page = page + 1
            loading = true;
            $("#loader").show();
                $.ajax({
                    url: "http://127.0.0.1:8002?page=" + page +"&search=" +  $('#search').val(),
                    type: 'get',
                    cache: false,
                    data: {  },
                    success: function(data) {
                        if (data == "") {
                            $("#loader").html("No more data to show !");
                            } else {
                            $("#infinite").append(data);
                            loading = false;
                            $("#loader").hide();
                        }
                    }
                }).fail(function () {
                  
                });
            }
    </script>
 </body>
</html>