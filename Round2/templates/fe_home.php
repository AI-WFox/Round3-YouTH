<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            body{
                background-image: url("/Round2/templates/img/background.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
            }
            *{
                padding: 0;
                margin-right: 0px ;
            }
            .toolbar{
                position: absolute;
            }

            .box_anh_1{
                width: 400px;
                margin: 100px 200px 90px 700px;
                border-radius: 25px;
                border: 10px solid rgb(174, 226, 255);
                background-color: rgb(174, 226, 255);
                position:absolute;
            }
            
            .box_anh_2{
                width: 400px;
                border-radius: 25px;
                border: 10px solid rgb(174, 226, 255);
                background-color: rgb(174, 226, 255);
                margin: 320px 200px 90px 800px;
                position:absolute;
            }

            .box_1{
                width: 500px;
                height: 450px;
                background-color: #DAFFFB;
                border-radius: 25px;
                margin: 120px 400px 220px 40px;
                font-size: 45px;
                position: absolute;
            }
            
            .box_2{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 200px;
                height: 70px;
                background-color: #537188;;
                border-radius: 25px;
                font-size: 30px;
                position:absolute;
                margin: 450px 400px 100px 180px;
                text-align: center;
            }

            .circle{
                width: 50px;
                height: 50px;
                background-color: #537188;
                border-radius: 50px;
                position: absolute;
                margin-top: 5px;
                margin-left: 5px;
            }

            .crossbar_1{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 700px;
                height: 40px;
                border-radius: 50px;
                background-color: #DAFFFB;
                position: absolute;
                margin-top: 10px;
                margin-left: 75px;
            }

            .crossbar_2{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 150px;
                height: 40px;
                border-radius: 50px;
                background-color: #537188;
                position: absolute;
                margin-top: 10px;
                margin-left: 1000px;
                font-size:20px;
            }

            .crossbar_3{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 150px;
                height: 40px;
                border-radius: 50px;
                background-color: #537188;
                position: absolute;
                margin-top: 10px;
                margin-left: 1170px;
                font-size:20px;
            }

            .time{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 150px;
                height: 50px;
                border-radius: 50px;
                background-color: #537188;
                position: absolute;
                margin-top: 590px;
                margin-left: 30px;
                font-size:20px;
            }
            a {
                color: rgb(255, 255, 255); /* Màu mặc định cho liên kết */
                text-decoration: none; /* Loại bỏ gạch chân */
            }

            /* Đổi màu cho liên kết khi được nhấn hoặc hover */
            a:hover,
            a:active {
                color: rgb(0, 19, 190); /* Màu khi di chuột qua hoặc khi được nhấn */
            }
        </style>
        <title>Trang chủ</title>
    </head>
    <body>
        <div class="circle"></div>
        <div class="crossbar_1">
            <strong>
                <font color =#0C356A size="6.5">
                    <p align="center">Safe Drive alert</p>
                </font>
            </strong>
        </div>
        <div class="crossbar_2">
            <font color="white">
                <p><a href="/Round2/templates/fe_sign-in.php">Đăng nhập</a></p>
            </font>
        </div>
        <div class="crossbar_3">
            <font color="white">
                <p><a href="/Round2/templates/fe_register.php">Đăng ký</a></p>
            </font>
        </div>
        <div>
            <img src="img/PictureO.png" class="box_anh_1"  title="Ảnh 1" >
        </div>

        <div>
            <img src="img/PictureT.jpg" class="box_anh_2"  title="Ảnh 2" >
        </div>

        <div class="box_1">
            <font color=1D5D9B>
                <p align="center"><br>Nền tảng giúp bạn nhận diện <strong><font color=071952>buồn ngủ</font></strong></p>
                <p align="center">An toàn - Tỉnh táo</p>
            </font>
        </div>

        <div class="box_2">
                <p><strong><a href="/Round2/templates/fe_main.php">Truy cập</a></strong></p>
        </div>


        <div class="time">
                <font color="white">
                    <div id="clock" align="center"></div>
                </font>

            <script>
                function updateClock() {
                const clockElement = document.getElementById("clock");
                const currentTime = new Date();
            
                const hours = currentTime.getHours();
                const minutes = currentTime.getMinutes();
                const seconds = currentTime.getSeconds();

                const formattedTime = `${hours}:${minutes}:${seconds}`;

                clockElement.textContent = formattedTime;
                }

                // Cập nhật thời gian mỗi giây
                setInterval(updateClock, 1000);

                // Gọi hàm updateClock lần đầu để cập nhật ngay từ khi trang được tải
                updateClock();
            </script>
        </div>
    </body>
</html>