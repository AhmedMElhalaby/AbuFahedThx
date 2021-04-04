<?php

namespace App\Models;

use App\Master;
use Illuminate\Database\Eloquent\Model;
/**
 * @property mixed category_id
 * @property mixed civil_registry
 * @property mixed name
 * @property mixed details
 * @method static Certification find($id)
 */
class Certification extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'civil_registry', 'name','details'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    //
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return Master::replace_special_char($this->category_id);
    }

    /**
     * @return mixed
     */
    public function getCivilRegistry()
    {
        return Master::replace_special_char($this->civil_registry);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return Master::replace_special_char($this->name);
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return Master::replace_special_char($this->details);
    }


}
