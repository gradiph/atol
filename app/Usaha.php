<?php

namespace Mobilocator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usaha extends Model
{
    use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pemilik','nama','alamat','lat','lng','telepon','produk_unggulan','deskripsi','gambar_foto','id_skala','id_sektor','id_kel','status'
    ];
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
