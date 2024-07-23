<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_boats');
        $this->load->model('M_packages');
        $this->load->model('M_extras');
        $this->load->model('M_bookings');
    }
    

    public function index($params)
    {
        $bookingData = explode('~', base64_decode($params));
        $datas = array(
            'title' => 'Booking',
            'hidden' => '',
            'color' => 'blue',
            'boat' => $this->M_boats->getAllBoatWithPicturesAndBadgesById($bookingData[0]),
            'package' => $this->M_packages->getAllPackagesWithToursAndBadges(),
            'extra' => $this->M_extras->getAllExtras(),
            'bookAdults' => $bookingData[1],
            'bookTeens' => $bookingData[2],
            'bookToddlers' => $bookingData[3],
            'bookSchedule' => $bookingData[4],
            'bookedPassengers' => $bookingData[5],
        );
        
        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/booking',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

    public function addBooking() {
        $extraIds = $this->input->post('extraIds');
        if ($this->session->userdata('custId')) {
            $bookingDatas = array(
                'custId' => $this->session->userdata('custId'),
                'boatId' => $this->input->post('boatId'),
                'packageId' => $this->input->post('packageId'),
                'bookSchedule' => $this->input->post('bookSchedule'),
                'bookPrice' => $this->input->post('bookPrice'),
                'bookStatus' => 'Waiting',
                'bookAdults' => $this->input->post('bookAdults'),
                'bookTeens' => $this->input->post('bookTeens'),
                'bookToddlers' => $this->input->post('bookToddlers'),
                'procodeId' => 1,
            );
            $bookId = $this->M_bookings->insertBooking($bookingDatas);

            if (!empty($extraIds)) {
                foreach($extraIds as $extraId) {
                    $bookextraDatas = array(
                        'extraId' => $extraId,
                        'bookId' => $bookId
                    );
                    $this->M_bookings->insertBookExtras($bookextraDatas);
                }
            }
            redirect('tickets');
        }else {
            redirect('login');
        }
    }

    public function autoCancelExpiredBooking() {
        $expiredBooking = $this->M_bookings->autoCancelExpiredBooking();

        if (!empty($expiredBooking)) {
            $response = array(
                'cancelledBookings' => count($expiredBookings),
                'message' => 'Expired bookings cancelled successfully'
            );
        }else {
            $response = array(
                'cancelledBookings' => 0,
                'message' => 'No Bookings cancelled'
            );
        }
        echo json_encode($response);
    }

}

/* End of file Booking.php */

?>