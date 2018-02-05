<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'zakyse','nipd'=>'111','alamat'=>'Cupu','mata_kuliah'=>'ips'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'jajang','nipd'=>'222','alamat'=>'Ranca kasiat','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Parantos Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $elt = jurusan::create(array(
         	'nama_jurusan'=>'Elektro'
         ));
        $this->command->info('Jurusan Telah Diisi !');

        $zaky = mahasiswa::create(array(
        'nama_mahasiswa'=> 'zaky','nis'=>'00001','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));

        $rahmad = mahasiswa::create(array(
        'nama_mahasiswa'=> 'rahmad','nis'=>'00002','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));
        $ariz = mahasiswa::create(array(
        'nama_mahasiswa'=> 'ariz','nis'=>'00003','id_dosen'=>$dosen2->id,'id_jurusan'=> $elt->id
        ));

        $this->command->info('Mahasiswa Telah Diisi!');

        wali::create(array(
        'nama'=>'Bpk.sandi',
        'alamat'=>'rancamanyar',
        'id_mahasiswa'=>$zaky->id
        ));
        wali::create(array(
        'nama'=>'Bpk.candra',
        'alamat'=>'bandung poek',
        'id_mahasiswa'=>$rahmad->id
        ));
        wali::create(array(
        'nama'=>'Bpk.Agung',
        'alamat'=>'baleendah',
        'id_mahasiswa'=>$ariz->id
        ));

		$this->command->info('Wali Telah Diisi !');

		$ips = matkul::create(array('nama_matkul'=>'ips','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$zaky->matkul()->attach($ips->id);
        $zaky->matkul()->attach($kimia->id);
		$rahmad->matkul()->attach($kimia->id);
		$ariz->matkul()->attach($ips->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
