<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\Teacher;
use App\Models\Subject;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function __invoke(){
        return view('404');
    }

    public function home(){
        $testimonials = Testimonial::where('published', 1)->get();
        $teachers = Teacher::where('published', 1)->get();
        $subjects = Subject::where('published', 1)->get();
        return view('home',compact('testimonials', 'teachers', 'subjects'));
    }

    public function about(){
        $teachers = Teacher::where('published', 1)->get();
        return view('about',compact('teachers'));
    }

    public function classes(){
        $subjects = Subject::where('published', 1)->get();
        $testimonials = Testimonial::where('published', 1)->get();
        return view('classes',compact('subjects','testimonials'));
    }

    public function contact(){
        return view('contact');
    }

    public function facilities(){
        return view('facilities');
    }

    public function team (){
        $teachers = Teacher::where('published', 1)->get();
        return view('team',compact('teachers'));
    }

    public function callToAction (){
        return view('callToAction');
      }

    public function appointment()  {
        return view('appointment');
    }

    public function testimonial()  {
        $testimonials = Testimonial::where('published', 1)->get();
        return view('testimonial',compact('testimonials'));
    }

    public function sendContactUs(Request $request)  {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email',
            'subject'=>'required|string',
            'message'=>'required|string',
            ], $messages);

            Contact::create($data);
            Mail::to( 'samar@example.com')->send( 
                new ContactMail($data)
            );
            return redirect()->back()->with('success', 'Your message was sent successfully!');
            // return "mail sent!";
    }

    public function sendAppointment(Request $request)  {
        $messages = $this->messages();
        $data = $request->validate([
            'guardianName'=>'required|string|max:50',
            'guardianEmail'=>'required|email',
            'childName'=>'required|string|max:50',
            'childAge'=>'required|integer|max:5',
            'message'=>'required|string',
            ], $messages);

            Appointment::create($data);
            Mail::to( 'samar@example.com')->send( 
                new AppointmentMail($data)
            );
            return redirect()->back()->with('success', 'Your message was sent successfully!');
            // return "mail sent!";
    }

    public function messages(){
        return[
                'name.required'=>'Name is required',
                'email.required'=> 'Email is required',
                'subject.required'=> 'Subject is required',
                'message.required'=> 'Message is required',
                'guardianName.required'=>'Guardian Name is required',
                'childName.required'=>'Child Name is required',
                'childAge.required'=>'Child Age is required',
                'childAge.integer'=>'Child Age should be an integer',
                'childAge.max'=>'Child Age should be 5 or less',
                'guardianEmail.required'=> 'Guardian Email is required',               
                ];
    }

    public function dashboard (){
        return view('admin.dashboard');
      }

    public function index(){
        $readMessages = Contact::where('is_read', true)->get();
        $unreadMessages = Contact::where('is_read', false)->get();
    
        return view('admin.contacts', compact('readMessages', 'unreadMessages'));
    }

    // In your controller method
    public function markAsRead($id){        
        $contacts = Contact::get();
        $contact = Contact::find($id);
        $contact->is_read = true;
        $contact->save();
        return redirect ('admin/contacts');
    }


}
