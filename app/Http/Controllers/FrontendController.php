<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTripRequest;
use App\Models\Journal;
use App\Models\TripItinerary;
use Illuminate\Http\Request;
use App\Models\TripPlan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index(){
        $articles = collect($this->getArticle()['articles'])->take(4);
        return view('home', compact('articles'));
    }

    public function blogs(){
        $articles = $this->getArticle();
        return view('blogs', compact('articles'));
    }

    public function planner(){
        $plans = TripPlan::where('user_id', Auth::user()->id)->get();
        return view('planner/index' , compact('plans'));
    }

    public function createPlan(){
        return view('planner/createPlan');
    }
    public function storePlan(CreateTripRequest $request){
        $validatedData = $request->validated();

        $validatedData['tripName'] = htmlspecialchars($validatedData['tripName']);
        $validatedData['place'] = htmlspecialchars($validatedData['place']);
        $validatedData['start_datepicker'] = htmlspecialchars($validatedData['start_datepicker']);
        $validatedData['end_datepicker'] = htmlspecialchars($validatedData['end_datepicker']);

        // Save the uploaded image to storage
        $img = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $img = $this->uploadImage($file, 'public/travelPlan/')->storeImageDB();
        }

        $trip = new TripPlan();

        $trip->user_id = Auth::user()->id;
        $trip->tripName = $validatedData['tripName'];
        $trip->place = $validatedData['place'];
        $trip->start_date = $validatedData['start_datepicker'];
        $trip->end_date = $validatedData['end_datepicker'];
        $trip->image = $img;

        $trip->save();

        return redirect('/planner')->with('success', 'Trip Place successfully added!');
    }

    public function showItinerary($id){
        $trip = TripPlan::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $itinerary = TripItinerary::where('tripId', $id)->first();
        return view('planner/itinerary', compact('trip', 'itinerary'));
    }
    public function createItinerary($id){
        $trip = TripPlan::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $start_time = Carbon::parse($trip['start_date']);
        $end_time = Carbon::parse($trip['end_date']);

        $days_between = $start_time->diffInDays($end_time);
        return view('planner/createItinerary', compact('days_between', 'trip'));
    }
    public function editItinerary($id){
        $itinerary = TripItinerary::where('tripId', $id)->first();
        $trip = TripPlan::where('id', $id)->where('user_id', Auth::user()->id)->first();

        return view('planner/editItinerary', compact('itinerary', 'trip'));
    }
    public function storeItinerary(Request $request){
        $validatedData = $request->validate([
            'place_id' => 'required|integer',
            'tasks' => 'required|array',
        ]);

        $tasks = json_encode($validatedData['tasks']);
        $tripId =  $validatedData['place_id'];
        $itinerary = new TripItinerary();
        $itinerary->tripId = $tripId;
        $itinerary->itinerary = $tasks;
        $itinerary->user_id = Auth::user()->id;

        $itinerary->save();

        return redirect('/check-itineraries/'.$tripId)->with('success', 'Trip Plan successfully added!');
    }
    public function updateItinerary(Request $request){
        $validatedData = $request->validate([
            'itrId' => 'required|integer',
            'place_id' => 'required|integer',
            'tasks' => 'required|array',
        ]);

        $tasks = json_encode($validatedData['tasks']);
        $tripId =  $validatedData['place_id'];
        $itrId =  $validatedData['itrId'];

        $itinerary = TripItinerary::find($itrId);
        $itinerary->tripId = $tripId;
        $itinerary->itinerary = $tasks;
        $itinerary->user_id = Auth::user()->id;

        $itinerary->update();

        return redirect('/check-itineraries/'.$tripId)->with('success', 'Trip Plan successfully updated!');
    }
    public function deleteItinerary(Request $request){
        TripItinerary::where('tripId', $request->id)->delete();
        return redirect('/check-itineraries/'.$request->id)->with('success', 'Trip Plan successfully Deleted!');
    }
    public function deletePlace(Request $request){
        TripPlan::where('id', $request->id)->delete();
        return redirect('/check-itineraries/'.$request->id)->with('success', 'Trip Place successfully Deleted!');
    }
    public function Journal(){
        $journals = Journal::where('user_id', Auth::user()->id)->get();

        return view('journal.index' , compact('journals'));
    }
    public function showJournal($id){
        $journal = Journal::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('journal.show' , compact('journal'));
    }
    public function addJournal(){
        return view('journal.create');
    }
    public function storeJournal(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'journal' => 'required',
        ]);
        $journal = new Journal();
        $journal->user_id = Auth::user()->id;
        $journal->title = $validatedData['title'];
        $journal->content = $validatedData['journal'];

        $journal->save();
        return redirect('/journal')->with('success', 'Journal added successfully!');
    }
    public function deleteJournal(Request $request){
        Journal::where('id', $request->id)->delete();
        return redirect('/journal')->with('success', 'Journal successfully Deleted!');
    }



    //Special Functions
    protected function getArticle(){
        $cacheKey = 'api-response';
        $response = Cache::get($cacheKey);
        if(!$response){
            $response = Http::get('https://newsapi.org/v2/everything?q=nature&from=2023-03-16&sortBy=publishedAt&apiKey='.env('articleAPIKey'));
            if($response->ok()){
                Cache::put($cacheKey, $response->json(), 60);
            }
        }
        return $response ?? null;
    }
    public function uploadImage($image, $path)
    {
        $this->image = $image;
        $this->path = $path;

        if ($image && $path) {
            $image->store($path);
            return $this;
        }
        return $this;
    }

    public function storeImageDB(): ?string
    {
        if ($this->image) {
            $imageName = $this->image->hashName();
            $this->path . $imageName;
            return $imageName;
        }
        return '';
    }

    public function deleteImage($imageName, $path)
    {
        $storePath = $path . $imageName;
        if ($imageName && File::exists($storePath)) {
            unlink(public_path($path . $imageName));
            return true;
        }
        dd($imageName . " " . File::exists($storePath));
        return null;
    }

}
