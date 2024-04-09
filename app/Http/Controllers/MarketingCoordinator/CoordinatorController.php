<?php

namespace App\Http\Controllers\MarketingCoordinator;

use ZipArchive;
use App\Models\Idea;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CoordinatorController extends Controller
{
    // Login view
    public function login_view()
    {
        return view('coordinator.auth.login');
    }

    // Login submit
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:6',
        ]);

        $credenticals = [
            "email" => $request->email,
            "password" => $request->password,
        ];


        if (Auth::guard('coordinator')->attempt($credenticals)) {
            return redirect()->route('coordinator_home');
        } else {
            return redirect()->route('coordinator_login')->with('error', 'Information is not correct');
        }
    }

    // Logout
    public function logout()
    {
        Auth::guard('coordinator')->logout();
        return redirect()->route('coordinator_login');
    }

    // Homepage
    public function home()
    {
        return view('coordinator.Website.home');
    }

    // Profile view
    public function profile()
    {
        return view('coordinator.Website.profile');
    }

    // List faculties view
    public function list_faculties()
    {
        $faculties = Faculty::where('coordinator_id', Auth::guard('coordinator')->user()->id)->get();
        return view('coordinator.Website.list_faculties', compact('faculties'));
    }

    // List ideas view
    public function list_ideas($id)
    {
        $single_faculty = Faculty::where('id', $id)->first();
        return view('coordinator.Website.list_ideas', compact('single_faculty'));
    }

    // Download file (Docx, image)
    // public function download_file($file)
    // {
    //     return response()->download(public_path('/storage/files/' .$file));
    // }

    // Download file (Zip)
    public function download_file($file)
    {
        $zip = new ZipArchive();
        $fileName = $file . '.zip';

        if ($zip->open($fileName, ZipArchive::CREATE) === TRUE) {
            $multi_files = File::files(public_path('/storage/files'));
            foreach ($multi_files as $files) {
                // $single_file = public_path("/storage/files/" . $file);
                $nameInZipFile = basename($files);
                $zip->addFile($files, $nameInZipFile);
            }
            $zip->close();
        }

        return response()->download($fileName);

        // $zipFileName = 'chayde_' . now()->format('YmdHis') . '.zip';
        // $zipFilePath = public_path($zipFileName);

        // // Khởi tạo đối tượng ZipArchive
        // $zip = new ZipArchive();
        // if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
        //     // Thêm các tệp đã tải lên vào tập tin ZIP
        //     $fileNames = explode(',', $file);
        //     foreach ($fileNames as $fileName) {
        //         $filePath = public_path('storage/files/' . $fileName);
        //         if (File::exists($filePath)) {
        //             $zip->addFile($filePath, $fileName);
        //         }
        //     }
        //     $zip->close();
        // }
        // return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
    }
}
