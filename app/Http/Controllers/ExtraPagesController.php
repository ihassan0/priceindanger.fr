<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HomeSettings;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\emails;

class ExtraPagesController extends Controller
{
   public function privacy() {
    $homesettings = HomeSettings::first();
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
     $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    return view('pages.extra.privacy-policy',compact('events','shops','homesettings','topCategories'));
   }


   public function contactUs() {
   //  $homesettings = HomeSettings::first();
    $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    return view('pages.extra.contact-us',compact('events','shops', 'topCategories'));
   }



   public function aboutUs() {
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
     $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    return view('pages.extra.about-us',compact('events','shops', 'topCategories'));
   }



   public function faqs() {
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
     $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    return view('pages.extra.faqs',compact('events','shops','topCategories'));
   }



   public function imprint() {
    $events = Event::where('status',1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
     $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    return view('pages.extra.imprint',compact('events','shops','topCategories'));
   }
   
   
   public function subscribe(Request $request)
    {
        // Validate email
       $request->validate([
            'email' => 'required|email'
        ]);
         // Check if the email already exists in the database
    $existingSubscriber = emails::where('email', $request->email)->first();

    if ($existingSubscriber) {
        // If the email is already subscribed, send a message
         return redirect()->back()->with('error', 'Vous êtes déjà abonné avec cet e-mail.');
    }

        emails::create(['email' => $request->email]);

        return redirect()->back()->with('success', 'Merci pour votre abonnement !');
    }
}
