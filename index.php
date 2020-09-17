<!DOCTYPE html>  
<html>  
    <head>  
        <title>Insert Multiple Images into MYSQL Database using PHP &amp; AJAX</title>   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">  
        <style type="text/css">
            *{
                margin:0;
                padding: 0;
            }
            .grad{
                background: rgb(93,84,164);
                background: linear-gradient(0deg, rgba(93,84,164,1) 0%, rgba(157,101,201,1) 35%, rgba(215,137,215,1) 100%);
                border-radius: 17px;
            }
        </style>
    </head>  
    <body>  
        <br /><br />  
        <div class="container mt-5 shadow-lg p-5 text-center grad">  
   <h3 align="center">Insert Multiple Images into MYSQL Database using PHP &amp; AJAX</h3>
   <h5 style="color: white;text-shadow: 1px 2px 10px grey;">Max-Image Size: 2048KB</h5>
            <br />  
            <br />  
            <br />  
            <form method="post" id="upload_multiple_images" enctype="multipart/form-data">
                <input type="file" class="form-control" name="image[]" id="image" multiple accept=".jpg, .png, .gif" />
                <br />
                <button type="submit" name="insert" id="insert" class="btn btn-info">INSERT</button>
            </form>
            <br />  
            <br />
            <hr style="background-color: white; width: 80%; margin: 0 auto;">
            <br />
            <br />
            <div class="container mt-2">
                <div id="images_list"></div>
            </div>
            <div class="text-center container mt-5 pt-5">
            <small style="color:white">Made with <span style="color: red;">&#x2764;</span> by <a href="https://github.com/tinshade" title="My GitHub" style="color:white">Abhishek Iyengar</a></small>
        </div>
        </div>
        
    </body>  
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>  
$(document).ready(function(){

    load_images();

    function load_images()
    {
        $.ajax({
            url:"fetch_images.php",
            success:function(data)
            {
                $('#images_list').html(data);
            }
        });
    }
 
    $('#upload_multiple_images').on('submit', function(event){
        event.preventDefault();
        var image_name = $('#image').val();
        if(image_name == '')
        {
            alert("Please Select Image");
            return false;
        }
        else
        {
            $.ajax({
                url:"insert.php",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data)
                {
                    $('#image').val('');
                    load_images();
                }
            });
        }
    });
 
});  
</script>