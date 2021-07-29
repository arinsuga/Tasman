<?php

namespace Arins\Services\Filex;

use Arins\Services\Filex\FilexInterface;
use Illuminate\Support\Facades\Storage;

class Filex implements FilexInterface
{
    protected $result;

    /**
     * Comment template.
     *
     * @param  boolean     $par1
     * @param  int         $par2
     * @param  string      $par3
     * @param  string|null $par4
     * @param  mixed|null  $par5
     * @return array|string|int|boolean
     */


    public function __construct()
    {
    }

    /**
     * ======================================================
     * 1. uiux get asset from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    public function image($data, $diskDriver='public')
    {
        if (Storage::disk($diskDriver)->exists($data)) {
            // ...
            return asset(Storage::url($data));
        }
        else {
            return asset(config('a1.uiux.blank_image'));
        }
    }

    /**
     * ======================================================
     * 2. delete file from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    public function delete($data, $diskDriver='public')
    {
        Storage::disk($diskDriver)->delete($data);
    }

    /**
     * ======================================================
     * 3. upload file from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    public function upload($fileName, $fileLocation, $fileObject, $diskDriver='public')
    {
        $path = $fileName;
        if ($fileObject) {
            if ( ($fileName == '') || ($fileName == null) ) {
                $path = Storage::disk($diskDriver)
                        ->putFile($fileLocation, $fileObject);
            }
            else {
                $path = Storage::disk($diskDriver)
                        ->putFile($fileLocation, $fileObject);
                $this->delete($fileName, $diskDriver);
            }
        } else {
            //$this->delete($fileName, $diskDriver);
        }

        return $path;
    }


    // public function upload($fileName, $fileLocation, $fileObject, $diskDriver='public')
    // {
    //     $path = $fileName;
    //     if ($fileObject) {
    //         if ( ($fileName == '') || ($fileName == null) ) {
    //             $path = Storage::disk($diskDriver)
    //                     ->putFile($fileLocation, $fileObject);
    //         }
    //         else {
    //             $path = Storage::disk($diskDriver)
    //                     ->putFileAs(null, $fileObject, $fileName);
    //         }
    //     } else {
    //         //$this->delete($fileName, $diskDriver);
    //     }

    //     return $path;
    // }


    /**
     * ======================================================
     * 4. upload atau hapus file from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    public function uploadOrRemove($fileName, $fileLocation, $fileObject, $diskDriver, $remove)
    {
        if ($remove == 'true') {
            $this->delete($fileName, $diskDriver);
            return '';
        } else {
            return $this->upload($fileName, $fileLocation, $fileObject, $diskDriver);
        }
    }

}
