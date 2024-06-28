<html>

<head>
    <title>My Now Amazing Webpage</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        button{
            position: absolute;
    font-size: x-large;
    bottom: 200px;
    right: -5px;
    height: 70px;
    width: 45px;
    z-index: 1;
    display: inline-block;
        }
    </style>
</head>

<body>

    <div class="your-class">
        <div>your content</div>
        <div>your content</div>
        <div>your content</div>
        <div>your content</div>
        <div>your content</div>
        <div>your content</div>
        <div>your content</div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.your-class').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                prevArrow: '<span class="priv_arrow"><button type="button" class="btn btn-light"><i class="fa fa-chevron-left" aria-hidden="true"></button></i></span>',
                nextArrow: '<span class="next_arrow"><button type="button" class="btn btn-light"><i class="fa fa-chevron-right" aria-hidden="true"></button></i></span>',
            });
        });
    </script>

</body>

</html>