<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>404 Page Not Found!</title>

    <style>
        .page_404 {
            padding: 80px 0;
            background: #fff;
            font-family: 'Lexend', sans-serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {

            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 500px;
            background-position: center;
            background-repeat: no-repeat;
        }


        .four_zero_four_bg h1 {
            font-size: 60px;
            text-align: center;
            margin-bottom: 5px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
            text-align: center;

        }

        .four_zero_four_bg h4 {
            font-size: 20px;
            text-align: center;
            margin-top: 5px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #5E9338;
            margin: 20px 0;
            display: inline-block;
            text-decoration: none;
            border-radius: 5px;
        }

        .contant_box_404 {
            margin-top: -50px;
            text-align: center;
        }

        .contant_box_404 h3 {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1>ERROR 404</h1>
                            <h4>PAGE NOT FOUND!</h4>
                        </div>

                        <div class="contant_box_404">
                            <h3>
                                SEPERTINYA ANDA TERSESAT DARI PERADABAN
                            </h3>

                            <p>Halaman yang anda cari tidak tersedia, atau anda tidak memiliki cukup akses.
                                <br>Hubungi webmaster untuk mendapatkan akses ke halaman ini.
                            </p>

                            <a href="<?= base_url(); ?>" class="link_404">BERANDA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>