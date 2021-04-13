<?php


namespace App\Repositories;


use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ImageRepository
{
    public function create(array $data) :bool
    {
        try {
            $image = Image::create($data);
            return true;
        } catch (\Exception $exception) {
            throwException($exception->getMessage());
            return false;
        }
    }

    public function upload(UploadedFile $file,$width = 0 ,$height= 0) :array
    {
        $path = $this->checkOrCreateFolder(date('Y'),date('m'));
        $image_name = Str::uuid().'.'.$file->getClientOriginalExtension();
       $imageFacade = \Intervention\Image\Facades\Image::make($file);
       if ($width != 0 and $height != 0)
           $imageFacade->resize($width,$height);
      $imageFacade->save('assets/img/'.date('Y').'/'.date('m').'/'.$image_name);
       return [
           'path' => 'assets/img/'.date('Y').'/'.date('m').'/',
           'name' => $image_name,
           'features' => json_encode([
               'size' => $file->getSize(),
               'mimeType' => $file->getMimeType(),
               'extension' => $file->getClientOriginalExtension()

           ])
       ];
    }

    public function checkOrCreateFolder($year ,$month) :string
    {
       $path = public_path('/assets/img');
       if (is_dir( $path.'/'.$year) )
       {
          if (is_dir($path.'/'.$year.'/'.$month) && !file_exists($path.'/'.$year.'/'.$month))
          {
              mkdir($path.'/'.$year.'/'.$month);
              return $path.'/'.$year.'/'.$month;
          }else{
              return $path.'/'.$year.'/'.$month;
          }

       }else{
           mkdir($path.'/'.$year);
           mkdir($path.'/'.$year.'/'.$month);
           return $path.'/'.$year.'/'.$month;
       }
    }

    public function destroy(Image $image)
    {
        if (file_exists($image->path))
            unlink($image->path);
        $image->delete();
    }



}