<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Illuminate\Http\UploadedFile;

class CloudinaryStorage
{
    private Cloudinary $client;

    public function __construct()
    {
        $this->client = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);
    }

    /** Upload a file and return its secure URL. Use 'raw' for PDF/DOC files. */
    public function upload(UploadedFile $file, string $folder, string $resourceType = 'image'): string
    {
        $result = $this->client->uploadApi()->upload($file->getRealPath(), [
            'folder'        => "mentorchai/{$folder}",
            'resource_type' => $resourceType,
        ]);

        return $result['secure_url'];
    }

    /** Delete a file by its stored URL. Ignores null and old local paths. */
    public function delete(?string $url): void
    {
        if (!$url || !str_starts_with($url, 'http')) {
            return;
        }

        if (!preg_match('#/(image|raw|video)/upload/(?:v\d+/)?(.+)$#', $url, $m)) {
            return;
        }

        [, $type, $path] = $m;

        // Images keep the extension out of the public_id; raw files include it.
        $publicId = $type === 'raw' ? $path : preg_replace('/\.[^.\/]+$/', '', $path);

        try {
            $this->client->uploadApi()->destroy($publicId, [
                'resource_type' => $type,
                'invalidate'    => true,
            ]);
        } catch (\Throwable $e) {
            report($e); // never block the user because a delete failed
        }
    }
}
