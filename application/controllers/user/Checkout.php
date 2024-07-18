<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
require_once APPPATH . 'config/dotenv.php';

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_bookings');
        $this->load->model('M_promos');

        if (!$this->session->userdata('custId')) {
            redirect('login');
        }

        $clientKey = $_ENV['MIDTRANS_CLIENT_KEY'];
        $serverKey = $_ENV['MIDTRANS_SERVER_KEY'];

        Config::$serverKey = $serverKey;
        Config::$clientKey = $clientKey;
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index($bookId)
    {
        $custId = $this->session->userdata('custId');

        $bookingDatas = $this->M_bookings->getBookingsByCustIdAndBookId($custId, $bookId);

        if ($bookingDatas['bookStatus']=='Cancelled') {
            redirect('tickets');
        }

        $datas = array(
            'title' => 'Checkout',
            'hidden' => '',
            'color' => 'blue',
            'checkout' => $bookingDatas,
            'clientKey' => Config::$clientKey,
        );

        $partials = array(
            'head' => 'partials/user/head', 
            'navbar' => 'partials/user/navbar',
            'content' => 'user/checkout',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

    public function checkPromo($procodeName) {
        $promo = $this->M_promos->getPromoByName($procodeName);

        if (!empty($promo) && $promo['procodeName'] != 'NO PROMO') {
            echo json_encode($promo);
        }else{
            echo 'notfound';
        }
    }

    public function initMidtrans() {
        if ($this->input->post('bookStatus')!='Cancelled') {
            try {
                $bookPrice = $this->input->post('bookPrice');

                $transaction = array(
                    'transaction_details' => array(
                        'order_id' => rand(),
                        'gross_amount' => $bookPrice,
                    ),
                );

                $snapToken = Snap::getSnapToken($transaction);
                echo $snapToken;
            } catch (Exception $e) {
                error_log("Failed to create transaction token: " . $e->getMessage());
                http_response_code(500);
                echo "Internal Server Error";
            }
        }else {
            redirect('tickets');
        }
    }

    public function paymentSuccess($bookId, $procodeId, $bookPrice) {
        $this->M_bookings->editBooking($bookId, array(
            'bookStatus' => 'Searching Guides',
            'procodeId' => $procodeId,
            'bookPrice' => $bookPrice
        ));
        redirect('tickets');
    }

}

/* End of file Checkout.php */

?>