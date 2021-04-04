<?php

namespace App\Models;

use App\Master;
use Illuminate\Database\Eloquent\Model;
/**
 * @property mixed line_one
 * @property mixed line_two
 * @property mixed line_three_1
 * @property mixed line_three_2
 * @property mixed line_three_3
 * @property mixed line_four
 * @property mixed line_five
 * @property mixed line_six_1
 * @property mixed line_six_2
 * @property mixed line_seven_1
 * @property mixed line_seven_2
 * @property mixed line_eight_1
 * @property mixed line_eight_2
 * @property mixed name
 * @property mixed description
 * @property mixed image
 * @property mixed signature
 * @property mixed signature_name
 * @property mixed stamp
 * @property mixed show_identity
 */
class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image','signature','signature_name','stamp'
        ,'line_one'
        ,'line_two'
        ,'line_three_1'
        ,'line_three_2'
        ,'line_three_3'
        ,'line_four'
        ,'line_five'
        ,'line_six_1'
        ,'line_six_2'
        ,'line_seven_1'
        ,'line_seven_2'
        ,'line_eight_1'
        ,'line_eight_2'
        ,'show_identity'
    ];


    public function setImageAttribute($value)
    {
        $request = \Request::instance();
        $attribute_name = "image";
        $disk = "storage";
        $destination_path = "public/categories/image/";

        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name) && $request->file($attribute_name)->isValid()) {
            // 1. Generate a new file name
            $file = $request->file($attribute_name);
            $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            // 2. Move the new file to the correct path
            $file_path = $file->move($destination_path, $new_file_name);
            // 3. Save the complete path to the database
            $this->attributes[$attribute_name] = $destination_path.$new_file_name;
        }
    }

    public function setStampAttribute($value)
    {
        $request = \Request::instance();
        $attribute_name = "stamp";
        $disk = "storage";
        $destination_path = "public/categories/stamp/";

        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name) && $request->file($attribute_name)->isValid()) {
            // 1. Generate a new file name
            $file = $request->file($attribute_name);
            $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            // 2. Move the new file to the correct path
            $file_path = $file->move($destination_path, $new_file_name);
            // 3. Save the complete path to the database
            $this->attributes[$attribute_name] = $destination_path.$new_file_name;
        }
    }

    public function setSignatureAttribute($value)
    {
        $request = \Request::instance();
        $attribute_name = "signature";
        $disk = "storage";
        $destination_path = "public/categories/signature/";

        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name) && $request->file($attribute_name)->isValid()) {
            // 1. Generate a new file name
            $file = $request->file($attribute_name);
            $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            // 2. Move the new file to the correct path
            $file_path = $file->move($destination_path, $new_file_name);
            // 3. Save the complete path to the database
            $this->attributes[$attribute_name] = $destination_path.$new_file_name;
        }
    }

    /**
     * @return mixed
     */
    public function getLineOne()
    {
        return Master::replace_special_char($this->line_one);
    }

    /**
     * @return mixed
     */
    public function getLineTwo()
    {
        return Master::replace_special_char($this->line_two);
    }

    /**
     * @return mixed
     */
    public function getLineThree1()
    {
        return Master::replace_special_char($this->line_three_1);
    }

    /**
     * @return mixed
     */
    public function getLineThree2()
    {
        return Master::replace_special_char($this->line_three_2);
    }

    /**
     * @return mixed
     */
    public function getLineThree3()
    {
        return Master::replace_special_char($this->line_three_3);
    }

    /**
     * @return mixed
     */
    public function getLineFour()
    {
        return Master::replace_special_char($this->line_four);
    }

    /**
     * @return mixed
     */
    public function getLineFive()
    {
        return Master::replace_special_char($this->line_five);
    }

    /**
     * @return mixed
     */
    public function getLineSix1()
    {
        return Master::replace_special_char($this->line_six_1);
    }

    /**
     * @return mixed
     */
    public function getLineSix2()
    {
        return Master::replace_special_char($this->line_six_2);
    }

    /**
     * @return mixed
     */
    public function getLineSeven1()
    {
        return Master::replace_special_char($this->line_seven_1);
    }

    /**
     * @return mixed
     */
    public function getLineSeven2()
    {
        return Master::replace_special_char($this->line_seven_2);
    }

    /**
     * @return mixed
     */
    public function getLineEight1()
    {
        return Master::replace_special_char($this->line_eight_1);
    }

    /**
     * @return mixed
     */
    public function getLineEight2()
    {
        return Master::replace_special_char($this->line_eight_2);
    }

    /**
     * @return mixed
     */
    public function getShowIdentity()
    {
        return $this->show_identity;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return mixed
     */
    public function getSignatureName()
    {
        return Master::replace_special_char($this->signature_name);
    }

    /**
     * @return mixed
     */
    public function getStamp()
    {
        return $this->stamp;
    }

}
