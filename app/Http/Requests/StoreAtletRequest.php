<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtletRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;        // ← Ubah dari false menjadi true
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nama'              => 'required|string|max:225',
            'kategori'          => 'required|in:Junior,Senior',
            'tgl_bergabung'     => 'required|date',
            'umur'              => 'required|integer',
            'foto'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi'         => 'required|string|min:10|max:1100',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'             => 'Nama atlet diisi, jangan dikosongkan',
            'nama.string'               => 'Nama harus berupa teks',
            'kategori.required'         => 'Pilih salah satu kategori',
            'tgl_bergabung.required'    => 'Isi tanggal kapan atlet ini bergabung',
            'tgl_bergabung.date'        => 'Format tanggalnya tidak valid',
            'umur.required'             => 'Umur atlet wajib diisi',
            'umur.integer'              => 'Umur harus berupa angka',
            'foto.image'                => 'Yang kamu upload bukan gambar, coba cek lagi',
            'foto.mimes'                => 'Foto harus format .jpeg, .jpg, atau .png',
            'foto.max'                  => 'Fotonya kegedean! Maksimal cuma 2MB',
            'deskripsi.required'        => 'Deskripsi wajib diisi',
            'deskripsi.min'             => 'Deskripsinya terlalu singkat, minimal 10 karakter',
        ];
    }
}
