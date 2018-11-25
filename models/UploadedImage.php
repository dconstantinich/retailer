<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class UploadedImage extends Model
{
    public static $uploadsPath = 'uploads/img';
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg, gif, svg', 'checkExtensionByMimeType' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Icon'
        ];
    }

    public function upload()
    {
        $this->image = UploadedFile::getInstance($this, 'image');
        if ($this->validate() && !empty($this->image)) {
            $fileName = self::$uploadsPath . '/' . self::generateFileHashName($this->image->name);
            $this->image->saveAs($fileName);
            return $fileName;
        } else {
            return null;
        }
    }

    /**
     * Возвращает хэш по имени файла.
     * @param string $filename файла
     * @return string
     */
    public static function generateFileHashName($filename)
    {
        $date = date('Y/m/d');
        $path = self::$uploadsPath . '/' . $date;
        FileHelper::createDirectory($path);

        $extension = explode('.', $filename);
        $extension = count($extension) > 1 ? end($extension) : null;

        return $date . '/' . md5($filename . microtime(true)) . ($extension ? '.' . $extension : '');
    }
}