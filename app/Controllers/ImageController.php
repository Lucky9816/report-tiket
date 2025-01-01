<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ImageController extends Controller
{
    public function show($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        if (file_exists($path)) {
            $file = file_get_contents($path);
            $mimeType = mime_content_type($path);
            return $this->response->setHeader('Content-Type', $mimeType)
                                  ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                                  ->setBody($file);
        } else {
            return $this->response->setStatusCode(404, 'File Not Found');
        }
    }
}
