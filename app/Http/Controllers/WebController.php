<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Social;
use App\Models\About;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Review;
use App\Models\Services;
use App\Models\Brands;
use App\Models\Design;
use App\Models\Team;
use Carbon\Carbon;
use Image;





class WebController extends Controller
{

    
    
    public function sociallinks()
    {
        $data['title']='Social links';
        $data['links'] = Social::latest()->get();
        return view('admin.web-control.social-links', $data);
    } 
    
    public function aboutus()
    {
        $data['title']='About us';
        $data['value'] = About::first();
        return view('admin.web-control.about-us', $data);
    } 
    
    public function privacypolicy()
    {
        $data['title']='Privacy policy';
        $data['value'] = About::first();
        return view('admin.web-control.privacy-policy', $data);
    }
    
    public function logo()
    {
        $data['title']='Logo & Favicon';
        return view('admin.web-control.logo', $data);
    }    
    
    public function homepage()
    {
        $data['title']='Homepage';
        return view('admin.web-control.home', $data);
    }
    
    public function faq()
    {
        $data['title']='Frequently asked questions';
        $data['faq'] = Faq::latest()->get();
        return view('admin.web-control.faq', $data);
    }     
    
    public function services()
    {
        $data['title']='Services';
        $data['service'] = Services::latest()->get();
        return view('admin.web-control.service', $data);
    }  
    
    public function page()
    {
        $data['title']='Web pages';
        $data['page'] = Page::latest()->get();
        return view('admin.web-control.page', $data);
    }     
    
    public function review()
    {
        $data['title']='Reviews';
        $data['review'] = Review::latest()->get();
        return view('admin.web-control.review', $data);
    }        
    
    public function EditReview($id)
    {
        $data['title']='Reviews';
        $data['val'] = Review::find($id);
        return view('admin.web-control.review-edit', $data);
    }    
    
    public function team()
    {
        $data['title']='Team';
        $data['review'] = Team::latest()->get();
        return view('admin.web-control.team', $data);
    }        
    
    public function EditTeam($id)
    {
        $data['title']='team';
        $data['val'] = Team::find($id);
        return view('admin.web-control.team-edit', $data);
    }   
    
    public function EditBrand($id)
    {
        $data['title']='Brands';
        $data['val'] = Brands::find($id);
        return view('admin.web-control.brand-edit', $data);
    }    
    
    public function brand()
    {
        $data['title']='Brands';
        $data['brand'] = Brands::latest()->get();
        return view('admin.web-control.brand', $data);
    } 
    
    public function branch()
    {
        $data['title']='Bank branches';
        $data['branch'] = Branch::latest()->get();
        return view('admin.web-control.branch', $data);
    } 

    public function unpage($id)
    {
        $page=Page::find($id);
        $page->status=0;
        $page->save();
        return back()->with('success', 'Page has been unpublished.');
    } 
    public function ppage($id)
    {
        $page=Page::find($id);
        $page->status=1;
        $page->save();
        return back()->with('success', 'Page was successfully published.');
    }     
    
    public function unbrand($id)
    {
        $page=Brands::find($id);
        $page->status=0;
        $page->save();
        return back()->with('success', 'Brand has been unpublished.');
    } 
    public function pbrand($id)
    {
        $page=Brands::find($id);
        $page->status=1;
        $page->save();
        return back()->with('success', 'Brand was successfully published.');
    }    
    
    public function unreview($id)
    {
        $page=Review::find($id);
        $page->status=0;
        $page->save();
        return back()->with('success', 'Review has been unpublished.');
    } 
    public function preview($id)
    {
        $page=Review::find($id);
        $page->status=1;
        $page->save();
        return back()->with('success', 'Review was successfully published.');
    }    
    
    public function unteam($id)
    {
        $page=Team::find($id);
        $page->status=0;
        $page->save();
        return back()->with('success', 'Team member has been unpublished.');
    } 
    public function pteam($id)
    {
        $page=Team::find($id);
        $page->status=1;
        $page->save();
        return back()->with('success', 'Team member was successfully published.');
    }

    public function currency()
    {
        $data['title']='Currency';
        $data['cur'] = Currency::all();
        return view('admin.web-control.currency', $data);
    }

