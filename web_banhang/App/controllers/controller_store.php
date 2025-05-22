<?php

class Controller_Store extends Controller
{

    function __construct()
    {
        $this->model = new Model_Store();
        $this->view = new View();
    }

    function action_index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['amount']++;
            } else {
                $_SESSION['cart'][$productId]['amount'] = 1;
            }

            $response = array('status' => 'success', 'cartCount' => count($_SESSION['cart']));
            echo json_encode($response);
        }
        $data = $this->model->get_data();
        $this->view->generate('store_view.php', 'template_view.php', $data);
    }
}