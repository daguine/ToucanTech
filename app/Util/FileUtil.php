<?php
namespace ToucanTech\FileUtil;
/**
 * Description of FileUtil
 *
 * @author Paul Valdez
 */

use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
class FileUtil {
    
    public static function delete($fileName) {
        if (File::exists($fileName)) {
            File::delete($fileName);
            return true;
        }

        return false;
    }
    
     public static function move(UploadedFile $file,$dirPath) {
        $name = time() . $file->getClientOriginalName();
        $file->move($dirPath, $name);
        return $name;
    }
}
