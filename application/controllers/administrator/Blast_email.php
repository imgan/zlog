<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
// Load Composer's autoloader
require 'vendor/autoload.php';

class Blast_email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('administrator/model_generate_tagihan_log');
    }

    function render_view($data)
    {
        $this->template->load('templateadmin', $data); //Display Page
    }
    
    public function index()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
            $data = array(
                'page_content'      => '../pageadmin/sendtagihan/view',
                'ribbon'            => '<li class="active">Kirim Tagihan Email</li>',
                'page_name'         => 'Tagihan Email',
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }

	public function generateTagihan()
	{
		$this->load->library('pdf');
		$month = $this->input->post('bulan');
		$year = $this->input->post('tahun');
		$listInvoice = $this->model_generate_tagihan_log->cekInvoice($month,$year)->result_array();
		foreach ($listInvoice as $value ){
			$item_list = $this->model_generate_tagihan_log->viewCustomer($value['invoice'])->result_array();
			$dataUser = $this->model_generate_tagihan_log->viewPelanggan($value['invoice'])->result_array();
	
			$email = $dataUser[0]['email'];
			$data = array(
				'invoice' => $value['invoice'],
				'createdAt' => date('d-m-Y'),
				'due_date'  => date('d-m-Y', strtotime('today + 14 days')),
				'item_list' => $item_list,
				'user' => $dataUser,
			);
			$this->pdf->load_view('pageadmin/laporan/invoice', $data);
			$this->sendEmail($email,$value['invoice']);
		}
		echo json_encode(true);
	}

	public function sendEmail($email, $invoice)
	{
		$data = array(
			'type' => 'TAGIHAN'
		);
		$mail = new PHPMailer(true);
		//Server settings
		$configEmail = $this->model_generate_tagihan_log->viewWhereOrdering('email', $data, 'id', 'desc')->result_array();
		$configEmail = $configEmail[0];
		try {

			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = $configEmail['host'];                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = $configEmail['email'];                     // SMTP username
			$mail->Password   = $configEmail['password'];                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = $configEmail['port'];                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom(EMAIL_TAGIHAN);
			// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress($email);               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			$mail->addBCC($configEmail['bcc']);

			// // Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			$mail->addAttachment(APPPATH.'public/Petunjuk-Pembayaran-VA.pdf', 'Cara Pembayaran');    // Optional name
			$mail->addAttachment(APPPATH.'public/'.$invoice.'.pdf', 'Invoice Tagihan');    // Optional name
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Nanti disini di isi subject pembayaran ';
			$html='<!-- #######  YAY, I AM THE SOURCE EDITOR! #########-->
			<table>
			<tbody>
			<tr>
			<td>
			<h1>Dear Sdr IMAM SATRIANTA,</h1>
			<p>Terima kasih atas kepercayaan Anda dalam menggunakan Layanan <span class="il">XL</span> Home.</p>
			</td>
			</tr>
			</tbody>
			</table>
			<table>
			<tbody>
			<tr>
			<th>Berikut ini rincian tagihan Anda :</th>
			</tr>
			<tr>
			<th>&bull; Nama Pelanggan</th>
			<td>:IMAM SATRIANTA</td>
			</tr>
			<tr>
			<th>&bull; Subscriber ID</th>
			<td>:38032520</td>
			</tr>
			<tr>
			<th>&bull; Jumlah Tagihan</th>
			<td>:273900.00</td>
			</tr>
			<tr>
			<th>&bull; Tanggal Penagihan</th>
			<td>:05 Feb 2021</td>
			</tr>
			<tr>
			<th>&bull; Periode Penagihan</th>
			<td>:01 Feb 2021 - 28 Feb 2021</td>
			</tr>
			<tr>
			<th>&bull; Jatuh Tempo</th>
			<td>:19 Feb 2021</td>
			</tr>
			</tbody>
			</table>
			<table>
			<tbody>
			<tr>
			<td>Untuk kenyamanan pelanggan, sekarang pembayaran tagihan bulanan melalui <a><span class="il">XL</span> Home</a>Virtual Account <a>Bank BCA, Mandiri, Danamon, CIMB Niaga, Bank Permata</a><a> dan di minimarket </a><a>ALFA Group atau INDOMARET </a>terdekat dengan rumah Anda. Cara bayar selengkapnya bisa dilihat pada halaman website kami di <a href="http://www.xlhome.co.id/htp" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.xlhome.co.id/htp&amp;source=gmail&amp;ust=1612791341142000&amp;usg=AFQjCNEfsQLHZlrqRXpaNUy8Bi2MrhEikw">http://www.xlhome.co.id/htp</a>.</td>
			</tr>
			<tr>
			<td><span class="il">XL</span> HOME tidak menerima pembayaran secara tunai yang dilakukan oleh agen sales, teknisi ataupun agen lainnya yang mengatasnamakan <span class="il">XL</span> HOME. Apabila ada agen/oknum yang meminta tambahan biaya tunai, mohon segera laporkan ke customer service <span class="il">XL</span> HOME.</td>
			</tr>
			<tr>
			<td>Untuk informasi lebih lanjut, silakan menghubungi call centre kami:</td>
			</tr>
			</tbody>
			</table>';
			$mail->Body    = $html;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			// echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_generate_tagihan_log->viewOrderingTagihan()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
