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

    public function index()
    {
        $datas = array(
            'title' => 'BOOKINGS',
            'booking' => $this->M_bookings->getAllBookings(),
            'package' => $this->M_packages->getAllPackagesWithToursAndBadges(),
            'boat' => $this->M_boats->getAllBoatsWithPicturesAndBadges(),
            'customer' => $this->M_customers->getAllCustomers(),
            'promo' => $this->M_promos->getAllPromos(),
            'extra' => $this->M_extras->getAllExtras()
        );
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

}

/* End of file Bookings.php */

?>