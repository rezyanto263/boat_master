<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_bookings');
        $this->load->model('M_packages');
        $this->load->model('M_boats');
        $this->load->model('M_customers');
        $this->load->model('M_promos');
        $this->load->model('M_extras');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index() {
        $datas = array(
            'title' => 'BOOKINGS',
            'notifications' => $this->M_bookings->getAllNotifications(),
            'booking' => $this->M_bookings->getAllBookings(),
            'package' => $this->M_packages->getAllPackagesWithToursAndBadges(),
            'boat' => $this->M_boats->getAllBoatsWithPicturesAndBadges(),
            'customer' => $this->M_customers->getAllCustomers(),
            'promo' => $this->M_promos->getAllPromos(),
            'extra' => $this->M_extras->getAllExtras()
        );
        $datas['countUnclicked'] = 0;

        foreach ($datas['notifications'] as $key) {
            if ($key['notifStatus'] == 'Unclicked') {
                $datas['countUnclicked'] += 1;
            }
        }

        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/bookings',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addBooking() {
        $bookingDatas = array(
            'custId' => $this->input->post('custId'),
            'bookSchedule' => $this->input->post('bookSchedule'),
            'boatId' => $this->input->post('boatId'),
            'packageId' => $this->input->post('packageId'),
            'bookAdults' => $this->input->post('bookAdults'),
            'bookTeens' => $this->input->post('bookTeens'),
            'bookToddlers' => $this->input->post('bookToddlers'),
            'bookStatus' => $this->input->post('bookStatus'),
            'procodeId' => $this->input->post('procodeId'),
            'bookPrice' => $this->input->post('bookPrice'),
            'bookNotes' => htmlspecialchars($this->input->post('bookNotes')),
        );
        $bookId = $this->M_bookings->insertBooking($bookingDatas);
        $this->M_bookings->addBookingNotification($bookId, $this->input->post('custId'));

        if ($this->input->post('extraIds')) {
            $countExtra = count($_POST['extraIds']);
            for ($i=0; $i < $countExtra; $i++) { 
                $bookextrasDatas = array(
                    'bookId' => $bookId,
                    'extraId' => $_POST['extraIds'][$i]
                );
                $this->M_bookings->insertBookExtras($bookextrasDatas);
            }
        }

        redirect('dashboard/bookings');
    }

    public function editBooking() {
        $bookId = $this->input->post('bookId');
        $checkBooking = $this->M_bookings->checkBooking($bookId);

        if ($checkBooking) {
            $bookingDatas = array(
                'custId' => $this->input->post('custId'),
                'bookSchedule' => $this->input->post('bookSchedule'),
                'boatId' => $this->input->post('boatId'),
                'packageId' => $this->input->post('packageId'),
                'bookAdults' => $this->input->post('bookAdults'),
                'bookTeens' => $this->input->post('bookTeens'),
                'bookToddlers' => $this->input->post('bookToddlers'),
                'bookStatus' => $this->input->post('bookStatus'),
                'procodeId' => $this->input->post('procodeId'),
                'bookPrice' => $this->input->post('bookPrice'),
                'bookNotes' => $this->input->post('bookNotes'),
            );
            $this->M_bookings->editBooking($bookId, $bookingDatas);

            $this->M_bookings->deleteAllBookExtras($bookId);
            if ($this->input->post('extraIds')) {
                $countExtra = count($_POST['extraIds']);
                for ($i=0; $i < $countExtra; $i++) { 
                    $bookextrasDatas = array(
                        'bookId' => $bookId,
                        'extraId' => $_POST['extraIds'][$i]
                    );
                    $this->M_bookings->insertBookExtras($bookextrasDatas);
                }
            }
        }
        redirect('dashboard/bookings');
    }

    public function delBooking($bookId) {
        $this->M_bookings->deleteBooking($bookId);
        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The booking has been deleted successfully!</div>');
        redirect('dashboard/bookings');
    }

    public function approveBooking() {
        $bookId = $this->input->post('bookId');
        $custEmail = $this->input->post('custEmail');
        $this->M_bookings->insertBookExpiredDateTime($bookId, date('Y-m-d H:i:s', strtotime('+1 days')));

        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'rezyanto263@gmail.com',
            'smtp_pass' => 'ehju llty rjht asbu',
            'smtp_port' => 587,
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'send_multipart'=> false
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('rezyanto263@gmail.com', 'BOAT MASTER');
        $this->email->to($custEmail);
        $this->email->subject('[Boat Master] Your Booking is Approved!');
        $this->email->message("Your booking ticket is already approved, please pay your booking before it's cancelled at ".date('l, d-m-Y h:i A', strtotime('+1 days')));
        
        if($this->email->send()) {
            $this->session->set_flashdata('message', '
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast toast-success show message" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        Email message has been send!
                    </div>
                </div>
            </div>');
            redirect('dashboard/bookings');
        }else {
            $this->session->set_flashdata('message', '
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast toast-error show message" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        Sorry, your message could not be send!
                    </div>
                </div>
            </div>');
            redirect('dashboard/bookings');
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

    public function notificationsRedirect($notifId) {
        $this->M_bookings->editNotificationStatus($notifId, 'Clicked');
        redirect('dashboard/bookings');
    }

    public function getUpdatedNotifications() {
        $notifData['notifications'] = $this->M_bookings->getAllNotifications();
        $notifData['countUnclicked'] = 0;

        foreach ($notifData['notifications'] as $key) {
            if ($key['notifStatus'] == 'Unclicked') {
                $notifData['countUnclicked'] += 1;
            }
        }
        
        $this->load->view('partials/dashboard/updateNotification', $notifData);
    }

}

/* End of file Bookings.php */

?>