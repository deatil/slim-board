<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;

/**
 * 上传
 *
 * @create 2022-9-25
 * @author deatil
 */
class Upload extends Base
{
    /**
     * 头像
     */
    public function avatarSave($request, $response, $args)
    {
        $uploadedFiles = $request->getUploadedFiles();
        
        if (! isset($uploadedFiles['file'])) {
            return $this->errorJson($response, '上传头像失败');
        }

        $uploadedFile = $uploadedFiles['file'];
        if ($uploadedFile->getError() !== UPLOAD_ERR_OK) {
            return $this->errorJson($response, '上传头像失败');
        }
        
        $directory = config('view.avatar_path');
        
        $userInfo = $request->getAttribute("auth-user")->info();
        
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = md5_16(config('auth.avatar_salt') . $userInfo['id']);
        $filename = sprintf('%s.%0.8s', $basename, $extension);
        
        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
        
        $data = [
            'filename' => $filename,
            'url' => avatar_url($filename),
        ];
        
        return $this->successJson($response, '上传头像成功', $data);
    }
    
}