<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            body{
                background-image: url("img/background.jpg");
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

            .white{
                position: absolute;
                margin-top: 60px;
            }

            .box{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 130px;
                height: 40px;
                background-color: #537188;
                border-radius: 50px;
                position: absolute;
                margin-top: 10px;
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
                margin-left: 150px;
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

            .picture{
                border-radius: 25px;
                border: 10px solid rgb(174, 226, 255);
                background-color: rgb(174, 226, 255);
                position: absolute;
                margin-top: 70px;
                margin-left: 30px;
            }

            .sound{
                width: 20px;
                position: absolute;
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
    <title> Nhận diện buồn ngủ</title>
    </head>
    <body>
        <div class="crossbar_1">
            <strong>
                <font color =#0C356A size="6.5">
                    <p align="center">Safe Drive alert</p>
                </font>
            </strong>
        </div>
        <div class="crossbar_2">
            <font color="white">
                <p><a href="fe_sign-in.php">Đăng nhập</a></p>
            </font>
        </div>
        <div class="crossbar_3">
            <font color="white">
                <p><a href="fe_register.php">Đăng ký</a></p>
            </font>
        </div>
        <div class="picture">
        <img src="http://127.0.0.1:5000/video_feed" width="640" height="480">
        <i class="far fa-user"></i>
        </div>
        <div class="box">
            <font color="white" size="4.5">
            <p><strong><a href="fe_home.php">Trở về</a></strong></p>
            </font>
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