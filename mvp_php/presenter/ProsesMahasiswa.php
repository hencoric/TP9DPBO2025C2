<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "Terjadi kesalahan: " . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi email
				$mahasiswa->setTelepon($row['telp']); // mengisi telepon

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "Terjadi kesalahan pada pemrosesan data: " . $e->getMessage();
		}
	}
	
	function addMahasiswa($data)
	{
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->add($data);
		$this->tabelmahasiswa->close();
	}

	function editMahasiswa($data)
	{
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->edit($data);
		$this->tabelmahasiswa->close();
		return $result;
	}

	function deleteMahasiswa($data)
	{
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->delete($data);
		$this->tabelmahasiswa->close();
	}

	function getDataById($id)
	{
		$this->tabelmahasiswa->open();
		$result = $this->tabelmahasiswa->getMahasiswaById($id);
		$this->tabelmahasiswa->close();

		if ($result) {
			return [
				'id' => $result['id'] ?? '',
				'nim' => $result['nim'] ?? '',
				'nama' => $result['nama'] ?? '',
				'tempat' => $result['tempat'] ?? '',
				'tl' => $result['tl'] ?? '',
				'gender' => $result['gender'] ?? '',
				'email' => $result['email'] ?? '',
				'telp' => $result['telp'] ?? ''
			];
		}
		return null;
	}

	public function getData()
	{
		return $this->data;
	}

	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->getId();
	}
	
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->getNim();
	}
	
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->getNama();
	}
	
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->getTempat();
	}
	
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->getTl();
	}
	
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->getGender();
	}
	
	function getSize()
	{
		return sizeof($this->data);
	}
	
	function getEmail($i)
	{
		// mengembalikan email mahasiswa dengan indeks ke i
		return $this->data[$i]->getEmail();
	}

	function getTelepon($i)
	{
		// mengembalikan telepon mahasiswa dengan indeks ke i
		return $this->data[$i]->getTelepon();
	}
}