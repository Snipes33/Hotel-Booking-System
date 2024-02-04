

<?php include 'includes/header.php'?>

<?php session_start();?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Rooms</title>
        <style>
            .slideshow-container {
                position: relative;
                width: 1000px;
                height: 500px;
                overflow: hidden;
                margin:50px auto;

            }

            .slide {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                transition: opacity 1s ease;
                animation: slideshow 9s infinite;
            }

            .slide:nth-child(2) {
                animation-delay: 3s;
            }

            .slide:nth-child(3) {
                animation-delay: 6s;
            }

            .slide img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            @keyframes slideshow {
                0% {
                    opacity: 0;
                }

                25% {
                    opacity: 1;
                }

                33% {
                    opacity: 1;
                }

                58% {
                    opacity: 0;
                }

                100% {
                    opacity: 0;
                }
            }

            .opis {
                max-width: 1000px;
                margin: 0 auto;
                padding: 20px;
            }

            h1 {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            p {
                font-size: 16px;
                line-height: 1.5;
                color: #333;
            }
            #prvaslika{ margin-top: 100px;}

            button{
                display:block;
                margin: 0 auto;
            }

            p{
                text-align: center;
            }




        </style>
    </head>
    <body>

    <div class="slideshow-container">
        <div class="slide">
            <img id="prvaslika" src="https://www.eliaermouhotel.com/uploads/photos/D1024/2019/02/standardroom_1878.jpg" alt="Image 1">
        </div>
        <div class="slide">
            <img src="https://www.eliaermouhotel.com/uploads/photos/D1024/2019/02/standardroom_1456.jpg" alt="Image 2">
        </div>
        <div class="slide">
            <img src="https://www.hospitalitynet.org/picture/xxl_153098435.jpg?t=1552639660" alt="Bathroom of the standard room">
        </div>
    </div>

    <div class="opis">
        <h1>STANDARD ROOM </h1>
        <p>"Designed to meet the needs of travelers, this well-appointed room offers a range of essential amenities, ensuring a pleasant stay. With its tasteful decor, soothing color palette, and thoughtfully arranged furnishings, the standard room creates a welcoming atmosphere where guests can unwind and rejuvenate after a day of exploration or business activities."
        </p>
        <?php if (isset($_SESSION['users_id'])) {
            echo "<form action='bookingform.php' method='GET'>
            <input type='hidden' name='id' value='1' />
            <button type='submit' >BOOK NOW</button>
        </form>
    </div>";
        }else{
            echo "<p class='book'><strong>Please log in to book a room.</strong></p>";
        }
    ?>
    <div class="slideshow-container">
        <div class="slide">
            <img src="https://design-milk.com/images/2018/07/serafina-beach-hotel-20-810x540.jpg" alt="Image 1">
        </div>
        <div class="slide">
            <img src="https://design-milk.com/images/2018/07/serafina-beach-hotel-21.jpg" alt="Image 2">
        </div>
        <div class="slide">
            <img src="https://design-milk.com/images/2018/07/serafina-beach-hotel-22.jpg" alt="Image 3">
        </div>
    </div>

    <div class="opis">
        <h1>DELUXE ROOM </h1>
        <p>"Thoughtfully designed to exceed expectations, this upscale room offers a plethora of deluxe amenities and upscale features that add an extra touch of comfort and sophistication. From the exquisite decor to the premium furnishings, every detail has been meticulously crafted to create an ambiance of opulence and refinement"</p>
        <?php if (isset($_SESSION['users_id'])) {
            echo "<form action='bookingform.php' method='GET'>
            <input type='hidden' name='id' value='2' />
            <button type='submit' >BOOK NOW</button>
        </form>
    </div>";
        }else{
            echo "<p class='book'><strong>Please log in to book a room.</strong></p>";
        }
        ?>

    <div class="slideshow-container">
        <div class="slide">
            <img src="https://do6raq9h04ex.cloudfront.net/sites/2/2021/09/1600x960-2-1.jpg" alt="Image 1">
        </div>
        <div class="slide">
            <img src="https://do6raq9h04ex.cloudfront.net/sites/2/2021/09/1600x960-5.jpg" alt="Image 2">
        </div>
        <div class="slide">
            <img src="https://do6raq9h04ex.cloudfront.net/sites/2/2021/09/1600x960-3.jpg" alt="Image 3">
        </div>
    </div>

    <div class="opis">
        <h1>PRESIDENTIAL SUITE </h1>
        <p>"This exclusive suite is meticulously furnished with high-end amenities and exquisite decor, providing discerning guests with a lavish and indulgent retreat. With its spacious layout, private living areas, and panoramic views, the presidential suite sets the standard for unparalleled elegance and refined comfort, catering to the most discerning travelers seeking a truly extraordinary experience."

            <?php if (isset($_SESSION['users_id'])) {
                echo "<form action='bookingform.php' method='GET'>
            <input type='hidden' name='id' value='3' />
            <button type='submit' >BOOK NOW</button>
        </form>
    </div>";
            }else{
                echo "<p class='book'><strong>Please log in to book a room.</strong></p>";
            }
            ?>


    </body>


</html>



<?php include 'includes/footer.php'?>


