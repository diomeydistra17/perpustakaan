<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use function Pest\Laravel\delete;

class UserComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme='bootstrap';
    public  $username, $nama,$alamat, $email, $password, $id, $cari;
    public function render()
    {
        $layout['title']="Kelola User";
        if($this->cari!=""){
            $data['user']= User::where('nama','like','%'.$this->cari .'%')
            ->orWhere('username','like','%'.$this->cari.'%')
            ->paginate(5);
        } else{
            $data['user']= User::paginate(5);
        }
        return view('livewire.user-component',$data)->layoutData($layout);
    }

    // public function store(){
    //     $this->validate([
    //         'username'=>'required',
    //         'nama'=>'required',
    //         'email'=>'required|email',
    //         'password'=>'required',
    //     ],[
    //         'username.required'=>'Username Tidak Boleh Kosong!',
    //         'nama.required'=>'Nama Tidak Boleh Kosong!',
    //         'email.required'=>'Email Tidak Boleh Kosong!',
    //         'email.email'=>'Format Email Salah!',
    //         'password.required'=>'Password Tidak Boleh Kosong!',
    //     ]);
    //     User::create([
    //         'username'=>$this->username,
    //         'nama'=>$this->nama,
    //         'email'=>$this->email,
    //         'password'=>$this->password,
    //         'jenis'=>'admin'
    //     ]);
    //     session()->flash('success','Berhasil Disimpan');
    //     $this->reset();
    // }

    public function edit($id)
    {
        $user = User::find($id);
        $this->username=$user->username;
        $this->nama=$user->nama;
        $this->alamat=$user->alamat;
        $this->email=$user->email;
        $this->id=$user->id;
    }

    public function update(){
        $user= User::find($this->id);
        if($this->password==''){
            $user->update([
                'username'=>$this->username,
                'nama'=>$this->nama,
                'email'=>$this->email
            ]);
        } else{
            $user->update([
                'username'=>$this->username,
                'nama'=>$this->nama,
                'email'=>$this->email,
                'password'=>$this->password
            ]);
        }
        session()->flash('success','Berhasil Diubah!');
        $this->reset();
    }

    public function confirm($id){
        $this->id=$id;
    }

    public function destroy(){
        $user= User::find($this->id);
        $user->delete();
        session()->flash('success','Data Berhasil Dihapus!');
        $this->reset();
    }
}