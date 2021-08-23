<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php'
  ?>
  <link href="./css/lightbox.min.css" rel="stylesheet">
  <script src="./scripts/lightbox-plus-jquery.min.js"></script>
  <style>
    .gallery {
      columns: 4;
      column-gap: 16px;
    }
    img {
      width: 100%;
      border-radius: 8px;
      transition: 0.6s;
    }
    img:hover {
      transform: scale(1.1);
      filter: brightness(0.5);
    }
    .grid-images {
      display: inline-block;
      position: relative;
      margin-bottom: 16px;
    }
    @media (max-width: 1024px) {
      .gallery {
        columns: 3;
      }
    }
    @media (max-width: 768px) {
      .gallery {
        columns: 2;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <?php
  include 'navbar.php'
  ?>
  
  <div class="container">
    <br>
    <h5 class="center">Package Photos</h5>
    <br>
      <div class="gallery">
      </div>
  </div>
  


  <?php
  include 'footer.php'
  ?>
  <?php
  include 'scripts.php';
  ?>
  <script>
    auth.onAuthStateChanged(user => {
      if (user) {
        setupNavLinks(user);
      } else {
        setupNavLinks();
      }
    })
  </script>
  <script>

    function setData(images) {
      var result = ``;
      images.forEach((image)=> {
        result += `<div class="grid-images">
                      <a href="${image}" data-lightbox="gallery"><img src="${image}" alt=""></a>
                  </div>`;
      })

      return result;
    }

    $(document).ready(function() {
      var urlParams = new URLSearchParams(window.location.search);
      var packageID = urlParams.get('packageID')
      console.log(packageID)
      $.ajax({
        url: "api/api_gallery.php",
        type: "GET",
        data: {
          packageID: packageID
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if (dataResult.statusCode == 200) {
            var result = setData(dataResult.data);
            document.querySelector('.gallery').innerHTML = result;

          } else if (dataResult.statusCode == 201) {
            // $('body').html(errorTemplate);
          }

        }
      });
    });
  </script>
</body>

</html>