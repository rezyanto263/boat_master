<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\Output\QRCodeOutputException;

require_once APPPATH . 'libraries/QRWithLogo.php';

class Tickets extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_bookings');
        $this->load->model('M_packages');

        if (!$this->session->userdata('custId')) {
            redirect('login');
        }
    }
    

    public function index()
    {
        $custId = $this->session->userdata('custId');

        $ticketsDatas = $this->M_bookings->getAllBookingsByCustomerId($custId);

        foreach ($ticketsDatas as $key) {
            if ($key['bookStatus'] == 'Searching Guides' && $key['bookStatus'] == 'Enjoy') {
                $qr[$key['bookId']] = $this->generateQR('ap aja');
            }else if ($key['bookStatus'] == 'Done' || $key['bookStatus'] == 'Canceled') {
                $qr[$key['bookId']] = $this->generateQR('Dah koid ni booking bang, udahlah!');
            }else {
                $qr[$key['bookId']] = $this->generateQR('Bayar lah dulu bang, Cem mana pula abang ni?');
            }
        }
        
        $datas = array(
            'title' => 'Tickets',
            'hidden' => '',
            'color' => 'blue',
            'tickets' => $ticketsDatas,
            'qrcode' => empty($qr)?'':$qr
        );

        $partials = array(
            'head' => 'partials/user/head',
            'navbar' => 'partials/user/navbar',
            'content' => 'user/tickets',
            'footer' => 'partials/user/footer',
            'script' => 'partials/user/script',
        );
        $this->load->vars($datas);
        $this->load->view('master', $partials);
    }

    public function generateQR(String $link)
    {   
        $options = new QROptions;
        $options->version             = 5;
        $options->outputType          = QROutputInterface::GDIMAGE_PNG;
        $options->scale               = 15;
        $options->outputBase64        = false;
        $options->eccLevel            = EccLevel::H;
        $options->addLogoSpace        = true;
        $options->logoSpaceWidth      = 8;
        $options->logoSpaceHeight     = 8;
        $options->imageTransparent    = true;
        $options->addQuietzone        = false;
        $options->drawLightModules    = false;
        $options->cornerRadius        = 10;
        // $options->drawCircularModules = true;
        // $options->circleRadius        = 0.4;
        $options->keepAsSquare        = [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ];
        $options->moduleValues        = [
            // QRMatrix::M_FINDER_DARK    => [253, 164, 62],
            QRMatrix::M_FINDER_DARK    => [34, 72, 112],
            QRMatrix::M_FINDER_DOT     => [34, 72, 112],
            // QRMatrix::M_FINDER_DOT     => [253, 164, 62],
            // QRMatrix::M_ALIGNMENT_DARK => [253, 164, 62],
            QRMatrix::M_ALIGNMENT_DARK => [34, 72, 112],
            // QRMatrix::M_ALIGNMENT      => [253, 164, 62],
            QRMatrix::M_DATA_DARK      => [34, 72, 112],
            QRMatrix::M_DARKMODULE     => [34, 72, 112],
            QRMatrix::M_FORMAT_DARK    => [34, 72, 112],
            QRMatrix::M_TIMING_DARK    => [34, 72, 112],
        ];

        $qrcode = new QRCode($options);
        $qrcode->render($link);

        $qrOutputInterface = new QRWithLogo($options, $qrcode->getQRMatrix());

        // dump the output, with an additional logo
        // the logo could also be supplied via the options, see the svgWithLogo example
        $data =  $qrOutputInterface->dump(null, FCPATH . 'assets/images/logo.png');
        return $data;
    }

}

/* End of file Tickets.php */

?>