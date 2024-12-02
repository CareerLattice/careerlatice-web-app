<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */

    protected function createUploadFolder() {
        // User uploads
        $userUploadPaths = [
            'user_upload/CV',
            'user_upload/profile_picture',
        ];

        // Company uploads
        $companyUploadPaths = [
            'company_upload/profile_picture',
            'company_upload/job_picture',
        ];

        $defaultFolder = ['default'];

        // Create user upload folders
        foreach ($userUploadPaths as $path) {
            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }
        }

        // Create company upload folders
        foreach ($companyUploadPaths as $path) {
            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }
        }

        // Create default folder for default picture
        foreach ($defaultFolder as $path) {
            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }
        }
    }

    public function boot(): void
    {
        Paginator::useBootstrap();
        Model::preventLazyLoading();
        $this->createUploadFolder();
    }
}
