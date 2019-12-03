<?php

use Models\reservasiModel;
use Models\ruanganModel;
use Models\sirupatModel;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');

            $this->view->reservasi = reservasiModel::find();
            $this->view->ruangan = ruanganModel::find();
            $this->view->users = sirupatModel::find();
        
            // var_dump($ruangan[0]->nama_ruangan);
        }
        else
        {
            $this->response->redirect('/login');
        }
    }
    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/login');
    }
    public function formAction()
    {
        if ($this->session->has("login"))
        {
            $this->assets->addCss('css/style.css');
            $this->assets->addCss('css/table.css');

            $this->view->users = sirupatModel::find();
            $this->view->ruangan = ruanganModel::find();
        }
        else
        {
            $this->response->redirect('/login');
        }
    }

    public function saveAction()
    {
        $reservasi = new reservasiModel();

        $no_surat = $this->request->getPost('no_surat');
        $id_peminjam = $this->request->getPost('id_peminjam');
        $id_ruangan = $this->request->getPost('id_ruangan');
        $nama_agenda = $this->request->getPost('nama_agenda');
        $deskripsi = $this->request->getPost('deskripsi');
        $date_awal = $this->request->getPost('date_awal');
        $time_awal = $this->request->getPost('time_awal');
        $date_akhir = $this->request->getPost('date_akhir');
        $time_akhir = $this->request->getPost('time_akhir');
        $jumlah_peserta = $this->request->getPost('jumlah_peserta');

        $waktu_awal = $date_awal . " " . $time_awal . ":00";
        $waktu_akhir = $date_akhir . " " . $time_akhir . ":00";

        // var_dump($waktu_awal);

        // return false;

        $reservasi->no_surat = $no_surat;
        $reservasi->id_peminjam = $id_peminjam;
        $reservasi->id_ruangan = $id_ruangan;
        $reservasi->nama_ruangan = $id_ruangan;
        $reservasi->deskripsi = $deskripsi;
        $reservasi->waktu_mulai_penggunaan = $waktu_awal;
        $reservasi->waktu_akhir_penggunaan = $waktu_akhir;
        $reservasi->jumlah_peserta = $jumlah_peserta;
        $reservasi->status_reservasi = 'Disetujui';

        if ($reservasi->save() === false) {
            echo "Umh, We can't store reservasi right now: \n";
        
            $messages = $reservasi->getMessages();
        
            foreach ($messages as $message) {
                echo $message, "\n";
            }
        } else {
            echo 'Great, a new reservasi was saved successfully!';
        }

        // $success = $reservasi->save(
        //     $this->request->getPost(),
        //     [
        //         "no_surat",
        //         "id_peminjam",
        //         "id_ruangan",
        //         "nama_agenda",
        //         "deskripsi",
        //         "date_awal" . " " . "time_awal",
        //         "date_akhir" . " " . "time_akhir",
        //         "jumlah_peserta",
        //     ]
        // );

        // if ($success) {
        //     echo "Tambah sukses";
        // } else {
        //     echo "Sorry, the following problems were generated: ";

        //     $messages = $reservasi->getMessages();

        //     foreach ($messages as $message) {
        //         echo $message->getMessage(), "<br/>";
        //     }
        // }

        $this->view->disable();
    }



















    public function collectionAction(){
        $header = $this->assets->collection('header');
        $header->setPrefix('css/')
            ->addCss('cube.css');

        $footer = $this->assets->collection('footer');
        $footer
            ->addJs('//code.jquery.com/jquery-3.3.1.slim.min.js', false)
            ->addJs('//cdn.jsdelivr.net/velocity/1.0.0/velocity.min.js', false)
            ->addJs('js/cube.js');
    }

    public function flashAction(){
        $header = $this->assets->collection('header');
        $header->addCss('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false);

        $footer = $this->assets->collection('footer');
        $footer->addJs('//code.jquery.com/jquery-3.3.1.slim.min.js', false)
            ->addJs('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', false);

        $this->flash->error('ERROR HAPPEND');
    }

    public function imageAction(){
        $image = new \Phalcon\Image\Adapter\Gd('public/img/Phalcon_logo.png');

        $image->rotate(90)
            ->flip(\Phalcon\Image::HORIZONTAL);
        $image->save('public/img/new-image.jpg');
//        $this->view->disable();

        $this->response->setContentType('image/jpg');
        $this->response->setContent(file_get_contents('public/img/new-image.jpg'));
        return false;
    }

}

