<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="promotions.css">
    <link rel="stylesheet" href="navigation.css">
   <title>Promotions</title>
   <link rel="shortcut icon" type="image/png" href="images/3d.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        
        #fotoR {
            width: 280px;
            height: 280px;
        }
    </style>
</head>
<body>
    <section class="section1">
<?php require('homepage_header.php');
?>
</section>
    <section class="section2">
        <div class="custom-shape-divider-bottom-1610632061">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M741,116.23C291,117.43,0,27.57,0,6V120H1200V6C1200,27.93,1186.4,119.83,741,116.23Z" class="shape-fill"></path>
            </svg>
        </div>
        
        <div class="teksti1"><span>C</span><span>ategories</span></div>
       
        <div class="container1 box1">
          
            <div class="img1">
                <?php
                require_once('./admins/db.php');
                $result = $conn->prepare("SELECT * FROM gallery ORDER BY tbl_image_id ASC");
                $result->execute();
                for ($i = 0; $row = $result->fetch(); $i++) {
                    $id = $row['tbl_image_id'];
                ?>
                    <a href="./admins/image/gallery/<?php echo $row['image_location']; ?>" id="fotoR">
                    <?php if ($row['image_location'] != "") : ?>
                            <img src="./admins/image/gallery/<?php echo $row['image_location']; ?>" alt="<?php echo $row['Photos_name']; ?>">
                        <?php else : ?>
                            <img src="./admins/image/gallery/default.png">
                        <?php endif; ?>
                    </a>
                <?php } ?>
          
                
            </div>
            
                    
                        

            
        </div>  
    </section>
</body>
<script>
    $(".section2").magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: false
        }
    });
</script>
</html>