    public function pcurrency($id)
    {
        $data=Currency::all();
        foreach ($data as $datas){
        $datas->status=0;
        $datas->save();
        }
        $default=Currency::find($id);
        $default->status=1;
        $default->save();
        return back()->with('success', 'Update was Successful!.');
    }

    public function terms()
    {
        $data['title']='Terms & Conditions';
        $data['value'] = About::first();
        return view('admin.web-control.terms', $data);
    }

    public function CreateFaq(Request $request)
    {
        $data['question'] = $request->question;
        $data['answer'] = $request->answer;
        $res = Faq::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Faq');
        }
    }     
    
    public function CreateService(Request $request)
    {
        $data['title'] = $request->title;
        $data['icon'] = $request->icon;
        $data['details'] = $request->details;
        $res = Services::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Service');
        }
    } 
    
    public function CreatePage(Request $request)
    {
        $data['title'] = $request->title;
        $data['content'] = Purifier::clean($request->content);
        $res = Page::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Page');
        }
    }  
    public function Updatehomepage(Request $request)
    {
        $data = Design::findOrFail(1);
        $data->header_title=$request->header_title;
        $data->header_body=$request->header_body;
        $data->s2_title=$request->s2_title;
        $data->s2_body=$request->s2_body;
        $data->s5_title=$request->s5_title;
        $data->s5_body=$request->s5_body;
        $data->s6_title=$request->s6_title;
        $data->s6_body=$request->s6_body;
        $data->s7_title=$request->s7_title;
        $data->s7_body=$request->s7_body;
        $data->s8_title=$request->s8_title;
        $data->s3_title=$request->s3_title;
        $data->s8_body=$request->s8_body;         
        $data->s4_title=$request->s4_title;
        $data->s4_body=$request->s4_body;        
        $data->s3_body=$request->s3_body;        
        $data->item1_title=$request->item1_title;
        $data->item1_body=$request->item1_body;        
        $data->item2_title=$request->item2_title;
        $data->item2_body=$request->item2_body;        
        $data->item3_title=$request->item3_title;
        $data->item3_body=$request->item3_body;    
        $data->team=$request->team;        
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }   
    
    public function CreateReview(Request $request)
    {
        $data['name'] = $request->name;
        $data['occupation'] = $request->occupation;
        $data['review'] = Purifier::clean($request->review);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'review_'.time().'.'.$image->extension();
            $location = 'asset/review/' . $filename;
            Image::make($image)->save($location);
            $data['image_link'] = $filename;
        }
        $res = Review::create($data);
        if ($res) {
            return redirect()->route('admin.review')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating Review');
        }
    }    
    
    public function CreateTeam(Request $request)
    {
        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'team_'.time().'.'.$image->extension();
            $location = 'asset/review/' . $filename;
            Image::make($image)->resize(270, 344)-save($location);
            $in['image'] = $filename;
        }
        $res = Team::create($in);
        if ($res) {
            return redirect()->route('admin.team')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating Team');
        }
    }       
    
    public function UpdateReview(Request $request)
    {
        $data = Review::find($request->id);
        $data['name'] = $request->name;
        $data['occupation'] = $request->occupation;
        $data['review'] = Purifier::clean($request->review);
        if($request->hasFile('update')){
            $image = $request->file('update');
            $filename = 'update_'.time().'.'.$image->extension();
            $location = 'asset/review/' . $filename;
            $path = './asset/review/';
            File::delete($path.$data->image_link);
            Image::make($image)->save($location);
            $data['image_link'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return redirect()->route('admin.review')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Review');
        }
    }     
    
    public function UpdateTeam(Request $request)
    {
        $data = Team::find($request->id);
        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'team_'.time().'.'.$image->extension();
            $location = 'asset/review/' . $filename;
            $path = './asset/review/';
            File::delete($path.$data->image);
            Image::make($image)->resize(270, 344)->save($location);
            $in['image'] = $filename;
        }
        $res = $data->fill($in)->save();
        if ($res) {
            return redirect()->route('admin.team')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Team');
        }
    }    
    

    public function UpdateFaq(Request $request)
    {
        $mac = Faq::findOrFail($request->id);
        $mac['question'] = $request->question;
        $mac['answer'] = $request->answer;
        $res = $mac->save();
        if ($res) {
            return redirect()->route('admin.faq')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Faq');
        }
    } 

    public function UpdateService(Request $request)
    {
        $mac = Services::findOrFail($request->id);
        $mac['title'] = $request->title;
        $mac['icon'] = $request->icon;
        $mac['details'] = $request->details;
        $res = $mac->save();
        if ($res) {
            return redirect()->route('admin.service')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Service');
        }
    }  
    
    public function UpdatePage(Request $request)
    {
        $mac = Page::findOrFail($request->id);
        $mac['title'] = $request->title;
        $mac['content'] = Purifier::clean($request->content);
        $res = $mac->save();
        if ($res) {
            return redirect()->route('admin.page')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Page');
        }
    } 
    

    public function DestroyFaq($id)
    {
        $data = Faq::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Faq was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Faq');
        }
    }    
    
    public function DestroyService($id)
    {
        $data = Services::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Service was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Service');
        }
    }

    public function DestroyPage($id)
    {
        $data = Page::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Page was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Page');
        }
    }    
    
    public function DestroyReview($id)
    {
        $data = Review::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Review was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Review');
        }
    }      
    
    public function DestroyTeam($id)
    {
        $data = team::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Team was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Team');
        }
    }    
    
    public function DestroyBrand($id)
    {
        $data = Brands::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Brand was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Brand');
        }
    }
    
    public function DestroyBranch($id)
    {
        $data = Branch::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Branch was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Branch');
        }
    }

    public function UpdateSocial(Request $request)
    {
        $mac = Social::findOrFail($request->id);
        $mac['value'] = $request->link;
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    } 
    
    public function UpdateAbout(Request $request)
    {
        $mac = About::findOrFail(1);
        $mac['about'] = Purifier::clean($request->details);
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    } 
    
    public function UpdatePrivacy(Request $request)
    {
        $mac = About::findOrFail(1);
        $mac['privacy_policy'] = Purifier::clean($request->details);
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    }
    
    public function UpdateTerms(Request $request)
    {
        $mac = About::findOrFail(1);
        $mac['terms'] = Purifier::clean($request->details);
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    }
    public function UpdateLogo(Request $request)
    {

        $data = Logo::find(1);
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $filename = 'logo_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/';
            File::delete($path.$data->image_link);
            $data['image_link'] = 'images/'.$filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Logo');
        }
        return $data;
    }     
    
    public function section1(Request $request)
    {

        $data = Design::find(1);
        if($request->hasFile('section1')){
            $image = $request->file('section1');
            $filename = 'section1_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->resize(80, 80)->save($location);
            $path = './asset/images/';
            File::delete($path.$data->s2_image);
            $data['s2_image'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Image');
        }
        return $data;
    }    
    
    public function section2(Request $request)
    {

        $data = Design::find(1);
        if($request->hasFile('section2')){
            $image = $request->file('section2');
            $filename = 'section2_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->resize(80, 80)->save($location);
            $path = './asset/images/';
            File::delete($path.$data->s3_image);
            $data['s3_image'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Image');
        }
        return $data;
    }    
    
    public function section3(Request $request)
    {

        $data = Design::find(1);
        if($request->hasFile('section3')){
            $image = $request->file('section3');
            $filename = 'section3_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->resize(80, 80)->save($location);
            $path = './asset/images/';
            File::delete($path.$data->s4_image);
            $data['s4_image'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Image');
        }
        return $data;
    }     
    
    public function section4(Request $request)
    {

        $data = Design::find(1);
        if($request->hasFile('section4')){
            $image = $request->file('section4');
            $filename = 'section4_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path.$data->s7_image);
            $data['s7_image'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Image');
        }
        return $data;
    }     
    
    public function section6(Request $request)
    {

        $data = Design::find(1);
        if($request->hasFile('section6')){
            $image = $request->file('section6');
            $filename = 'section6_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->resize(700, 463)->save($location);
            $path = './asset/images/';
            File::delete($path.$data->s6_image);
            $data['s6_image'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Image');
        }
        return $data;
    } 
    
    public function UpdateFavicon(Request $request)
    {

        $data = Logo::find(1);
        if($request->hasFile('favicon')){
            $image = $request->file('favicon');
            $filename = 'favicon_'.time().'.'.$image->extension();
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/';
            File::delete($path.$data->image_link2);
            $data['image_link2'] = 'images/'.$filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Logo');
        }
        return $data;
    }
    
        
}
