<?php

namespace App\Http\Controllers;

use App\Mail\contactFormDJ;
use App\Mail\contactFormMedia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Instagram\Api;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class PagesController extends Controller
{
    public function contactMedia( Request $request ) {
        return $this->contact($request, 'media');
    }

    public function contactDJ( Request $request ) {
        return $this->contact($request, 'dj');
    }

    private function contact( Request $request, $type ) {

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        $name = trim(filter_var($name, FILTER_SANITIZE_STRING));
        $email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
        $message = trim(filter_var($message, FILTER_SANITIZE_STRING));

        if (empty($name)) {
            return json_encode(['error' => true, 'msg' => 'Please write your name']);
        }
        if (empty($email)) {
            return json_encode(['error' => true, 'msg' => 'Please write your email']);
        }
        if (empty($message)) {
            return json_encode(['error' => true, 'msg' => 'Please write your message']);
        }

        $data['name'] = $name;
        $data['email'] = $email;
        $data['message'] = $message;

        if ($type === 'media') {
            $mail = new contactFormMedia($data);
        } else {
            $mail = new contactFormDJ($data);
        }

        Mail::to('info@limix.eu')->send($mail);

        return response()->json(['error' => false, 'msg' => 'Thank you for your message. I will try to reply you as soon as possible!']);
    }

    public function ig() {
        $cachePool = new FilesystemAdapter('Instagram', 0, __DIR__ . '/../cache');

        $api = new Api($cachePool);
        $api->login(config('app.ig_username'), config('app.ig_pass')); // mandatory
        $profile = $api->getProfile('totendjzacky');

        $i = 1;
        foreach ( $profile->getMedias() as $media ) {
            $return[$i]['src']  = $media->getThumbnails()[3]->src;
            $return[$i]['link'] = $media->getLink();
            $return[$i]['text'] = $media->getCaption();

            $i++;
        }

        return response()->json($return);
    }
}
