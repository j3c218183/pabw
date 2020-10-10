<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Mahasiswa extends BaseController {
    public function index() {
        echo "PBW";
    }
    public function greetings() {
        // return view('hello');
        $data = [];
        $data["nama"] = $this->request->getPost('nama');
        echo view('hello',$data);
    }
}
?>