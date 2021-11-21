<?php
require_once __DIR__ . './Layouts/Header.php';
?>

<div class="contact">
    <div class="container-md">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="item">
                    <div class="left">
                        <img src="./public/assets/image/logo-png2.png" alt="">
                        <h3>Công ty TNHH Pyroject</h3>
                        <ul>
                            <li>
                                <span>13/35 Thành Mỹ, P08, Q.Tân Bình, TP.HCM</span>
                            </li>
                            <li>
                                <a href="">contact@pyroject.com</a>
                            </li>
                            <li>
                                <a href="">(+84) 906 51 51 05</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="item">
                    <form action="">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" id="name">
                        <label for="phonenumber">Số điện thoại liên hệ</label>
                        <input type="text" name="phonenumber" id="phonenumber">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="message">Tin nhắn</label>
                        <textarea name="message" id="message" rows="6"></textarea>
                        <button type="submit">Gửi tin nhắn</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . './Layouts/Footer.php';
?>