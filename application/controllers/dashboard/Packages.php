<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_packages');
        $this->load->model('M_badges');
        $this->load->model('M_bookings');

        if (!$this->session->userdata('adminId')) {
            redirect('loginadmin');
        }
    }

    public function index()
    {
        $datas = array(
            'title' => 'PACKAGES',
            'scanner' => false,
            'notifications' => $this->M_bookings->getAllNotifications(),
            'package' => $this->M_packages->getAllPackagesWithToursAndBadges(),
            'badge' => $this->M_badges->getAllBadges()
        );
        $partials = array(
            'head' => 'partials/dashboard/head',
            'navigation' => 'partials/dashboard/navigation',
            'content' => 'dashboard/packages',
            'script' => 'partials/dashboard/script',
        );

        $this->load->vars($datas);
        $this->load->view('dashMaster', $partials);
    }

    public function addPackage() {
        $packageDatas = array(
            'packageName' => $this->input->post('packageName'),
            'packageType' => $this->input->post('packageType'),
            'packagePrice' => $this->input->post('packagePrice')
        );
        $packageId = $this->M_packages->insertPackage($packageDatas);

        $countAttraction = count($_POST['tourNames']);

        for ($i=0; $i < $countAttraction; $i++) { 
            if (!empty($_POST['tourNames'][$i] && $_POST['tourTimes'][$i] && $_POST['tourDescs'][$i])) {
                $tourDatas = array(
                    'tourName' => $_POST['tourNames'][$i],
                    'tourTime' => $_POST['tourTimes'][$i],
                    'tourDesc' => $_POST['tourDescs'][$i]
                );
                $tourId = $this->M_packages->insertTour($tourDatas);

                $pattractionDatas = array(
                    'tourId' => $tourId,
                    'packageId' => $packageId
                );
                $this->M_packages->insertPattraction($pattractionDatas);
            }
        }

        if ($_POST['badgeIds']) {
            $countBadge = count($_POST['badgeIds']);
            for ($i = 0; $i < $countBadge; $i++) {
                $boatbadgesDatas = array(
                    'packageId' => $packageId,
                    'badgeId' => $_POST['badgeIds'][$i],
                );
                $this->M_packages->insertBadges($boatbadgesDatas);
            }
        }

        redirect('dashboard/packages');
    }

    public function editPackage() {
        $packageId = $this->input->post('packageId');
        $checkPackage = $this->M_packages->checkPackage($packageId);
        if ($checkPackage) {

            if($this->input->post('delTour')) {
                $delTours = $this->input->post('delTour');

                if (count($delTours) == $this->input->post('countTour')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">You cannot delete all tours!</div>');
                    redirect('dashboard/packages');
                }else {
                    foreach($delTours as $tourId) {
                        $this->M_packages->deleteTour($tourId);
                    }
                }
            }

            if ($this->input->post('badgeIds')) {
                $this->M_packages->deleteAllBadges($packageId);
                $countBadge = count($_POST['badgeIds']);
                for ($i = 0; $i < $countBadge; $i++) {
                    $packagebadgesDatas = array(
                        'packageId' => $packageId,
                        'badgeId' => $_POST['badgeIds'][$i],
                    );
                    $this->M_packages->insertBadges($packagebadgesDatas);
                }
            }

            $packageDatas = array(
                'packageName' => $this->input->post('packageName'),
                'packageType' => $this->input->post('packageType'),
                'packagePrice' => $this->input->post('packagePrice')
            );
            $this->M_packages->editPackage($packageId, $packageDatas);

            $countAttraction = count($_POST['tourNames']);
            for ($i=0; $i < $countAttraction; $i++) { 

                if (!empty($_POST['tourIds'][$i])) {
                    $tourDatas = array(
                        'tourName' => $_POST['tourNames'][$i],
                        'tourTime' => $_POST['tourTimes'][$i],
                        'tourDesc' => $_POST['tourDescs'][$i]
                    );
                    $this->M_packages->editTour($_POST['tourIds'][$i], $tourDatas);
                }else {
                    if (!empty($_POST['tourNames'][$i] && $_POST['tourTimes'][$i] && $_POST['tourDescs'][$i])) {
                        $tourDatas = array(
                            'tourName' => $_POST['tourNames'][$i],
                            'tourTime' => $_POST['tourTimes'][$i],
                            'tourDesc' => $_POST['tourDescs'][$i]
                        );
                        $tourId = $this->M_packages->insertTour($tourDatas);

                        $pattractionDatas = array(
                            'tourId' => $tourId,
                            'packageId' => $packageId
                        );
                        $this->M_packages->insertPattraction($pattractionDatas);
                    }
                }

            }
            redirect('dashboard/packages');
        }
    }

    public function delPackage($packageId) {
        $this->M_packages->deletePackage($packageId);
        $this->session->set_flashdata('message', '<div class="alert alert-danger message" role="alert">The package has been deleted successfully!</div>');
        redirect('dashboard/packages');
    }

}

/* End of file Packages.php */

?>