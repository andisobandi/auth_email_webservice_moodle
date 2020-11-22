<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="text-center mt-4">
        <img src="/img/logo-arka.png" width="100">
    </div>
    <h5 class="text-center m-4">Daftar akun baru sekarang</h5>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <article class="card-body">
                    <p class="form-text">Silahkan lengkapi formulir dibawah ini sesuai dengan data diri Anda <br><small>* semua inputan wajib diisi</small></p>
                    <form action="/register/create" method="POST" id="formDaftar">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Username *" value="<?= old('username'); ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?= old('password'); ?>" placeholder="Kata Sandi *">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="col form-group">
                                <input type="password" class="form-control <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : ''; ?>" name="confirm_password" value="<?= old('confirm_password'); ?>" placeholder="Konfirmasi Kata Sandi *">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('confirm_password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" value="<?= old('email'); ?>" id="email" placeholder="Alamat Email *">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <small class="form-text text-muted">Pastikan alamat email yang Anda masukan masih aktif, karena Email Anda akan digunakan sebagai verifikasi akun</small>
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : ''; ?>" name="firstname" id="firstname" value="<?= old('firstname'); ?>" placeholder="Nama Depan *">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('firstname'); ?>
                                </div>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control <?= ($validation->hasError('lastname')) ? 'is-invalid' : ''; ?>" name="lastname" id="lastname" value="<?= old('lastname'); ?>" placeholder="Nama Belakang *">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lastname'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir'); ?>" placeholder="Tempat Lahir *">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tempat_lahir'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-left">Tanggal Lahir *</label>
                            <div class="col-md-8">
                                <?php $tgl = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"]; ?>
                                <select name="tgl" id="tgl" class="form-control col-md-3 d-inline <?= ($validation->hasError('tgl')) ? 'is-invalid' : ''; ?>" style="vertical-align: baseline;">
                                    <option value="">dd</option>
                                    <?php for ($i = 0; $i < 31; $i++) : ?>
                                        <?php if ($i + 1 == old('tgl')) { ?>
                                            <option value="<?= $i + 1 ?>" selected><?= $tgl[$i]; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $i + 1 ?>"><?= $tgl[$i]; ?></option>
                                        <?php } ?>
                                    <?php endfor; ?>
                                </select> &#47;
                                <?php $namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; ?>
                                <select name="bln" id="bln" class="form-control col-md-4 d-inline <?= ($validation->hasError('bln')) ? 'is-invalid' : ''; ?>" style="vertical-align: baseline;">
                                    <option value="">mm</option>
                                    <?php for ($i = 0; $i < 12; $i++) : ?>
                                        <?php if ($i + 1 == old('bln')) { ?>
                                            <option value="<?= $i + 1 ?>" selected><?= $namaBulan[$i]; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $i + 1 ?>"><?= $namaBulan[$i]; ?></option>
                                        <?php } ?>
                                    <?php endfor; ?>
                                </select>&#47;
                                <input type="number" name="thn" id="thn" class="form-control col-md-4 d-inline <?= ($validation->hasError('thn')) ? 'is-invalid' : ''; ?>" value="<?= old('thn'); ?>" placeholder="yyyy">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-muted">Data Alamat</p>
                            <hr>
                            <select name="provinsi" id="provinsi" class="select2bs4 form-control <?= ($validation->hasError('provinsi')) ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Provinsi *">
                                <option value=""></option>
                                <?php foreach ($provinsi as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= strtoupper($p['nama']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('provinsi'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="kota" id="kota" class="select2bs4 form-control <?= ($validation->hasError('kota')) ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Kota / Kabupaten *" disabled="disabled">
                                <option value=""></option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kota'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="kecamatan" id="kecamatan" class="select2bs4 form-control <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Kecamatan *" disabled="disabled">
                                <option value=""></option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kecamatan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="desa" id="desa" class="select2bs4 form-control <?= ($validation->hasError('desa')) ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Desa *" disabled="disabled">
                                <option value=""></option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('desa'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="5" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat *"><?= old('alamat'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control <?= ($validation->hasError('no_handphone')) ? 'is-invalid' : ''; ?>" name="no_handphone" value="<?= old('no_handphone'); ?>" placeholder="No Handphone *">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_handphone'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="jenjang_pendidikan" class="select2bs4 form-control <?= ($validation->hasError('jenjang_pendidikan')) ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Jenjang Pendidikan *">
                                <option value=""></option>
                                <?php $jenjangPendidikan = ["S2", "S1", "D3", "Akademik", "SMA", "SMP", "SD"]; ?>
                                <?php for ($i = 0; $i < 7; $i++) : ?>
                                    <?php if ($jenjangPendidikan[$i] == old('jenjang_pendidikan')) { ?>
                                        <option value="<?= $jenjangPendidikan[$i] ?>" selected><?= $jenjangPendidikan[$i]; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $jenjangPendidikan[$i] ?>"><?= $jenjangPendidikan[$i]; ?></option>
                                    <?php } ?>
                                <?php endfor; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenjang_pendidikan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="perseorangan_lembaga" id="perseorangan_lembaga" class="select2bs4 form-control <?= ($validation->hasError('perseorangan_lembaga')) ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Daftar Sebagai? *">
                                <option value=""></option>
                                <?php $optionPerLem = ["Perseorangan", "Lembaga"]; ?>
                                <?php for ($i = 0; $i < 2; $i++) : ?>
                                    <?php if ($optionPerLem[$i] == old('perseorangan_lembaga')) { ?>
                                        <option value="<?= $optionPerLem[$i] ?>" selected><?= $optionPerLem[$i]; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $optionPerLem[$i] ?>"><?= $optionPerLem[$i]; ?></option>
                                    <?php } ?>
                                <?php endfor; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('perseorangan_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <fieldset class="text-muted lembaga">Silahkan isi kelangkapan lembaga Anda</fieldset>
                            <hr>
                            <input type="text" class="form-control lembaga <?= ($validation->hasError('nama_lembaga')) ? 'is-invalid' : ''; ?>" name="nama_lembaga" value="<?= old('nama_lembaga'); ?>" placeholder="Nama Lembaga *">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control lembaga <?= ($validation->hasError('bidang_pengajaran_lembaga')) ? 'is-invalid' : ''; ?>" name="bidang_pengajaran_lembaga" value="<?= old('bidang_pengajaran_lembaga'); ?>" placeholder="Bidang Pengajaran Lembaga *">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bidang_pengajaran_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <small class="text-muted lembaga">Alamat Lembaga</small>
                            <select name="provinsi_lembaga" id="provinsi_lembaga" class="form-control lembaga <?= ($validation->hasError('provinsi_lembaga')) ? 'is-invalid' : ''; ?>">
                                <option value="">Pilih Provinsi *</option>
                                <?php foreach ($provinsi as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= strtoupper($p['nama']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('provinsi_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="kota_lembaga" id="kota_lembaga" class="lembaga form-control <?= ($validation->hasError('kota_lembaga')) ? 'is-invalid' : ''; ?>" disabled="disabled">
                                <option value="">Pilih Kota / Kabupaten *</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kota_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="kecamatan_lembaga" id="kecamatan_lembaga" class="lembaga form-control <?= ($validation->hasError('kecamatan_lembaga')) ? 'is-invalid' : ''; ?>" disabled="disabled">
                                <option value="">Pilih Kecamatan *</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kecamatan_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="desa_lembaga" id="desa_lembaga" class="lembaga form-control <?= ($validation->hasError('desa_lembaga')) ? 'is-invalid' : ''; ?>" disabled="disabled">
                                <option value="">Pilih Desa *</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('desa_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="5" class="form-control lembaga <?= ($validation->hasError('alamat_lembaga')) ? 'is-invalid' : ''; ?>" name="alamat_lembaga" placeholder="Alamat *"><?= old('alamat_lembaga'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat_lembaga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btnDaftar" class="btn btn-primary btn-block"> Daftar </button>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="" required>
                                    <label class="form-check-label" for="agreeTerms">
                                        <small class="text-muted">Saya telah membaca dan menyetujui <a href="#syaratKetentuan" data-toggle="modal">Syarat dan Ketentuan</a> dan <a href="#kebijakanPrivasi" data-toggle="modal">Kebijakan Privasi</a> ArkaLearn</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </article>
                <div class="border-top card-body text-center">Sudah punya akun? <a href="https://arkalearn.com/login/index.php">Masuk</a></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="syaratKetentuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Syarat dan Ketentuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p dir="ltr" style="text-align:left;"></p>
                <p>Berlaku efektif sejak Agustus 2020</p>
                <p>Syarat dan Ketentuan ini merupakan perjanjian antara pengguna (“Anda”) dan PT Arka Spektrum Solutindo (“Kami”), yaitu sebuah perseroan terbatas yang didirikan dan beroperasi secara sah berdasarkan hukum Negara Republik Indonesia dan berdomisili di DKI
                    Jakarta, Indonesia. Syarat dan Ketentuan ini mengatur Anda saat mengakses dan menggunakan aplikasi, situs web (www.arkalearn.com dan situs web lain yang Kami kelola), fitur, teknologi, konten dan produk yang Kami sediakan (selanjutnya, secara Bersama-sama
                    disebut sebagai “Platform”),</p>
                <p>Harap membaca Syarat dan Ketentuan ini secara seksama sebelum Anda mulai menggunakan Platform Kami, karena peraturan ini berlaku pada penggunaan Anda terhadap Platform Kami.</p>
                <p>Syarat dan Ketentuan ini mencakup hal-hal sebagai berikut:</p>
                <ul>
                    <li>A. Pembukaan Akun Anda</li>
                    <li>B. Informasi Pribadi Anda</li>
                    <li>C. Akses terhadap Platform Kami</li>
                    <li>D. Penggunaan yang Dilarang</li>
                    <li>E. Hak Kekayaan Intelektual</li>
                    <li>F. Pengunggahan Konten Pada Platform Kami</li>
                    <li>G. Layanan Interaktif</li>
                    <li>H. Laporan Kemungkinan Pelanggaran</li>
                    <li>I. Tindakan yang Kami Anggap Perlu</li>
                    <li>J. Membuat Link ke Platform Kami</li>
                    <li>K. Link Pihak Ketiga Pada Platform Kami</li>
                    <li>L. Tanggung Jawab Anda</li>
                    <li>M. Batasan Tanggung Jawab Kami</li>
                    <li>N. Keadaan Kahar (Force Majeure)</li>
                    <li>O. Hukum yang Berlaku</li>
                    <li>P. Ketentuan Lainnya</li>
                    <li>Q. Cara Menghubungi Kami</li>
                </ul>
                <p>Anda harus berusia minimal 18 (delapan belas) tahun atau sudah menikah dan tidak berada di bawah perwalian atau pengampuan agar Anda secara hukum memiliki kapasitas dan berhak untuk mengikatkan diri pada Syarat dan Ketentuan ini. Jika Anda tidak memenuhi
                    ketentuan tersebut, maka tindakan Anda mendaftar, mengakses, menggunakan atau melakukan aktivitas lain dalam Platform Kami harus dalam sepengetahuan, pengawasan dan persetujuan yang sah dari orang tua atau wali atau pengampu Anda. Orang tua, wali
                    atau pengampu yang memberikan persetujuan bagi Anda yang berusia di bawah 18 (delapan belas) tahun bertanggung jawab secara penuh atas seluruh tindakan Anda dalam penggunaan dan akses terhadap Platform.</p>
                <p>Dengan mendaftar dan/atau menggunakan Platform Kami, maka Anda dan/atau orang tua, wali atau pengampu Anda (jika Anda berusia di bawah 18 tahun) dianggap telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat dan Ketentuan ini.</p>
                <p>Dengan menyetujui Syarat dan Ketentuan ini, Anda juga menyetujui Syarat dan Ketentuan tambahan, termasuk Syarat dan Ketentuan atas setiap Layanan, dan perubahannya yang merupakan bagian yang tidak terpisahkan dari Syarat dan Ketentuan ini (selanjutnya,
                    Syarat dan Ketentuan, Syarat dan Ketentuan tambahan, dan perubahannya secara bersama-sama disebut sebagai “Syarat dan Ketentuan”). Meskipun merupakan satu kesatuan, Syarat dan Ketentuan tambahan akan berlaku dalam hal terdapat perbedaan dengan Syarat
                    dan Ketentuan.</p>
                <p>Jika Anda tidak menyetujui Syarat dan Ketentuan ini, Kami berhak untuk menghentikan akses dan penggunaan Anda terhadap Platform Kami.</p>
                <h2>A. Pembukaan Akun Anda</h2>
                <p>Sebelum menggunakan Platform, Anda menyetujui Syarat dan Ketentuan ini dan Kebijakan Privasi, dan mendaftarkan diri Anda dengan memberikan informasi yang Kami butuhkan. Saat melakukan pendaftaran, Kami akan meminta Anda untuk memberikan nama lengkap,
                    alamat surat elektronik dan nomor telepon genggam pribadi Anda. Kami juga dapat menghentikan penggunaan Platform jika dikemudian hari data-data yang Anda berikan kepada Kami terbukti tidak benar.</p>
                <p>Sistem Kami akan membuatkan akun pada Platform (“Akun”) untuk Anda yang dapat digunakan untuk menggunakan Platform dan memesan layanan melalui Platform.</p>
                <p>Dalam hal Anda telah keluar dari Akun Anda, maka Anda perlu memasukan alamat surat elektronik yang ada berikan pada saat mendaftarkan diri Anda dan memasukan password.</p>
                <p>Akun Anda hanya dapat digunakan oleh Anda, sehingga Anda tidak dapat mengalihkannya kepada orang lain dengan alasan apa pun. Kami berhak menolak untuk memfasilitasi Layanan jika Kami mengetahui atau mempunyai alasan yang cukup untuk menduga bahwa Anda
                    telah mengalihkan atau membiarkan Akun Anda digunakan oleh orang lain.</p>
                <p>Keamanan dan kerahasiaan Akun Anda, termasuk nama terdaftar, alamat surat elektronik terdaftar, nomor telepon genggam terdaftar sepenuhnya merupakan tanggung jawab pribadi Anda. Segala kerugian dan risiko yang ada akibat kelalaian Anda dalam menjaga keamanan
                    dan kerahasiaan sebagaimana disebutkan ditanggung oleh Anda dan/atau orang tua, wali atau pengampu Anda (jika Anda berusia di bawah 18 (delapan belas) tahun). Dengan demikian, Kami akan menganggap setiap penggunaan atau pesanan yang dilakukan melalui
                    Akun Anda sebagai permintaan yang sah dari Anda. Anda harap segera memberitahukan kepada Kami jika Anda mengetahui atau menduga bahwa Akun Anda telah digunakan tanpa sepengetahuan dan persetujuan Anda. Kami akan melakukan tindakan yang Kami anggap
                    perlu dan dapat Kami lakukan terhadap penggunaan tanpa persetujuan tersebut.</p>
                <h2>B. Informasi Pribadi Anda</h2>
                <p>Pengumpulan, penyimpanan, pengolahan, penggunaan dan pembagian informasi pribadi Anda, seperti nama, alamat surat elektronik, dan nomor telepon genggam Anda yang Anda berikan ketika Anda membuka Akun tunduk pada Kebijakan Privasi, yang merupakan bagian
                    yang tidak terpisahkan dari Syarat dan Ketentuan ini.</p>
                <h2>C. Akses Terhadap Platform Kami</h2>
                <p>Kami tidak menjamin bahwa Platform Kami, maupun konten di dalamnya, akan selalu tersedia atau tanpa gangguan. Izin untuk mengakses Platform Kami bersifat sementara. Kami dapat menangguhkan, menarik, memberhentikan, maupun mengganti bagian mana pun dari
                    Platform Kami tanpa pemberitahuan sebelumnya. Kami tidak bertanggung jawab atas alasan apa pun yang membuat Platform Kami tidak tersedia pada waktu atau periode tertentu.</p>
                <p>Anda bertanggung jawab untuk membuat semua pengaturan yang dibutuhkan untuk mendapatkan akses terhadap Platform Kami.</p>
                <h2>D. Penggunaan Yang Dilarang</h2>
                <p>Anda bertanggung jawab untuk membuat semua pengaturan yang dibutuhkan untuk mendapatkan akses terhadap Platform Kami.</p>
                <ul>
                    <li>1. Dengan cara-cara yang melanggar hukum dan peraturan lokal, nasional, maupun internasional yang berlaku.</li>
                    <li>2. Dengan cara-cara yang melanggar hukum atau menipu, atau memiliki tujuan atau dampak yang melanggar hukum atau menipu.</li>
                    <li>3. Untuk tujuan membahayakan atau mencoba mencelakakan anak di bawah umur dengan cara apa pun.</li>
                    <li>4. Mengirim, secara sadar menerima, mengunggah, mengunduh, menggunakan, atau menggunakan kembali materi yang tidak sesuai dengan standar konten Kami.</li>
                    <li>5. Menyebarkan atau mengirimkan materi iklan atau promosi yang tidak diinginkan atau tidak sah, serta bentuk permintaan serupa lainnya (seperti spam).</li>
                    <li>6. Dengan sengaja meneruskan data, mengirim atau mengunggah materi yang mengandung virus, trojan, worm, logic bomb, keystroke loggers, spyware, adware, maupun program berbahaya lainnya atau kode komputer sejenis yang dirancang untuk memberikan efek
                        merugikan terhadap pengoperasian perangkat lunak atau perangkat keras apa pun.</li>
                </ul>
                <p>Anda juga setuju:</p>
                <ul>
                    <li>1.Untuk tidak mereproduksi, menggandakan, menyalin, atau menjual kembali bagian mana pun dari Platform Kami yang bertentangan dengan ketentuan dalam Syarat dan Ketentuan Platform Kami.</li>
                    <li>2. Untuk tidak mengakses tanpa izin, mengganggu, merusak, atau mengacak-acak:</li>
                    <li>3. Bagian mana pun dari Platform Kami;</li>
                    <li>4. Peralatan atau jaringan di mana Platform Kami tersimpan;</li>
                    <li>5. Perangkat lunak apa pun yang digunakan dalam penyediaan Platform Kami; atau</li>
                    <li>6. Peralatan atau jaringan atau perangkat lunak yang dimiliki oleh pihak ketiga mana pun.</li>
                </ul>
                <p>Apabila Anda adalah seorang pegawai negeri atau penyelenggara negara, dalam menggunakan Platform Kami, Anda setuju untuk mematuhi ketentuan peraturan perundang-undangan khususnya yang mengatur tentang penerimaan gratifikasi serta ketentuan lain yang berlaku
                    di lingkungan lembaga anda.</p>
                <p>Apabila Anda adalah seorang pendidik atau tenaga kependidikan, dalam menggunakan Platform Kami, anda setuju untuk mematuhi ketentuan peraturan perundang-undangan terkait pengelolaan dan penyelenggaraan pendidikan, terutama terkait kegiatan sosialisasi,
                    pemasaran, distribusi, maupun penjualan program/produk dari Platform Kami kepada peserta didik di satuan pendidikan formal dimana Anda mengajar atau bekerja dengan suatu imbalan dalam bentuk apa pun.</p>
                <h2>E. Hak Kekayaan Intelektual</h2>
                <p>Platform kami, termasuk namun tidak terbatas pada, nama, logo, kode program, desain, merek dagang, teknologi, basis data, proses dan model bisnis, dilindungi oleh hak cipta, merek, paten dan hak kekayaan intelektual lainnya yang tersedia berdasarkan hukum
                    Republik Indonesia yang terdaftar atas nama Kami. Kami memiliki seluruh hak dan kepentingan atas Platform, termasuk seluruh hak kekayaan intelektual terkait dengan seluruh fitur yang terdapat didalamnya dan hak kekayaan intelektual terkait.</p>
                <p>Anda dapat mengunduh ekstrak dari halaman tertentu dari Platform Kami untuk kegunaan pribadi selama masa berlangganan Anda.</p>
                <p>Anda tidak boleh mengubah salinan dalam bentuk kertas maupun digital dari materi apa pun yang telah Anda cetak atau unduh dengan cara apa pun, dan Anda tidak boleh menggunakan ilustrasi, foto-foto, potongan video atau audio, maupun grafis lain secara
                    terpisah dari teks pendampingnya.</p>
                <p>Anda dilarang untuk:</p>
                <ul>
                    <li>1. menyalin, mengubah, mencetak, mengadaptasi, menerjemahkan, menciptakan karya tiruan dari, mendistribusikan, memberi lisensi, menjual, memindahkan, menampilkan secara publik, menunjukkan secara publik, menggandakan, mengirimkan, menyiarkan lewat
                        media online maupun offline, memotong, membongkar, atau sebaliknya mengeksploitasi bagian mana pun dari Platform Kami, termasuk namun tidak terbatas pada konten-konten dan materi-materi berbayar pada Platform, baik secara fisik maupun digital,
                        dalam masa berlangganan maupun selesai berlangganan Platform;</li>
                    <li>2. memberi lisensi, lisensi turunan, menjual, menjual ulang, memindahkan, menetapkan, mendistribusikan, atau sebaliknya mengeksploitasi atau membagikan secara komersial Platform Kami dan/atau perangkat lunak lain yang terasosiasi dengan Platform Kami
                        dengan cara apa pun;</li>
                    <li>3. menciptakan ‘link’ internet menuju situs web Kami, atau menyadur (frame), atau mengkomputasi (mirror) perangkat lunak mana pun pada server (server) atau perangkat nirkabel atau perangkat yang terhubung ke internet lainnya;</li>
                    <li>4. merekayasa balik atau mengakses Platform Kami guna (a) membangun produk atau jasa yang kompetitif, (b) membangun produk berdasarkan ide, fitur, fungsi, maupun grafis yang serupa dengan Platform Kami, atau (c) menyalin ide, fitur, fungsi, atau grafis
                        pada Platform Kami;</li>
                    <li>5. meluncurkan program atau skrip otomatis termasuk, namun tidak terbatas pada, web spider, web crawler, robot web, web ant, pengindeksan web, bot, virus, worm, atau program apa pun yang dapat meningkatkan permintaan server per detik, atau membuat
                        beban terlalu berat yang mengganggu operasi dan/atau kinerja Platform Kami;</li>
                    <li>6. menggunakan robot, spider, aplikasi pencarian atau pengambilan situs, maupun perlengkapan dan proses manual atau otomatis lain untuk mengambil, membuat indeks, menambang data, atau dengan cara apa pun menggandakan atau menghindari struktur navigasi
                        atau tampilan Platform Kami maupun kontennya;</li>
                    <li>7. memasang, mendistribusikan, atau menggandakan dengan cara apa pun materi dengan hak cipta, merek dagang, atau informasi kepemilikan lain tanpa sebelumnya memperoleh persetujuan dari pemilik hak kepemilikan;</li>
                    <li>8. menghapus pemberitahuan hak cipta, merek dagang, atau hak kepemilikan lainnya yang terkandung dalam Platform Kami. Tidak ada lisensi atau hak yang diberikan kepada Anda secara implisit atau sebaliknya berdasarkan hak kekayaan intelektual yang dimiliki
                        atau dikendalikan oleh kami dan pemberi lisensi kami, kecuali lisensi dan hak yang secara tersurat diberikan dalam Persyaratan Penggunaan ini. Anda tidak boleh menggunakan bagian mana pun dari konten pada Platform Kami untuk tujuan komersial tanpa
                        sebelumnya memperoleh lisensi untuk melakukannya dari Kami atau pemberi lisensi Kami.</li>
                </ul>
                <p>Anda (i) tidak diperbolehkan mengirimkan spam atau pesan duplikatif yang tidak diinginkan dan melanggar Peraturan yang Berlaku; (ii) tidak diperbolehkan mengirim atau menyimpan materi yang mengganggu, bersifat asusila, mengancam, mencemarkan nama baik,
                    maupun tidak mematuhi hukum serta membahayakan, termasuk namun tidak terbatas pada materi yang berbahaya bagi anak-anak atau melanggar hak privasi pihak ketiga; (iii) tidak diperbolehkan mengirim materi yang mengandung virus perangkat lunak seperti
                    worm dan trojan, serta kode, berkas digital, kode skrip, agen, maupun program komputer lain yang berbahaya; (iv) tidak diperbolehkan mengganggu dan mengacaukan integritas atau kinerja Platform Kami serta data yang dimuat di dalamnya; (v) tidak diperbolehkan
                    berusaha memperoleh akses yang tidak sah ke dalam Platform Kami maupun sistem dan jaringan terkait; dan (vi) tidak diperbolehkan menyamar sebagai individu atau entitas lain yang tidak mencerminkan afiliasi Anda sebenarnya dengan seseorang atau suatu
                    entitas.</p>
                <p>Status Kami (dan status kontributor lain yang telah Kami identifikasi) sebagai penulis dari konten pada situs web Kami harus selalu diakui.</p>
                <p>Jika Anda mencetak, menyalin, atau mengunduh bagian mana pun dari Platfrom Kami yang melanggar Persyaratan Penggunaan ini, hak Anda untuk menggunakan Platform Kami akan segera diberhentikan dan Anda harus, berdasarkan keputusan Kami, mengembalikan atau
                    memusnahkan salinan dari materi yang telah Anda buat.</p>
                <p>Kami berhak untuk melakukan investigasi maupun menuntut bentuk pelanggaran apa pun terhadap Persyaratan Penggunaan di atas sesuai dengan ketentuan hukum yang berlaku. Kami dapat melibatkan dan bekerja sama dengan pihak yang berwenang dalam menuntut pengguna
                    yang melanggar Persyaratan Penggunaan ini. Anda mengakui bahwa Kami tidak diwajibkan untuk mengawasi akses Anda terhadap Platform Kami, tapi Kami berhak untuk melakukannya dengan tujuan mengoperasikan Platform Kami, memastikan kepatuhan Anda dengan
                    Syarat dan Ketentuan ini, atau untuk menaati hukum yang berlaku atau keputusan pengadilan, lembaga administratif, maupun badan pemerintahan lainnya.</p>
                <h2>F. Pengunggahan Konten pada Platform Kami</h2>
                <p>Anda dapat menggunakan fitur yang memungkinkan Anda mengunggah konten maupun materi ke Platform Kami, atau untuk berhubungan dengan pengguna Platform Kami lainnya melalui layanan interaktif (untuk selanjutnya disebut sebagai “Konten”).</p>
                <p><b>Konten harus:</b></p>
                <p>Akurat (di mana mereka menyatakan fakta);</p>
                <p>Benar-benar dimaksudkan (di mana mereka menyatakan opini); dan</p>
                <p>Mematuhi hukum yang berlaku di Indonesia dan di negara dari mana mereka dituliskan.</p>
                <p><b>Konten tidak boleh:</b></p>
                <p>Mengandung materi yang mencemarkan nama baik seseorang;</p>
                <p>Mengandung materi yang tidak senonoh, menyinggung, bersifat kebencian, atau menghasut;</p>
                <p>Mempromosikan konten yang berkaitan dengan perjudian, undian, dan/atau taruhan;</p>
                <p>Mempromosikan materi yang eksplisit secara seksual;</p>
                <p>Mempromosikan kekerasan;</p>
                <p>Mempromosikan diskriminasi berdasarkan ras, jenis kelamin, agama, kebangsaan, kecacatan, orientasi seksual, atau usia;</p>
                <p>Mempromosikan layanan meretas (hacking) dan/atau membobol (cracking);</p>
                <p>Mempromosikan akses terhadap produk penipuan, pencucian uang, skema pemasaran berjenjang (multi-level marketing), serta produk bajakan;</p>
                <p>Mempromosikan akses terhadap perdagangan manusia dan organ tubuh manusia;</p>
                <p>Mempromosikan akses terhadap zat-zat terlarang dan narkotika;</p>
                <p>Mempromosikan akses terhadap rokok dan materi berbahan tembakau;</p>
                <p>Mempromosikan penjualan tidak sah terhadap produk-produk yang membutuhkan lisensi (misalnya obat-obatan, bahan peledak, senjata api, dll.);</p>
                <p>Melanggar hak cipta, hak pangkalan data (database right), atau pun merek dagang orang lain;</p>
                <p>Dapat menipu seseorang;</p>
                <p>Dibuat dengan melanggar kewajiban hukum apa pun kepada pihak ketiga, seperti kewajiban kontrak atau kewajiban menjaga kerahasiaan;</p>
                <p>Mempromosikan aktivitas melanggar hukum apa pun;</p>
                <p>Mengancam, menyalahgunakan, atau menyerang privasi orang lain, atau menyebabkan gangguan, ketidaknyamanan, maupun kecemasan yang tidak perlu;</p>
                <p>Dapat melecehkan, menyinggung, mempermalukan, membuat khawatir, atau mengganggu siapa pun;</p>
                <p>Digunakan untuk menyamar sebagai orang lain, atau untuk memalsukan identitas atau afiliasi Anda dengan orang lain;</p>
                <p>Memberi kesan bahwa Konten tersebut berasal dari Kami, ketika tidak benar demikian; dan</p>
                <p>Mengadvokasi, mempromosikan, atau membantu tindakan yang melanggar hukum seperti (hanya sebagai contoh) pelanggaran hak cipta atau penyalahgunaan komputer.</p>
                <p>Anda menjamin bahwa Konten tersebut telah mematuhi standar yang telah disebutkan, dan bahwa Anda akan bertanggung jawab secara penuh kepada Kami dan mengganti kerugian Kami atas pelanggaran terhadap jaminan tersebut. Dengan demikian, Anda akan bertanggung
                    jawab untuk segala kerugian atau kerusakan yang Kami derita akibat pelanggaran jaminan Anda.</p>
                <p>Seluruh Konten yang Anda unggah ke Platform Kami akan dianggap bersifat tidak rahasia, tidak bersifat kepemilikan dan tidak melanggar hak kekayaan intelektual dari pihak manapun, kecuali Anda nyatakan sebaliknya kepada Kami sebagaimana dijelaskan dalam
                    Kebijakan Privasi Platform Kami. Anda tetap memiliki semua hak kepemilikan terhadap Konten Anda, namun Anda diharuskan untuk memberi Kami dan pengguna Platform Kami lainnya lisensi terbatas untuk menggunakan, menyimpan, dan menyalin Konten tersebut,
                    serta untuk mendistribusikan dan membuatnya tersedia bagi pihak ketiga.</p>
                <p>Kami juga berhak menyingkap identitas Anda kepada pihak ketiga mana pun yang mengklaim bahwa Konten yang Anda pampang atau unggah merupakan pelanggaran terhadap hak kekayaan intelektual mereka, atau hak privasi mereka.</p>
                <p>Kami tidak bertanggung jawab atau dikenakan kewajiban oleh pihak ketiga mana pun, untuk Konten atau akurasi dari Konten mana pun yang Anda pampang atau pengguna Platform Kami lainnya.</p>
                <p>Kami berhak menghapus setiap Konten yang Anda buat pada Platform Kami jika, menurut pendapat Kami, konten Anda tidak sesuai dengan standar konten yang ditetapkan dalam Syarat dan Ketentuan Kami.</p>
                <p>Pandangan yang diungkapkan oleh pengguna lain pada Platform Kami tidak mewakili pandangan maupun nilai-nilai Kami.</p>
                <p>Anda sepenuhnya bertanggung jawab untuk mengamankan dan membuat cadangan dari Konten Anda.</p>
                <h2>G. Layanan Interaktif</h2>
                <p>Dari waktu ke waktu, Kami dapat menyediakan layanan interaktif pada Platform Kami, termasuk namun tidak terbatas pada Ruang obrolan (chat rooms), Papan pengumuman (bulletin boards), Live Quiz, Timeline, Forum Tanya Jawab, dan Catatan Sahabat (untuk selanjutnya
                    disebut sebagai “layanan interaktif”).</p>
                <p>Pada situasi di mana Kami menyediakan layanan interaktif, Kami akan menyediakan informasi yang jelas kepada Anda tentang jenis layanan yang ditawarkan.</p>
                <p>Kami akan memberikan usaha terbaik untuk menilai risiko yang mungkin timbul bagi pengguna (terutama untuk pengguna yang berusia di bawah 18 (delapan belas) tahun) dari pihak ketiga ketika mereka menggunakan layanan interaktif yang tersedia pada Platform
                    Kami. Akan tetapi, Kami tidak berkewajiban untuk mengawasi, memantau, atau memoderasi layanan interaktif mana pun pada Platform Kami, dan Kami secara tegas mengecualikan pertanggungjawaban Kami atas kerugian atau kerusakan yang dapat timbul dari penggunaan
                    layanan interaktif oleh pengguna yang bertentangan dengan ketentuan standar konten Kami.</p>
                <p>Penggunaan layanan interaktif Kami oleh Anda yang berusia di bawah 18 (delapan belas) tahun bergantung pada pengawasan dan persetujuan orang tua atau wali mereka. Kami menganjurkan orang tua yang mengawasi dan mengizinkan anak-anak mereka untuk menggunakan
                    layanan interaktif untuk mengkomunikasikan tentang keamanan anak-anak mereka secara online. Orang tua atau wali dari Anda yang berusia di bawah 18 (delapan belas) tahun yang menggunakan layanan interaktif harus mengetahui atas potensi risiko yang
                    dapat Anda alami pada layanan interaktif dan bertanggung jawab secara penuh atas segala tindakan Anda.</p>
                <h2>H. Laporan Kemungkinan Pelanggaran</h2>
                <p>Jika Anda menemukan konten apa pun pada Platform Kami yang Anda yakini melanggar hak cipta apa pun, menyalahi hak lainnya, merusak nama baik, bersifat pornorafis atau tidak senonoh, rasis, atau dengan cara- cara lain menyebabkan pelanggaran secara luas,
                    atau yang merupakan peniruan identitas, penyalahgunaan, spam, atau sebaliknya menyalahi Persyaratan Penggunaan serta Kebijakan Privasi maupun Peraturan yang Berlaku lainnya, silakan laporkan ini kepada Kami melalui surat elektronik ke info@arkalearn.com
                    dan/atau melalui surat ke alamat berikut:</p>
                <p>ARKALEARN HQ, Jl. Pinang Ranti No.34, RT.6 RW.2, Pinang Ranti - Makasar, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13560.</p>
                <p>Pastikan bahwa Anda menyertakan, dalam laporan tersebut (“Laporan”), informasi sebagai berikut:</p>
                <p>Pernyataan bahwa Anda telah mengidentifikasi konten yang melanggar atau menyalahi Syarat dan Ketentuan dan Kebijakan Privasi Platform Kami maupun Peraturan yang Berlaku lainnya pada Platform Kami;</p>
                <p>Deskripsi dari pelanggaran atau konten ilegal serta link di mana konten tersebut berada;</p>
                <p>Screenshot dari konten yang melanggar atau bersifat ilegal;</p>
                <p>Nama lengkap, alamat dan nomor telepon Anda, alamat surat elektronik di mana Anda dapat dihubungi, serta nama pengguna (username) Akun Anda jika Anda memilikinya.</p>
                <p>Dengan membuat Laporan, Anda akan dianggap telah menyertakan, dalam Laporan tersebut:</p>
                <p>pernyataan bahwa Anda dengan niatan baik percaya bahwa penggunaan materi yang disengketakan tersebut tidak diizinkan oleh pemilik hak cipta, agennya, maupun hukum;</p>
                <p>pernyatan bahwa informasi dalam Laporan tersebut adalah akurat; dan</p>
                <p>pada kasus di mana Anda melaporkan konten yang Anda yakini melanggar hak cipta atau hak-hak terkait lainnya, pernyataan bahwa Anda berwenang untuk bertindak atas nama pemilik hak cipta atau hak-hak lain yang diduga telah dilanggar.</p>
                <h2>I. Tindakan yang Kami Anggap Perlu</h2>
                <p>Apabila Kami mengetahui atau mempunyai alasan yang cukup untuk menduga bahwa Anda telah melakukan tindakan asusila, pelanggaran, kejahatan atau tindakan lain yang bertentangan dengan Syarat dan Ketentuan ini dan/atau peraturan perundang-undangan yang
                    berlaku, baik yang dirujuk dalam Syarat dan Ketentuan ini atau tidak, maka Kami berhak untuk dan dapat membekukan Akun, baik sementara atau permanen, atau menghentikan akses Anda terhadap Platform, melakukan pemeriksaan, menuntut ganti kerugian, melaporkan
                    kepada pihak berwenang dan/atau mengambil tindakan lain yang kami anggap perlu, termasuk tindakan hukum pidana maupun perdata.</p>
                <p>Kami akan menindaklanjuti dengan melakukan investigasi dan/atau memfasilitasi Penyedia Layanan yang bersangkutan untuk melaporkan kepada pihak yang berwajib apabila Kami menerima Laporan adanya pelanggaran yang Anda lakukan atas Syarat dan Ketentuan ini
                    ataupun pelanggaran terhadap peraturan perundang-undangan yang berlaku, sehubungan dengan pelecehan atau kekerasan verbal, termasuk namun tidak terbatas pada, atas fisik, jenis kelamin, suku, agama dan ras.</p>
                <h2>J. Membuat Link ke Platform Kami</h2>
                <p>Anda dapat membuat link ke Platform Kami, asalkan Anda melakukannya dengan cara yang adil dan legal serta tidak merusak reputasi Kami atau mengambil keuntungan darinya.</p>
                <p>Anda tidak diperbolehkan membuat link sedemikian rupa sehingga memberi kesan adanya suatu asosiasi, persetujuan, ataupun dukungan dari Kami ketika hal tersebut tidak benar adanya.</p>
                <p>Anda tidak diperbolehkan membuat link ke Platform Kami pada situs web mana pun yang tidak dimiliki oleh Anda.</p>
                <p>Kami berhak mencabut izin pembuatan link tanpa pemberitahuan.</p>
                <p>Situs web yang Anda berikan link harus mematuhi segala aspek standar konten yang telah ditetapkan melalui Syarat dan Ketentuan Kami.</p>
                <p>Jika Anda ingin menggunakan konten pada Platform Kami selain melalui hal-hal yang diatur diatas, silakan hubungi: info@arkalearn.com.</p>
                <h2>K. Link Pihak Ketiga pada Platform Kami</h2>
                <p>Di mana Platform Kami mengandung link and akses ke situs web dan konten lain yang disediakan oleh Pihak Ketiga. Kami tidak memiliki kontrol atas konten situs web atau sumber daya tersebut. Kami tidak bertanggung jawab atas bagian apapun dari isi konten
                    yang disediakan oleh Pihak Ketiga. Akses atau penggunaan Anda terhadap konten Pihak Ketiga tersebut merupakan bentuk persetujuan Anda untuk tunduk pada Syarat dan Ketentuan dan kebijakan privasi yang ditetapkan oleh Pihak Ketiga tersebut.</p>
                <h2>L. Tanggung Jawab Anda</h2>
                <p>Anda bertanggung jawab penuh atas keputusan yang Anda buat untuk menggunakan atau mengakses Platform. Anda harus berperilaku dengan hormat dan tidak boleh terlibat dalam perilaku atau tindakan yang tidak sah, mengancam atau melecehkan ketika menggunakan
                    Platform.</p>
                <p>Anda bertanggung jawab secara penuh atas setiap kerugian dan/atau klaim yang timbul dari penggunaan Platform melalui Akun Anda, baik oleh Anda atau pihak lain yang menggunakan Akun Anda, dengan cara yang bertentangan dengan Syarat dan Ketentuan ini, Kebijakan
                    Privasi atau peraturan perundang-undangan yang berlaku, termasuk namun tidak terbatas untuk tujuan anti pencucian uang, anti pendanaan terorisme, aktivitas kriminal, penipuan dalam bentuk apapun (termasuk namun tidak terbatas pada kegiatan phishing
                    dan/atau social engineering), pelanggaran hak kekayaan intelektual, dan/atau aktivitas lain yang merugikan publik dan/atau pihak lain manapun atau yang dapat atau dianggap dapat merusak reputasi Kami.</p>
                <p>Kami tidak menjamin bahwa Platform Kami akan aman atau terbebas dari bug atau virus. Anda bertanggung jawab untuk mengatur teknologi informasi, program komputer, serta platform yang Anda gunakan untuk mengakses Platform Kami. Anda harus menggunakan perangkat
                    lunak anti virus Anda sendiri.</p>
                <h2>M. Batasan Tanggung Jawab Kami</h2>
                <p>Platform yang Kami sediakan adalah sebagaimana adanya dan Kami tidak menyatakan atau menjamin bahwa keandalan, ketepatan waktu, kualitas, kesesuaian, ketersediaan, akurasi, kelengkapan atau keamanan dari Platform dapat memenuhi kebutuhan dan akan sesuai
                    dengan harapan Anda.</p>
                <p>Kami tidak bertanggung jawab kepada pengguna mana pun atas kerugian atau kerusakan, baik dalam bentuk kontrak, perbuatan melawan hukum (termasuk kelalaian), pelanggaran kewajiban berdasarkan undang-undang, atau sebaliknya, meskipun dapat diperkirakan,
                    yang terjadi di bawah atau berhubungan dengan:</p>
                <p>Penggunaan, atau ketidakmampuan untuk menggunakan, Platform Kami; atau</p>
                <p>Penggunaan atau kepercayaan terhadap konten apa pun yang ditampilkan pada Platform Kami.</p>
                <p>Kami hanya menyediakan Platform untuk penggunaan domestik dan pribadi. Anda setuju untuk tidak menggunakan Platform Kami untuk tujuan komersial atau bisnis apa pun, dan Kami tidak bertanggung jawab kepada Anda atas kerugian, kehilangan usaha, gangguan
                    usaha, maupun hilangnya kesempatan bisnis.</p>
                <p>Kami tidak bertanggung jawab atas kerugian atau kerusakan yang disebabkan oleh virus, serangan Penolakan Layanan secara Terdistribusi (DDoS), maupun materi teknologi berbahaya lainnya yang dapat menginfeksi peralatan komputer, program komputer, data,
                    atau materi kepemilikan lainnya karena penggunaan maupun pengunduhan konten apa pun dari Platform Kami maupun situs web lain yang terkait dengannya oleh Anda.</p>
                <p>Kami tidak berkewajiban untuk mengawasi akses atau penggunaan Anda terhadap Platform. Akan tetapi, Kami akan tetap melakukan pengawasan untuk memastikan kelancaran penggunaan Platform dan untuk memastikan kepatuhan Anda terhadap Syarat dan Ketentuan ini,
                    peraturan perundang-undangan yang berlaku, putusan pengadilan, dan/atau ketentuan lembaga administratif atau badan pemerintahan lainnya.</p>
                <p>Kami tidak bertanggung jawab atas konten situs web yang terhubung dengan Platform Kami. Tautan semacam itu seharusnya tidak ditafsirkan sebagai bentuk dukungan Kami terhadap situs-situs tersebut. Kami tidak bertanggung jawab atas kerugian atau kerusakan
                    apa pun yang timbul dari penggunaan Anda terhadap situs-situs web tersebut.</p>
                <h2>N. Keadaan Kahar (Force Majeure)</h2>
                <p>Platform Kami dapat diinterupsi oleh kejadian di luar kewenangan atau kontrol Kami (“Keadaan Kahar”), termasuk namun tidak terbatas pada bencana alam, gangguan listrik, gangguan telekomunikasi, kebijakan pemerintah, dan lain-lain. Anda setuju untuk membebaskan
                    Kami dari setiap tuntutan dan tanggung jawab, jika Kami tidak dapat memfasilitasi Layanan, termasuk memenuhi instruksi yang Anda berikan melalui Platform, baik sebagian maupun seluruhnya, karena suatu Keadaan Kahar.</p>
                <h2>O. Hukum yang Berlaku</h2>
                <p>Syarat dan Ketentuan ini diatur berdasarkan hukum Republik Indonesia. Setiap dan seluruh perselisihan yang timbul dari penggunaan Platform tunduk pada yurisdiksi eksklusif Pengadilan Negeri Jakarta Selatan.</p>
                <h2>P. Ketentuan Lainnya</h2>
                <p>Anda mengerti dan setuju bahwa Syarat dan Ketentuan ini merupakan perjanjian dalam bentuk elektronik dan tindakan Anda menekan tombol ‘daftar ’ saat pembukaan Akun atau tombol ‘masuk’ saat akan mengakses Akun Anda merupakan persetujuan aktif Anda untuk
                    mengikatkan diri dalam perjanjian dengan Kami sehingga keberlakuan Syarat dan Ketentuan ini dan Kebijakan Privasi adalah sah dan mengikat secara hukum dan terus berlaku sepanjang penggunaan Platform oleh Anda.</p>
                <p>Kami dapat merevisi Persyaratan Penggunaan ini kapan pun dengan mengubah halaman ini. Mohon kunjungi kembali halaman ini dari waktu ke waktu guna memperhatikan ada tidaknya perubahan yang Kami buat, karena perubahan tersebut akan mengikat Anda.</p>
                <p>Kami dapat memperbaharui Platform dari waktu ke waktu serta mengubah kontennya kapan pun. Meskipun demikian, perlu diketahui bahwa Platform Kami dapat memiliki konten yang tidak diperbarui pada waktu tertentu, dan Kami tidak bertanggung jawab untuk memperbaruinya.
                    Kami tidak menjamin bahwa Platform Kami, maupun konten yang terkandung di dalamnya, dapat bebas sepenuhnya dari kesalahan atau kelalaian.</p>
                <p>Anda tidak akan mengajukan tuntutan atau keberatan apapun terhadap keabsahan dari Syarat dan Ketentuan atau Kebijakan Privasi yang dibuat dalam bentuk elektronik.</p>
                <p>Anda tidak dapat mengalihkan hak Anda berdasarkan Syarat dan Ketentuan ini tanpa persetujuan tertulis sebelumnya dari Kami. Namun, Kami dapat mengalihkan hak Kami berdasarkan Syarat dan Ketentuan ini setiap saat kepada pihak lain tanpa perlu mendapatkan
                    persetujuan terlebih dahulu dari atau memberikan pemberitahuan sebelumya kepada Anda.</p>
                <p>Bila Anda tidak mematuhi atau melanggar ketentuan dalam Syarat dan Ketentuan ini, dan Kami tidak mengambil tindakan secara langsung, bukan berarti Kami mengesampingkan hak Kami untuk mengambil tindakan yang diperlukan di kemudian hari.</p>
                <p>Ketentuan ini tetap berlaku bahkan setelah pembekuan sementara, pembekuan permanen, penghapusan Platform atau setelah berakhirnya perjanjian ini antara Anda dan Kami.</p>
                <p>Jika salah satu dari ketentuan dalam Syarat dan Ketentuan ini tidak dapat diberlakukan, hal tersebut tidak akan memengaruhi ketentuan lainnya.</p>
                <h2>Q. Cara Menghubungi Kami</h2>
                <p>Untuk menghubungi kami, silakan kirim surat elektronik ke info@arkalearn.com</p>
                <p>Saya dan/atau orang tua, wali atau pengampu saya telah membaca dan mengerti seluruh Syarat dan Ketentuan ini dan konsekuensinya dan dengan ini menerima setiap hak, kewajiban, dan ketentuan yang diatur di dalamnya.</p><br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kebijakanPrivasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kebijakan Privasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p dir="ltr" style="text-align:left;"></p>
                <p>Kerahasian Informasi Pribadi adalah hal yang terpenting bagi PT. Arka Spektrum Solutindo (<span dir="rtl"></span><span dir="rtl"></span><span lang="ar-sa" dir="rtl" xml:lang="ar-sa"><span dir="rtl"></span><span dir="rtl"></span>“</span>Kami”<span lang="de" xml:lang="de">). Kami berkomitmen untuk melindungi dan menghormati privasi pengguna (</span><span dir="rtl"></span><span dir="rtl"></span><span lang="ar-sa" dir="rtl" xml:lang="ar-sa"><span dir="rtl"></span><span dir="rtl"></span>“</span><span lang="es-trad" xml:lang="es-trad">Anda</span>”) saat mengakses dan menggunakan aplikasi, situs web (<a href="http://www.arkalearn.com/">www.arkalearn.com</a>&nbsp;dan situs web lain yang Kami kelola), fitur, teknologi, konten dan produk yang Kami sediakan (selanjutnya,
                    secara Bersama-sama disebut sebagai&nbsp;<span dir="rtl"></span><span dir="rtl"></span><span lang="ar-sa" dir="rtl" xml:lang="ar-sa"><span dir="rtl"></span><span dir="rtl"></span>“</span>Platform”),</p>
                <p>&nbsp;</p>
                <p>Kebijakan Privasi ini mengatur landasan dasar mengenai bagaimana Kami menggunakan informasi pribadi yang Kami kumpulkan dan/atau atau Anda berikan (<span dir="rtl"></span><span dir="rtl"></span><span lang="ar-sa" dir="rtl" xml:lang="ar-sa"><span dir="rtl"></span>
                        <span dir="rtl"></span>“</span><span lang="it" xml:lang="it">Informasi Pribadi</span>”). Kebijakan Privasi ini berlaku bagi seluruh pengguna Platform, kecuali diatur pada Kebijakan Privasi yang terpisah. Mohon membaca Kebijakan Privasi Kami dengan seksama sehingga
                    Anda dapat memahami pendekatan dan cara Kami dalam menggunakan informasi tersebut.</p>
                <p>&nbsp;</p>
                <p>Kebijakan Privasi ini mencakup hal-hal sebagai berikut:</p>
                <p>A.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informasi Pribadi yang Dapat Kami Kumpulkan</p>
                <p><span lang="it" xml:lang="it">B.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="it" xml:lang="it">Penggunaan Informasi Pribadi</span></p>
                <p><span lang="de" xml:lang="de">C.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="de" xml:lang="de">Pengungkapan Informasi Pribadi</span></p>
                <p><span lang="it" xml:lang="it">D.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="it" xml:lang="it">Penyimpanan Informasi Pribadi</span></p>
                <p>E.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hak Anda</p>
                <p>F.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kebijakan Cookies</p>
                <p>G.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pengakuan dan Persetujuan</p>
                <p>H.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Materi Pemasaran</p>
                <p>I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perubahan dalam Kebijakan Privasi Kami</p>
                <p><span lang="de" xml:lang="de">J.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="de" xml:lang="de">Cara Menghubungi Kami</span></p>
                <p>&nbsp;</p>
                <p>Dengan mengunjungi dan/atau mendaftar Akun pada Platform Kami, Anda dan/atau orang tua, wali atau pengampu Anda (jika Anda berusia dibawah 18 (delapan belas) tahun) menerima dan menyetujui pendekatan dan cara-cara yang digambarkan dalam Kebijakan Privasi
                    ini.</p>
                <p>&nbsp;</p>
                <p>A. INFORMASI PRIBADI YANG DAPAT KAMI KUMPULKAN</p>
                <p><span lang="it" xml:lang="it">Kami dapat mengumpulkan Informasi Pribadi berupa:</span></p>
                <p>Informasi yang Anda berikan. Anda dapat memberikan informasi melalui formulir elektronik pada Platform Kami maupun dengan berkorespondensi melalui telepon, surat elektronik, dan sebagainya. Informasi ini meliputi informasi yang Anda berikan ketika mendaftar
                    pada Platform Kami, berlangganan layanan Kami, mencari produk, berpartisipasi dalam diskusi online atau fungsi media sosial lain pada Platform Kami, mengikuti kompetisi, promosi, atau survei, serta ketika Anda melaporkan masalah dengan Platform Kami.
                    Informasi yang Anda berikan dapat meliputi nama, alamat, alamat surat elektronik, nomor telepon,informasi finansial dan kartu kredit, deskripsi pribadi, foto, dan data lainnya. Kami dapat meminta Anda untuk melakukan verifikasi terhadap informasi
                    yang Anda berikan, untuk memastikan akurasi dari informasi tersebut.</p>
                <p>&nbsp;</p>
                <p>Informasi yang Kami kumpulkan. Untuk setiap kunjungan Anda ke Platform Kami, Kami dapat mengumpulkan informasi berikut secara otomatis:</p>
                <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informasi teknis, meliputi alamat Protokol Internet (IP address) yang digunakan untuk menghubungkan komputer Anda dengan internet, informasi log in Anda, jenis dan versi perambah (browser) yang digunakan, pengaturan
                    zona waktu, jenis dan versi ekstensi perambah (browser plug-in), system operasi dan platform;</p>
                <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informasi tentang kunjungan Anda, termasuk daftar lengkap Lokator Sumber Seragam (Uniform Resource Locators atau URL) yang dikunjungi menuju, melalui, dan dari Platform Kami (termasuk tanggal dan waktu); produk
                    yang Anda lihat atau cari; waktu respon halaman, masalah pengunduhan, lama kunjungan pada halaman tertentu, informasi interaksi pada halaman (seperti pengguliran, klik, maupun pergerakan tetikus), metode yang digunakan untuk meninggalkan situs, serta
                    nomor telepon yang digunakan untuk menghubungi layanan pelanggan Kami.</p>
                <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data nilai Anda, termasuk namun tidak terbatas pada hasil ujian Anda yang diperoleh melalui Platform, serta data akademis lain.</p>
                <p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informasi yang Kami terima dari sumber lain. Kami dapat menerima informasi jika Anda menggunakan situs lain yang Kami operasikan atau layanan lain yang Kami sediakan. Kami juga bekerja sama dengan pihak ketiga
                    (termasuk, namun tidak terbatas pada misalnya, mitra bisnis, sub-kontraktor dalam pelayanan teknis, jasa pembayaran dan pengantaran, jaringan periklanan, penyedia analisis, penyedia pencarian informasi, serta agen acuan kredit) (<span dir="rtl"></span>
                    <span dir="rtl"></span><span lang="ar-sa" dir="rtl" xml:lang="ar-sa"><span dir="rtl"></span><span dir="rtl"></span>“</span>Mitra Kami”) dan dapat menerima informasi dari mereka. Kami akan mengambil langkah-langkah dalam batas kewajaran untuk melakukan verifikasi
                    terhadap informasi yang Kami dapatkan dari sumber lain sesuai dengan Peraturan yang Berlaku.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p><span lang="de" xml:lang="de">B. PENGGUNAAN INFORMASI PRIBADI</span></p>
                <p><span lang="it" xml:lang="it">Kami menggunakan Informasi Pribadi dengan cara-cara berikut:</span></p>
                <p>&nbsp;</p>
                <p>Informasi yang Anda berikan. Kami akan menggunakan informasi ini:</p>
                <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk menjalankan kewajiban Kami dalam menyediakan informasi, produk, dan jasa kepada Anda;</p>
                <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk menyediakan informasi terkait produk dan jasa lain yang Kami tawarkan; guna menyediakan Anda, atau mengizinkan pihak ketiga untuk menyediakan Anda, informasi tentang produk dan jasa yang Kami anggap dapat
                    menarik minat Anda. Jika Anda adalah pelanggan lama, Kami dapat menghubungi Anda secara elektronik atau cara-cara lain dengan informasi tentang produk dan jasa Kami. Jika Anda adalah pelanggan baru, dan di mana Kami mengizinkan pihak ketiga untuk
                    menggunakan Data Pribadi Anda, Kami (atau mereka) dapat menghubungi Anda secara elektronik hanya jika Anda sudah memberikan persetujuan.</p>
                <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk memberitahukan Anda tentang perubahan pada jasa Kami;</p>
                <p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk memastikan bahwa konten dari Platform Kami disajikan dengan cara yang paling efektif bagi Anda.</p>
                <p>&nbsp;</p>
                <p>Informasi yang Kami kumpulkan. Kami akan menggunakan informasi ini:</p>
                <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk mengelola Platform dan operasi internal Kami, termasuk pencarian sumber masalah (troubleshooting), analisis data, pengujian, penelitian, serta tujuan-tujuan statistik dan survei lainnya;</p>
                <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk memperbaiki Platform Kami sehingga konten dipastikan dapat disajikan dengan cara yang paling efektif untuk Anda;</p>
                <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk memungkinkan Anda berpartisipasi dalam fitur interaktif layanan Kami, ketika Anda inginkan;</p>
                <p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sebagai bagian dari usaha dalam memastikan keselamatan dan keamanan Platform Kami;</p>
                <p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;untuk mengukur dan memahami efektivitas periklanan yang Kami lakukan kepada Anda dan pihak lain, serta menyajikan iklan produk dan jasa yang relevan bagi Anda;</p>
                <p>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk memberi masukan dan rekomendasi kepada Anda dan pengguna lain dalam Platform Kami mengenai produk dan jasa yang dapat menarik minat Anda dan mereka.</p>
                <p>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informasi yang Kami terima dari sumber lain. Kami dapat menggabungkan informasi yang Kami terima dari sumber lain dengan informasi yang Anda berikan dan informasi yang Kami kumpulkan.</p>
                <p>&nbsp;</p>
                <p>Kami dapat menggunakan informasi ini maupun informasi gabungan untuk tujuan yang diatur di atas (tergantung tipe informasi yang Kami terima).</p>
                <p>&nbsp;</p>
                <p><span lang="de" xml:lang="de">C. PENGUNGKAPAN INFORMASI PRIBADI</span></p>
                <p>Kami dapat membagi atau menyingkap Data Pribadi dengan anggota kelompok usaha Kami, yang melingkupi cabang dan anak perusahaan, serta perusahaan induk utama dan anak perusahaannya.</p>
                <p>&nbsp;</p>
                <p><span lang="it" xml:lang="it">Kami dapat membagi Data Pribadi dengan pihak ketiga, termasuk :</span></p>
                <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mitra bisnis, pemasok, dan sub-kontraktor dalam penyelenggarakan kontrak yang Kami laksanakan dengan mereka atau Anda.</p>
                <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemasang iklan dan jaringan iklan yang membutuhkan data untuk memilih dan menawarkan iklan yang relevan bagi Anda dan pengguna lain. Kami tidak membuka informasi tentang individu yang dapat diidentifikasi, namun
                    Kami dapat menyediakan mereka informasi agregat tentang pengguna Kami (misalnya informasi bahwa 500 pria berusia di bawah 30 tahun telah mengakses tautan iklan mereka pada hari tertentu). Kami juga dapat memberikan informasi agregat untuk membantu
                    pemasang iklan dalam menjangkau target audiens tertentu (misalnya, perempuan di Jakarta Pusat). Kami dapat menggunakan data personal yang Kami kumpulkan untuk memenuhi permintaan pemasang iklan dengan menampilkan iklan mereka kepada target audiens
                    tersebut.</p>
                <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyedia analisis dan mesin pencari yang membantu Kami untuk memperbaiki dan mengoptimasi Platform Kami.</p>
                <p>&nbsp;</p>
                <p>Kami dapat mengungkap informasi kepada pihak ketiga:</p>
                <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam situasi di mana Kami menjual atau membeli perusahaan dan/atau aset, Kami dapat menyingkap data kepada calon pembeli atau penjual dari perusahaan atau aset tersebut.</p>
                <p><span lang="pt" xml:lang="pt">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span lang="pt" xml:lang="pt">Jika PT&nbsp;</span>Arka Spektrum Solutindo atau perusahaan induknya atau aset-aset substansial yang terkait di dalamnya diperoleh oleh pihak
                    ketiga, maka Data Personal yang dimiliki tentang pelanggan Kami akan menjadi salah satu aset yang dipindahtangankan.<span lang="pt" xml:lang="pt"></span></p>
                <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jika Kami berada di bawah tanggung jawab untuk menyingkap atau membagi data guna mematuhi kewajiban hukum dan perjanjian lain; atau melindungi hak, harta benda, maupun keamanan dari PT Ruang Raya Indonesia,
                    pelanggan Kami, dan lain-lain. Hal ini mencakup penukaran informasi dengan perusahaan dan organisasi lain untuk tujuan perlindungan dari penipuan dan pengurangan risiko kredit.</p>
                <p>&nbsp;</p>
                <p><span lang="de" xml:lang="de">D. PENYIMPANAN INFORMASI PRIBADI</span></p>
                <p>Seluruh informasi Pribadi yang Anda berikan kepada Kami disimpan di server yang aman. Semua transaksi pembayaran pada Platform akan dienkripsi. Dengan menyerahkan Informasi Pribadi Anda pada Platform, Anda menyetujui pengalihan, penyimpanan, serta pengolahan
                    yang terjadi pada Platform Kami. Kami akan mengambil langkah-langkah dalam batas kewajaran yang diperlukan untuk memastikan bahwa Informasi Pribadi tersebut diperlakukan dengan aman dan sesuai dengan Kebijakan Privasi serta Peraturan yang Berlaku.</p>
                <p>&nbsp;</p>
                <p>Seluruh Informasi Pribadi yang Anda berikan akan Kami simpan: (i) selama Anda masih menjadi pengguna dari Platform Kami dan (ii) setidaknya 5 (lima) tahun sejak tanggal di mana Anda berhenti menggunakan Platform Kami; atau (iii) sesuai dengan tujuan awal
                    dari pengumpulan Informasi Pribadi tersebut.</p>
                <p>Dalam situasi di mana Kami memberikan (atau Anda memilih) sebuah kata sandi (password) yang mengizinkan Anda untuk mengakses bagian-bagian tertentu pada Platform Kami, Anda bertanggung jawab untuk menjaga kerahasiaan kata sandi ini. Kami meminta Anda
                    untuk tidak membagi kata sandi dengan siapa pun.</p>
                <p>Mohon untuk dapat diperhatikan bahwa transmisi informasi melalui internet tidak sepenuhnya aman. Meskipun demikian, Kami akan berusaha sebaik mungkin untuk melindungi Informasi Pribadi tersebut. Kami tidak bisa menjamin keamanan data yang dikirimkan ke
                    Platform Kami; risiko dari setiap transmisi menjadi tanggung jawab Anda. Begitu Kami menerima Informasi Pribadi Anda, Kami akan menggunakan prosedur yang ketat dan fitur keamanan untuk mencegah akses yang tidak diizinkan.</p>
                <p>&nbsp;</p>
                <p>E. HAK ANDA</p>
                <p><span lang="it" xml:lang="it">Anda dapat memohon untuk penghapusan Informasi Pribadi Anda pada Platform atau menarik persetujuan Anda untuk setiap atau segala pengumpulan, penggunaan atau pengungkapan Informasi Pribadi Anda dengan memberikan kepada kami pemberitahuan yang wajar secara tertulis melalui detail kontak yang tercantum pada bagian J Kebijakan Privasi ini. Tergantung pada keadaan dan sifat permohonan yang Anda minta, Anda harus memahami dan mengakui bahwa setelah penarikan persetujuan atau permohonan penghapusan tersebut, Anda mungkin tidak lagi dapat menggunakan Platform. Penarikan persetujuan Anda dapat mengakibatkan penghentian Akun Anda atau hubungan kontraktual Anda dengan kami, dengan semua hak dan kewajiban yang muncul sepenuhnya harus dipenuhi. Setelah menerima pemberitahuan untuk menarik persetujuan untuk pengumpulan, penggunaan atau pengungkapan Informasi Pribadi Anda, Kami akan menginformasikan Anda tentang konsekuensi yang mungkin terjadi dari penarikan tersebut sehingga Anda dapat memutuskan apakah Anda tetap ingin menarik persetujuan atau tidak.</span></p>
                <p>Anda dapat meminta kepada Kami untuk mengakses dan/atau mengoreksi Informasi Pribadi anda yang berada dalam kepemilikan dan penguasaan kami, dengan menghubungi kami di perincian yang disediakan di bawah ini.</p>
                <p>Platform Kami dapat, dari waktu ke waktu, memuat link menuju dan dari situs-situs milik jaringan mitra, pemuat iklan, dan afiliasi lainnya. Jika Anda mengikuti link ke salah satu situs tersebut, mohon perhatikan bahwa situs-situs tersebut memiliki Kebijakan
                    Privasi mereka sendiri dan bahwa Kami tidak bertanggung jawab atau memiliki kewajiban apa pun atas kebijakan-kebijakan tersebut. Mohon periksa kebijakan-kebijakan tersebut sebelum Anda menyerahkan informasi apa pun ke situs-situs tersebut.</p>
                <p>&nbsp;</p>
                <p>F. KEBIJAKAN COOKIES</p>
                <p>Ketika Anda menggunakan Platform, Kami dapat menempatkan sejumlah cookies pada browser Anda. Cookies adalah sebuah berkas digital kecil berisi huruf dan angka yang Kami simpan pada browser atau hard drive komputer Anda atas persetujuan Anda. Cookies mengandung
                    informasi yang dipindahkan ke diska keras komputer Anda.</p>
                <p>Cookies dapat digunakan untuk tujuan berikut: (1) mengaktifkan fungsi tertentu, (2) memberikan analisis, (3) menyimpan preferensi Anda; dan (4) memungkinkan pengiriman iklan dan pengiklanan berdasarkan perilaku. Beberapa cookies ini hanya akan digunakan
                    jika Anda menggunakan fitur tertentu, atau memilih preferensi tertentu, sementara sebagian Cookies lain akan selalu digunakan.</p>
                <p>&nbsp;</p>
                <p><span lang="nl" xml:lang="nl">Kami menggunakan cookies untuk alasan-alasan berikut:</span></p>
                <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cookies dibutuhkan untuk pengoperasian Platform Kami. Ini termasuk, misalnya, Cookies yang memungkinkan Anda memasuki Area yang aman di Platform Kami, menggunakan keranjang belanja, ataupun menggunakan layanan
                    penagihan eletronik.</p>
                <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cookies memungkinkan Kami untuk mengenali dan menghitung jumlah pengunjung serta melihat bagaimana pengunjung bergerak di sekitar Platform Kami saat mereka menggunakannya. Ini membantu Kami memperbaiki cara
                    kerja Platform Kami, misalnya, dengan memastikan pengguna menemukan apa yang mereka cari dengan mudah.</p>
                <p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cookies digunakan untuk mengenali Anda saat kembali ke Platform Kami. Ini memungkinkan Kami melakukan personalisasi terhadap konten Kami untuk Anda, menyapa Anda dengan nama, serta mengingat preferensi Anda
                    (misalnya, pilihan bahasa atau wilayah Anda).</p>
                <p>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cookies mencatat kunjungan Anda ke Platform Kami, halaman yang telah Anda kunjungi, serta tautan yang telah Anda ikuti. Kami akan menggunakan informasi ini untuk membuat Platform Kami serta iklan yang terpasang
                    di dalamnya lebih relevan kepada minat Anda. Kami juga dapat membagi informasi ini dengan pihak ketiga untuk tujuan tersebut.</p>
                <p>&nbsp;</p>
                <p>Mohon perhatikan bahwa pihak ketiga (termasuk, misalnya, jaringan periklanan dan penyedia jasa eksternal seperti jasa analisis lalu lintas web) juga dapat menggunakan Cookies ini, di mana Kami tidak memiliki kendali. Cookies ini cenderung membuat Platform
                    Kami dan iklan yang ditampilkan di dalamnya lebih relevan dengan minat Anda, serta meningkatkan kinerja Platform Kami.</p>
                <p>Anda dapat menghapus Cookies dengan cara melakukan fungsi clear data pada mobile app maupun web browser Anda yang memungkinkan Anda untuk menolak pengaturan seluruh atau sebagian Cookies. Akan tetapi, Anda mungkin tidak dapat mengakses seluruh atau sebagian
                    Platform Kami.</p>
                <p>&nbsp;</p>
                <p>G. PENGAKUAN DAN PERSETUJUAN</p>
                <p>Dengan menyetujui Kebijakan Privasi, Anda dan/atau orang tua, wali atau pengampu Anda (dalam hal Anda berusia di bawah 18 (delapan belas) tahun) mengakui bahwa Anda telah membaca dan memahami Kebijakan Privasi ini dan menyetujui segala ketentuannya. Secara
                    khusus, Anda setuju dan memberikan persetujuan kepada kami untuk mengumpulkan, menggunakan, membagikan, mengungkapkan, menyimpan, mentransfer, atau mengolah Informasi Pribadi anda sesuai dengan Kebijakan Privasi ini.</p>
                <p>Dalam hal Anda memberikan Informasi Pribadi yang berkaitan dengan individu lain (misalnya Informasi Pribadi yang berkaitan dengan pasangan anda, anggota keluarga, teman, atau pihak lain) kepada Kami, maka Anda menyatakan dan menjamin bahwa Anda telah
                    memperoleh persetujuan dari individu tersebut untuk, dan dengan ini menyetujui atas nama individu tersebut untuk, pengumpulan, penggunaan, pengungkapan dan pengolahan Informasi Pribadi mereka oleh Kami.</p>
                <p>&nbsp;</p>
                <p>H. MATERI PEMASARAN</p>
                <p><span lang="it" xml:lang="it">Kami dan Mitra Kami dapat mengirimkan anda dan/atau orang tua, wali atau pengampu Anda pemasaran langsung, iklan, dan komunikasi promosi melalui aplikasi push-notification, pesan melalui Aplikasi, pos, panggilan telepon, layanan pesan singkat, email dan/atau aplikasi pesan lainnya (</span>
                    <span dir="rtl"></span><span dir="rtl"></span><span lang="ar-sa" dir="rtl" xml:lang="ar-sa"><span dir="rtl"></span><span dir="rtl"></span>“</span>Materi Pemasaran”) jika Anda telah setuju untuk berlangganan milis Kami, dan/atau setuju untuk menerima materi pemasaran
                    dan promosi dari Kami. Anda dapat memilih untuk tidak menerima komunikasi pemasaran tersebut kapan saja dengan menghubungi Kami melalui detail kontak yang tercantum pada bagian J Kebijakan Privasi ini. Mohon perhatikan bahwa jika Anda memilih
                    untuk keluar, Kami masih dapat mengirimi Anda pesan-pesan non-promosi, seperti tanda terima atau informasi tentang Akun Anda.</p>
                <p>I. PERUBAHAN DALAM KEBIJAKAN PRIVASI KAMI</p>
                <p>Perubahan apa pun yang Kami lakukan terhadap Kebijakan Privasi Kami di masa depan akan diterbitkan melalui halaman ini dan, ketika dibutuhkan, diberitahukan kepada Anda melalui surat elektronik. Mohon kunjungi kembali halaman ini dari waktu ke waktu untuk
                    melihat adanya pemutakhiran atau perubahan pada Kebijakan Privasi Kami.</p>
                <p>&nbsp;</p>
                <p><span lang="it" xml:lang="it">J. CARA MENGHUBUNGI KAMI</span></p>
                <p>Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau Anda ingin mendapatkan akses dan/atau melakukan koreksi terhadap Informasi Pribadi Anda, silahkan dapat menghubungi Kami melalui info@arkalearn.com.</p><br><br>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>