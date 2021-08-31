<?php
namespace Arins\Services\Filex;

interface FilexInterface
{
    /**
     * ======================================================
     * 1. uiux get asset from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    function image($data);

    /**
     * ======================================================
     * 2. delete file from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    function delete($data);

    /**
     * ======================================================
     * 3. upload file from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    function upload($fileName, $fileLocation, $fileObject, $diskDriver);

    /**
     * ======================================================
     * 4. upload atau hapus file from storage
     *    base on disk driver in config file filesystems.php
     * ====================================================== */
    function uploadOrRemove($fileName, $fileLocation, $fileObject, $diskDriver, $remove);
    
}
