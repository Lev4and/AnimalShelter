<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AnimalShelter - Галерея</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Elements/Slider.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <link rel="stylesheet" href="/Packages/slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="/Packages/slick-1.8.1/slick/slick-theme.css"/>
    <script src="/JS/XmlHttp.js"></script>
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <div class="wrapper">
            <div class="slider">
                <?php foreach (QueryExecutor::getInstance()->getGallery() as $photo): ?>
                    <div class="slider__item filter">
                        <img src="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Resources/Images/Upload/{$photo["photo"]}"; ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <script src="/JS/JQuery.js"></script>
            <script type="text/javascript" src="/Packages/slick-1.8.1/slick/slick.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.slider').slick({
                        arrows:true,
                        dots:true,
                        slidesToShow:3,
                        autoplay:true,
                        speed:1000,
                        autoplaySpeed:800,
                        responsive:[
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow:2
                                }
                            },
                            {
                                breakpoint: 550,
                                settings: {
                                    slidesToShow:1
                                }
                            }
                        ]
                    });
                });
            </script>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php VisibleError::show(); ?>
</div>
</body>
</html>