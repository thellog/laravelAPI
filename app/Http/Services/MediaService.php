<?php 
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;

class MediaService {
    public function uploadImg($request) {
        $data = Cloudinary::uploadApi()->upload($request->file('avatar')->getRealPath(), [
            'folder' => 'learning_app_image',
            'transformation' => [
                      'width' => 150,
                      'height' => 150,
            'q_auto' => 'best'
            ],
            
        ]);

        $public_id = $data['public_id'];
        $url       = $data['url'];

        try {
            User::where('id', $request->id)
                    ->update([
                        'public_id' => $public_id,
                        'avatar_url' => $url
                    ]);
            return array([
                'id' => $request->id,
                'public_id' => $public_id,
                'avatar_url' => $url       
            ]);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}