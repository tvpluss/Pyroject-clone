<?php

class Contact extends Controller
{
    public function Default()
    {
        $limit = 1;
        if (!isset($_GET['page'])) {
            header("Location: ./Contact?page=1");
            exit();
        }
        $model = $this->model("ContactModel");
        $data = [];
        $data['totalContacts'] = $model->getTotalContacts();
        $data['totalPages'] = ceil($data['totalContacts'] / $limit);
        $data['currentPage'] = $_GET['page'];
        if ($data['totalPages'] == 0) {
            $data['totalPages'] = 1;
        }
        if ($data['currentPage'] <= 0) {
            header("Location: ./Contact?page=1");
            exit();
        }
        if ($data['currentPage'] > $data['totalPages']) {
            header("Location: ./Contact?page=" . $data['totalPages']);
            exit();
        }
        $data['contacts'] = $model->getAllContactsWLimit(($data['currentPage'] - 1) * $limit, $limit);
        $this->view("Contact", $data);
    }
    public function changeStatus()
    {
        $messageId = $_POST['messageId'];
        $status = $_POST['status'];
        $model = $this->model("ContactModel");
        $data = $model->updateContactStatus($status, $messageId);
        echo $data;
    }
}
