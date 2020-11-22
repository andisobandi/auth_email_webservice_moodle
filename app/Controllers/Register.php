<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use App\Models\WilayahModel;

class Register extends BaseController
{
    protected $registerModel;
    protected $wilayahModel;
    protected $_token = 'c0afd303f5abd30c17285fc853c85600';
    protected $_service = 'auth_email_signup_user';
    protected $_moodlewsrestformat = 'json';

    public function __construct()
    {
        $this->registerModel = new RegisterModel();
        $this->wilayahModel = new WilayahModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Daftar Akun Baru',
            'provinsi'      => $this->wilayahModel->findAll(),
            'validation'    => \Config\Services::Validation()
        ];
        return view('register/index', $data);
    }

    public function readKota($provID)
    {
        $data = [
            'kota'  => $this->wilayahModel->getKota($provID)
        ];
        $kota = "<option value=''>Pilih kota / Kabupaten</option>";
        foreach ($data['kota'] as $value) {
            $kota .= "<option value='" . $value->id . "'>" . strtoupper($value->nama) . "</option>";
        }
        echo $kota;
    }

    public function readKecamatan($kotaID)
    {
        $data = [
            'kecamatan'  => $this->wilayahModel->getKecamatan($kotaID)
        ];
        $kecamatan = "<option value=''>Pilih Kecamatan</option>";
        foreach ($data['kecamatan'] as $value) {
            $kecamatan .= "<option value='" . $value->id . "'>" . strtoupper($value->nama) . "</option>";
        }
        echo $kecamatan;
    }

    public function readDesa($kecID)
    {
        $data = [
            'desa'  => $this->wilayahModel->getDesa($kecID)
        ];
        $desa = "<option value=''>Pilih Desa</option>";
        foreach ($data['desa'] as $value) {
            $desa .= "<option value='" . $value->id . "'>" . strtoupper($value->nama) . "</option>";
        }
        echo $desa;
    }

    public function create()
    {
        /**
         * set rules
         */
        $rules = [
            'username' => [
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'alpha_dash' => 'Username hanya boleh mengandung karakter huruf, angka, underscore (_) dan dash (-)'
                ]
            ],
            'password' => [
                'rules' => 'required|alpha_numeric|min_length[8]|matches[confirm_password]',
                'errors' => [
                    'required' => 'Kata sandi tidak boleh kosong',
                    'matches' => 'Kata sandi tidak sama',
                    'min_length' => 'Panjang Kata sandi minimal 8 karakter',
                    'alpha_numeric' => 'Kata sandi harus mengandung kombinasi karakter huruf dan angka'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|alpha_numeric|min_length[8]|matches[password]|alpha_numeric|trim',
                'errors' => [
                    'required' => 'Konfirmasi kata sandi tidak boleh kosong',
                    'matches' => 'Kata sandi tidak sama',
                    'min_length' => 'Panjang Kata sandi minimal 8 karakter',
                    'alpha_numeric' => 'Kata sandi harus mengandung kombinasi karakter huruf dan angka'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|trim',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Format email tidak sesuai (contoh yang benar: user@mail.com)',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required|max_length[30]|trim',
                'errors' => [
                    'required' => 'Tempat Lahir tidak boleh kosong',
                    'max_length' => 'Panjang Tempat Lahir maksimal hanya 30 karakter',
                ]
            ],
            'firstname' => [
                'rules' => 'required|max_length[30]|trim',
                'errors' => [
                    'required' => 'Nama Depan tidak boleh kosong',
                    'max_length' => 'Panjang Nama Depan maksimal hanya 30 karakter',
                ]
            ],
            'lastname' => [
                'rules' => 'required|max_length[30]|trim',
                'errors' => [
                    'required' => 'Nama Belakang tidak boleh kosong',
                    'max_length' => 'Panjang Nama Belakang maksimal hanya 30 karakter',
                ]
            ],
            'tgl' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong'
                ]
            ],
            'bln' => [
                'rules' => 'required|trim',
            ],
            'thn' => [
                'rules' => 'required|trim',
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi tidak boleh kosong'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota tidak boleh kosong'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan tidak boleh kosong'
                ]
            ],
            'desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Desa tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong',
                    'max_length' => 'Panjang Alamat maksimal hanya 30 karakter',
                ]
            ],
            'no_handphone' => [
                'rules' => 'required|max_length[20]|numeric|trim',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong',
                    'max_length' => 'Panjang Nomor Handphone maksimal hanya 20 karakter',
                    'numeric' => 'Nomor Handphone hanya boleh mengandung karakter angka saja',
                ]
            ],
            'jenjang_pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang Pendidikan tidak boleh kosong'
                ]
            ],
            'perseorangan_lembaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilihan Perseorangan / Lembaga tidak boleh kosong'
                ]
            ]
        ];

        /**
         * check validation
         */
        if (!$this->validate($rules)) {
            return redirect()->to('/')->withInput();
        }

        /**
         * for get datetime type
         */
        $tanggal_lahir = $this->request->getVar('thn') . str_pad($this->request->getVar('bln'), 2, 0, STR_PAD_LEFT) . str_pad($this->request->getVar('tgl'), 2, 0, STR_PAD_LEFT);
        $new_tanggal_lahir = strtotime($tanggal_lahir);

        /**
         *for get name of custom field
         */
        $provinsiID = $this->request->getVar('provinsi');
        $getNameProvinsi = $this->wilayahModel->find($provinsiID);

        $kotaID = $this->request->getVar('kota');
        $getNameKota = $this->wilayahModel->getNameKota($kotaID);

        $kecamatanID = $this->request->getVar('kecamatan');
        $getNameKecamatan = $this->wilayahModel->getNameKecamatan($kecamatanID);

        $desaID = $this->request->getVar('desa');
        $getNameDesa = $this->wilayahModel->getNameDesa($desaID);

        /**
         * check if custom field is empty
         */
        $provinsiLembagaID = $this->request->getVar('provinsi_lembaga');
        $getNameLembagaProvinsi = $this->wilayahModel->find($provinsiLembagaID);
        if ($getNameLembagaProvinsi == null) {
            $getNameLembagaProvinsi['nama'] = "";
        }

        $kotaLembagaID = $this->request->getVar('kota_lembaga');
        $getNameLembagaKota = $this->wilayahModel->getNameKota($kotaLembagaID);
        if ($getNameLembagaKota == null) {
            $getNameLembagaKota['nama'] = "";
        }

        $kecamatanLembagaID = $this->request->getVar('kecamatan_lembaga');
        $getNameLembagaKecamatan = $this->wilayahModel->getNameKecamatan($kecamatanLembagaID);
        if ($getNameLembagaKecamatan == null) {
            $getNameLembagaKecamatan['nama'] = "";
        }

        $desaLembagaID = $this->request->getVar('desa_lembaga');
        $getNameLembagaDesa = $this->wilayahModel->getNameDesa($desaLembagaID);
        if ($getNameLembagaDesa == null) {
            $getNameLembagaDesa['nama'] = "";
        }

        $data = [
            'username'              => strtolower($this->request->getVar('username')),
            'password'              => $this->request->getVar('password'),
            'firstname'             => ucwords(strtolower($this->request->getVar('firstname'))),
            'lastname'              => ucwords(strtolower($this->request->getVar('lastname'))),
            'email'                 => strtolower($this->request->getVar('email')),
            'country'               => 'ID',
            'city'                  => $getNameKota['nama'],
            'customprofilefields'   => [
                '0' => [
                    'type'  => 'tempat_lahir',
                    'name'  => 'profile_field_tempat_lahir',
                    'value' => ucwords(strtolower($this->request->getVar('tempat_lahir')))
                ],
                '1' => [
                    'type'  => 'tanggal_lahir',
                    'name'  => 'profile_field_tanggal_lahir',
                    'value' => $new_tanggal_lahir
                ],
                '2' => [
                    'type'  => 'provinsi',
                    'name'  => 'profile_field_provinsi',
                    'value' => $getNameProvinsi['nama']
                ],
                '3' => [
                    'type'  => 'kota_kabupaten',
                    'name'  => 'profile_field_kota_kabupaten',
                    'value' => $getNameKota['nama']
                ],
                '4' => [
                    'type'  => 'kecamatan',
                    'name'  => 'profile_field_kecamatan',
                    'value' => $getNameKecamatan['nama']
                ],
                '5' => [
                    'type'  => 'desa',
                    'name'  => 'profile_field_desa',
                    'value' => $getNameDesa['nama']
                ],
                '6' => [
                    'type'  => 'alamat',
                    'name'  => 'profile_field_alamat',
                    'value' => ucwords(strtolower($this->request->getVar('alamat')))
                ],
                '7' => [
                    'type'  => 'no_handphone',
                    'name'  => 'profile_field_no_handphone',
                    'value' => $this->request->getVar('no_handphone')
                ],
                '8' => [
                    'type'  => 'jenjang_pendidikan',
                    'name'  => 'profile_field_jenjang_pendidikan',
                    'value' => $this->request->getVar('jenjang_pendidikan')
                ],
                '9' => [
                    'type'  => 'perseorangan_lembaga',
                    'name'  => 'profile_field_perseorangan_lembaga',
                    'value' => $this->request->getVar('perseorangan_lembaga')
                ],
                '10' => [
                    'type'  => 'nama_lembaga',
                    'name'  => 'profile_field_nama_lembaga',
                    'value' => ucwords(strtolower($this->request->getVar('nama_lembaga')))
                ],
                '11' => [
                    'type'  => 'provinsi_lembaga',
                    'name'  => 'profile_field_provinsi_lembaga',
                    'value' => $getNameLembagaProvinsi['nama']
                ],
                '12' => [
                    'type'  => 'kota_kabupaten_lembaga',
                    'name'  => 'profile_field_kota_kabupaten_lembaga',
                    'value' => $getNameLembagaKota['nama']
                ],
                '13' => [
                    'type'  => 'kecamatan_lembaga',
                    'name'  => 'profile_field_kecamatan_lembaga',
                    'value' => $getNameLembagaKecamatan['nama']
                ],
                '14' => [
                    'type'  => 'desa_lembaga',
                    'name'  => 'profile_field_desa_lembaga',
                    'value' => $getNameLembagaDesa['nama']
                ],
                '15' => [
                    'type'  => 'alamat_lembaga',
                    'name'  => 'profile_field_alamat_lembaga',
                    'value' => ucwords(strtolower($this->request->getVar('alamat_lembaga')))
                ],
                '16' => [
                    'type'  => 'bidang_pengajaran_lembaga',
                    'name'  => 'profile_field_bidang_pengajaran_lembaga',
                    'value' => $this->request->getVar('bidang_pengajaran_lembaga')
                ]
            ],
            'wstoken'               => $this->_token,
            'wsfunction'            => $this->_service,
            'moodlewsrestformat'    => $this->_moodlewsrestformat
        ];

        /**
         * send data to moodle
         */
        $result = $this->registerModel->createUsers($data);

        /**
         * check is exist array key
         */
        if (array_key_exists('success', $result)) {
            /**
             * Handle if record success
             */
            if ($result['success'] == true) {
                session()->setFlashdata('pesan', 'Pendaftaran berhasil, silahkan cek email Anda');
                return redirect()->to('/register/success');
            } else if ($result['success'] == false) {
                /**
                 * Handle if record failed
                 */
                if ($result['warnings'][0]['item'] == "profile_field_no_handphone") {
                    session()->setFlashdata('error', "Nomor handphone yang Anda masukan sudah terdaftar, silahkan gunakan yang lain");
                    return redirect()->to('/');
                }

                if ($result['warnings'][0]['item'] == "username") {
                    session()->setFlashdata('error', $result['warnings'][0]['message']);
                    return redirect()->to('/');
                }

                if ($result['warnings'][0]['item'] == "email") {
                    session()->setFlashdata('error', "Alamat email yang Anda masukan sudah terdaftar, silahkan gunakan yang lain");
                    return redirect()->to('/');
                }
            }
        } else {
            /**
             * Handle for other error
             */
            $this->_handleError($result);
        }
    }

    private function _handleError($data)
    {
        /**
         * Handle for invalidtoken
         */
        if ($data['errorcode'] == 'invalidtoken') {
            // please choose option debugger in moodle for trace error
            // echo $result['message'];
            echo "Oops. Something went wrong. Please try again later";
            die();
        }

        /**
         * Handle for invalidparameter
         */
        if ($data['errorcode'] == 'invalidparameter') {
            // please choose option debugger in moodle for trace error
            // echo $result['message'];
            echo "Oops. Something went wrong. Please try again later";
            die();
        }
    }

    public function success()
    {
        $data = [
            'title' => 'Pendaftaran Berhasil',
            'email' => $this->request->getVar('email')
        ];
        return view('register/success', $data);
    }
}
