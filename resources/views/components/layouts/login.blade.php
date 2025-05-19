<div>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #loading-page {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255,1);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .btn-color{
    background-color: #0e1c36;
    color: #fff;
    
  }
  
  .profile-image-pic{
    height: 200px;
    width: 200px;
    object-fit: cover;
  }
  
  h1{
    text-align: center;
    color: #0e1c36;
  }
  .cardbody-color{
    /* background-color: #ebf2fa; */
    border-radius: 10px;
  }
  
  a{
    text-decoration: none;
  }
    </style>
</head>
<body>
  <img src="{{ asset('asset/perpustakaan.jpg') }}" alt="perpustakaan" class="img-fluid" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
<div id="loading-page">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading in...</span>
    </div>
    <p class="mt-3">Loading in, please wait...</p>
</div>
{{ $slot }}
<script>
    function showFullPageSpinner() {
        document.getElementById("loading-page").style.display = "flex";
        setTimeout(function() {
            document.forms[0].submit();
        }, 1500);
        return false;
    }
</script>

</body>
</html>
</div>