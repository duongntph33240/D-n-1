<?php
class ChatBoxDAO
{
    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    // lấy đoạn chat
    public function getChat()
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $outgoing_id = $_SESSION['id'];
        $incoming_id = $_POST['incoming_id'];
        $output = "";
        $sql = "SELECT * FROM `chatbox` join users ON users.id_user= chatbox.id_out WHERE id_out=$outgoing_id and id_in=$incoming_id OR id_out=$incoming_id and id_in=$outgoing_id ORDER BY id_msg";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['id_out'] == $outgoing_id) {
                    $output .= '<div class="chat outgoing">
                                  <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                  </div>
                                </div>';
                } else {
                    $output .= '<div class="chat incoming">
                                  <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                  </div>
                                </div>';
                }
            }
        } else {
            $output .= "<div class='text'>Không có tin nhắn. Khi bạn có, tin nhắn sẽ hiện tại đây.</div>";
        }

        echo $output;
    }
    // gửi đoạn chat
    public function insertChat()
    {
        session_start(); // Start the session if not already started
        $outgoing_id = $_SESSION['id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if (!empty($message)) {
            // Use prepared statements to prevent SQL injection
            $sql = "INSERT INTO `chatbox`( `id_in`, `id_out`, `msg`) VALUES (:incoming_id, :outgoing_id, :message)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_INT);
            $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT);
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Message inserted successfully.";
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
    }
    // tìm kiếm 
    public function searchUser($searchTerm)
    {
        session_start(); // Start the session if not already started
        $outgoing_id = $_SESSION['id'];
        $sql = "SELECT * FROM `users` WHERE id_user != $outgoing_id
        AND (ten LIKE '%{$searchTerm}%')";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $output = "";

        if ($stmt->rowCount() > 0) {
            $output = $this->getFriendList($stmt);
        } else {
            $output .= "Không tìm thấy người dùng liên quan đến từ khóa";
        }
        echo $output;
    }
    // truy vấn người dùng
    public function getusers()
    {
        session_start(); // Start the session if not already started
        $outgoing_id = $_SESSION['id'];
        $sql = "SELECT users.*,`id_out`, MAX(`id_msg`) AS `latest_id_msg`
        FROM `chatbox` join users ON users.id_user=chatbox.id_out WHERE chatbox.id_out!=$outgoing_id
        GROUP BY `id_out` ORDER BY latest_id_msg DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $output = "";

        if ($stmt->rowCount() > 0) {
            $output = $this->getFriendList($stmt);
        } else {
            $output .= "Không có người dùng cần hỗ trợ";
        }
        echo $output;
    }
    // truy vấn người dùng
    public function getInfrom()
    {
        session_start(); // Start the session if not already started
        $outgoing_id = $_SESSION['id'];
        $sql = "SELECT users.*,`id_out`, MAX(`id_msg`) AS `latest_id_msg`
        FROM `chatbox` join users ON users.id_user=chatbox.id_out WHERE chatbox.id_out!=$outgoing_id
        GROUP BY `id_out` ORDER BY latest_id_msg DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $output = "";

        if ($stmt->rowCount() > 0) {
            $output = $this->getInformList($stmt);
        } else {
            $output .= "Không có thông báo";
        }
        echo $output;
    }
    public function getFriendList($stmt): string
    {
        $rs = '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Use prepared statements to avoid SQL injection
            $sql = "SELECT msg FROM chatbox WHERE 
                (id_in = :unique_id OR id_out = :unique_id) 
                AND (id_out = :outgoing_id OR id_in = :outgoing_id)
                ORDER BY id_msg DESC LIMIT 1";

            $stmt2 = $this->pdo->prepare($sql);
            $stmt2->bindParam(':unique_id', $_SESSION['id']);
            $stmt2->bindParam(':outgoing_id', $row['id_user']);
            $stmt2->execute();
            $data = $stmt2->fetch(PDO::FETCH_ASSOC);

            $last_mess = (empty($data)) ? "Không có tin nhắn" : $data['msg'];
            $last_mess = (strlen($last_mess) > 28) ? substr($last_mess, 0, 28) . '...' : $last_mess;

            // Determine if you are the last respondent
            $you = ($_SESSION['id'] == $row['id_user']) ? "Bạn: " : "";

            // Determine user activity
            // $offline = ($row['status'] == "Không hoạt động") ? "offline" : "";
            $offline = "";
            // Generate the user list content
            $rs .= '<a href="index.php?controller=chatBox_mes&id_user=' . $row['id_user'] . '">
                      <div class="content">
                        <img src="assets/imgs/user/' . $row['anh'] . '"/>
                        <div class="details">
                          <span>' . ' ' . $row['ten'] . '</span>
                          <div>' . $you . $last_mess . '</div>
                        </div>
                      </div>
                      <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                    </a>';
        }
        return $rs;
    }
    public function getInformList($stmt): string
    {
        $rs = '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Use prepared statements to avoid SQL injection
            $sql = "SELECT msg FROM chatbox WHERE 
                (id_in = :unique_id OR id_out = :unique_id) 
                AND (id_out = :outgoing_id OR id_in = :outgoing_id)
                ORDER BY id_msg DESC LIMIT 1";

            $stmt2 = $this->pdo->prepare($sql);
            $stmt2->bindParam(':unique_id', $_SESSION['id']);
            $stmt2->bindParam(':outgoing_id', $row['id_user']);
            $stmt2->execute();
            $data = $stmt2->fetch(PDO::FETCH_ASSOC);

            $last_mess = (empty($data)) ? "Không có tin nhắn" : $data['msg'];
            $last_mess = (strlen($last_mess) > 28) ? substr($last_mess, 0, 28) . '...' : $last_mess;

            // Determine if you are the last respondent
            $you = ($_SESSION['id'] == $row['id_user']) ? "Bạn: " : "";

            // Determine user activity
            // $offline = ($row['status'] == "Không hoạt động") ? "offline" : "";
            $offline = "";
            // Generate the user list content
            $rs .= '<a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="..." />
                <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">
                    
                </div>
                <div class="small text-gray-500">Emily Fowler · 58m</div>
            </div>
        </a>';
        }
        return $rs;
    }
}
