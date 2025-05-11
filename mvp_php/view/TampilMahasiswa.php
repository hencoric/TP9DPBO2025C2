<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
    private $prosesmahasiswa;
    private $tpl;

    function __construct()
    {
        // konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $data = null;

        // semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
            $no = $i + 1;
            $gender = $this->prosesmahasiswa->getGender($i);
			$data .= "<tr>
				<td>" . $no . "</td>
				<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
				<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
				<td>" . $gender . "</td>  <!-- Langsung tampilkan -->
				<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
				<td>
					<a href='index.php?edit=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a> |
					<a href='index.php?hapus=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
				</td>
			</tr>";
        }

        $this->tpl = new Template("templates/skin.html");
        $this->tpl->replace("DATA_TABEL", $data);
        $this->tpl->write();
    }
    
    function tampilForm($id = null)
    {
        if ($id) {
            $this->tampilFormEdit($id);
        } else {
            $this->tampilFormTambah();
        }
    }
    
    function tampilFormTambah()
    {
        $this->tpl = new Template("templates/add_form.html");
        $this->tpl->write();
    }
    
    function tampilFormEdit($id)
    {
        $data = $this->prosesmahasiswa->getDataById($id);
        
        if ($data) {
            $this->tpl = new Template("templates/edit_form.html");
            $this->tpl->replace("DATA_ID", $data['id']);
            $this->tpl->replace("DATA_NIM", $data['nim']);
            $this->tpl->replace("DATA_NAMA", $data['nama']);
            $this->tpl->replace("DATA_TEMPAT", $data['tempat']);
            $this->tpl->replace("DATA_TL", $data['tl']);
            if ($data['gender'] == 'L') {
                $this->tpl->replace("DATA_GENDER_L", "selected");
                $this->tpl->replace("DATA_GENDER_P", "");
            } else {
                $this->tpl->replace("DATA_GENDER_L", "");
                $this->tpl->replace("DATA_GENDER_P", "selected");
            }
            
            $this->tpl->replace("DATA_EMAIL", $data['email']);
            $this->tpl->replace("DATA_TELP", $data['telp']);

            $this->tpl->write();
        } else {
            header("Location: index.php");
        }
    }
}