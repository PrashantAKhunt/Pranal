<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SNMP;
use Termwind\Components\Dd;
use YouTube\YouTubeDownloader;
use YouTube\Exception\YouTubeException;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function kanKuPagla()
    {
        return view('kanKuPagla');
    }

    public function engagement()
    {
        return view('engagement');
    }

    public function downloadMp3(Request $request)
    {
        $link = $request->input('link');

        $youtube = new YouTubeDownloader();
        try {
            $downloadLinks = $youtube->getDownloadLinks($link);
            if ($downloadLinks->getAllFormats()) {
                // get 144p format
                $allFormates = $downloadLinks->getAllFormats();
                $mp3Formate = $downloadLinks->getFirstCombinedFormat();


                $title = $downloadLinks->getInfo()->getTitle();
                $downloadUrl = $mp3Formate->url;
                $mp3FilePath = storage_path('app/mp3/' . $title . '.mp3');

                if(!file_exists($mp3FilePath))
                {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $downloadUrl);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    $data = curl_exec($ch);
                    curl_close($ch);
                    file_put_contents($mp3FilePath, $data);

                }
                return response()->download($mp3FilePath);
                // $urls = [];
                // foreach ($allFormates as $format) {
                //     if (empty($urls[144]) && $format->qualityLabel == '144p') {
                //         // make format with audio
                //         // dd($format);
                //         $urls[144] = $format;
                //     }
                //     if ($format->qualityLabel == '240p') {
                //         $urls[240] = $format;
                //     }
                //     if ($format->qualityLabel == '360p') {
                //         $urls[360] = $format;
                //     }
                //     if ($format->qualityLabel == '480p') {
                //         $urls[480] = $format;
                //     }
                //     if ($format->qualityLabel == '720p') {
                //         $urls[720] = $format;
                //     }
                //     if ($format->qualityLabel == '1080p') {
                //         $urls[1080] = $format;
                //     }
                // }

                return view('download', ['urls' => $urls]);
            }
        } catch (YouTubeException $e) {
            session()->flash('error', 'Invalid Youtube Link');
            return redirect()->back();
        }


    }

    public function downloadMp3111(Request $request)
    {
        $link = $request->input('link');
        $downloader = new YouTubeDownloader();
        $video_id = $downloader->getVideoId($link);
        $downloader->setVideoId($video_id);

        $browser = $downloader->getBrowser();
        $videoDownloadLink = $downloader->getVideoDownloadLink('140');

        $mp3FilePath = storage_path('app/public/mp3/' . $downloader->getVideoId() . '.mp3');
        $browser->request('GET', $videoDownloadLink, ['sink' => $mp3FilePath]);
        return response()->download($mp3FilePath);
    }
}
