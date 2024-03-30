<?php

namespace App\Http\Controllers;

use App\Models\ProfileModel;
use Illuminate\Http\Request;


class userController extends Controller

{ 
    
    public function index()
    {
        $profileModel = new ProfileModel();
        $db = $profileModel->alldata();
       
       
        // dd($db);
        
        return view('profile', compact('db'));
    }


    public function __construct()
    {
      $this->ProfileModel = new ProfileModel;
    }

    public function tambah()
    {
      return view('tambahuser');
    }

    public function add(request $request)
    {
          // Validasi data yang diinputkan oleh user
          $this->validate($request, [
              'NAMA_BARANG' => 'required|min:3|max:50',
              'HARGA_BARANG' => 'required',
              'KATEGORI_BARANG' => 'required',
              'FOTO_BARANG' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
          ],
          [
              'NAMA_BARANG.required' => 'Nama harus diisi',
              'NAMA_BARANG.min' => 'Nama minimal 3 karakter',
              'NAMA_BARANG.max' => 'Nama maksimal 50 karakter',
              'FOTO_BARANG.image' => 'Format gambar hanya JPG, PNG, GIF, SVG',
              'FOTO_BARANG.mimes' => 'Format gambar hanya JPG, PNG, GIF, SVG',
              'FOTO_BARANG.max' => 'Ukuran foto terlalu besar. Maksimal 2048 KB',
          ]);
      
          if ($request->file('FOTO_BARANG')) {
              $imageName = $request->FOTO_BARANG->extension();
              $request->FOTO_BARANG->move(public_path('gambar'), $imageName);
          } else {
              $imageName = 'default.png';
          }
          $profile = new ProfileModel;
          $data = [
              'NAMA_BARANG' => $request->NAMA_BARANG,
              'HARGA_BARANG' => $request->HARGA_BARANG,
              'KATEGORI_BARANG' => $request->KATEGORI_BARANG,
              'FOTO_BARANG' => $imageName,
          ];
      
          $profile->addData($data);
          return redirect('/profile')->with('status', 'Data berhasil disimpan');
        }

    public function properties($ID_BARANG)
    {
        $user = $this->ProfileModel->find($ID_BARANG);
        return view('detailprofile', compact('user'));
    }

    public function detailedit($ID_BARANG)
    {
        $user = $this->ProfileModel->find($ID_BARANG);
        return view('editprofile', compact('user'));
    }

    public function edit(Request $request, $ID_BARANG)
    {
        if($request->FOTO_BARANG<> "")
        {
            $imgname = $request->nama.'.'. $request->FOTO_BARANG->extension();
            $request->FOTO_BARANG->move(public_path('FOTO_BARANG'),$imgname);
            $data =[
                'NAMA_BARANG'=> $request->NAMA_BARANG,
                'HARGA_BARANG'=> $request->HARGA_BARANG,
                'KATEGORI_BARANG'=> $request->KATEGORI_BARANG,
                'FOTO_BARANG'=> $imgname,
            ];
            $this->ProfileModel->editprofile($data,$ID_BARANG);
        }else{
            $data=[
                'NAMA_BARANG'=> $request->NAMA_BARANG,
                'HARGA_BARANG'=> $request->HARGA_BARANG,
                'KATEGORI_BARANG'=> $request->KATEGORI_BARANG,
                'FOTO_BARANG'=> $imgname,
            ];
            $this->ProfileModel->editprofile($data, $ID_BARANG);
        }
        return redirect('/profile')->with('status','Edit Data berhasil!');
    }
   public function remove($ID_BARANG)
   {
    $this->ProfileModel->deleteprofile($ID_BARANG);
    return redirect('/profile')->with('status', 'Delete data berhasil!');
   }

    }