<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePertandinganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'nama_pertandingan'         => 'required|string|max:225',
            'kategori'                  => 'required|in:Nasional,Internasional',
            'tgl_pertandingan'          => 'required|date',
            'dokumentasi'               => 'required|array|min:1|max:9',
            'dokumentasi.*'             => 'image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_kegiatan'        => 'required|string',
        ];
    }

    // custom message
    public function messages(): array {
        return [
            'nama_pertandingan.required'    => 'Nama pertandingan wajib diisi ya!',
            'nama_pertandingan.string'      => 'Nama pertandingan harus berupa teks',
            'nama_pertandingan.max'         => 'Nama pertandingan jangan terlalu panjang (maksimal 225 karakter)',
            'kategori.required'             => 'Pilih kategori dulu',
            'kategori.in'                   => 'Kategori yang dipilih tidak valid',
            'tgl_pertandingan.required'     => 'Tanggal pertandingan jangan sampai kosong!',
            'tgl_pertandingan.date'         => 'Format tanggal tidak valid, pastikan format benar',
            'dokumentasi.required'          => 'Wajib mengunggah minimal 1 foto dokumentasi',
            'dokumentasi.array'             => 'Terjadi kessalahan pada format pengiriman foto',
            'dokumentasi.min'               => 'Minimal unggah 1 foto dokumentasi.',
            'dokumentasi.max'               => 'Maksimal hanya boleh mengunggah 9 foto dokumentasi.',
            'dokumentasi.*.image'           => 'File yang diunggah harus berupa gambar.',
            'dokumentasi.*.mimes'           => 'Format gambar yang diizinkan hanya jpeg, png, dan jpg.',
            'dokumentasi.*.max'             => 'Ukuran setiap gambar tidak boleh lebih dari 2MB.',
            'deskripsi_kegiatan.required'   => 'Deskripsi kegiatan harus diisi agar informasinya lengkap.',
            'deskripsi_kegiatan.string'     => 'Deskripsi harus berupa teks.',
        ];
    }
}
