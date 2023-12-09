<?php include('views/layout/user/Header.php');
if (!isset($_SESSION)) {
    session_start();
} ?>

<main class="main" style="background-color: #fff;">

    <body>
        <div class="wrapper">
            <section class="chat-area">
                <header>
                    <!-- <a href="users.php" class="back-icon">
                    <i class="fas fa-arrow-left"></i>
                </a> -->
                    <!-- <img src="api/images/<?php echo $row['img']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['lname'] . ' ' . $row['fname']; ?></span>
                    <div><?php echo $row['status']; ?></div>
                </div> -->
                </header>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                    <input type="text" name="incoming_id" class="incoming_id" value="<?php echo $id ?>" id="" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Nhập nội dung ở đây..."
                        autocomplete="off">
                    <button id="button">
                        <i class="fab fa-telegram-plane"></i>
                    </button>
                </form>
            </section>
        </div>
    </body>
</main>
<script src="assets/js/chat-event.js"></script>
<?php include "views/layout/user/Footer.php"; ?>