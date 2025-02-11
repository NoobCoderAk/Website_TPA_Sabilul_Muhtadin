<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ArtikelModel;
use App\Models\PrestasiModel;
use App\Models\ReviewModel;
use App\Models\FasilitasModel;
use App\Models\MapelIqroModel;
use App\Models\MapelQuranModel;
use App\Models\PertanyaanModel;
use App\Models\PengajarModel;
use App\Models\KontakModel;
use App\Models\UserModel;
use App\Models\JadwalIqroModel;
use App\Models\JadwalQuranModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->ArtikelModel = new ArtikelModel();
        $this->ReviewModel = new ReviewModel();
        $this->PrestasiModel = new PrestasiModel();
        $this->FasilitasModel = new FasilitasModel();
        $this->PertanyaanModel = new PertanyaanModel();
        $this->PengajarModel = new PengajarModel();
        $this->MapelIqroModel = new MapelIqroModel();
        $this->MapelQuranModel = new MapelQuranModel();
        $this->JadwalIqroModel = new JadwalIqroModel();
        $this->JadwalQuranModel = new JadwalQuranModel();
        $this->KontakModel = new KontakModel();
        $this->UserModel = new UserModel();
    }
}
