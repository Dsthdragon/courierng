<?php

class upload {

    /**
    * Upload: Image uploda function
    * 
    */
    function getImage($img, $type, $name) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $extension = end(explode(".", $img["name"]));
        $extension = strtolower($extension);
        if ((($img["type"] == "image/gif") || ($img["type"] == "image/jpeg") || ($img["type"] == "image/jpg") || ($img["type"] == "image/pjpeg") || ($img["type"] == "image/x-png") || ($img["type"] == "image/png")) && ($img["size"] < 2000000000) && in_array($extension, $allowedExts)) {
            if ($img["error"] > 0) {
                echo "Return Code: " . $img["error"] . "<br>";
            } else {

                move_uploaded_file($img["tmp_name"], "public/upload/" . $type . "/" . $name);

                return true;
            }
        } else {
            return false;
        }
    }

    function autoRotateImage($image) {
        $orientation = $image->getImageOrientation();

        switch ($orientation) {
            case imagick::ORIENTATION_BOTTOMRIGHT:
            $image->rotateimage("#000", 180); // rotate 180 degrees
            break;
            case imagick::ORIENTATION_RIGHTTOP:
            $image->rotateimage("#000", 90); // rotate 90 degrees CW
            break;
            case imagick::ORIENTATION_LEFTBOTTOM:
            $image->rotateimage("#000", -90); // rotate 90 degrees CCW
            break;
        }
        $image->setImageOrientation(imagick::ORIENTATION_TOPLEFT);
    }

    function image_fix_orientation($filename) {
        $ext = explode('.', $filename);
        $ext = end($ext);
        $ext = strtolower($ext);
        $exif = exif_read_data(ROOT . '/' . $filename);
        if (!empty($exif['Orientation'])) {
            if ($ext == 'jpg' || $ext == 'jpeg') {
                $image = imagecreatefromjpeg($filename);
            } else if ($ext == 'png') {
                $image = imagecreatefrompng($filename);
            } else if ($ext == 'gif') {
                $image = imagecreatefromgif($filename);
            }
            switch ($exif['Orientation']) {
                case 3:
                $image = imagerotate($image, 180, 0);
                break;
                case 6:
                $image = imagerotate($image, 270, 0);
                break;
                case 8:
                $image = imagerotate($image, 90, 0);
                break;
            }

            if ($ext == 'jpg' || $ext == 'jpeg') {
                imagejpeg($image, ROOT . '/' . $filename);
            } else if ($ext == 'png') {
                imagepng($image, ROOT . '/' . $filename);
            } else if ($ext == 'gif') {
                imagegif($image, ROOT . '/' . $filename);
            }
            imagedestroy($image);
        }
    }

}
