<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        
        .main-scroll-div {
            width: 90%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* border: 2px solid red; */
        }
        
        .cover {
            position: relative;
            width: 90%;
            height: 50%;
        }
        
        .cover::before {
            position: absolute;
            content: "";
            left: 0;
            top: 0;
            z-index: 99;
            height: 100%;
            width: 150px;
            background-image: linear-gradient(90deg, white, transparent);
        }
        
        .cover::after {
            position: absolute;
            content: "";
            right: 0;
            top: 0;
            z-index: 99;
            height: 100%;
            width: 150px;
            background-image: linear-gradient(-90deg, white, transparent);
        }
        
        .scroll-images {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: left;
            align-items: center;
            overflow: auto;
            position: relative;
            scroll-behavior: smooth;
        }
        
        .child {
            min-width: 600px;
            height: 450px;
            margin: 1px 10px;
            cursor: pointer;
            border: 1px solid rgba(207, 201, 201, .3);
            overflow: hidden;
        }
        
        .scroll-images::-webkit-scrollbar {
            -webkit-appearance: none;
        }
        
        .child-img {
            width: 100%;
            height: 100%;
        }
        
        .icon {
            color: rgb(104, 102, 96);
            background-color: white;
            font-size: 50px;
            outline: none;
            border: none;
            padding: opx 20px;
            cursor: pointer;
        }
        
        .icon:hover {
            color: #F8B229;
        }
        </style>
    </head>





<div id="page-content">
  <div class="container">
    <hr class="my-4">

    <div class="main-scroll-div">
        <div>
            <button class="icon" onclick="scrolll()"> <i class="fas fa-angle-double-left"></i></button>
        </div>
        <div class="cover">
            <div class="scroll-images">
                <div class="child"><img class="child-img" src="https://hips.hearstapps.com/hmg-prod/images/91obzrtot-l-ac-sl1500-1576534766.jpg?resize=1200:*" alt="image"></div>
                <div class="child"><img class="child-img" src="https://images.wowcher.co.uk/images/deal/25765974/777x520/996840.jpg" alt="image"></div>
                <div class="child"><img class="child-img" src="https://m.media-amazon.com/images/I/61cRTIJmqAL._AC_SX466_.jpg" alt="image"></div>
                <div class="child"><img class="child-img" src="https://cdn.shopify.com/s/files/1/0037/5763/7701/products/stuffed-traditional-scandinavian-nordic-faceless-gnome-long-white-beard-tomten-christmas-santa-doll-shelf-sitters-xmas-tabletop-party-decorations_1_2000x.jpg?v=1667979685" alt="image"></div>
                <div class="child"><img class="child-img" src="https://www.tampabay.com/resizer/l3vypqXvPHsNrt22wqpcGjWMkL0=/1200x1200/smart/cloudfront-us-east-1.images.arcpublishing.com/tbt/JUFF3SHLXREEXB2EEDLAOZCFEA.jpg" alt="image"></div>
                </div>
        </div>
        <div>
            <button class="icon" onclick="scrollr()"> <i class="fas fa-angle-double-right"></i></button>
        </div>
    </div>

    <script>
    function scrolll() {
        var left = document.querySelector(".scroll-images");
        left.scrollBy(-350, 0)
    }

    function scrollr() {
        var right = document.querySelector(".scroll-images");
        right.scrollBy(350, 0)
    }
    </script>
</div>


