<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\Authed;
use App\Models\AbsensiData;
use App\Models\DataGuru;
use App\Models\DataKelas;
use App\Models\DataMapel;
use App\Models\DataMurid;
use App\Models\DataNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ini buat anu page yang harus login :V
Route::middleware([Authed::class])->group(function () {
  Route::get('/', function () {
    $countMurid = DataMurid::count();
    $countGuru = DataGuru::count();
    $countMapel = DataMapel::count();
    $countKelas = DataKelas::count();
    return view('index', [
      'countMurid' => $countMurid,
      'countGuru' => $countGuru,
      'countMapel' => $countMapel,
      'countKelas' => $countKelas
    ]);
  });

  // Kelas Controller
  Route::get('/grade', function () {
    $data = DataKelas::orderBy('updated_at', 'desc')->get();
    return view('grade', [
      'data' => $data
    ]);
  });
  Route::post('/grade/update', function (Request $request) {

    $all = $request->all();

    if (isset($all['kelas_slug']) && isset($all['kelas'])) {
      $kelas_slug = $all['kelas_slug'];
      $data = DataKelas::where('kelas_slug', $kelas_slug);

      if ($data->exists()) {
        $data->update([
          'kelas' => $all['kelas']
        ]);
        return back()->with('success', 'Berhasil Merubah Data Kelas');
      }

      return back()->with('error', 'Data Yang Anda Cari Tidak Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::post('/grade/add', function (Request $request) {
    $all = $request->all();
    // ada lagi profile nanti ae
    if (isset($all['kelas'])) {
      $kelas_slug = 'Kelas-' . $all['kelas'];
      $data = DataKelas::where('kelas_slug', $kelas_slug);

      if (!$data->exists()) {
        $data->create([
          'kelas_slug' => $kelas_slug,
          'kelas' => $all['kelas']
        ]);
        return back()->with('success', 'Berhasil Membuat Kelas Baru');
      }

      return back()->with('error', 'Kelas Tersebut Sudah Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::get('/grade/delete/{kelas_slug}', function ($kelas_slug) {
    $data = DataKelas::where('kelas_slug', $kelas_slug);

    if ($data->exists()) $data->delete();
    return back()->with('success', 'Data Kelas Berhasil Di Hapus!');
  });

  // Murid Controller
  Route::get('/student', function () {
    $murids = DataMurid::orderBy('updated_at', 'desc')->get();
    return view('student', [
      'data' => $murids
    ]);
  });
  Route::post('/student/update', function (Request $request) {

    $all = $request->all();
    // ada lagi profile nanti ae
    if (isset($all['nisn']) && isset($all['nama']) && isset($all['umur']) && isset($all['tahun_sekolah']) && isset($all['kelamin']) && isset($all['kontak']) && isset($all['email']) && isset($all['alamat'])) {
      $nisn = $all['nisn'];
      $dataMurid = DataMurid::where('nisn', $nisn);

      if ($dataMurid->exists()) {
        $dataMurid->update([
          'nisn' => $nisn,
          'nama' => $all['nama'],
          'umur' => $all['umur'],
          'tahun_sekolah' => $all['tahun_sekolah'],
          'kelamin' => $all['kelamin'],
          'kontak' => $all['kontak'],
          'email' => $all['email'],
          'alamat' => $all['alamat'],
        ]);
        return back()->with('success', 'Berhasil Merubah Data Murid: ' . $all['nama']);
      }

      return back()->with('error', 'Data Yang Anda Cari Tidak Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::post('/student/add', function (Request $request) {
    $all = $request->all();
    // ada lagi profile nanti ae
    if (isset($all['nisn']) && isset($all['nama']) && isset($all['umur']) && isset($all['tahun_sekolah']) && isset($all['kelamin']) && isset($all['kontak']) && isset($all['email']) && isset($all['alamat'])) {
      $nisn = $all['nisn'];
      $dataMurid = DataMurid::where('nisn', $nisn);

      if (!$dataMurid->exists()) {
        $dataMurid->create([
          'nisn' => $nisn,
          'nama' => $all['nama'],
          'umur' => $all['umur'],
          'tahun_sekolah' => $all['tahun_sekolah'],
          'kelamin' => $all['kelamin'],
          'kontak' => $all['kontak'],
          'email' => $all['email'],
          'alamat' => $all['alamat'],
        ]);
        return back()->with('success', 'Berhasil Membuat Data Murid Baru: ' . $all['nama']);
      }
      return back()->with('error', 'Data Tersebut Sudah Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::get('/student/delete/{nisn}', function ($nisn) {
    $dataMurid = DataMurid::where('nisn', $nisn);

    if ($dataMurid->exists()) $dataMurid->delete();
    return back()->with('success', 'Data Murid Berhasil Di Hapus!');
  });


  // Score Controller
  Route::get('/score', function () {
    $murids = DataMurid::orderBy('updated_at', 'desc')->get();
    $data = [];
    foreach ($murids as $murid) {
      $dataNilai = DataNilai::where('nisn', $murid->nisn);
      if ($dataNilai->exists()) {
        $data[] = ['murid' => $murid, 'nilai' => $dataNilai->first()];
      }
    }
    return view('score', [
      'data' => $data,
      'dataMurid' => $murids
    ]);
  });
  Route::post('/score/update', function (Request $request) {

    $all = $request->all();
    if (isset($all['nisn']) && isset($all['subject']) && isset($all['deskripsi_tugas']) && isset($all['nilai'])) {
      $nisn = $all['nisn'];
      $dataNilai = DataNilai::where('nisn', $nisn);

      if ($dataNilai->exists()) {
        $dataNilai->update([
          'subject' => $all['subject'],
          'deskripsi_tugas' => $all['deskripsi_tugas'],
          'nilai' => $all['nilai'],
        ]);
        return back()->with('success', 'Berhasil Merubah Data Nilai');
      }

      return back()->with('error', 'Data Yang Anda Cari Tidak Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::post('/score/add', function (Request $request) {
    $all = $request->all();
    if (isset($all['nisn']) && isset($all['subject']) && isset($all['deskripsi_tugas']) && isset($all['nilai'])) {
      $nisn = $all['nisn'];
      $dataNilai = DataNilai::where('nisn', $nisn);

      if (!$dataNilai->exists()) {
        $dataNilai->create([
          'nisn' => $all['nisn'],
          'subject' => $all['subject'],
          'deskripsi_tugas' => $all['deskripsi_tugas'],
          'nilai' => $all['nilai'],
        ]);
        return back()->with('success', 'Berhasil Menambahkan Data Nilai Baru');
      }
      return back()->with('error', 'Data Tersebut Sudah Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::get('/score/delete/{nisn}', function ($nisn) {
    $data = DataNilai::where('nisn', $nisn);

    if ($data->exists()) $data->delete();
    return back()->with('success', 'Data Nilai Berhasil Di Hapus!');
  });


  // Absensi Controller
  Route::get('/attendance', function () {
    $murids = DataMurid::orderBy('updated_at', 'desc')->get();
    $data = [];
    foreach ($murids as $murid) {
      $dataAbsensi = AbsensiData::where('nisn', $murid->nisn);
      if ($dataAbsensi->exists()) {
        $data[] = ['murid' => $murid, 'absensi' => $dataAbsensi->first()];
      }
    }
    return view('attendance', [
      'data' => $data,
      'dataMurid' => $murids
    ]);
  });
  Route::post('/attendance/update', function (Request $request) {

    $all = $request->all();
    if (isset($all['nisn']) && isset($all['subject']) && isset($all['criteria']) && isset($all['kehadiran'])) {
      $nisn = $all['nisn'];
      $dataAbsensi = AbsensiData::where('nisn', $nisn);

      if ($dataAbsensi->exists()) {
        $dataAbsensi->update([
          'subject' => $all['subject'],
          'criteria' => $all['criteria'],
          'kehadiran' => $all['kehadiran'],
        ]);
        return back()->with('success', 'Berhasil Merubah Data Absensi');
      }

      return back()->with('error', 'Data Yang Anda Cari Tidak Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::post('/attendance/add', function (Request $request) {
    $all = $request->all();
    if (isset($all['nisn']) && isset($all['subject']) && isset($all['criteria']) && isset($all['kehadiran'])) {
      $nisn = $all['nisn'];
      $dataAbsensi = AbsensiData::where('nisn', $nisn);

      if (!$dataAbsensi->exists()) {
        $dataAbsensi->create([
          'nisn' => $all['nisn'],
          'subject' => $all['subject'],
          'criteria' => $all['criteria'],
          'kehadiran' => $all['kehadiran'],
        ]);
        return back()->with('success', 'Berhasil Menambahkan Data Absensi Baru');
      }
      return back()->with('error', 'Data Tersebut Sudah Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::get('/attendance/delete/{nisn}', function ($nisn) {
    $data = AbsensiData::where('nisn', $nisn);

    if ($data->exists()) $data->delete();
    return back()->with('success', 'Data Absensi Berhasil Di Hapus!');
  });


  // Guru Controller
  Route::get('/teacher', function () {
    $data = DataGuru::orderBy('updated_at', 'desc')->get();
    return view('teacher', [
      'data' => $data
    ]);
  });
  Route::post('/teacher/update', function (Request $request) {

    $all = $request->all();
    // ada lagi profile nanti ae
    if (isset($all['nrp']) && isset($all['nama']) && isset($all['umur']) && isset($all['kelamin']) && isset($all['kontak']) && isset($all['email']) && isset($all['alamat'])) {
      $nrp = $all['nrp'];
      $dataGuru = DataGuru::where('nrp', $nrp);

      if ($dataGuru->exists()) {
        $dataGuru->update([
          'nrp' => $nrp,
          'nama' => $all['nama'],
          'umur' => $all['umur'],
          'kelamin' => $all['kelamin'],
          'kontak' => $all['kontak'],
          'email' => $all['email'],
          'alamat' => $all['alamat'],
        ]);
        return back()->with('success', 'Berhasil Merubah Data Guru: ' . $all['nama']);
      }

      return back()->with('error', 'Data Yang Anda Cari Tidak Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::post('/teacher/add', function (Request $request) {
    $all = $request->all();
    // ada lagi profile nanti ae
    if (isset($all['nrp']) && isset($all['nama']) && isset($all['umur']) && isset($all['kelamin']) && isset($all['kontak']) && isset($all['email']) && isset($all['alamat'])) {
      $nrp = $all['nrp'];
      $dataGuru = DataGuru::where('nrp', $nrp);

      if (!$dataGuru->exists()) {
        $dataGuru->create([
          'nrp' => $nrp,
          'nama' => $all['nama'],
          'umur' => $all['umur'],
          'kelamin' => $all['kelamin'],
          'kontak' => $all['kontak'],
          'email' => $all['email'],
          'alamat' => $all['alamat'],
        ]);
        return back()->with('success', 'Berhasil Membuat Data Guru Baru: ' . $all['nama']);
      }
      return back()->with('error', 'Data Tersebut Sudah Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::get('/teacher/delete/{nrp}', function ($nrp) {
    $dataGuru = DataGuru::where('nrp', $nrp);

    if ($dataGuru->exists()) $dataGuru->delete();
    return back()->with('success', 'Data Guru Berhasil Di Hapus!');
  });


  // Mapel Controller
  Route::get('/criteria', function () {
    $data = DataMapel::orderBy('updated_at', 'desc')->get();
    return view('criteria', [
      'data' => $data
    ]);
  });
  Route::post('/criteria/update', function (Request $request) {

    $all = $request->all();
    if (isset($all['mapel_slug']) && isset($all['subject']) && isset($all['jadwal'])) {
      $slug = $all['mapel_slug'];
      $model = DataMapel::where('mapel_slug', $slug);

      if ($model->exists()) {
        $model->update([
          'subject' => $all['subject'],
          'jadwal' => $all['jadwal'],
        ]);
        return back()->with('success', 'Berhasil Merubah Data Mapel');
      }

      return back()->with('error', 'Data Yang Anda Cari Tidak Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::post('/criteria/add', function (Request $request) {
    $all = $request->all();
    if (isset($all['subject']) && isset($all['jadwal'])) {
      $slug = $slug = strtolower(str_replace([' ', '.', ',', ';', ':', '/', '\\', '?', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '=', '[', ']', '{', '}', '|'], '-', $all['subject']));
      $model = DataMapel::where('mapel_slug', $slug);

      if (!$model->exists()) {
        $model->create([
          'mapel_slug' => $slug,
          'subject' => $all['subject'],
          'jadwal' => $all['jadwal'],
        ]);
        return back()->with('success', 'Berhasil Menambahkan Data Mapel Baru');
      }
      return back()->with('error', 'Data Tersebut Sudah Ada!');
    }
    return back()->with('error', 'Ada Kendala Saat Save Data!');
  });
  Route::get('/criteria/delete/{slug}', function ($slug) {
    $data = DataMapel::where('mapeL_slug', $slug);

    if ($data->exists()) $data->delete();
    return back()->with('success', 'Data Mapel Berhasil Di Hapus!');
  });


  Route::get('login/logout', [LoginController::class, 'logout']);
});

// Login Route
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/post', [LoginController::class, 'login']);