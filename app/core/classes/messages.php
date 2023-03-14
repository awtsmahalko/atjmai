<?php
class Messages extends Connection
{
    private $table = 'tbl_messages';
    public $pk = 'message_id';
    public $name = 'message_name';
    public $session = array();

    public $inputs = array();
    public $requests = array();
    public $old = array();

    public $chat_current_sender;

    public function init($redirect = true,$is_request = true, $requests = [])
    {
        $sender_id = $_SESSION['user']['id'];
        $receiver_id = $is_request ? $this->requests['receiver_id'] : $requests['receiver_id'];

        $message_code = $sender_id > $receiver_id ? "$receiver_id-$sender_id":"$sender_id-$receiver_id";

        $result = $this->select($this->table, '*', "message_code = '$message_code'");
        if($result->num_rows < 1){
            $form = array(
                'message_name'  => 'Just started a conversation',
                'sender_id'  => $sender_id,
                'receiver_id' => $receiver_id,
                'view_status' => 1,
                'message_code' => $message_code,
                'init' => 1
            );
            $this->insert($this->table, $form);
        }

        if($redirect == true)
            header("location:../index.php?q=messages&receiver_id=$receiver_id");
    }

    public function chat_heads($receiver_id = 0)
    {
        $user_id = $_SESSION['user']['id'];
        $result = $this->select($this->table, "message_code,MAX(date_added) AS chat_date,IF(sender_id=$user_id,receiver_id,sender_id) AS user", "sender_id = '$user_id' OR receiver_id = '$user_id' GROUP BY message_code ORDER BY MAX(date_added) DESC");

        $response = [];
        $this->chat_current_sender = $receiver_id;
        while ($row = $result->fetch_assoc()) {
            array_push($response, [
                'message_name' => substr($this->getChatHeadsLastMessage($row['message_code']),0,27),
                'chat_date' => $row['chat_date'],
                'user' => $row['user'],
                'user_data' => Users::dataOf($row['user']),
                'time_ago' => $this->time_ago($row['chat_date']),
                'active' => $row['user'] == $receiver_id ? "active":'',
                'unread' => $this->getUnreadMessagesCounter($user_id,$row['message_code'])
            ]);
        }
        return $response;
    }

    public function getChatHeadsLastMessage($message_code)
    {
        $result = $this->select($this->table, "message_name", "message_code = '$message_code' ORDER BY date_added DESC LIMIT 1");
        $row = $result->fetch_assoc();
        return $row['message_name'];
    }

    public function getUnreadMessagesCounter($receiver_id, $message_code = '')
    {
        $inject = $message_code == '' ? '' : "AND message_code = '$message_code'";
        $result = $this->select($this->table, "message_name", "receiver_id = '$receiver_id' AND view_status = 0 $inject");
        return $result->num_rows;
    }

    public function chat_messages($sender_id = 0)
    {
        $response['messages'] = [];

        $sender_id = $sender_id > 0 ? $sender_id : $this->chat_current_sender;
        $receiver_id = $_SESSION['user']['id'];

        $message_code = $sender_id > $receiver_id ? "$receiver_id-$sender_id":"$sender_id-$receiver_id";
        $result = $this->select($this->table, '*', "message_code = '$message_code' AND init = 0 ORDER BY date_added ASC");

        while ($row = $result->fetch_assoc()) {
            array_push($response['messages'], [
                'message_name' => $row['message_name'],
                'date_added' => $row['date_added'],
                'sender_id' => $row['sender_id'],
                'receiver_id' => $row['receiver_id'],
                'time_ago' => $this->time_ago($row['date_added']),
            ]);
        }
        $this->update($this->table,['view_status' => 1], "message_code = '$message_code' AND receiver_id = '$receiver_id'");
        return $response;
    }

    public function add($redirect = true,$is_input = true, $inputs = [])
    {
        $receiver_id = $is_input ? $this->inputs['receiver_id'] : $inputs['receiver_id'];
        $sender_id = $_SESSION['user']['id'];
        $message_code = $sender_id > $receiver_id ? "$receiver_id-$sender_id":"$sender_id-$receiver_id";
        $message_name = $is_input ? $this->clean($this->inputs['message_name']) : $this->clean($inputs['message_name']);
        if($message_name != ''){
            $form = array(
                'message_name'  => $message_name,
                'sender_id'  => $sender_id,
                'receiver_id' => $receiver_id,
                'message_code' => $message_code
            );
            $this->insert($this->table, $form);
        }

        if($redirect == true)
            header("location:../index.php?q=messages&receiver_id=$receiver_id");
    }
}
