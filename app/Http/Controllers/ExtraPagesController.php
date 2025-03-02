<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HomeSettings;
use App\Models\Store;
use Illuminate\Http\Request;

class ExtraPagesController extends Controller
{
   public function privacy() {
    $homesettings = HomeSettings::first();
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    return view('pages.extra.privacy-policy',compact('events','shops','homesettings'));
   }


   public function contactUs() {
   //  $homesettings = HomeSettings::first();
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    return view('pages.extra.contact-us',compact('events','shops'));
   }



   public function aboutUs() {
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    return view('pages.extra.about-us',compact('events','shops'));
   }



   public function faqs() {
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    return view('pages.extra.faqs',compact('events','shops'));
   }



   public function imprint() {
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    return view('pages.extra.imprint',compact('events','shops'));
   }
}
